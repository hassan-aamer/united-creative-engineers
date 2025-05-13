<?php

namespace App\Interfaces;

interface CRUDRepositoryInterface
{
    public function getAllItems($model, $data = null);
    public function getPublishItems($model, $page, $list);
    public function getPublishItemsByIds($model, $ids, $page, $list);
    public function getPaginateItems($model, $data, $scope = null);
    public function getItemById($model, $itemId);
    public function deleteItem($model, $itemId);
    public function createItem($model, $itemDetails,$skipSlug = false);
    public function updateItem($model, $itemId, $newDetails);
    public function getItemBySlug($model, $itemSlug);
    public function getCount($model, $conditons = null, $scope = null);
    public function getAllItemsWithScope($model, $cope);
}
