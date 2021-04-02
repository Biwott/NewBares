<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Change Password</h4>                   
                    <hr>
                    <form wire:submit.prevent="updatePassword">
                        <div class="form-body">
                            <div class="col-md-10">
                                <div class="form-group @error('current') has-danger @enderror">
                                    <label for=" current" class=" control-label text-dark">
                                        Old Password
                                    </label>
                                    <input type="password" wire:model="current" id="current" class="form-control"
                                        placeholder="{{__('Old Password') }}">
                                    @error('current')
                                    <small class="form-control-feedback">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-10">
                                <div class="form-group @error('password') has-danger @enderror">
                                    <label class="control-label text-dark">
                                        New Password
                                    </label>
                                    <input type="password" wire:model="password" id="password" class="form-control "
                                        placeholder="{{__('New Password') }}">
                                    @error('password')
                                    <small class="form-control-feedback">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group @error('confirmation') has-danger @enderror">
                                    <label class="control-label text-dark">
                                        Confirm Password
                                    </label>
                                    <input type="password" wire:model="confirmation" id="confirmation"
                                        class="form-control" placeholder="{{__('Confirm New Password') }}">
                                    @error('confirmation')
                                    <small class="form-control-feedback">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>