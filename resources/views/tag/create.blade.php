@extends('admin_layout')

@section('admin_boady') 

<div class="row">
<div class="col-lg-12">
  <div class="py-3 d-flex flex-row align-items-center justify-content-between">
<h2>Create Categories</h2>
<a href="{{route('tag.index')}}" class= "btn btn-primary">Back</a>
</div>
</div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card mb-4">
          <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    
                </div> -->
                <div class="card-body">
                  <form action="{{route('tag.store')}}" method="POST">
                    @csrf
                    @include('includes.errors')
                    <div class="form-group">
                      <label for="tagName">Name</label>
                      <input name="name" type="text" class="form-control" id="tagName"
                        placeholder="Enter Tag Name" required>
                    </div>
                    <div class="form-group">
                      <label for="tagdescription">Tag Description</label>
                      <textarea name="description" class="form-control" id="tagDescription" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary" id="createCatagorybtn">Create</button>
                    </div>
                  </form>
                </div>
           </div>
</div>   
</div>
@endsection