@extends('admin.dashboard')
@section('content')

    <div class="col-12">

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">All Participant</h3>
            </div>
            @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}<button class="close bg-dark" data-dismiss="alert">&times;</button></p>
                @endif
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <div id="example5_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row"><div class="col-sm-12 col-md-6">
{{--                                <div class="dataTables_length" id="example5_length">--}}
{{--                                    <label>Show <select name="example5_length" aria-controls="example5" class="form-control form-control-sm">--}}
{{--                                            <option value="10">10</option>--}}
{{--                                            <option value="25">25</option>--}}
{{--                                            <option value="50">50</option>--}}
{{--                                            <option value="100">100</option>--}}
{{--                                        </select> entries</label>--}}
{{--                                </div>--}}
                            </div>
                            <div class="col-sm-12 col-md-6">
{{--                                <div id="example5_filter" class="dataTables_filter">--}}
{{--                                    <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example5">--}}
{{--                                    </label>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example5" class="table table-bordered table-striped dataTable" style="width: 100%;" role="grid" aria-describedby="example5_info">

                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example5" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 108px;">Serial No.</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example5" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 108px;">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example5" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 115px;">Course Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example5" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 105px;">Course Batch Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example5" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 97px;">mobile</th>
                                        <th class="sorting" tabindex="0" aria-controls="example5" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 113px;">Organization Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example5" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 112px;">Photo</th>
                                        <th class="sorting" tabindex="0" aria-controls="example5" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 112px;">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="example5" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 800px;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    @foreach($allData as $data)

                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $loop->index+1 }}</td>
                                        <td>{{ @$data->name_en }}</td>
                                        <td>{{ @$data->course->course_name }}</td>
                                        <td>{{ @$data->session->session_name }}</td>
                                        <td>{{ @$data->mobile }}</td>
                                        <td>{{ @$data->organization_name }}</td>
                                        <td><img style="width: 60px;height: 60px;" src="{{ URL::to('') }}/NATA_files/image/{{ $data->photo }}" alt=""></td>
                                        <td>
                                            @if($data->status==false)

                                                <span class="badge badge-danger">Pending</span>
                                            @else

                                                <span class="badge badge-success">Approve</span>
                                                @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('app.detail',$data->id) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-success" href="{{ route('edit.student',$data->id) }}"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger" href="{{ route('apply.delete',$data->id) }}"><i class="fa fa-trash"></i></a>
                                            @if($data->status==false)
                                                <a class="btn btn-warning" href="{{ route('status.approve',$data->id) }}"><i class="fa fa-angle-down"></i></a>
                                            @else
                                                <a class="btn btn-info" href="{{ route('status.pending',$data->id) }}"><i class="fa fa-angle-up"></i></a>
                                            @endif

                                        </td>
                                    </tr>

                                    @endforeach





                                </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>



@endsection