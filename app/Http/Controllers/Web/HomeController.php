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
    protected SlidersService $slidersService;
    protected WhyUsService $whyUsService;
    public function __construct(ProductsService $productsService, ServicesService $servicesService, SlidersService $slidersService, WhyUsService $whyUsService)
    {
        $this->productsService = $productsService;
        $this->servicesService = $servicesService;
        $this->slidersService  = $slidersService;
        $this->whyUsService    = $whyUsService;
    }
    public function index(Request $request)
    {
        $result = [
            'services' => $this->servicesService->index($request),
            'products' => $this->productsService->index($request),
            'sliders'  => $this->slidersService->index($request),
            'WhyUs'    => $this->whyUsService->index($request),
        ];
        return view('web.pages.home', compact('result'));
    }
}
