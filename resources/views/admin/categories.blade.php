{{-- @extends('admin.adminheader') --}}
<!DOCTYPE html>
<html>
  <head> 
    @include('admin.admincss')
  </head>
  <body>
    
    @include('admin.header')


    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->

        @include('admin.sidebar')


      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Categories</h2>
            @if(session()->has('status'))
              <div class="alert alert-success mt-3" id="successMessage">                
                {{ session('status') }}
              </div>
            @endif
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
                  <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <button type="button" class="btn btn-info btn-fw"><a href="{{ route('category') }}" style="color:#fff">Add Category</a></button>
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            
                            <thead>
                              <tr>
                                <th> # </th>
                                <th> Category Name </th>
                                <th>Action</th>
                                {{-- <th> Progress </th>
                                <th> Amount </th>
                                <th> Deadline </th> --}}
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $data)
                              <tr>
                                <td>{{ $data->id}}</td>
                                <td>{{ $data->name}}</td>
                                <td>
                                  <a href="{{route('editcategory', ['id' => @$data->id])}}" name="edit">Edit | </a>
                                  <a href="{{url('deleteCategory',$data->id)}}" name="delete" onclick="return confirm('Are you sure to delete this?')">Delete</a>
                                </td>
                                {{-- <td>
                                  <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td> $ 77.99 </td>
                                <td> May 15, 2015 </td> --}}
                              </tr>
                            @endforeach
                              
                            </tbody>
                          </table>
                          {{ $categories->links() }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
        </section>
        
        
        @include('admin.footer')

      
  </body>
</html>
