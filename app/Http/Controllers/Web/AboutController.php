<?php

namespace App\Http\Controllers\Web;

use App\Models\WhyUs;
use App\Http\Controllers\Controller;
use App\Services\WhyUs\WhyUsService;
use Illuminate\Http\Request;
use App\Services\About\AboutService;

class AboutController extends Controller
{
    protected AboutService $aboutService;
    protected WhyUsService $whyUsService;
    public function __construct(AboutService $aboutService,WhyUsService $whyUsService)
    {
        $this->aboutService = $aboutService;
        $this->whyUsService = $whyUsService;
    }

    public function index(Request $request)
    {
        $result = [
            'about' => $this->aboutService->index($request)->where('active',1),
            'WhyUs' => $this->whyUsService->index($request)->where('active',1),
        ];
        return view('web.pages.about',compact('result'));
    }
}
