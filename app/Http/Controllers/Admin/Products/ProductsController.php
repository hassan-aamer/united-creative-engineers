<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductsRequest;
use App\Models\ProductFeature;
use App\Models\ProductService;
use App\Services\Products\ProductsService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $folderPath = 'admin.products.';
    protected ProductsService $service;
    public function __construct(ProductsService $service)
    {
        $this->service = $service;
    }
    public function index(Request $request)
    {
        $result = $this->service->index($request);
        return view($this->folderPath . 'index', compact('result'));
    }
    public function show($id)
    {
        $result = $this->service->show($id);
        return view($this->folderPath . 'index', compact('result'));
    }
    public function create()
    {
        $services = ProductService::Publish()->orderBy('position', 'asc')->get();
        $additionalServices = ProductService::Publish()->orderBy('position', 'asc')->get();
        $features = ProductFeature::Publish()->orderBy('position', 'asc')->get();
        return view($this->folderPath . 'create_and_edit', ['result' => null], compact('features','services','additionalServices'));
    }
    public function store(ProductsRequest $request)
    {
        try {
            $this->service->store($request->validated());
            return redirect()->route('admin.products.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to create product: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $result = $this->service->edit($id);
        $services = ProductService::Publish()->orderBy('position', 'asc')->get();
        $additionalServices = ProductService::Publish()->orderBy('position', 'asc')->get();
        $features = ProductFeature::Publish()->orderBy('position', 'asc')->get();
        return view($this->folderPath . 'create_and_edit', compact('result', 'features','services','additionalServices'));
    }
    public function update(ProductsRequest $request, $id)
    {
        try {
            $this->service->update($request->validated(), $id);
            return redirect()->route('admin.products.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to update product: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        $this->service->destroy($id);
    }
    public function changeStatus(Request $request)
    {
        $this->service->changeStatus($request);
    }
}
