<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Contact\ContactService;
use App\Http\Requests\Contact\ContactRequest;

class ContactController extends Controller
{
    protected ContactService $service;
    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }
    public function store(ContactRequest $request)
    {
        try {
            $this->service->store($request->validated());
            return redirect()->back()->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to create Contact: ' . $e->getMessage());
        }
    }
}
