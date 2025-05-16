<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    public function showLogoutForm()
    {
        return view('admin.auth.logout');
    }
    public function login(LoginRequest $request)
    {
        if (Auth::guard('web')->attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('admin.dashboard')->with('success', __('attributes.OperationCompletedSuccessfully'));
        }

        return redirect()->back()->with('error', 'An error in the email or password.');
    }

    public function logout()
    {
        $user = Auth::guard('web')->logout();
        if ($user) {
            return redirect()->route('home')->with('success', __('attributes.OperationCompletedSuccessfully'));
        }

        return redirect()->route('admin.login.page')->with('success', __('attributes.OperationCompletedSuccessfully'));
    }
}
