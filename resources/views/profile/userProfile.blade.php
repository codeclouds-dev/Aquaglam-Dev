@include('header')

@if(Auth::guard('customer')->check())
    <div class="container pt-4 pb-4">
        <div class="row">
            <div class="col-md-3 profile-bar">
                <div class="fixed-sidebar">
                <div class="profile-section bg-gradients">
                    <img src="assets/images/avatar-icon-images-4.jpg" alt="" class="img-fluid">
                    
                    <h6>Hi, {{ Auth::guard('customer')->user()->firstname }}</h6>
                    <h7>{{ Auth::guard('customer')->user()->phone }}</h6>
                    
                        {{-- {{ Auth::guard('customer')->user()->firstname }} --}}
                  
                    {{-- <p>$ 38.00</p>
                    <p><span>Balance</span></p> --}}
                </div>
                <style>

                    .pop:target{
                    
                    display:block !important;
                    
                    }
                    
                    </style>
                <div class="user-options bg-gradients list" id="list">
                    <ul>
                        {{-- <li><i class="fa fa-solid fa-wallet"></i> My Wallet</li> --}}
                        <li><i class="fa fa-solid fa-trophy"></i> My Coupons</li>
                        <li><a href="#order"><i class="fa fa-solid fa-bag-shopping"></i> My Orders</a></li>
                        <li class="active"><a href="#info"><i class="fa fa-solid fa-info"></i> &nbsp;Edit Profile</a></li>
                        <li><a href="#address"><i class="fa fa-solid fa-location-dot"></i> Address</a></li>
                        {{-- <li><i class="fa fa-brands fa-paypal"></i> Payment Methods</li> --}}
                        {{-- <li><i class="fa fa-solid fa-phone"></i> Contact Preferences</li>
                        <li><i class="fa fa-brands fa-facebook"></i> Social Networks</li>
                        <li><i class="fa fa-solid fa-headset"></i> Need Helps</li> --}}
                        <li><a href="{{route('logout')}}"><i class="fa fa-solid fa-arrow-right-from-bracket"></i> Sign Out</a></li>
                    </ul>
                </div>
            </div>
            </div>

            <div class="col-md-9 contents-in-profile">

                <!--Personal Info-->
                <div class="card mt-2 pop" id="info" style="display:none;">
                    <div class="heading-section" id="user-profile">
                        <h4>Personal Info</h4>
                    </div>
                    <div class="profile-content">
                        <form action="{{ route('customer.updateprofile') }}" name="updateProfile" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" name="firstname" id="" class="form-control" value="{{ Auth::guard('customer')->user()->firstname }}" required>
                                </div>
                                <br>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input type="text" name="lastname" id="" class="form-control" value="{{ Auth::guard('customer')->user()->lastname }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Mobile Number</label>
                                    <input type="text" name="phone" maxlength="10" id="" class="form-control" value="{{ Auth::guard('customer')->user()->phone }}" onKeyUp="javascript: this.value = this.value.replace(/[^0-9]/g,'');" required>
                                </div>
                                <br>
                                <div class="col-md-6">
                                    <label for="">Email</label>
                                    <input type="text" name="email" id="" class="form-control" value="{{ Auth::guard('customer')->user()->email }}" readonly>
                                </div>
                                <br>
                                <div class="col-md-6">
                                    {{-- <label>Gender</label>
                                    <div class="genders d-flex">
                                        <div class="male gender-box active">
                                            <i class="fa-solid fa-venus"></i>
                                            <p>Male</p>
                                        </div>
                                        <div class="female gender-box">
                                            <i class="fa-solid fa-mars-stroke"></i>
                                            <p>Female</p>
                                        </div>
                                    </div> --}}

                                </div>

                            </div>
                            <button class="btn-submit">Submit</button>
                        </form>
                    </div>
                </div>

                <!--Personal Orders-->
                <div class="card personal-info pop" id="order" style="display:none">
                    <div class="heading-section" id="user-profile">
                        <h4>My Orders</h4>
                    </div>
                    <div class="profile-content">
                        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">On Shipping</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile-tab-pane" type="button" role="tab"
                                    aria-controls="profile-tab-pane" aria-selected="false">Order History</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">

                                <div class="row">
                                    <div class="col-md-6 mt-4">
                                        <div class="card order-card">
                                            <div class="card-body">
                                                <div class="row align-item-center justify-content-center">
                                                    <div class="col-md-3">
                                                        <img src="assets/images/order_prod.jpg" alt="" class="img-fluid">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <ul>
                                                            <li>
                                                                <h6>Child Sweam Wear</h6>
                                                            </li>
                                                            <li class="size">Size: <span>S</span>, Qty : <span>1</span>
                                                            </li>
                                                            <li>Price: $300</li>
                                                            <li class="shipping order-status">Shipping</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="card order-card">
                                            <div class="card-body">
                                                <div class="row align-item-center justify-content-center">
                                                    <div class="col-md-3">
                                                        <img src="assets/images/order_prod.jpg" alt="" class="img-fluid">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <ul>
                                                            <li>
                                                                <h6>Child Sweam Wear</h6>
                                                            </li>
                                                            <li class="size">Size: <span>S</span>, Qty : <span>1</span>
                                                            </li>
                                                            <li>Price: $300</li>
                                                            <li class="delivered order-status">Delivered</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="card order-card">
                                            <div class="card-body">
                                                <div class="row align-item-center justify-content-center">
                                                    <div class="col-md-3">
                                                        <img src="assets/images/order_prod.jpg" alt="" class="img-fluid">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <ul>
                                                            <li>
                                                                <h6>Child SwimWear</h6>
                                                            </li>
                                                            <li class="size">Size: <span>S</span>, Qty : <span>1</span>
                                                            </li>
                                                            <li>Price: $300</li>
                                                            <li class="cancelled order-status">Cancelled</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="card order-card">
                                            <div class="card-body">
                                                <div class="row align-item-center justify-content-center">
                                                    <div class="col-md-3">
                                                        <img src="assets/images/order_prod.jpg" alt="" class="img-fluid">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <ul>
                                                            <li>
                                                                <h6>Child SwimWear</h6>
                                                            </li>
                                                            <li class="size">Size: <span>S</span>, Qty : <span>1</span>
                                                            </li>
                                                            <li>Price: $300</li>
                                                            <li class="ordered order-status">Just Ordered</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                aria-labelledby="profile-tab" tabindex="0">

                                <div class="row">
                                    <div class="col-md-6 mt-4">
                                        <div class="card order-card">
                                            <div class="card-body">
                                                <div class="row align-item-center justify-content-center">
                                                    <div class="col-md-3">
                                                        <img src="assets/images/order_prod.jpg" alt="" class="img-fluid">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <ul>
                                                            <li>
                                                                <h6>Child SwimWear</h6>
                                                            </li>
                                                            <li class="size">Size: <span>S</span>, Qty : <span>1</span>
                                                            </li>
                                                            <li>Price: $300</li>
                                                            <li class="shipping order-status">Shipping</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="card order-card">
                                            <div class="card-body">
                                                <div class="row align-item-center justify-content-center">
                                                    <div class="col-md-3">
                                                        <img src="assets/images/order_prod.jpg" alt="" class="img-fluid">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <ul>
                                                            <li>
                                                                <h6>Child SwimWear</h6>
                                                            </li>
                                                            <li class="size">Size: <span>S</span>, Qty : <span>1</span>
                                                            </li>
                                                            <li>Price: $300</li>
                                                            <li class="delivered order-status">Delivered</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="card order-card">
                                            <div class="card-body">
                                                <div class="row align-item-center justify-content-center">
                                                    <div class="col-md-3">
                                                        <img src="assets/images/order_prod.jpg" alt="" class="img-fluid">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <ul>
                                                            <li>
                                                                <h6>Child SwimWear</h6>
                                                            </li>
                                                            <li class="size">Size: <span>S</span>, Qty : <span>1</span>
                                                            </li>
                                                            <li>Price: $300</li>
                                                            <li class="cancelled order-status">Cancelled</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="card order-card">
                                            <div class="card-body">
                                                <div class="row align-item-center justify-content-center">
                                                    <div class="col-md-3">
                                                        <img src="assets/images/order_prod.jpg" alt="" class="img-fluid">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <ul>
                                                            <li>
                                                                <h6>Child Sweam Wear</h6>
                                                            </li>
                                                            <li class="size">Size: <span>S</span>, Qty : <span>1</span>
                                                            </li>
                                                            <li>Price: $300</li>
                                                            <li class="ordered order-status">Just Ordered</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                

                <!--Personal Address-->
                <div class="card mt-2 pop" id="address" style="display:none;">
                    <div class="heading-section" id="user-profile">
                        <h4>Address Details</h4>
                    </div>
                    <div class="profile-content">
                        <form action="{{ route('customer.updateDetails') }}" name="updateDetails" method="POST">
                            @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Street Address</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Please enter your address" required>
                            </div>
                            <br>
                            <div class="col-md-6">
                                <label for="">City</label>
                                <input type="text" name="city" id="city" class="form-control" placeholder="Please enter your city" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Country</label>
                                <select for="country" class="form-control" id="country" name="country">
                                    <option value="">Select Country</option>
                                    {{-- <option value="{{$customer->country}}">
                                        {{$customer->country}}
                                    </option> --}}
                                
                                </select>
                                {{-- <input type="text" name="country" id="country" class="form-control" required> --}}
                            </div>
                            <br>
                            <div class="col-md-6">
                                <label for="">State</label>
                                <select id="state" name="state" class="form-control">
                                    <option value="">Select State</option>
                                    {{-- <option value="{{$customer->state}}">
                                        {{$customer->state}}
                                    </option> --}}
                                </select>
                                {{-- <input type="text" name="state" id="state" class="form-control" required> --}}
                            </div>
                            <div class="col-md-6">
                                <label for="">Zip</label>
                                <input type="text" name="zip" maxlength="5" id="zip" class="form-control" placeholder="Please enter your zip" onKeyUp="javascript: this.value = this.value.replace(/[^0-9]/g,'');" required>
                            </div>
                            <br>
                            <div class="col-md-6">
                                {{-- <label>Gender</label>
                                <div class="genders d-flex">
                                    <div class="male gender-box active">
                                        <i class="fa-solid fa-venus"></i>
                                        <p>Male</p>
                                    </div>
                                    <div class="female gender-box">
                                        <i class="fa-solid fa-mars-stroke"></i>
                                        <p>Female</p>
                                    </div>
                                </div> --}}

                            </div>

                        </div>
                        <button type="submit" class="btn-submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

    <!-- Footer  -->
    @include('footer')

    <!--  signup modals  -->
    @include('auth.signup')

    <!--  login modals  -->
    @include('auth.signin')


   <!-- Scripts -->
   @include('./userjs')

   {{-- <script>
    $(document).ready(function () {
        $('.list li').click(function (event) {
            event.preventDefault();
            $('.pop').hide().eq($(this).index()).fadeIn(function () {
                $(this).css({
                    'display': 'block'
                }, 550);
            });
        });
    });
   </script> --}}
   <script>
    $(document).ready(function() {
        // Load country data on page load
        $.get("{{ route('api.countries') }}", function(data) {
            // Populate country dropdown
            $.each(data, function(country, states) {
                $('#country').append(new Option(country, country));
            });
        });
    
        // Update state dropdown based on selected country
        $('#country').change(function() {
            const selectedCountry = $(this).val();
    
            // Clear previous state options
            $('#state').empty().append(new Option('Select State', ''));
    
            if (selectedCountry) {
                // Load states for the selected country
                $.get("{{ route('api.countries') }}", function(data) {
                    $.each(data[selectedCountry], function(index, state) {
                        $('#state').append(new Option(state, state));
                    });
                });
            }
        });
    });
    </script>


</body>

</html>

<!-- https://hapari.com/ -->