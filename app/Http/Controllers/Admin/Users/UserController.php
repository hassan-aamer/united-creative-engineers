<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserRequest;
use App\Services\Users\UserService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private $folderPath = 'admin.users.';
    protected UserService $service;
    public function __construct(UserService $service)
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
        $roles = Role::all();
        return view($this->folderPath . 'create_and_edit', ['result' => null], compact('roles'));
    }
    public function store(UserRequest $request)
    {
        try {
            $this->service->store($request->validated());
            return redirect()->route('admin.users.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to create development: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $roles = Role::all();
        $result = $this->service->edit($id);
        return view($this->folderPath . 'create_and_edit', compact('result', 'roles'));
    }
    public function update(UserRequest $request, $id)
    {
        try {
            $this->service->update($request->validated(), $id);
            return redirect()->route('admin.users.index')->with('success', __('attributes.OperationCompletedSuccessfully'));
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
