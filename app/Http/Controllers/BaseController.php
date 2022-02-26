<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Post;


class BaseController extends Controller
{
    public function home()
    {
        $home = Page::where('page_title','home')->get();
        $post = Post::where('page_title','home')->get();
        return view('home',['home'=> $home,'post'=> $post]);
    }
    public function company()
    {
        return view('company');
    }
    public function services()
    {
        return view('services');
    }
    public function contact()
    {
        return view('contact');
    }
}
