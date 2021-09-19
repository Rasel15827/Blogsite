@extends('admin_layout')

@section('admin_boady') 

<h2>Tags</h2>
<div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tag List</h6>
                  <div>
                      <a href="{{route('tag.create')}}" class="btn btn-primary">Create Tag</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Post Count</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($tags->count())
                        @foreach($tags as $tag)
                        <tr>
                          <td>{{ $tag->name }} </td>
                          <td>{{ $tag->slug }} </td>
                          <td></td>
                          <td class="d-flex"> 
                          
                          <a href="{{ route('tag.edit',[$tag->id]) }}" class="btn btn-sm  btn-primary "><i class="fas fa-edit"></i></a>
                          <form action = "{{ route('tag.destroy',[$tag->id]) }} " method="post"> 
                            @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger ml-2 "><i class="fas fa-trash"></i></a>
                          </from>
                          </td>
                      </tr>
                        @endforeach
                        @else
                          <tr>
                              <td colspan="5">
                                <h5 class="text-center">No tags found.</h5>
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