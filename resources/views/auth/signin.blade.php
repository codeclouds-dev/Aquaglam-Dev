<div class="row ">
    <div class="col-md-12 m-0">
        <div class="card upsellcard">

            <h2>Customer Login</h2>
            <div class="main-heading-card">

                <div id="login-error" class="alert alert-danger">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <form action="{{ route('login') }}" id="loginForm" class="signup-form" method="POST">
                    @csrf
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
                    <div class="row">

                        <label for="username">{{ __('Username/Email') }}</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Enter your Email" required>

                        {{-- @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}

                        <label for="password">{{ __('Password') }}</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password" required>
                        
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    
                        <div class="btn-section">
                            <button type="submit" class="btn btn-success-green">{{ __('Login') }}</button>
                            <p style="font-weight: 400;"> Don't have account <a href="{{route('register')}}"  style="color: blue;">click
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