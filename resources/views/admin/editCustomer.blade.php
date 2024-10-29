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
        <h2 class="h5 no-margin-bottom">Update Customer Details</h2>
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
                  <form class="forms-sample" name="update_customer" action="{{ url('/updateCustomer',$customer->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{$customer->name}}" name="name" placeholder="Customer's Name" >
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" value="{{$customer->address}}" name="address" placeholder="Customer's Address" >
                    </div>
                    
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" value="{{$customer->city}}" name="city" placeholder="Customer's City">
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <select for="country" class="form-control" id="" name="country" readonly>
                            
                                <option value="{{$customer->country}}">
                                    {{$customer->country}}
                                </option>
                            
                        </select>
                        {{-- <input type="text" class="form-control" value="{{$customer->country}}" name="country" placeholder="Customer's Address"> --}}
                    </div>
                    <div class="form-group">
                        <label for="state">State</label>
                        <select id="state-dropdown" name="state" class="form-control" readonly>
                            <option value="{{$customer->state}}">
                                {{$customer->state}}
                            </option>
                        </select>
                        {{-- <input type="number" class="form-control" value="{{$customer->state}}" name="state" placeholder="Customer's State" required> --}}
                    </div>
                    <div class="form-group">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" value="{{$customer->zip}}" name="zip" placeholder="Zip Code" maxlength="5">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" value="{{$customer->phone}}" name="phone" placeholder="Customer's Phone Number" maxlength="10" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="{{$customer->email}}" placeholder="Customer's Email-Address" required>
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
    <script>
        $(document).ready(function () {
  
            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#country-dropdown').on('change', function () {
                var idCountry = this.value;
                $("#state-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dropdown').html('<option value="">-- Select State --</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        // $('#city-dropdown').html('<option value="">-- Select City --</option>');
                    }
                });
            });
  
            
  
        });
    </script>
      
</body>
</html>
