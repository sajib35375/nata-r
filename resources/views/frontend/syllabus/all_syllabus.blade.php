@extends('frontend.body.app')
@section('content')


<div class="container">
        <div class="row">
            <h2 style="text-align: center; background-color: #217908; color: white">All Batch wise Syllabus</h2>
            <div class="col-md-12" style="display: flex;justify-content: center;">





                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Batch Name</th>
                                <th>Syllabus Title</th>
                                <th>Syllabus Download</th>
                            </tr>
                            </thead>
                            <tbody>
                           @foreach($syllabus as $all)
                            <tr>
                                <td>1</td>
                                <td>{{ $all->session->session_name }}</td>
                                <td>{{ $all->title }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('document.single',$all->id) }}">view</a>
                                    <a class="btn btn-danger" href="{{ route('download.syllabus',$all->file) }}">download</a>
                                </td>
                            </tr>
                           @endforeach
                            </tbody>
                        </table>


            </div>
        </div>


</div>



@endsection