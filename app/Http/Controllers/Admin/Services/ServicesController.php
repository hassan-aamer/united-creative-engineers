<?php

namespace App\Http\Controllers\Admin\Services;

use App\Models\Feature;
use App\Models\Package;
use App\Models\Development;
use App\Models\InfoSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Services\ServicesService;
use App\Http\Requests\Services\ServicesRequest;

class ServicesController extends Controller
{
    private $folderPath = 'admin.services.';
    protected ServicesService $service;
    public function __construct(ServicesService $service)
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
        $infoSection = InfoSection::Publish()->orderBy('position', 'asc')->get();
        $features = Feature::Publish()->orderBy('position', 'asc')->get();
        $packages = Package::Publish()->orderBy('position', 'asc')->get();
        $developments = Development::Publish()->orderBy('position', 'asc')->get();
        return view($this->folderPath . 'create_and_edit', ['result' => null], compact('developments','infoSection','packages','features'));
    }
    public function store(ServicesRequest $request)
    {
        try {
            $this->service->store($request->validated());
            return redirect()->route('admin.services.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to create service: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $infoSection = InfoSection::Publish()->orderBy('position', 'asc')->get();
        $features = Feature::Publish()->orderBy('position', 'asc')->get();
        $packages = Package::Publish()->orderBy('position', 'asc')->get();
        $developments = Development::Publish()->orderBy('position', 'asc')->get();
        $result = $this->service->edit($id);
        return view($this->folderPath . 'create_and_edit', compact('result','infoSection','developments','packages','features'));
    }
    public function update(ServicesRequest $request, $id)
    {
        try {
            $this->service->update($request->validated(), $id);
            return redirect()->route('admin.services.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to update service: ' . $e->getMessage());
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
