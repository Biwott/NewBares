<div class="auth-wrapper d-flex no-block justify-content-center align-items-center"
    style="background:url(assets/images/background/login-register.jpg) no-repeat top center;">
    <div class="auth-box p-4 bg-white rounded">
        <div id="loginform">
            <div class="logo mt-4 mb-2">
                <h2 class="box-title mb-4">Sign In</h2>
            </div>
            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <form>
                        <div class="form-group mb-4">
                            <label for="username">Username</label>
                            <input wire:model="username" class="form-control @error('username') is-invalid @enderror"
                                type="text" id="username" placeholder="Enter your Username">
                            @error('username')
                            <span class="text text-danger" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="password">Password</label>
                            <input wire:model="password" class="form-control @error('password') is-invalid @enderror"
                                type="password" id="password" placeholder="Enter Password">
                            @error('password')
                            <span class="text text-danger" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2 d-flex">
                            <div class="checkbox checkbox-info float-left pt-0 ml-2 mb-3">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                            </div>
                            <a href="{{route('password.request')}}" class="text-dark ml-auto mb-2"><i
                                    class="fa fa-lock mr-1"></i>
                                Forgot Password?</a>
                        </div>
                        <div class="form-group text-center">
                            <span class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                wire:click.prevent="authenticate()">Log In</span>
                        </div>

                        <div class="form-group mb-0">
                            <div class="text-center">
                                <p>Don't have an account? <a href="{{route('register')}}">Sign Up</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="recoverform">
            <div class="logo">
                <h3 class="font-weight-medium mb-3">Recover Password</h3>
                <span>Enter your Email and instructions will be sent to you!</span>
            </div>
            <div class="row mt-3">
                <!-- Form -->
                <form class="col-12 form-material" action="index.html">
                    <!-- email -->
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="email" required="" placeholder="Username">
                        </div>
                    </div>
                    <!-- pwd -->
                    <div class="row mt-3">
                        <div class="col-12">
                            <button class="btn btn-block btn-lg btn-primary text-uppercase">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="alert alert-success">
            Whatsapp Support: <b>+254716826933</b> 
            <br>
        </div>
    </div>
</div>