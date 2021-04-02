<div class="mt-4 mb-4 d-flex no-block justify-content-center align-items-center"
    style="background:url(/assets/images/background/login-register.jpg) no-repeat top center;">
    <div class="auth-box p-4 bg-white rounded">
        <div>
            <div class="logo">
                <h3 class="box-title mb-3">Sign Up</h3>
                @if($error_message!=null)
                <div class="alert alert-danger col-md-12 mb-3">
                    {{ $error_message}}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
                @enderror
            </div>
            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <form wire:submit.prevent="register" autocomplete="off">
                        @if ($refered_by!=null)
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="refered_by">Refered By</label>
                                    <input class="form-control is-valid text-primary"
                                        wire:model="refered_by" type="text" id="refered_by" readonly>
                                    
                                </div>

                            </div>

                        </div>
                        @endif

                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">First Name</label>
                                    <input class="form-control @error('firstName') is-invalid @enderror"
                                        wire:model="firstName" type="text" id="firstName"
                                        placeholder="Enter your First Name">
                                    @error('firstName')
                                    <span class="text text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName">Last Name</label>
                                    <input class="form-control @error('lastName') is-invalid @enderror"
                                        wire:model="lastName" type="text" id="lastName" required=""
                                        placeholder="Enter your Last Name">
                                    @error('lastName')
                                    <span class="text text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="form-group mb-3 ">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" wire:model="email"
                                        type="text" id="email" required="" placeholder="Enter your Email">
                                    @error('email')
                                    <span class="text text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="phone">Phone(Safaricom)</label>
                                    <input class="form-control @error('phone') is-invalid @enderror" wire:model="phone"
                                        type="text" id="phone" required="" placeholder="Enter Safaricom Phone">
                                    @error('phone')
                                    <span class="text text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="username">Username</label>
                                    <input class="form-control @error('username') is-invalid @enderror"
                                        wire:model="username" type="text" id="username" required=""
                                        placeholder="Enter your Username">
                                    @error('username')
                                    <span class="text text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="country">Select Country</label>
                                    <select class="form-control" wire:model="country" id="country">
                                        <option value="">
                                            --Select Country--
                                        </option>
                                        @foreach($currencies as $currency)
                                        <option value="{{$currency->id}}">
                                            {{$currency->country}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                    <span class="text text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="package">Select Package Plan</label>
                                    <select class="form-control" wire:model="package" id="package">
                                        <option value="">
                                            --Select Your Subscription Package--
                                        </option>
                                        @foreach($levels as $level)
                                        <option value="{{$level->id}}">
                                            {{$level->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('package')
                                    <span class="text text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="password">Enter Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror"
                                        wire:model.lazy="password" type="password" id="password" required=""
                                        placeholder="Enter your Password">
                                    @error('password')
                                    <span class="text text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="confirmation">Confirm Password</label>
                                    <input class="form-control @error('confirmation') is-invalid @enderror"
                                        wire:model.lazy="confirmation" type="password" id="confirmation" required=""
                                        placeholder="Confirm your Password">
                                    @error('confirmation')
                                    <span class="text text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-success pt-0 pl-2">
                                    <input wire:model.lazy="terms" id="terms" type="checkbox">
                                    <label for="terms"> I agree to all <a href="#">Terms</a></label>
                                    @error('terms')
                                    <span class="text text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center mb-3">
                            <div class="col-md-12">
                                <button
                                    class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light">Sign
                                    Up</button>
                            </div>
                        </div>
                        <div class="form-group mb-0 mt-2 ">
                            <div class="col-sm-12 text-center ">
                                Already have an account? <a href="authentication-login1.html "
                                    class="text-info ml-1 ">Sign In</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>