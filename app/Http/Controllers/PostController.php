<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use File;


class PostController extends Controller
{
    public function create(Request $request){
        $data['post'] = new Post();
        if($request->post_id){
            $id = $request->post_id;
                $data['post'] = Post::where('id',$id)->first();
        }
        return view('admin.post.addPost',$data);
    }

    public function show(){
        $posts = Post::paginate(8);
        return view('admin.post.showPost',['posts' => $posts]);
    }
    public function store(Request $request){
        $id = '';      //update data
        if($request->post_id){
            $id =  $request->post_id;
        }
    $validator = Validator::make($request->all(),[
        'title'=>'required',
        'section_title'=>'required'
    ]);
    if($validator->fails()){
        return back()->withErrors($validator)->withInput();
    }
    else{
        $filename="";
        if($request->image){
            $filename = $this->fileUpload($request,'image','');
        }else{
            if($request->old_image){
                $filename = $request->old_image;
            }
        }
        $data = array(
                        'page_title'=> $request->page_title,
                        'section_title'=> $request->section_title,
                        'title'=> $request->title,
                        'description'=> $request->description,
                        'image'=> $filename,
        );
        $post = Post::updateOrCreate(['id'=> $id],$data);
        if($post){
            if($id)
                return redirect()->route('add-post')->with(['message'=>'Post Updated Successfully']);
            else
                return redirect()->route('add-post')->with(['message'=>'Post Inserted Successfully']);
        }else{
            return back()->with(['message' =>'Something went wrong']);
        }

    }
    
}
public function delete(Request $request){
    $id =  $request->id;
    $img =  $request->image;
    if($id){
    if(File::exists(public_path('uploads/'.$img))){
        File::delete(public_path('uploads/'.$img));

        $result = Post::find($id)->delete();
        if($result){
            echo json_encode('Successfully deleted');
        }else{
            echo json_encode('something went wrong');
        }
        
    } else{
            echo json_encode('File not exists');
        }

    }else{
        echo json_encode('Post id not found');

    }

         }
    }

 