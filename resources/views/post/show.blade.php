@extends('admin_layout')
@section('admin_boady') 

<h2>View Post</h2>
<div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card p-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                </div>
                <div class="table table-bordered table-pimary">
                  <table class="table align-items-left table-flush">
                    <thead class="thead-light">

                    </thead>
                    <tr>
                        <th style="width:300px">Image</th>
                        <td>  
                        <div style="max-width:525px; max-height:500px; overflow:hidden;">
                              <img src = "{{asset( $post->image ) }}" class="img-fluid img-thumbnail" alt=""></img>
                        </div>
                        </td>
                      </tr>
                      <tr>
                        <th style="width:300px">Title</th>
                        <td><h3>{{$post->title}}</h3> </td>
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