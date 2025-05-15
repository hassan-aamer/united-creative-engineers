<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Services\Profile\ProfileService;
use App\Http\Requests\Profile\ProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $folderPath = 'admin.profile.';
    protected ProfileService $service;
    public function __construct(ProfileService $service)
    {
        $this->service = $service;
    }
    public function edit()
    {
        $result = $this->service->edit();
        return view($this->folderPath . 'create_and_edit', compact('result'));
    }
    public function update(Request $request, $id)
    {
        try {
            $this->service->update($request->all(), $id);
            return redirect()->back()->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to update setting: ' . $e->getMessage());
        }
    }
}
