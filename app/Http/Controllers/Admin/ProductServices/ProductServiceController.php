<?php

namespace App\Http\Controllers\Admin\ProductServices;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductServices\ProductServiceRequest;
use App\Services\ProductServices\ProductServiceService;
use Illuminate\Http\Request;

class ProductServiceController extends Controller
{
    private $folderPath = 'admin.productServices.';
    protected ProductServiceService $service;
    public function __construct(ProductServiceService $service)
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
        return view($this->folderPath . 'create_and_edit', ['result' => null]);
    }
    public function store(ProductServiceRequest $request)
    {
        try {
            $this->service->store($request->validated());
            return redirect()->route('admin.productServices.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to create product service: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $result = $this->service->edit($id);
        return view($this->folderPath . 'create_and_edit', compact('result'));
    }
    public function update(ProductServiceRequest $request, $id)
    {
        try {
            $this->service->update($request->validated(), $id);
            return redirect()->route('admin.productServices.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to update product service: ' . $e->getMessage());
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
