@extends('admin.dashboard')
@section('content')



<div class="col-md-10">
    <div class="card">
        <div class="card-header">
            <h2>Add new Batch</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('session.update',$edit_data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="#">Course Name</label>
                    <select class="form-control" name="course_id" id="">
                        @foreach($course as $all)
                            <option {{ $all->id == $edit_data->course_id ? 'selected' : '' }} value="{{ $all->id }}">{{ $all->course_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Batch Name</label>
                    <input name="session_name" value="{{ $edit_data->session_name }}" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="">coordinator sign</label>
                    <input name="old_coor" value="{{ $edit_data->photo }}" type="hidden">
                    <input name="photo"  class="form-control-file" type="file">
                </div>
                <div class="form-group">
                    <label for="">DG Signature</label>
                    <input name="old_dg" value="{{ $edit_data->dg_photo }}" type="hidden">
                    <input name="dg_photo" class="form-control-file" type="file">
                </div>
                <div class="form-group">
                    <label for="">Start Date</label>
                    <input value="{{ $edit_data->start }}" name="start" class="form-control" type="date">
                </div>
                <div class="form-group">
                    <label for="">End Date</label>
                    <input value="{{ $edit_data->end }}" name="end" class="form-control" type="date">
                </div>
                <div class="form-group">
                    <label for="">Serial No.1st Part</label>
                    <input value="{{ $edit_data->SL_first }}" name="first" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="">Serial No.2nd Part</label>
                    <input value="{{ $edit_data->SL_last }}" name="last" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit">
                </div>
            </form>
        </div>
    </div>
</div>



@endsection