<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class AdminUserController extends Controller
{
    public function adminUser(){
        $user = Admin::where('type',2)->latest()->get();
        return view('admin.user_role.user_role',compact('user'));
    }

    public function addAdminUser(){
        return view('admin.user_role.add_new_user');
    }

    public function storeAdminUser(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);
        $unique_name = '';
        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(255,255)->save('admin/img/'.$unique_name);
        }

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => password_hash($request->password,PASSWORD_DEFAULT),
            'phone' => $request->phone,
            'photo' => $unique_name,
            'slider' => $request->slider,
            'course' => $request->course,
            'pro_info' => $request->pro_info,
            'per_info' => $request->per_info,
            'batch' => $request->batch,
            'syllabus' => $request->syllabus,
            'participants' => $request->participants,
            'post' => $request->post,
            'certificate' => $request->certificate,
            'dormatory' => $request->dormatory,
            'admin_role' => $request->admin_role,
            'type' => 2,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.user.role')->with('success','Admin User Inserted Successfully');
    }
}
