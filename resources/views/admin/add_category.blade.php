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
        <h2 class="h5 no-margin-bottom">Create Category</h2>
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
                  {{-- <h4 class="card-title">Default form</h4>
                  <p class="card-description"> Basic form layout </p> --}}
                  <form class="forms-sample" name="add_category" action="{{url('store-form')}}" method="POST">
                    @csrf

                    <div class="form-group">
                      <label for="exampleInputUsername1">Category Name</label>
                      <input type="text" class="form-control" id="" name="cat_name" placeholder="Category">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                  </form>
                
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
 
            
    @include('admin.footer')

      
</body>
</html>
