@extends('frontend.body.app')

@section('content')


    <main>


        <div class="container" style="padding-bottom: 25px; margin-bottom: 10px">

            <div>
                <legend>
                    <center>
                        <h3><b>Registration Form (Participant)<!--(Student) --> </b></h3>
                    </center>
                </legend>

                <form class="form" method="POST"  action="{{ route('test') }}">
                            @csrf
                    <div class="row">
                        <fieldset>

                            <fieldset class="the-fieldset" style="margin-top: 0px;margin-right: 15px;margin-left: 15px;">

                                <legend class="the-legend"><strong>Course Selection</strong></legend>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-place-of-worship"></i></span>

                                        <select name="course_id" class="form-control selectpicker">

                                            <option value="">Please Select Course</option>

                                            @foreach ($course as $course_select)

                                                @foreach($course_select->apply->validity as $validity)
{{--                                                    @dd($course_select->apply)--}}
                                                @if($validity != null)

                                                    <option {{ $validity > Carbon\Carbon::now()->format('Y-m-d') ? 'disabled' : '' }} value="{{$course_select->id}}">{{$course_select->course_name}}</option>

                                                @else
                                                    <option value="{{$course_select->id}}">{{$course_select->course_name}}</option>
                                                @endif
                                                @endforeach
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <legend class="the-legend"><strong>Course Session</strong></legend>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-place-of-worship"></i></span>
                                        <select name="session_id" class="form-control selectpicker">
                                            <option value="">Please Select Session</option>
                                            {{--  @foreach (App\Models\course::orderBy('id','desc')->where('status', 1)->get() as $course_select)--}}
                                            {{--  <option value="{{$course_select->id}}">{{$course_select->course_name}}</option>--}}
                                            {{--  @endforeach--}}

                                        </select>
                                    </div>
                                </div>

                                <legend class="the-legend"><strong>Personal Information</strong></legend>
                                <div class="col-sm-6">
                                    <div class="form-group ">
                                        <label>Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-user-edit"></i></span>
                                            <input name="name_en" placeholder="Full Name in English" class="form-control" type="text"  >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name in Bengali</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-flag"></i></span>
                                            <input name="name_bn" id="transliteration" placeholder="বাংলায় নাম" class="form-control" type="text"  >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nationa ID</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="far fa-id-card"></i></span>
                                            <input name="nid" placeholder="National ID Number" class="form-control" style="font-family: 'Helvetica', Arial, Lucida Grande, sans-serif;" type="number"  >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                                            <input name="dob" placeholder="Date of Birth" class="form-control number date" style="font-family: 'Helvetica', Arial, Lucida Grande, sans-serif;" type="date"  >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-mobile-alt"></i></span>
                                            <input name="mobile" placeholder="Ex.: 01512345678" class="form-control" style="font-family: 'Helvetica', Arial, Lucida Grande, sans-serif;" type="number"  >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-at"></i></span>
                                            <input name="email"
                                                   class="form-control" type="email" value="{{Auth::user()->email}}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-venus-mars"></i></span>
                                            <select name="gender" class="form-control selectpicker"  >
                                                <option value="">Please Choose</option>
                                                <option  value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Marital Status</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-user-shield"></i></span>
                                            <select name="marital_status" class="form-control selectpicker">
                                                <option value="">Please Choose</option>
                                                <option value="Married">Married</option>
                                                <option value="Unmarried">Unmarried</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Widowed">Widowed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Religion</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-place-of-worship"></i></span>
                                            <select name="religion" class="form-control selectpicker">
                                                <option value="">Please Choose</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Christian">Christian</option>
                                                <option value="Buddism">Buddism</option>
                                                <option value="Tribal">Tribal</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </fieldset>
                            <fieldset class="the-fieldset" style="margin-top: 20px;margin-right: 15px;margin-left: 15px;">
                                <legend class="the-legend"><strong>Professional Information</strong></legend>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Organization Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-building"></i></span>
                                            <select name="organization" class="form-control selectpicker">
                                                <option value="">Please Choose</option>
                                                <option value="Office 1">Office 1</option>
                                                <option value="Office 2">Office 2</option>
                                                <option value="Office 3">Office 3</option>
                                                <option value="Office 4">Office 4</option>
                                                <option value="Office 5">Office 5</option>
                                                <option value="Office 6">Office 6</option>
                                                <option value="Office 7">Office 7</option>
                                                <option value="Office 8">Office 8</option>
                                                <option value="Office 9">Office 9</option>
                                                <option value="Office 10">Office 10</option>
                                                <option value="Office 11">Office 11</option>
                                                <option value="Office 12">Office 12</option>
                                                <option value="Office 13">Office 13</option>
                                                <option value="Office 14">Office 14</option>
                                                <option value="Office 15">Office 15</option>
                                                <option value="Office 16">Office 16</option>
                                                <option value="Office 17">Office 17</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Head of the Organization</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-building"></i></span>
                                            <select name="head_of_org" class="form-control selectpicker"  >
                                                <option value="">Please Choose</option>
                                                <option value="Head of office 1">Head of office 1</option>
                                                <option value="Head of office 2">Head of office 2</option>
                                                <option value="Head of office 3">Head of office 3</option>
                                                <option value="Head of office 4">Head of office 4</option>
                                                <option value="Head of office 5">Head of office 5</option>
                                                <option value="Head of office 6">Head of office 6</option>
                                                <option value="Head of office 7">Head of office 7</option>
                                                <option value="Head of office 8">Head of office 8</option>
                                                <option value="Head of office 9">Head of office 9</option>
                                                <option value="Head of office 10">Head of office 10</option>
                                                <option value="Head of office 11">Head of office 11</option>
                                                <option value="Head of office 12">Head of office 12</option>
                                                <option value="Head of office 13">Head of office 13</option>
                                                <option value="Head of office 14">Head of office 14</option>
                                                <option value="Head of office 15">Head of office 15</option>
                                                <option value="Head of office 16">Head of office 16</option>
                                                <option value="Head of office 17">Head of office 17</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Cadre number/non-cadre</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-building"></i></span>
                                            <select name="cadre" id="blood_group" class="form-control selectpicker"  >
                                                <option value="">Please Choose</option>
                                                <option value="Cadre 1">Cadre 1</option>
                                                <option value="Cadre 2">Cadre 2</option>
                                                <option value="Cadre 3">Cadre 3</option>
                                                <option value="Cadre 4">Cadre 4</option>
                                                <option value="Cadre 5">Cadre 5</option>
                                                <option value="Cadre 6">Cadre 6</option>
                                                <option value="Cadre 7">Cadre 7</option>
                                                <option value="Cadre 8">Cadre 8</option>
                                                <option value="Cadre 9">Cadre 9</option>
                                                <option value="Cadre 10">Cadre 10</option>
                                                <option value="Cadre 11">Cadre 11</option>
                                                <option value="Cadre 12">Cadre 12</option>
                                                <option value="Cadre 13">Cadre 13</option>
                                                <option value="Cadre 14">Cadre 14</option>
                                                <option value="Cadre 15">Cadre 15</option>
                                                <option value="Cadre 16">Cadre 16</option>
                                                <option value="Cadre 17">Cadre 17</option>
                                                <option value="non cadre">Non cadre</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Service ID (If any)</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-id-card-alt"></i></span>
                                            <input name="service_id" placeholder="Ex.: BCS Carder ID " class="form-control" type="text"  >
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Pay Grade</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-trophy"></i></span>
                                            <select name="pay_grade"  class="form-control selectpicker">
                                                <option value="">Please Choose</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Current Controlling Officer (Designation)</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-dharmachakra"></i></span>
                                            <input name="controlling_officer" placeholder="Controlling Officer" class="form-control" type="text"  >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label> Current Working Station</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                            <input name="working_station" id="pre_house" placeholder="Working Station" class="form-control" type="text"  >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>District</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-place-of-worship"></i></span>
                                            <select name="district" class="form-control selectpicker"  >
                                                <option value="">Please Choose</option>
                                                <option value="Dhaka">Dhaka</option>
                                                <option value="Mymensingh">Mymensingh</option>
                                                <option value="Gazipur">Gazipur</option>
                                                <option value="Chittagong">Chittagong</option>
                                                <option value="Rajshahi">Rajshahi</option>
                                                <option value="Khulna">Khulna</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Upozilla</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-place-of-worship"></i></span>
                                            <select name="upozilla"  class="form-control selectpicker"  >
                                                <option value="">Please Choose</option>
                                                <option value="Gulshan">Gulshan</option>
                                                <option value="Kalihati">Kalihati</option>
                                                <option value="Modhupur">Modhupur</option>
                                                <option value="Dohar">Dohar</option>
                                                <option value="Trishal">Trishal</option>
                                                <option value="Valuka">Valuka</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Office Telephone</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                                            <input name="org_tel" placeholder="Office Telephone" class="form-control" style="font-family: 'Helvetica', Arial, Lucida Grande, sans-serif;" type="number"  >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Office Email</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-at"></i></span>
                                            <input name="org_email" placeholder="dg.bari@gmail.com" class="form-control" type="email"  >
                                        </div>
                                    </div>
                                </div>


                    </fieldset>


                    <fieldset class="the-fieldset" style="margin-top: 20px;margin-right: 15px;margin-left: 15px;">

                        <legend class="the-legend"><strong>Health Status</strong></legend>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label> Height (cm)</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <input name="height" id="pre_house" placeholder="Height" class="form-control" type="number">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label> Weight (kg)</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <input name="weight" id="weight" placeholder="Weight" class="form-control" type="number">
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Blood Group</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-tint"></i></span>
                                    <select name="blood_group" id="blood_group" class="form-control selectpicker"  >
                                        <option value="">Please Choose</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </fieldset>


                    <fieldset class="the-fieldset" style="margin-top: 20px;margin-right: 15px;margin-left: 15px;">
                        <legend class="the-legend"><strong>Academic Information</strong></legend>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Name of Highest Degree</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-graduation-cap"></i></span>
                                    <select name="degree" class="form-control selectpicker">
                                        <option value="">Please Choose</option>
                                        <option value="S.S.C./EQUIVALENT">S.S.C./EQUIVALENT</option>
                                        <option value="H.S.C./EQUIVALENT">H.S.C./EQUIVALENT</option>
                                        <option value="GRADUATION/EQUIVALENT">GRADUATION/EQUIVALENT</option>
                                        <option value="MASTERS/EQUIVALENT">MASTERS/EQUIVALENT</option>
                                        <option value="Phd./EQUIVALENT">Phd./EQUIVALENT</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Year</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-university"></i></span>
                                    <input name="passing_year" placeholder="Passing Year" class="form-control" type="number"  >
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Board/University</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-university"></i></span>
                                    <input name="board" placeholder="Board/University Name" class="form-control" type="text"  >
                                </div>
                            </div>
                        </div>

                    </fieldset>


                    <fieldset class="the-fieldset" style="margin-top: 20px;margin-right: 15px;margin-left: 15px;">
                        <legend class="the-legend"><strong>Permanent Address</strong></legend>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Father's Name</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <input name="father" id="father" placeholder="Father's Name" class="form-control" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Mother's Name</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <input name="mother" id="mother" placeholder="Mother's Name" class="form-control" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Village/House No.</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <input name="village" id="village" placeholder="Village/Road Name" class="form-control" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Division-D</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-place-of-worship"></i></span>
                                    <select name="permanent_division" class="form-control selectpicker"  >
                                        <option value="">Please Choose</option>
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Mymensingh">Mymensingh</option>
                                        <option value="Barishal">Barishal</option>
                                        <option value="Khulna">Khulna</option>
                                        <option value="Chittagong">Chittagong</option>
                                        <option value="Sylet">Sylet</option>
                                        <option value="Rajshahi">Rajshahi</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>District-D</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-place-of-worship"></i></span>
                                    <select name="permanent_district" class="form-control selectpicker"  >
                                        <option value="">Please Choose</option>
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Gazipur">Gazipur</option>
                                        <option value="Netrokona">Netrokona</option>
                                        <option value="Jamalpur">Jamalpur</option>
                                        <option value="Khulna">Khulna</option>
                                        <option value="Rongpur">Rongpur</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Upozilla-D</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-place-of-worship"></i></span>
                                    <select name="permanent_upozilla" class="form-control selectpicker"  >
                                        <option value="">Please Choose</option>
                                        <option value="Dohar">Dohar</option>
                                        <option value="Trishal">Trishal</option>
                                        <option value="Ukhia">Ukhia</option>
                                        <option value="Lalpur">Lalpur</option>
                                        <option value="Lalkhan">Lalkhan</option>
                                        <option value="Valuka">Valuka</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </fieldset>

                    <fieldset class="the-fieldset" style="margin-top: 20px;margin-right: 15px;margin-left: 15px;">
                        <legend class="the-legend"><strong>Emergency Contact</strong></legend>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Name</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-university"></i></span>
                                    <input name="contact_name"  placeholder="Emergency Contact Person" class="form-control" type="text"  >
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Relation</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-graduation-cap"></i></span>
                                    <select name="contact_relation" class="form-control selectpicker"  >
                                        <option value="">Please Choose</option>
                                        <option value="Father">Father</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Sister">Sister</option>
                                        <option value="Brother">Brother</option>
                                        <option value="Spouse">Spouse</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-university"></i></span>
                                    <input name="contact_phone" placeholder="Mobile Number" class="form-control" type="number"  >
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                                <label></label>
                            </div>
                        </div>



                    </fieldset>

                    <div class="the-fieldset" style="margin-top: 20px;margin-right: 15px;margin-left: 15px;">

                        <!-- captcha
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Captcha</label>
                                <div class="input-group">
                                    <span class="input-group-addon " style="padding: 0px 0px ;"><img src="http://tmis.nata.gov.bd/captcha/default?g6Lroeg6" ></span>
                                    <input type="text" name="captcha" placeholder="  ?" class="form-control" style="font-family: 'Helvetica', Arial, Lucida Grande, sans-serif;" required>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    -->


                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4"><br> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                <button type="submit" class="btn btn-success" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span
                                        class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
                            </div>
                        </div>
                    </div>
                </form>



        </div>
        </div>


    </main>








@endsection
