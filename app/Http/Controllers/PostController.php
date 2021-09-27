<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Tag;
use Illuminate\Support\Str;
use Validator;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','DESC')->paginate(20);
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagories = Catagory::all();
        $tags = Tag::all();
        return view('post.create', compact(['catagories','tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'title' => 'required|unique:posts,title',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'description' => 'required',
             //'catagory_id' => 'required',
        ]);
        
        $post = Post::create([
            'title'=>$request->title,
            'image' => 'image.jpg',
            'slug' =>  Str::slug($request->title, '-'),
            'description' => $request-> description,
            'catagory_id' => $request-> catagory,
            'user_id' => auth()->user()->id,
            'published_at' => Carbon::now(),

        ]);

        $post->tag()->attach($request->tags);

        if($request->has('image')){
        $image = $request->image;
        $image_new_name = time().".".$image->getClientOriginalExtension();
        $image->move('storage/post/', $image_new_name);
        $post->image = '/storage/post/' . $image_new_name;
        $post->save();
    }

        Session::flash('success', 'Post Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $catagories = Catagory::all();
        $tags = Tag::all();
        return view('post.edit',compact(['post','catagories','tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        
        $this->validate($request,[
            'title' => "required|unique:posts,title,$post->id",
             //'image' => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
             'description' => 'required',
             'catagory' => 'required',
        ]);
        
    
            $post->title= $request->title;
            $post->slug =  Str::slug($request->title, '-');
            $post->description = $request->description;
            $post->catagory_id = $request->catagory;

            $post->tag()->sync($request->tags);

        if($request->hasFile('image')){
        $image = $request->image;
        $image_new_name = time().".".$image->getClientOriginalExtension();
        $image->move('storage/post/', $image_new_name);
        $post->image = '/storage/post/' . $image_new_name; 
    }
        $post->save();

        Session::flash('success', 'Post Created Successfully');
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {   if($post)
        {   
            if(file_exists(public_path($post->image))){
                unlink(public_path($post->image));
            }
            $post->delete();

            Session::flash('success', 'Post Deleted Successfully');
            return redirect()->route('post.index');
        }
        else{
            echo "nothing" ;
        }
    }
}
