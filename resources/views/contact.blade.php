@include('header')

    <div class="container contact-form">
        <h4>Contact Us</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form action="">
                        <label for="">{{ __('Name') }}</label>
                        <input type="text" name="name" id="" class="form-control" placeholder="Enter Your Name">
                        <label for="">{{ __('Contact') }}</label>
                        <input type="text" name="phone" id="" class="form-control" placeholder="Enter Your Phone Number">
                        <label for="">{{ __('Email') }}</label>
                        <input type="text" name="address" id="" class="form-control" placeholder="Enter Your Email">
                        <label for="">How can we help you?</label>
                        <textarea type="text" name="message" id="" class="form-control" rows="4" placeholder="Type Your Message"></textarea>
                        <button>Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <img src="assets/images/contact.png" alt="contact" class="img-fluid">
            </div>
        </div>
    </div>

    <!-- Footer  -->
    @include('footer')

    <!--  signup modals  -->
    @include('auth.signup')

    <!--  login modals  -->
    @include('auth.signin')

    <!-- Scripts -->
    @include('userjs')