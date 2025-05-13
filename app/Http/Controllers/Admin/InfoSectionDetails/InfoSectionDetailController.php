<?php

namespace App\Http\Controllers\Admin\InfoSectionDetails;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfoSectionDetails\InfoSectionDetailRequest;
use App\Models\InfoOption;
use App\Models\InfoSection;
use App\Models\Service;
use App\Services\InfoSectionDetails\InfoSectionDetailService;
use Illuminate\Http\Request;

class InfoSectionDetailController extends Controller
{
    private $folderPath = 'admin.infoSectionDetails.';
    protected InfoSectionDetailService $service;
    public function __construct(InfoSectionDetailService $service)
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
        $services = Service::Publish()->orderBy('position', 'asc')->get();
        $infoOptions = InfoOption::Publish()->orderBy('position', 'asc')->get();
        return view($this->folderPath . 'create_and_edit', ['result' => null], compact('services', 'infoOptions'));
    }
    public function store(InfoSectionDetailRequest $request)
    {
        try {
            $this->service->store($request->validated());
            return redirect()->route('admin.infoSectionDetails.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to create info Section Details: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $result = $this->service->edit($id);
        $services = Service::Publish()->orderBy('position', 'asc')->get();
        $infoOptions = InfoOption::Publish()->orderBy('position', 'asc')->get();
        return view($this->folderPath . 'create_and_edit', compact('result', 'services', 'infoOptions'));
    }
    public function update(InfoSectionDetailRequest $request, $id)
    {
        try {
            $this->service->update($request->validated(), $id);
            return redirect()->route('admin.infoSectionDetails.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to update info Section Details: ' . $e->getMessage());
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
