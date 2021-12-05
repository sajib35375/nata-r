<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index(){
        $data = Course::latest()->get();
        return view('admin.course.course',compact('data'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'course' => 'required'
        ]);
        $apply = Apply::first();

         Course::insert([
             'user_id' => Auth::id(),
            'apply_id' => $apply->id,
            'course_name' => $request->course,
        ]);

        return redirect()->back()->with('success','course inserted successfully');

    }
    public function testStore(Request $request){
        $current = Carbon::now();

        Apply::insert([
            'user_id' => Auth::id(),
            'course_id' => $request->course_id,
            'validity' => $current->addYear(2),
        ]);

    }
}
