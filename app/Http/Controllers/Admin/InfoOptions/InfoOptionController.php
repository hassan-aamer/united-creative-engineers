<?php

namespace App\Http\Controllers\Admin\InfoOptions;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfoOptions\InfoOptionRequest;
use App\Services\InfoOptions\InfoOptionService;
use Illuminate\Http\Request;

class InfoOptionController extends Controller
{
    private $folderPath = 'admin.infoOption.';
    protected InfoOptionService $service;
    public function __construct(InfoOptionService $service)
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
    public function store(InfoOptionRequest $request)
    {
        try {
            $this->service->store($request->validated());
            return redirect()->route('admin.infoOption.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to create info Option: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $result = $this->service->edit($id);
        return view($this->folderPath . 'create_and_edit', compact('result'));
    }
    public function update(InfoOptionRequest $request, $id)
    {
        try {
            $this->service->update($request->validated(), $id);
            return redirect()->route('admin.infoOption.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to update info Option: ' . $e->getMessage());
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
