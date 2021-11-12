<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

class MainController extends Controller
{
    function main(){ 
        $posts = Post::orderBy('created_at', 'DESC');
        $recentPosts = Post::orderBy('created_at', 'DESC')->paginate(6);
        $trendingPosts = Post::with('user')->orderBy('created_at', 'ASC')->paginate(8);

        return view('home', compact(['posts','recentPosts','trendingPosts']));
    }

    function post($slug){
        $post = Post::with('catagory','user')->where('slug',$slug)->first();
        return view('single-post' , compact('post'));
    }
    function blog(){
        $posts = Post::orderBy('created_at', 'DESC');
        $recentPosts = Post::orderBy('created_at', 'DESC')->paginate(4);
        return view('blog', compact(['posts','recentPosts']));
    }
    function contact(){
        return view('contact');
    }
}
