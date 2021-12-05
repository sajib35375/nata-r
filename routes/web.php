<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

//admin login
Route::get('admin/login',[App\Http\Controllers\AdminController::class,'loginPage']);
Route::post('admin/login',[App\Http\Controllers\AdminController::class,'login'])->name('admin.login');
Route::get('admin/dashboard',[App\Http\Controllers\AdminController::class,'AdminDashboard'])->name('admin.dashboard');

//user logout
Route::get('user/logout',[App\Http\Controllers\NataController::class,'logout'])->name('logout');
//nata slider
Route::get('nata/slider',[App\Http\Controllers\NataController::class,'slider'])->name('slider');
Route::post('nata/slider/store',[App\Http\Controllers\NataController::class,'sliderStore'])->name('slider.store');
//apply
Route::get('instruction',[App\Http\Controllers\NataController::class,'ShowIns'])->name('show.ins');
Route::get('form/apply',[App\Http\Controllers\NataController::class,'ApplyForm'])->name('apply.form');
//course
Route::get('course/table',[App\Http\Controllers\CourseController::class,'index'])->name('course.index');
Route::post('course/store',[App\Http\Controllers\CourseController::class,'store'])->name('course.store');

Route::post('test',[App\Http\Controllers\CourseController::class,'testStore'])->name('test');
