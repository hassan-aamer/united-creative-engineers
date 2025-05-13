<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Products\ProductsService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductsService $service;
    public function __construct(ProductsService $service)
    {
        $this->service = $service;
    }
    public function index(Request $request)
    {
        $products = $this->service->index($request)->where('active',1);
        return view('web.pages.products', compact('products'));
    }
    public function show($id)
    {
        $product = $this->service->show($id);
        return view('web.pages.product_details', compact('product'));
    }
}
