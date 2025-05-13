<?php

namespace App\Http\Controllers\Admin\PackageDetails;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageDetail\PackageDetailRequest;
use App\Services\PackageDetails\PackageDetailService;
use Illuminate\Http\Request;

class PackageDetailController extends Controller
{
    private $folderPath = 'admin.packageDetails.';
    protected PackageDetailService $service;
    public function __construct(PackageDetailService $service)
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
    public function store(PackageDetailRequest $request)
    {
        try {
            $this->service->store($request->validated());
            return redirect()->route('admin.PackageDetails.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to create Package Details: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $result = $this->service->edit($id);
        return view($this->folderPath . 'create_and_edit', compact('result'));
    }
    public function update(PackageDetailRequest $request, $id)
    {
        try {
            $this->service->update($request->validated(), $id);
            return redirect()->route('admin.PackageDetails.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to update Package Details: ' . $e->getMessage());
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
