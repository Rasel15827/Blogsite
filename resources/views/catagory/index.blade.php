@extends('admin_layout')

@section('admin_boady') 

<h2>Categories</h2>
<div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Catagory List</h6>
                  <div>
                      <a href="{{route('catagory.create')}}" class="btn btn-primary">Create Catagory</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Post Count</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if($catagories->count())
                        @foreach($catagories as $catagory)
                        <tr>
                          <td>{{ $catagory->id }} </td>
                          <td>{{ $catagory->name }} </td>
                          <td>{{ $catagory->slug }} </td>
                          <td> </td>
                          <td class="d-flex"> 
                          
                          <a href="{{ route('catagory.edit',[$catagory->id]) }}" class="btn btn-sm  btn-primary "><i class="fas fa-edit"></i></a>
                          <form action ="{{ route('catagory.destroy',[$catagory->id]) }}" method="POST"> 
                          @method('DELETE')
                            @csrf
                
                          <button type="submit" class="btn btn-sm btn-danger ml-2 "><i class="fas fa-trash"></i></button>

                          </form>
                          </td>
                      </tr>
                      @endforeach
                        @else
                          <tr>
                              <td colspan="5">
                                <h5 class="text-center">No Categories found.</h5>
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