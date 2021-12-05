<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::DASH;

    public function loginPage(){
        return view('admin.login');
    }

    public function AdminDashboard(){
        return view('admin.index');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }


}
