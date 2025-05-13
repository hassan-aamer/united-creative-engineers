<?php

namespace App\Http\Controllers\Admin\Packages;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Packages\PackageService;
use App\Http\Requests\Packages\PackageRequest;
use App\Models\PackageDetail;

class PackageController extends Controller
{
    private $folderPath = 'admin.packages.';
    protected PackageService $service;
    public function __construct(PackageService $service)
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
        $PackageDetails = PackageDetail::Publish()->orderBy('position', 'asc')->get();
        return view($this->folderPath . 'create_and_edit', ['result' => null],compact('PackageDetails'));
    }
    public function store(PackageRequest $request)
    {
        try {
            $this->service->store($request->validated());
            return redirect()->route('admin.packages.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to create package: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $PackageDetails = PackageDetail::Publish()->orderBy('position', 'asc')->get();
        $result = $this->service->edit($id);
        return view($this->folderPath . 'create_and_edit', compact('result','PackageDetails'));
    }
    public function update(PackageRequest $request, $id)
    {
        try {
            $this->service->update($request->validated(), $id);
            return redirect()->route('admin.packages.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to update package: ' . $e->getMessage());
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
