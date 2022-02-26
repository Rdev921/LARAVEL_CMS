@extends('admin.layout')
@section('content')
<div class="row">
    {!! Form::open(['route'=>['post-store',$post->id],'enctype'=>'multipart/form-data']) !!}

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    @endif

    @if(session()->has('message'))
        <div class="alert alert-dismissable" style="color:red; ">
{{session('message')}}
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
            <label for="name" class="hws_form_label">Page : </label><br>
                {{ Form::select('page_title',['home'=>'Home','ourcompany'=>'Our Company',
                'services'=>'Services','contact'=>'Contact'], $post->page_title ,['class'=>'form-control'])}}
            </div>

            <div class="form-group has-feedback" style="position:relative;">
                <label for="name" class="hws_form_label">Section Title:</label><br>
            {{ Form::text('section_title',$post->section_title,['class'=>'form-control','placeholder'=>'Section Title'])}}
            </div>

            <div class="form-group has-feedback" style="position:relative;">
                <label for="name" class="hws_form_label">Post Title:</label><br>
            {{ Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Post Title'])}}
            </div>

             <div class="form-group has-feedback" style="position:relative;">
                <label for="name" class="hws_form_label">Post Description:</label><br>
            {{ Form::textarea ('description',$post->description,['class'=>'form-control','placeholder'=>'Post Description'])}}
            </div>

            <div class="form-group has-feedback" style="position:relative;">
                <label for="name" class="hws_form_label">Post Image:</label><br>
                @if($post->image)
                <img src="{{url('uploads')}}/{{$post->image}}" style="height:100px; width:100px;">
                @endif
                {{Form::hidden('old_image',$post->image)}}
            {{ Form::file('image',['class'=>'form-control','id'=>'file'])}}
            </div>

            {{ Form::submit('Save',['class'=>'btn btn-primary'])}}

        </div>
    </div>
    {!! Form::close() !!}
</div>

@endsection

@push('footer-script')
<script>

</script>
@endpush
