<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
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

    public function logout(){
        Auth::logout();

        return redirect()->route('admin.login');
    }

    public function showDormatory(){
        return view('frontend.dormatory.dormatory');
    }



}
