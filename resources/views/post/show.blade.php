@extends('admin_layout')
@section('admin_boady') 

<h2>View Post</h2>
<div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card p-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6>Post Details</h6>
                  <div>
                      <a href="{{route('post.index')}}" class="btn btn-primary">Back</a>
                  </div>
                </div>
                <div class=" ">
                  <table class="table table-bordered table-pimary align-items-left table-flush">
                    <tr>
                        <th style="width:300px">Image</th>
                        <td>  
                        <div style="max-width:325px; max-height:300px; overflow:hidden;">
                              <img src = "{{asset( $post->image ) }}" class="img-fluid img-thumbnail" alt=""></img>
                        </div>
                        </td>
                      </tr>
                      <tr>
                        <th style="width:300px">Title</th>
                        <td><h5>{{$post->title}}</h5> </td>
                      </tr>
                      <tr>
                        <th style="width:300px">Catagory</th>
                        <td>{{$post->catagory->name}} </td>
                      </tr>
                      <tr>
                        <th style="width:300px">Tags</th>
                        <td>
                            @foreach($post->tag as $t)
                                  <span class="badge badge-primary">{{ $t->name}}</span>
                            @endforeach </td>
                      </tr>
                      <tr>
                        <th style="width:300px">Author</th>
                        <td>{{$post->user->name}} </td>
                      </tr>
                      <tr>
                        <th style="width:300px">Description</th>
                        <td>{!! $post->description !!} </td>
                      </tr>
                    <tbody>
                       
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
@endsection