<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Asession;
use App\Models\Signature;
use Carbon\Carbon;
use Image;
use PDF;
use Illuminate\Http\Request;


class CertificateController extends Controller
{
    public function certificateView($id){
        $apply = Apply::where('session_id',$id)->get();
        $sign = Signature::find(1);
        $coor = Asession::find($id);
        $pdf = PDF::loadView('admin.certificate.certificate', compact('apply','sign','coor'))->setPaper('A4','landscape');

        return $pdf->download('certificate.pdf');
//        return view('admin.certificate.certificate');
    }

    public function sessionWiseView(){
        $sess = Asession::latest()->get();
        return view('admin.certificate.session_certificate',compact('sess'));
    }
//    public function signatureUpdate(Request $request){
//
//        if ($request->hasFile('dg')){
//            $dg = $request->file('dg');
//            $unique_dg = hexdec(uniqid()).'.'.$dg->getClientOriginalExtension();
//            Image::make($dg)->resize(600,617)->save('certificate/signature/'.$unique_dg);
//        }
//
//
//        $update_sign = Signature::find(1);
//        $update_sign->dg = $unique_dg;
//        $update_sign->update();
//
//        return redirect()->back()->with('success','Signature Updated Successfully');
//    }


    public function releaseLatter($id){
        $letter = Apply::where('session_id',$id)->get();
        $coor = Asession::find($id);

        $pdf = PDF::loadView('admin.latter.latter', compact('letter','coor'))->setPaper('A4','landscape');

        return $pdf->download('latter.pdf');
    }

}
