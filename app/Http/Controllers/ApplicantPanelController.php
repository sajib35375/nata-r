<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Asession;
use Illuminate\Http\Request;
use Auth;
use PDF;

class ApplicantPanelController extends Controller
{
    public function userCertificate(){
        $all_data = Apply::where('user_id',Auth::id())->get();
        return view('frontend.user.user_certificate',compact('all_data'));
    }

    public function userCertificateDownload($id){
        $app = Apply::find($id);

        $session = Asession::where('id',$app->session_id)->first();
        $data = Apply::where('session_id',$app->session_id)->get();

        $count = [];
        foreach($data as $fata){
            array_push($count,$fata->id);
        }


        $pdf = PDF::loadView('frontend.user.certificate.certificate', compact('app','session'))->setPaper('A4','landscape');

        return $pdf->download('certificate.pdf');
    }

    public function userLetterDownload($id){

        $letter = Apply::find($id);


        $realese = Apply::where('session_id',$letter->session_id)->get();
        $coor = Asession::where('id',$letter->session_id)->first();

                $session = Asession::all();

                $session_id = [];

               foreach($session as $data){
                   array_push($session_id,$data->id);
               }

        $nilai = Apply::whereIn('session_id',$session_id)->get();
        $orgs = [];


        $org_array = [];

        for ( $i=0 ; $i < count($nilai); $i++ ){
            if (!in_array($nilai[$i]->organization_name,$org_array)){
                array_push($org_array,$nilai[$i]->organization_name);
                array_push($orgs,$nilai[$i]);
            }

        }


        $pdf = PDF::loadView('frontend.user.letter.letter', compact('letter','orgs','coor','realese'))->setPaper('A4','landscape');

        return $pdf->download('letter.pdf');
    }
}
