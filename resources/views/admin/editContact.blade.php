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
        <h2 class="h5 no-margin-bottom">Update Response</h2>
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
                  <form class="forms-sample" name="update_response" action="{{ url('/updateContact',$contacts->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{$contacts->name}}" name="name" placeholder="Product Name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" value="{{$contacts->phone}}" name="phone" placeholder="Product Description" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="number" class="form-control" value="{{$contacts->email}}" name="price" placeholder="Product Price" readonly>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <input type="text" class="form-control" value="{{$contacts->message}}" name="message" placeholder="Product Size" readonly>
                    </div>
                    <div class="form-group">
                        <label for="response">Response</label>
                        <select for="response" class="form-control" id="" name="response" required>
                            <option value="N" selected="">NO</option>
                            <option value="Y">YES</option>
                            

                        </select>
                        {{-- <input type="text" class="form-control" value="{{$product->response}}" name="response" placeholder="Product Color"> --}}
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
