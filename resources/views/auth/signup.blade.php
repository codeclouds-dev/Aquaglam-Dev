<h2 style="font-family: 'roboto';">Sign Up</h2>
<div class="row p-0">
    <div class="col-md-12 m-0">
        <div class="card upsellcard">


            <div class="main-heading-card">

                
                <form action="{{ route('register') }}" class="signup-form" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">First Name</label>
                            <input type="text" name="firstname" id="" class="form-control"
                                placeholder="Enter your first name" required>
                                @error('firstname')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">Last Name</label>
                            <input type="text" name="lastname" id="" class="form-control"
                                placeholder="Enter your last name" required>
                                @error('lastname')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <label for="">Phone No</label>
                    <input type="text" name="phone" id="" class="form-control"
                        placeholder="Enter your Phone No" maxlength="10" required onKeyUp="javascript: this.value = this.value.replace(/[^0-9]/g,'');">
                        @error('phone')<span class="text-danger">{{ $message }}</span>@enderror

                    <label for="username">Username (email)</label>
                    <input type="email" name="email" id="username" class="form-control"
                        placeholder="Enter your Email" required>
                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Enter your Password" required>
                        @error('password')<span class="text-danger">{{ $message }}</span>@enderror

                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                        placeholder="Confirm your Password" required>
                    
                    <div class="btn-section">
                        <button type="submit" class="btn btn-success-green">Sign up</button>
                        <p> Already have account <a href="{{route('login')}}" style="color: blue;cursor: pointer;">click
                                here</a> to Login</p>
                    </div>

                </form>

            </div>



            


        </div>
    </div>

</div>
