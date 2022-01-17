@extends('admin.dashboard')

@section('content')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">All Posts</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 132.141px;">Title</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 213.25px;">Short Description</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 94.2031px;">Photo</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 88.0312px;">Post Type</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 79.3125px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($all_post as $post)

                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $post->title }}</td>
                                    <td>{{ $post->short_des }}</td>
                                    <td><img src="{{ URL::to('') }}/NATA_files/image/{{ $post->photo }}" alt=""></td>
                                    <td>
                                        @if($post->location==1)
                                            <span class="text-danger">Location</span>
                                        @elseif($post->background==1)
                                            <span class="text-danger">Background/History</span>
                                        @elseif($post->vm==1)
                                            <span class="text-danger">Vision & Mission</span>
                                        @elseif($post->function==1)
                                            <span class="text-danger">Core function of NATA</span>
                                        @elseif($post->value==1)
                                            <span class="text-danger">Core values of NATA</span>
                                        @elseif($post->activity==1)
                                            <span class="text-danger">Core activity of NATA</span>
                                        @elseif($post->stakeholder==1)
                                            <span class="text-danger">Stakeholder</span>
                                        @elseif($post->organogram==1)
                                            <span class="text-danger">Organogram of NATA</span>
                                        @elseif($post->statistic==1)
                                            <span class="text-danger">Statistics of Civil officers and staff</span>
                                        @elseif($post->physical==1)
                                            <span class="text-danger">Physical Facilities</span>
                                        @elseif($post->importance==1)
                                            <span class="text-danger">Importance of training</span>
                                        @elseif($post->training==1)
                                            <span class="text-danger">Training Methods</span>
                                        @elseif($post->nata_Strengthening==1)
                                            <span class="text-danger">NATA strengthening Project</span>
                                        @elseif($post->resources==1)
                                            <span class="text-danger">List of Resource Personnel</span>
                                        @elseif($post->notice==1)
                                            <span class="text-danger">Notice</span>
                                        @endif

                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('edit.post',$post->id) }}"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger" href="{{ route('delete.post',$post->id) }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>

                                    @endforeach


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">Title</th>
                                    <th rowspan="1" colspan="1">Short Description</th>
                                    <th rowspan="1" colspan="1">Photo</th>
                                    <th rowspan="1" colspan="1">Post Type</th>
                                    <th rowspan="1" colspan="1">Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>













@endsection