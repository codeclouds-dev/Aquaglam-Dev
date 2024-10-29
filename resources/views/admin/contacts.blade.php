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
            <h2 class="h5 no-margin-bottom">Contacts</h2>
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
                        {{-- <button type="button" class="btn btn-info btn-fw"><a href="{{ route('category') }}" style="color:#fff">Add Category</a></button> --}}
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            
                            <thead>
                              <tr>
                                <th> # </th>
                                <th>Name </th>
                                <th>Phone </th>
                                <th>Email </th>
                                <th>Message </th>
                                <th>Response </th>
                                <th>Action</th>
                                {{-- <th> Progress </th>
                                <th> Amount </th>
                                <th> Deadline </th> --}}
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $data)
                              <tr>
                                <td>{{ $data->id}}</td>
                                <td>{{ $data->name}}</td>
                                <td>{{ $data->phone}}</td>
                                <td>{{ $data->email}}</td>
                                <td>{{ $data->message}}</td>
                                <td>{{ $data->response}}</td>
                                <td>
                                  {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Edit</button> --}}
                                  <a href="{{url('editContact',$data->id)}}" name="edit">Edit | </a>
                                  <a href="{{url('deleteContact',$data->id)}}" name="delete" onclick="return confirm('Are you sure to delete this?')">Delete</a>
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
                          {{-- {{ $categories->links() }} --}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
          {{-- @include('editContact', ['customer' => $customer]) --}}

          {{-- <div class="modal" tabindex="-1" id="response_modal">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="">Save changes</button>
                </div>
            </div>
            </div>
        </div> --}}
      </section> 
        
        @include('admin.footer')

      
  </body>
</html>
