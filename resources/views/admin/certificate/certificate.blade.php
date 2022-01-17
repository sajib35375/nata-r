
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NATA Certificate</title>

    <style>
        html,body{
            margin: 0px;
            padding: 0px;
        }

        #div1{
            width: 97%;
            height:97%;
            position:center;
            margin: auto;
            padding: 0px;
            background-image: url("http://localhost/nata/public/img/certificate.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: auto 100%;

        }

        #divt{
            height: 196px;
            margin-top: 0px;
            opacity: 0.3;
        }
        #div2{
            height: 17px;
            margin-left: 905px;
            margin-right: 80px;
        }
        #label1{
            font-size: 25px;
            font-weight: bold;
        }
        #label2{
            font-size: 20px;
            font-family: Candara;
            text-align: justify!important;
        }
        #label3{
            font-size: 20px;
        }
        #label4{
            font-style: italic;
            font-size: 20px;
            font-weight: bold;
        }

        #div3{
            height: 220px;
        }
        #div4{
            min-height: 170px;
            /*height: 110px;*/
            margin-left: 90px;
            margin-right: 90px;
            text-align: justify;



        }
        /*#label2 {*/
        /*    text-align: justify;*/
        /*    -webkit-hyphens: auto;*/
        /*    -moz-hyphens: auto;*/
        /*    hyphens: auto;*/

        /*}*/
        #div5{
            height: 90px;
            margin-left: 220px;
            margin-right: 200px;


        }
        /*#div5 img {*/
        /*    margin: 80px!important;*/
        /*}*/

    </style>
</head>
<body>
@php
    $i = $coor->SL_first;
    $j= $coor->SL_last ;

@endphp
@foreach ($apply as $student)



    <div id="div1">
        <div id="divt">
        </div>
        <div id="div2">
            <label id="label3">{{sprintf('%03d', $i)}}/{{sprintf('%04d', $j)}}</label>
        </div>
        <div id="div3">
        </div>
        <div id="div4">
            <label id="label1"></label>
            <label id="label2"><strong>{{$student->name_en}}</strong>,{!! "&nbsp;" !!} {{ $student->designation }},{!! "&nbsp;" !!} {{ $student->working_station }},{!! "&nbsp;" !!} {{ $student->proupozila->upozila_name }},{!! "&nbsp;" !!} {{ $student->prodistrict->district_name }} has successfully completed training course on</label><label id="label4"> {!! "&nbsp;" !!}{{ $student->course->course_name }}</label> <label id="label2">held from {{ $coor->start }} to {{ $coor->end }} at National Agriculture Training Academy (NATA), Gazipur.</label>
        </div>
        <div id="div5">
            <img src="http://localhost/nata/public/certificate/signature/{{ $coor->photo }}" alt="" style="position:center;max-width:100px; max-height:150px;margin-bottom: 5px;">
            <img src="http://localhost/nata/public/certificate/signature/{{ $coor->dg_photo }}" alt="" style="margin-left:400px; max-width:100px; max-height:150px;margin-bottom: 5px;">

        </div>
    </div>

@php
    $i++;
    $j++;

@endphp

@endforeach
</body>

</html>