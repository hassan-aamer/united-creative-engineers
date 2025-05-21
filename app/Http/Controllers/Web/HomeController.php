<?php

namespace App\Http\Controllers\Web;

use App\Services\Categories\CategoryService;
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
    protected CategoryService $categoryService;

    public function __construct(ProductsService $productsService, ServicesService $servicesService,CategoryService $categoryService)
    {
        $this->productsService = $productsService;
        $this->servicesService = $servicesService;
        $this->categoryService = $categoryService;
    }
    public function index(Request $request)
    {
        $result = [
            'services' => $this->servicesService->index($request)->where('active',1),
            'products' => $this->productsService->index($request)->where('active',1),
            'categories' => $this->categoryService->index(),
        ];
        return view('web.pages.home', compact('result'));
    }
}
