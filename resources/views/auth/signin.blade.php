<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-family: 'roboto';">Log in</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body login">
                @if(isset(Auth::user()->email))
                    <script>window.location="/main/successlogin";</script>
                @endif

                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    {{-- <button type="button" class="close" data-dismiss="alert">×</button> --}}
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                    </div>
                @endif


                <div class="row ">
                    <div class="col-md-12 m-0">
                        <div class="card upsellcard">


                            <div class="main-heading-card">

                                <div id="login-error" class="alert alert-danger" style="display:none;"></div>
                                <form action="{{ route('customer.login') }}" id="loginForm" class="signup-form" method="POST">
                                    @csrf
                                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
                                    <div class="row">

                                        <label for="username">{{ __('Username/Email') }}</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Enter your Email" required>

                                            {{-- @error('email')
                                            <span class="invalid-feedback login-error" role="alert" >
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}

                                        <label for="password">{{ __('Password') }}</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password" required>
                                        {{-- <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Enter your Password" required> --}}

                                            {{-- @error('password')
                                            <span class="invalid-feedback login-error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                                    
                                        <div class="btn-section">
                                            <button type="submit" class="btn btn-success-green">{{ __('Login') }}</button>
                                            <p style="font-weight: 400;"> Don't have account <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: blue;">click
                                                    here</a> to Sign Up</p>
                                        </div>
                                    </div>
                                </form>

                            </div>



                            {{-- <div class="btn-section">
                                <button class="btn btn-success-green">Log in</button>
                                <p style="font-weight: 400;"> Don't have account <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: blue;">click
                                        here</a> to Sign Up</p>
                            </div> --}}


                        </div>
                    </div>

                </div>



            </div>

        </div>
    </div>
</div>


