<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 ">
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">Activate User</h4>
                    <hr>
                    <h6 class="text-danger">
                        Activation Cost:
                        <b>
                            {{convertCurrency(auth()->user(), \App\Models\Level::find(1)->price)}}
                        </b>
                    </h6>
                    <form wire:submit.prevent="activate">
                        <div class="form-body">
                            <!--/span-->
                            <div class="col-md-10">
                                <div class="form-group @error('password') has-danger @enderror">
                                    <label class="control-label text-dark">
                                        Enter Username
                                    </label>
                                    <input type="text" wire:model="username" id="username" class="form-control "
                                        placeholder="{{__('Enter Username') }}">
                                    @error('username')
                                    <small class="form-control-feedback text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                        Activate User
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>


    </div>