<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Services\ServicesService;

class ServiceController extends Controller
{
    protected ServicesService $service;
    public function __construct(ServicesService $service)
    {
        $this->service = $service;
    }
    public function index(Request $request)
    {
        $services = $this->service->index($request)->where('active',1);
        return view('web.pages.services', compact('services'));
    }
    public function show($id)
    {
        $services = $this->service->show($id);
        return view('web.pages.services_details', compact('services'));
    }
}
