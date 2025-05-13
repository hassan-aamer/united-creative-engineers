<?php

namespace App\Services\Settings;

use App\Interfaces\CRUDRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;

class SettingsService
{
    private $model;
    private CRUDRepositoryInterface $itemRepository;
    public function __construct(CRUDRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
        $this->model = new Setting();
    }
    public function edit()
    {
        return $this->model->first();
    }
    public function update(array $request, int $id)
    {
        try {

            DB::beginTransaction();

            $settings = $this->itemRepository->getItemById($this->model, $id);
            $this->itemRepository->updateItem($this->model, $id, $request);

            if (isset($request['images']) && $request['images']) {
                $settings->clearMediaCollection('clients');
                foreach ((array) $request['images'] as $file) {
                    $settings->addMedia($file)->toMediaCollection('clients');
                }
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
