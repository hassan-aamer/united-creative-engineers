<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Subscription\SubscriptionService;
use App\Http\Requests\Subscription\SubscriptionRequest;

class SubscriptionController extends Controller
{
    protected SubscriptionService $service;
    public function __construct(SubscriptionService $service)
    {
        $this->service = $service;
    }
    public function store(SubscriptionRequest $request)
    {
        try {
            $this->service->store($request->validated());
            return redirect()->back()->with('success', __('attributes.OperationCompletedSuccessfully'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to create Subscription: ' . $e->getMessage());
        }
    }
}
