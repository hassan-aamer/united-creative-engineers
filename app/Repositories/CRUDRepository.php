<?php

namespace App\Repositories;

use App\Interfaces\CRUDRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Str;

class CRUDRepository implements CRUDRepositoryInterface
{
    public function getAllItems($model, $data = null)
    {
        $items = $model::Recent();

        if (isset($data['conditionsWhere']) && $data['conditionsWhere'] != null) {
            $items = $items->where($data['conditionsWhere']);
        }

        return $items->get();
    }

    // getAllItemsWithScope
    public function getAllItemsWithScope($model, $scope)
    {
        return $model::$scope()->get();
    }

    public function getPublishItems($model, $page, $list = 'paginate')
    {
        $data = $model::Ordered()->publish();
        if ($list == 'list') {
            $data = $data->take($page)->get();
        } elseif ($list == 'all') {
            $data = $data->get();
        } else {
            $data = $data->paginate($page);
        }

        return $data;
    }

    public function getPublishItemsByIds($model, $ids, $page, $list = 'paginate')
    {
        $data = $model::whereIn('id', $ids)->Ordered()->publish();
        if ($list == 'list') {
            $data = $data->take($page)->get();
        } elseif ($list == 'all') {
            $data = $data->get();
        } else {
            $data = $data->paginate($page);
        }

        return $data;
    }

    public function getPaginateItems($model, $data, $scope = null)
    {
        $items = $model::Recent();
        $status = $data['active'] ?? '-1';
        $search = $data['search'] ?? '';
        $from_date = $data['from_date'] ?? '';
        $to_date = $data['to_date'] ?? '';

        if (isset($scope) && $scope != null) {
            $items = $items->$scope();
        }
        if (isset($search) && $search != '') {
            $items = $items->where(
                function ($q) use ($search, $model) {
                    if ($model == User::class) {
                    } else {
                        $q->where('title', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ->orWhere('address', 'like', '%' . $search . '%');
                    }
                    $q->orWhere('id', 'like', '%' . $search . '%');
                }
            );
        }
        if (isset($from_date) && $from_date != '') {
            $items = $items->whereDate('created_at', '>=', $from_date);
        }
        if (isset($to_date) && $to_date != '') {
            $items = $items->whereDate('created_at', '<=', $to_date);
        }
        if (isset($status) && $status != '-1') {
            $items = $items->where('active', $status);
        }

        if (isset($data['conditionsWhereIn']) && $data['conditionsWhereIn'] != null) {
            $items = $items->whereIn($data['conditionsWhereIn']['attribute'], $data['conditionsWhereIn']['value']);
        }

        if (isset($data['conditions']) && $data['conditions'] != null) {
            $items = $items->where($data['conditions']);
        }

        // conditionsWhereHas

        if (isset($data['conditionsWhereHas']) && $data['conditionsWhereHas'] != null) {
            $cond = $data['conditionsWhereHas'];
            $items = $items->whereHas($cond['relation'], function ($q) use ($cond) {
                $q->where($cond['key'], $cond['value']);
            });
        }

        $items = $items->paginate(30);

        return $items;
    }

    public function getCount($model, $conditons = null, $scope = null)
    {
        $items = $model::orderBy('id', 'DESC');

        if (isset($scope) && $scope != null) {
            $items = $items->$scope();
        }

        if ($conditons != null) {
            if (isset($conditons['conditionsWhereIn']) && $conditons['conditionsWhereIn'] != null) {
                $items = $items->whereIn($conditons['conditionsWhereIn']['attribute'], $conditons['conditionsWhereIn']['value']);
            }

            if (isset($conditons['conditions']) && $conditons['conditions'] != null) {
                $items = $items->where($conditons['conditions']);
            }

            if (isset($conditons['conditionsWhereHas']) && $conditons['conditionsWhereHas'] != null) {
                $cond = $conditons['conditionsWhereHas'];
                $items = $items->whereHas($cond['relation'], function ($q) use ($cond) {
                    $q->where($cond['key'], $cond['value']);
                });
            }
        }

        return $items->count();
    }

    public function getItemById($model, $itemId)
    {
        return $model::findOrFail($itemId);
    }

    public function getItemBySlug($model, $itemSlug)
    {
        return $model::where('slug', $itemSlug)->publish()->first();
    }

    public function deleteItem($model, $itemId)
    {
        $model::destroy($itemId);
    }

    public function createItem($model, $itemDetails, $skipSlug = false)
    {
        return $model::create($itemDetails);
    }

    public function updateItem($model, $itemId, $newDetails)
    {
        if (isset($itemDetails['title']['en'])) {
            $itemDetails['slug'] = Str::slug($newDetails['title']['en'], '-');
        }

        return $model::find($itemId)->update($newDetails);
    }
}
