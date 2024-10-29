
    
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-family: 'roboto';">Sign Up</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                

                <div class="row p-0">
                    <div class="col-md-12 m-0">
                        <div class="card upsellcard">


                            <div class="main-heading-card">

                                
                                <form action="{{ route('customer.register') }}" class="signup-form" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">First Name</label>
                                            <input type="text" name="firstname" id="" class="form-control"
                                                placeholder="Enter your first name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Last Name</label>
                                            <input type="text" name="lastname" id="username" class="form-control"
                                                placeholder="Enter your last name" required>
                                        </div>
                                    </div>
                                    <label for="">Phone No</label>
                                    <input type="text" name="phone" id="" class="form-control"
                                        placeholder="Enter your Phone No" maxlength="10" required onKeyUp="javascript: this.value = this.value.replace(/[^0-9]/g,'');">

                                    <label for="username">Username (email)</label>
                                    <input type="email" name="email" id="username" class="form-control"
                                        placeholder="Enter your Email" required>

                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Enter your Password" required>

                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                                        placeholder="Confirm your Password" required>
                                    
                                    <div class="btn-section">
                                        <button type="submit" class="btn btn-success-green">Sign up</button>
                                        <p> Already have account <a data-bs-toggle="modal" data-bs-target="#login" style="color: blue;cursor: pointer;">click
                                                here</a> to Login</p>
                                    </div>

                                </form>

                            </div>



                            


                        </div>
                    </div>

                </div>



            </div>

        </div>
    </div>
</div>
