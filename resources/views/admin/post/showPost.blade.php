@extends('admin.layout')
@section('content')
    <h1>Student Details</h1>
    <div>
        <a href="{{route('add-post')}}" class="btn btn-primary">Add New</a>
        
    </div>
    <table class="table table-bordered">
    <thead>
        <th>Page</th>
        <th>Section Title</th>
        <th>Title</th>
        <th>Description</th>
        <th>Image</th>
        <th>Action</th>
    </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->page_title}}</td>
            <td>{{$post->section_title}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>     

            <td><img src="{{url('uploads')}}/{{$post->image}}" style="height: 80px; width: 80px;"></td>
            <td><a href="{{route('post-edit')}}/{{$post->id}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
            <a href="javascript::void(0)"class="btn btn-primary btn-xs deletepost" image="{{$post->image}}" post-id="{{$post->id}}"><i class="fa fa-trash"></i></a> </td>
        </tr>
          @endforeach
        </tbody>
    </table>
    <h2>{{$posts->links()}}</h2>
@endsection

@push('footer-script')
<script>
    $(document).ready(function(){
        $('.deletepost').on('click',function(){
            var id = $(this).attr('post-id');
            var image = $(this).attr('image');
            if(confirm('Are you sure want to delete this post with all data ?')){
                 $.ajax({
                    headers: {
                        'X-CSRF-TOKEN':$('meta[name = "csrf-token"]').attr('content')
                    },
                     url: "{{route('post-delete')}}",
                     data:{"id":id, "image": image},   
                    type:"post"  ,
                    success:function(data){
                        if(data == true){
                            alert("Post Deleted Successfully");
                        }else{
                            alert(data);
                        }
                        window.location.reload();
                    }
                });
            }
        });
    });
</script>
@endpush