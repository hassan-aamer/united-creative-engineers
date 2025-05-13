<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $count = [
            'users' => \App\Models\User::count(),
            'products' => \App\Models\Product::count(),
            'services' => \App\Models\Service::count(),
            'contacts' => \App\Models\Contact::count(),
        ];
        return view('admin.dashboard', compact('count'));
    }
}
