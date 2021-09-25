@extends('admin_layout')
@section('admin_boady') 
<div class="container-fluid" id="container-wrapper">
<div class="row">
   <div class="col-lg-12">
      <div class="py-3 d-flex flex-row align-items-center justify-content-between">
         <h2>Create Posts</h2>
         <a href="{{route('post.index')}}" class= "btn btn-primary">Back</a>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-lg-6">
      <div class="card mb-4">
         <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            </div> -->
         <div class="card-body">
            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
               @csrf
               @include('includes.errors')
               <div class="form-group">
                  <label for="title">Post Title</label>
                  <input name="title"  id ="title" type="text" class="form-control" id="postTitle"
                     placeholder="Enter Post Title" value="{{ old('title')}}" required>
               </div>

               <div class="form-group">
               <label for="image">Image</label>
                  <input class="form-control" type="file" name="image" id="image" >
              </div>
              <div class="form-group">
                  <label for="postName">Post Catagory</label>
                  <select name="catagory"  class="form-control mb-3" id="catagory" required>
                  <option value="" selected style="display:none;"> Select category... </option>
                  @foreach ($catagories as $c)
                  <option value="{{$c->id}}"> {{$c->name}} </option>
                  @endforeach
               </div>
               <div class="form-group">
                  <textarea name="description" class="form-control" id="description" rows="3" placeholder="Type your post here...." required> {{old('description')}} </textarea>
               </div>
               <div class="form-group">
                  <button type="submit" class="btn btn-primary" id="createPostbtn">Publish Post</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
</div>
@endsection