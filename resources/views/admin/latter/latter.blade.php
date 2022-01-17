
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Release Letter</title>

    <style>
        html,body{
            margin: 0px;
            padding: 0px;
        }

        #main{
            margin-top:50px;
            margin-left:70px;
            margin-right:50px;
        }

        #div1{
            margin-top:20px;
            margin-bottom:30px;
            text-align:center;
            padding: 0px;
        }

        #p1{
            font-weight: bold;
            margin:0px;
        }
        #p2{
            font-weight: normal;
            margin:0px;
        }
        #p3{
            font-weight: normal;
            text-align:justify;
            hyphens: auto;
            margin:0px;
        }


        #div2{
            padding: 0px;
            margin-bottom:10px;
        }

        #div3{
            margin-bottom: 10px;
        }

        #l2{
            margin-left:240px;
        }

        #div4{
            max-width:190px;
            margin-left:440px;
            margin-bottom:10px;
            text-align:center;
        }

        #table1{
            width:100%;
            border-collapse: collapse;
            margin-bottom:10px;
        }
        tr,th,td{
            border: 1px solid black;
            border-collapse: collapse;
        }

        #td_middle{
            text-align:center;
            width:5%;
        }



    </style>
</head>
<body>
<div id="main">
    <div id="div1">
        <p id="p1">Government of the peoples Republic of Bangladesh</p>
        <p id="p2">National Agriculture Training Academy (NATA)</p>
        <p id="p2">Gazipur 1701</p>
        <p id="p2">www.nata.gov.bd</p>
        <p id="p1">Release Letter</p>
    </div>

    <div id="div2">
        <div id="div3">
            <lavel id="l1">No. 12.15.0000.00.25.014.20.1075/1(32)</lavel>
            <lavel style="float: right;" id="l2">Date: 02-12-2021</lavel>
        </div>
        <p id="p2">Perticipants of the different organization under the Mnistry of Agriculture joined the training course entitle "Food Security and Food Safety" held at National Agriculture Training Academy (NATA), Gazipur from 28.11.2021 to 02.12.2021. After successful completion of the training the participants are released on 02-12-2021. TA/DA should be given to the participants from their respective organizations as per Government rules.</p>
    </div>

    <table id="table1">
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Organization</th>
        </tr>
        {{--        @php $i=1; @endphp--}}
        @foreach($letter as $l)
            <tr>
                <td id="td_middle">{{ $loop->index+1 }}</td>
                <td style="width:35%;">{{ $l->name_en }}</td>
                <td style="width:25%;">{{ $l->designation }}</td>
                <td style="width:35%;">{{ $l->organization_name }}</td>
            </tr>
            {{--        @php $i++; @endphp--}}
        @endforeach
    </table>
    <div style="float: right;" id="div4">
        <img src="http://localhost/nata/public/certificate/signature/{{ $coor->dg_photo }}" alt="image" style="margin:10px;max-width:150px;max-height:100px; position:center;">
        <p style="margin:5px;">Director General</p>
        <p style="margin:5px;">Phone: 02-49272104</p>
        <p style="margin:5px;">dgnata14@gmail.com</p>
    </div>

    <div>
        <p style="font-weight:bold;margin-bottom:2px;">A. Copy forwarded for kind information and necessary action ; (Not as seniority)</p>
        <table style="margin-left:16px">
            <tr>
                <td style="border:0px;margin-right:3px">01.</td>
                <td style="border:0px">Director General, Department of Agriculture Extension, Khamarbari, Dhaka.</td>
            </tr>
            <tr>
                <td style="border:0px;margin-right:3px">02.</td>
                <td style="border:0px">Director General, Department of Agriculture Extension, Khamarbari, Dhaka.</td>
            </tr>
            <tr>
                <td style="border:0px;margin-right:3px">03.</td>
                <td style="border:0px">Director General, Department of Agriculture Extension, Khamarbari, Dhaka.</td>
            </tr>
            <tr>
                <td style="border:0px;margin-right:3px">03.</td>
                <td style="border:0px">Director General, Department of Agriculture Extension, Khamarbari, Dhaka.</td>
            </tr>
        </table>
    </div>

    <div>
        <p style="font-weight:bold;margin-bottom:2px;">B. Copy forwarded for kind information: (Not as seniority)</p>
        <table style="margin-left:16px">
            <tr>
                <td style="border:0px;margin-right:3px">01.</td>
                <td style="border:0px">Additional Secretary, Extension Wing, Ministry of Agriculture, Dhaka.</td>
            </tr>
            <tr>
                <td style="border:0px;margin-right:3px">02.</td>
                <td style="border:0px">Additional Secretary, Extension Wing, Ministry of Agriculture, Dhaka.</td>
            </tr>
            <tr>
                <td style="border:0px;margin-right:3px">03.</td>
                <td style="border:0px">Additional Secretary, Extension Wing, Ministry of Agriculture, Dhaka.</td>
            </tr>
        </table>
    </div>
</div>
</body>

</html>