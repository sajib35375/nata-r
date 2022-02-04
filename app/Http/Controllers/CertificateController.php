<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Asession;
use App\Models\Signature;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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

    }

    public function sessionWiseView(){
        $sess = Asession::latest()->get();
        return view('admin.certificate.session_certificate',compact('sess'));
    }



    public function releaseLatter($id){



        $letter = Apply::where('session_id',$id)->get();


        $coor = Asession::find($id);

        foreach($letter as $l){
            $same_name = $l->organization_name;
        }




        $nilai = Apply::where('session_id',$id)->get();

        $orgs = [];


        $org_array = [];

        for ( $i=0 ; $i < count($nilai); $i++ ){
            if (!in_array($nilai[$i]->organization_name,$org_array)){

                array_push($org_array,$nilai[$i]->organization_name);
                array_push($orgs,$nilai[$i]);
            }

        }


        $pdf = PDF::loadView('admin.latter.latter', compact('letter','orgs','coor'))->setPaper('A4','landscape');

        return $pdf->download('letter.pdf');
    }

}
