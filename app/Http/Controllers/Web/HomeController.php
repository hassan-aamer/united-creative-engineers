<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Products\ProductsService;
use App\Services\Services\ServicesService;
use App\Services\Sliders\SlidersService;
use App\Services\WhyUs\WhyUsService;

class HomeController extends Controller
{
    protected ProductsService $productsService;
    protected ServicesService $servicesService;

    public function __construct(ProductsService $productsService, ServicesService $servicesService)
    {
        $this->productsService = $productsService;
        $this->servicesService = $servicesService;
    }
    public function index(Request $request)
    {
        $result = [
            'services' => $this->servicesService->index($request),
            'products' => $this->productsService->index($request),
        ];
        return view('web.pages.home', compact('result'));
    }
}
