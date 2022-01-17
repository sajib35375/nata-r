@extends('admin.dashboard')
@section('content')


    <div class="wrap">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Batch Wise Certificate</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Session Name</th>
                            <th>Coordinator Signature</th>
                            <th>DG Signature</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sess as $d)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $d->course_a->course_name }}</td>
                                <td>{{ $d->session_name }}</td>
                                <td><img style="width: 50px;height: 50px;" src="{{ URL::to('') }}/certificate/signature/{{ $d->photo }}" alt=""></td>
                                <td><img style="width: 50px;height: 50px;" src="{{ URL::to('') }}/certificate/signature/{{ $d->dg_photo }}" alt=""></td>
                                <td>
                                    <a class="btn btn-danger" href="{{ route('certificate.view',$d->id) }}">Download</a>
                                    <a class="btn btn-info" href="{{ route('release.latter',$d->id) }}">Latter</a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
{{--                @if(Session::has('success'))--}}
{{--                    <p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>--}}
{{--                @endif--}}
{{--                <div class="card-footer">--}}
{{--                    <form action="{{ route('signature.update') }}" method="POST" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">DG Signature</label>--}}
{{--                            <input name="dg" class="form-control-file" type="file">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <input value="Update" class="btn btn-success" type="submit">--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>










@endsection