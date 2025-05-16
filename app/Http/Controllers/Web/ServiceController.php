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
    public function show($id)
    {
        $servicesDetails = $this->service->show($id);
        $services = $this->service->index()->where('active',1);
        return view('web.pages.service_details', compact('services','servicesDetails'));
    }
}
