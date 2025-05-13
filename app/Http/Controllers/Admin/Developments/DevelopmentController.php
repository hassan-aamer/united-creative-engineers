<?php

namespace App\Http\Controllers\Admin\Developments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Developments\DevelopmentRequest;
use App\Models\Service;
use App\Services\Developments\DevelopmentService;
use Illuminate\Http\Request;

class DevelopmentController extends Controller
{
    private $folderPath = 'admin.developments.';
    protected DevelopmentService $service;
    public function __construct(DevelopmentService $service)
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
    public function store(DevelopmentRequest $request)
    {
        try {
            $this->service->store($request->validated());
            return redirect()->route('admin.developments.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to create development: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $result = $this->service->edit($id);
        return view($this->folderPath . 'create_and_edit', compact('result'));
    }
    public function update(DevelopmentRequest $request, $id)
    {
        try {
            $this->service->update($request->validated(), $id);
            return redirect()->route('admin.developments.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to update development: ' . $e->getMessage());
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
