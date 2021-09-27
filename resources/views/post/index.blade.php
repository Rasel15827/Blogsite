@extends('admin_layout')

@section('admin_boady') 

<h2>Posts</h2>
<div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Post List</h6>
                  <div>
                      <a href="{{route('post.create')}}" class="btn btn-primary">Create Post</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Post Id</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Catagory</th>
                        <th>Tags</th>
                        <th>Author</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if($posts->count())
                        @foreach($posts as $post)
                        <tr>
                          <td>{{ $post->id }} </td>
                          <td> 
                          <div style="max-width:70px; max-height:70px; overflow:hidden;">
                              <img src = "{{asset( $post->image ) }}" class="img-fluid img-thumbnail" alt=""></img>
                          </div>
                          </td>
                          <td>{{ $post->title }} </td>
                          <td>{{ $post->catagory->name }} </td>
                          <td>
                            @foreach($post->tag as $t)
                                  <span class="badge badge-primary">{{ $t->name}}</span>
                            @endforeach  
                          </td>
                          <td>{{ $post->user->name }} </td>
                          <td class="d-flex"> 
                          <a href="{{ route('post.show',[$post->id]) }}" class="btn btn-sm  btn-success "><i class="fas fa-eye"></i></a>
                          <a href="{{ route('post.edit',[$post->id]) }}" class="btn btn-sm  btn-primary  ml-2"><i class="fas fa-edit"></i></a>
                          <form action = "{{ route('post.destroy',[$post->id]) }} " method="POST"> 
                            @csrf
                            @method('DELETE')
            
                            <button type="submit" class="btn btn-sm btn-danger ml-2 "><i class="fas fa-trash"></i></a>
                          </form>
                          </td>
                      </tr>
                        @endforeach
                        @else
                          <tr>
                              <td colspan="6">
                                <h5 class="text-center">No Posts found.</h5>
                              </td>
                          </tr>
                        @endif
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
@endsection