@extends('frontend.body.app')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>{{ $doc_single->title }}</h2>
                        <p>{{ $doc_single->description }}</p>
                        <iframe src="{{ URL::to('') }}/admin/syllabus/{{ $doc_single->file }}"></iframe>
{{--                        <iframe src="https://view.officeapps.live.com/op/view.aspx?src={{ URL::to('') }}/admin/syllabus/{{ $doc_single->file }}" frameborder="0" style="width: 62%; min-height: 562px;"></iframe>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
















@endsection