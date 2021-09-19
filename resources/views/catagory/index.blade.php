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
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Post Count</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($catagories as $catagory)
                        <tr>
                          <td>{{ $catagory->name }} </td>
                          <td>{{ $catagory->slug }} </td>
                          <td></td>
                          <td class="d-flex"> 
                          
                          <a href="{{ route('catagory.edit',[$catagory->id]) }}" class="btn btn-sm  btn-primary "><i class="fas fa-edit"></i></a>
                          <form action = "{{ route('catagory.destroy',[$catagory->id]) }} " method="post"> 
                            @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger ml-2 "><i class="fas fa-trash"></i></a>
                          </from>
                          </td>
                      </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
@endsection