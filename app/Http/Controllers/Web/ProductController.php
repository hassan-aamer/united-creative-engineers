<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Services\Products\ProductsService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductsService $service;
    public function __construct(ProductsService $service)
    {
        $this->service = $service;
    }
public function show($id)
{
    $product = Cache::remember("product_{$id}", now()->addMinutes(180), function () use ($id) {
        return $this->service->show($id);
    });
    return view('web.pages.portfolio_details', compact('product'));
}

}
