<div class="container-fluid">
    
    <div class="row">
        <div class="col-sm-12 col-lg-4">
            <div class="card">
                <form>
                    <div class="card-body">
                        <img src="{{asset('assets/images/dummy.png')}}" class="img-thumbnail" alt="Image">

                        <h4 class="card-title mt-2 text-center">
                            {{ auth()->user()->first_name .' '. auth()->user()->last_name  }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <h6 class="card-title"><strong> Username</strong> </h6>
                            </div>
                            <div class="col-7">
                                <h6 class="card-title">{{ auth()->user()->username }}</h6>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-5">
                                <h6 class="card-title"><strong> Email</strong> </h6>
                            </div>
                            <div class="col-7 text-left">
                                <h6 class="card-title">{{ auth()->user()->email }}</h6>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-5">
                                <h6 class="card-title"><strong> Phone</strong> </h6>
                            </div>
                            <div class="col-7 text-left">
                                <h6 class="card-title">{{ auth()->user()->phone ?: 'Not available'}}</h6>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-5">
                                <h6 class="card-title"><strong> Balance</strong> </h6>
                            </div>
                            <div class="col-7 text-left">
                                <h6 class="card-title">{{ auth()->user()->balance }}</h6>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-5">
                                <h6 class="card-title"><strong>Refered By</strong> </h6>
                            </div>
                            <div class="col-7 text-left">
                                <h6 class="card-title">
                                    
                                    {{isset( \App\Models\User::find(auth()->user()->referer_id)->username) ?  \App\Models\User::find(auth()->user()->referer_id)->username : "None"}}
                                </h6>
                            </div>
                        </div>                
                        <div class="row mt-1">
                            <div class="col-5">
                                <h6 class="card-title"><strong> Joined</strong> </h6>
                            </div>
                            <div class="col-7 text-left">
                                <h6 class="card-title"> {{showDiffHuman(auth()->user()->created_at)}}
                                </h6>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-5">
                                <h6 class="card-title"><strong>Status</strong> </h6>
                            </div>
                            <div class="col-7 text-left">
                                <h6 class="card-title"> @switch(auth()->user()->status)
                                    @case(1)
                                    <span class="badge badge-success">Active</span>
                                    @break
                                    @case(3)
                                    <span class="badge badge-danger">Banned</span>
                                    @break
                                    @endswitch</h6>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="col-sm-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Edit Profile</h4>
                    <div class="" id="profile">
                        <form wire:submit.prevent="updateUser">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="first_name" class="control-label col-form-label">First
                                                Name</label>
                                            <input type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                id="first_name" wire:model="first_name"
                                                value="{{ auth()->user()->first_name }}">
                                            @error('first_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="last_name" class="control-label col-form-label">Last
                                                Name</label>
                                            <input type="text"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                id="last_name" wire:model="last_name" value="{{ auth()->user()->last_name }}">
                                            @error('last_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="uname" class="control-label col-form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                value="{{ auth()->user()->email }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="nname" class="control-label col-form-label">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                value="{{ auth()->user()->phone }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Country</label>
                                        <select class="form-control " name="country">
                                            @include('partials.countries')
                                        </select>
                                    </div>
                                    </select>
                                    <div class="col-md-6">
                                        <label>Username</label>
                                        <input id="username" placeholder="Enter Your Username" type="username"
                                            class="form-control " name="username" value="{{ auth()->user()->username }}"
                                            required autocomplete="username" readonly>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <br>
                                        <button type="submit" class="btn btn-info waves-effect waves-light">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>



                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div>
</div>