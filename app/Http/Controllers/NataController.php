<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Course;
use App\Models\Slider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class NataController extends Controller
{
    public function check(){
        return view('frontend.auth.varification');
    }
    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
    public function slider(){
        $data = Slider::latest()->get();
        return view('admin.slider.slider',compact('data'));
    }
    public function sliderStore(Request $request){

        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(900,700)->save('NATA_files/image/'.$unique_name);
        }


        Slider::create([
            'photo' => $unique_name,
        ]);

        return redirect()->back()->with('success','slider inserted successfully');

    }
    public function ShowIns(){
        return view('frontend.ApplyForm.instraction');
    }
    public function ApplyForm(){
//        dd(Auth::id());
        $course = Course::with('apply')->get();
        $apply = Apply::where('user_id',Auth::id())->get();

        return view('frontend.ApplyForm.applyform',compact('course','apply'));
    }
}
