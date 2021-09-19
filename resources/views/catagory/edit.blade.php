@extends('admin_layout')

@section('admin_boady') 

<div class="row">
<div class="col-lg-12">
  <div class="py-3 d-flex flex-row align-items-center justify-content-between">
<h3>Edit Category - {{$catagory->name}}</h3>
<a href="{{route('catagory.index')}}" class= "btn btn-primary">Back</a>
</div>
</div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card mb-4">
          <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    
                </div> -->
                <div class="card-body">
                  <form action="{{route('catagory.update', [$catagory->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="catagoryName">Name</label>
                      <input name="name" type="text" class="form-control" id="catagoryName"
                        placeholder="Enter Category Name" value= "{{ $catagory->name }}" required>
                    </div>
                    <div class="form-group">
                      <label for="catagorydescription">Category Description</label>
                      <textarea name="description" class="form-control" id="catagoryDescription" rows="3">{{ $catagory->description }}  </textarea>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary" id="createCatagorybtn">Update</button>
                    </div>
                  </form>
                </div>
           </div>
</div>   
</div>
@endsection