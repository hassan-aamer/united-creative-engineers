<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Services\Settings\SettingsService;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    private $folderPath = 'admin.settings.';
    protected SettingsService $service;
    public function __construct(SettingsService $service)
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
