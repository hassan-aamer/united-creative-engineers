<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\ContactRequest;
use App\Services\Contact\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $folderPath = 'admin.contacts.';
    protected ContactService $service;
    public function __construct(ContactService $service)
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
    public function store(ContactRequest $request)
    {
        try {
            $this->service->store($request->validated());
            return redirect()->route('admin.contacts.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to create contact: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $result = $this->service->edit($id);
        return view($this->folderPath . 'create_and_edit', compact('result'));
    }
    public function update(ContactRequest $request, $id)
    {
        try {
            $this->service->update($request->validated(), $id);
            return redirect()->route('admin.contacts.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to update contact: ' . $e->getMessage());
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
