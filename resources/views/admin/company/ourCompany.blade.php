@extends('admin.layout')
@section('content')

    <div class="row">
        {!! Form::open(['route'=>'create-page','enctype'=>'multipart/form-data', 'method'=>'post']) !!}
            @if($errors->any())
                <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
                </div>
            @endif
            <div class="x_panel">
                <div class="x_title">
                    <h2 class="sub_title">Page Content</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="" class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a href="" class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-group has-feedback" style="position:relative;">
                       <label for="name" class="hws_form_label">Title :</label>
                       {!! Form::text('title','ourcompany',['class'=>'form-control','required'=>'required','readonly'=>'readonly']) !!}
                       <span class="hws_error text-right text-danger">
                           {{$errors->first('title')}}
                       </span>
                    </div>

                    <div class="form-group has-feedback" style="position:relative;">
                        <label for="Image" class="hws_form_label">Banner Image :</label>
                        {!! Form::hidden('image[]','banner_image') !!}
                        {!! Form::file('banner_image',['class'=>'form-control','id'=>'file']) !!}
                    </div>

                    @foreach($page as $value)
                    @if($value->section_title == 'banner_image')
                        <img src = "{{url('uploads') }}/{{$value->data}}"
                             style="height:200px; width:200px;">
                        @endif
                    @endforeach

<!-- {{--                    ***************** Second section ********************      --}} -->
                    <div class="form-group has-feedback" style="position:relative;">
                        <label  class="hws_form_label">Second section :</label><br>

                        <label class="hws_form_label">Title :</label>
                        {!! Form::hidden('txt_name[]','second_title') !!}

                        @if($total_row)
                        @foreach($page as $value)
                            @if($value->section_title == 'second_title')
                            {!! Form::text('second_title',$value->data,['class'=>'form-control','required'=>'required']) !!}
                            @endif
                        @endforeach
                        @else
                            {!! Form::text('second_title','',['class'=>'form-control']) !!}
                        @endif
                    </div>

                    <!-- *************Third Section************ -->

                    <div class="form-group has-feedback" style="position:relative;">
                        <label  class="hws_form_label">Second section :</label><br>

                        <label class="hws_form_label">Title :</label>
                        {!! Form::hidden('txt_name[]','third_title') !!}

                        @if($total_row)
                        @foreach($page as $value)
                            @if($value->section_title == 'third_title')
                            {!! Form::text('third_title',$value->data,['class'=>'form-control','required'=>'required']) !!}
                            @endif
                        @endforeach
                        @else
                            {!! Form::text('third_title','',['class'=>'form-control']) !!}
                        @endif

                    </div>


<!-- {{--                    *****************Fourth Position********************--}} -->

                    <div class="form-group has-feedback" style="position:relative;">
                        <label  class="hws_form_label">Fourth section :</label><br>

                        <label class="hws_form_label">Title :</label>
                        {!! Form::hidden('txt_name[]','fourth_title') !!}
                        @if($total_row)
                        @foreach($page as $value)
                            @if($value->section_title == 'fourth_title')
                            {!! Form::text('fourth_title',$value->data,['class'=>'form-control','required'=>'required']) !!}
                            @endif
                        @endforeach
                        @else
                            {!! Form::text('fourth_title','',['class'=>'form-control']) !!}
                        @endif
                    </div>

{{--                    *************save button**************--}}
                    {{Form::submit('Save',['class'=>'btn btn-primary'])}}

                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
@push('footer-script')

@endpush
