<?php

namespace App\Http\Controllers\Admin\WhyUs;

use App\Http\Controllers\Controller;
use App\Http\Requests\WhyUs\WhyUsRequest;
use App\Services\WhyUs\WhyUsService;
use Illuminate\Http\Request;

class WhyUsController extends Controller
{
    private $folderPath = 'admin.WhyUs.';
    protected WhyUsService $service;
    public function __construct(WhyUsService $service)
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
    public function store(WhyUsRequest $request)
    {
        try {
            $this->service->store($request->validated());
            return redirect()->route('admin.WhyUs.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to create Why Us: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $result = $this->service->edit($id);
        return view($this->folderPath . 'create_and_edit', compact('result'));
    }
    public function update(WhyUsRequest $request, $id)
    {
        try {
            $this->service->update($request->validated(), $id);
            return redirect()->route('admin.WhyUs.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to update Why Us: ' . $e->getMessage());
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
