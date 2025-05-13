<?php

namespace App\Services\Profile;

use App\Models\User;
use App\Interfaces\CRUDRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileService
{
    private $model;
    private CRUDRepositoryInterface $itemRepository;
    public function __construct(CRUDRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
        $this->model = new User();
    }
    public function edit()
    {
        return $this->itemRepository->getItemById($this->model, Auth::id());
    }
    public function update(array $request, int $id)
    {
        try {

            DB::beginTransaction();

            $user = $this->itemRepository->getItemById($this->model, $id);
            $this->itemRepository->updateItem($this->model, $id, $request);

            if (isset($request['image']) && $request['image']) {
                $user->clearMediaCollection('users');
                $user->addMediaFromRequest('image')->toMediaCollection('users');
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
