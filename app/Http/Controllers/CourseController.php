<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Asession;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Image;

class CourseController extends Controller
{
    public function index(){
        $data = Course::latest()->get();
        return view('admin.course.course',compact('data'));
    }
    public function store(Request $request){

        $this->validate($request,[
            'course_name' => 'required',
        ]);
//        $apply = Apply::first();

         Course::insert([
             'user_id' => '1',
             'course_name' => $request->course_name,
             'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success','course inserted successfully');

    }

    public function courseEdit($id){
        $course_edit = Course::find($id);
        return view('admin.course.course_edit',compact('course_edit'));
    }

    public function courseUpdate(Request $request,$id){
        $course_update = Course::find($id);
        $course_update->course_name = $request->course_name;
        $course_update->update();
        return redirect()->route('course.index')->with('success','course updated successfully');
    }

    public function courseDelete($id){
        $course_delete = Course::find($id);
        $course_delete->delete();

        return redirect()->back()->with('success','course deleted successfully');
    }



    public function applyStore(Request $request){

        $this->validate($request,[
            'name_en' => 'required',
            'name_bn' => 'required',
            'course_id' => 'required',
            'session_id' => 'required',
            'nid' => 'required',
            'division' => 'required',
            'district' => 'required',
            'upozilla' => 'required',
            'permanent_division' => 'required',
            'permanent_district' => 'required',
            'permanent_upozilla' => 'required',
            'designation' => 'required',
            'working_station' => 'required',
            'organization' => 'required',
            'image'=> 'required',


        ]);
        $unique_name='';
            if($request->hasFile('image')){
                $image = $request->file('image');
                $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(120,100)->save('NATA_files/image/'.$unique_name);
            }


        $current = Carbon::now();

        $id = Apply::insertGetId([
            'user_id' => Auth::id(),
            'course_id' => $request->course_id,
            'session_id' => $request->session_id,
            'name_en' => strtoupper($request->name_en),
            'name_bn' => $request->name_bn,
            'national_id' => $request->nid,
            'date_of_birth' => $request->dob,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'gender' => $request->gender,
            'marital_status' => $request->marital_status,
            'religion' => $request->religion,
            'organization_name' => $request->organization,
            'head_of_organization' => $request->head_of_org,
            'cadre_num' => $request->cadre,
            'cadre_name' => $request->cadre_name,
            'pay_grade' => $request->pay_grade,
            'designation' => $request->designation,
            'service_id' => $request->service_id,
            'controlling_officer' => $request->controlling_officer,
            'working_station' => $request->working_station,
            'p_division' => $request->division,
            'p_district' => $request->district,
            'p_upozila' => $request->upozilla,
            'office_phone' => $request->org_tel,
            'office_email' => $request->org_email,
            'height' => $request->height,
            'weight' => $request->weight,
            'blood_group' => $request->blood_group,
            'degree' => $request->degree,
            'passing_year' => $request->passing_year,
            'university' => $request->board,
            'father_name' => $request->father,
            'mother_name' => $request->mother,
            'house_no' => $request->village,
            'a_divisaion' => $request->permanent_division,
            'b_district' => $request->permanent_district,
            'c_upozila' => $request->permanent_upozilla,
            'e_name' => $request->contact_name,
            'e_relation' => $request->contact_relation,
            'e_phone' => $request->contact_phone,
            'photo' => $unique_name,
            'validity' => $current->addYear(2),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success','Apply form submitted successfully');

    }

    public function viewTable(){
        $allData = Apply::latest()->get();
        $count = Apply::latest()->count();
        return view('admin.student-application.stu_app',compact('allData','count'));
    }


    public function statusApprove($id){
        $approve = Apply::find($id);
        $asses_id = Asession::where('id',$approve->session_id)->first();
        $approve->status=true;
        $approve->first_id = $asses_id->SL_first.$id;
        $approve->last_id = $asses_id->SL_last.$id;
        $approve->update();

        return redirect()->back()->with('success','status approved successfully');
    }

    public function statusInactive($id){
        $inactive = Apply::find($id);
        $inactive->status=false;
        $inactive->update();

        return redirect()->back()->with('success','status inactive successfully');
    }

    public function appDetails($id){
        $app_details = Apply::find($id);
        return view('admin.student-application.stu_app_details',compact('app_details'));
    }

}
