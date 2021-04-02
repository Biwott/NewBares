<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body text-center border-bottom">
                    <img src="\assets\images\dummy.png" alt="profile-image" style="width: 200px;height: 200px;">
                    <h5 class="card-title mt-3" style="text-transform: capitalize;">
                        {{ $user->first_name .' '. $user->last_name  }}</h5>
                </div>
                <div class="card-body">
                    <p class="clearfix">
                        <span class="float-left">Username:</span>
                        <span class="col-sm-8 text-muted" style=" text-transform: lowercase;">
                            {{ $user->username }}
                        </span>
                    </p>
                    <p class="clearfix">
                        <span class="float-left">Email:</span>
                        <span class="col-sm-8 text-muted">
                            {{ $user->email }}
                        </span>
                    </p>
                    <p class="clearfix">
                        <span class="float-left">Phone:</span>
                        <span class="col-sm-8 text-muted">
                            {{ $user->phone ?: 'Not available'}}
                        </span>
                    </p>

                    <p class="clearfix">
                        <span class="float-left">Balance:</span>
                        <span class="col-sm-8 text-muted">
                            {{ convertCurrency($user, $user->balance) }}
                        </span>
                    </p>


                    <td style="text-transform: lowercase">

                    </td>
                    @if (isset( $referer))
                    <p class="clearfix">
                        <span class="float-left">Refered By:</span>
                        <span class="col-sm-8 text-muted">
                            <a target="_blank" href="{{'/admin/users/detail/'.$referer->id}}">
                                <u>{{ $referer->username }}</u>
                            </a>
                        </span>
                    </p>
                    @else
                    <p class="clearfix">
                        <span class="float-left">Refered By:</span>
                        <span class="col-sm-8 text-muted">
                            None
                        </span>
                    </p>
                    @endif
                    <p class="clearfix">
                        <span class="float-left">Total Referals:</span>
                        <span class="col-sm-8 text-muted">
                            {{$referals->where('type', 'Join')->where('level', 1)->count()}}
                        </span>
                    </p>
                    <p class="clearfix">
                        <span class="float-left">Active</span>
                        <span class="col-sm-8 text-muted">
                            @if($user->active==1)
                            <span class="badge badge-pill badge-success">Actived</span>
                            @else
                            <span class="badge badge-pill badge-danger">Inactive</span>
                            @endif
                        </span>
                    </p>
                    <p class="clearfix">
                        <span class="float-left">Joined</span>
                        <span class="col-sm-8 text-muted">
                            {{showDateTime($user->created_at)}}
                        </span>
                    </p>

                    <p class="clearfix">
                        <span class="float-left">Status</span>
                        <span class="col-sm-8 text-muted">
                            @switch($user->status)
                            @case(0)
                            <span class="badge badge-danger">Banned</span>
                            @break
                            @case(1)
                            <span class="badge badge-success">Active</span>
                            @break
                            @case(2)
                            <span class="badge badge-success">Active</span>
                            @break
                            @endswitch
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="row p-4">
                    <!-- task, page, download counter  start -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="box p-3 rounded alert alert-primary text-center">
                                <h4 class="font-weight-normal">
                                    {{convertCurrency($user, $deposits->sum('amount'))}}
                                </h4>
                                <a target="_blank" href="{{route('admin.deposits.history', $user->id)}}">
                                    <h6 class="text-info"><u>Total deposits</u></h6>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="box p-3 rounded alert alert-primary text-center">
                                <h4 class="font-weight-normal">
                                    {{convertCurrency($user, $withdrawals->sum('amount'))}}
                                </h4>
                                <a target="_blank" href="{{route('admin.withdrawals.history', $user->id)}}">
                                    <h6 class="text-info"><u>Total Withdrawals</u></h6>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="box p-3 rounded alert alert-primary text-center">
                                <h4 class="font-weight-normal">
                                    {{convertCurrency($user, $referals->sum('amount'))}}
                                </h4>
                                <a target="_blank" href="{{route('admin.affiliates.history', $user->id)}}">
                                    <h6 class="text-info"><u>Referal Earnings</u></h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="box p-3 rounded alert alert-success text-center">
                                <h4 class="font-weight-normal">
                                    {{convertCurrency($user, $trades->where('status', 3)->sum('gain_exchange'))}}
                                </h4>
                                <a target="_blank" href="{{route('admin.forex.history', $user->id)}}">
                                    <h6 class="text-info"><u>Forex Earnings</u></h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="box p-3 rounded alert alert-success text-center">
                                <h4 class="font-weight-normal">
                                    {{convertCurrency($user, $watches->where('status', 1)->sum('amount'))}}
                                </h4>
                                <a target="_blank" href="{{route('admin.videos.watch_history', $user->id)}}">
                                    <h6 class="text-info"><u>Watch Earnings</u></h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="box p-3 rounded alert alert-success text-center">
                                <h4 class="font-weight-normal">
                                    {{convertCurrency($user, $vidrawals->sum('amount'))}}
                                </h4>
                                <a target="_blank" href="{{route('admin.videos.vidrawal_history', $user->id)}}">
                                    <h6 class="text-info"><u>Video withdrawals</u></h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="box p-3 rounded alert alert-secondary text-center">
                                <h4 class="font-weight-normal">
                                    {{convertCurrency($user, $spinnings->where('type', 'Free')->sum('winning'))}}
                                </h4>
                                <a target="_blank" href="{{route('admin.spins.free_history', $user->id)}}">
                                    <h6 class="text-info"><u>Free Spin Earnings</u></h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="box p-3 rounded alert alert-secondary text-center">
                                <h4 class="font-weight-normal">
                                    {{convertCurrency($user, $spinnings->where('type', 'Free')->sum('winning'))}}
                                </h4>
                                <a target="_blank" href="{{route('admin.spins.lucky_history', $user->id)}}">
                                    <h6 class="text-info"><u>Lucky Spin Earnings</u></h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="box p-3 rounded alert alert-secondary text-center">
                                <h4 class="font-weight-normal">
                                    {{convertCurrency($user, $blogpays->sum('amount'))}}
                                </h4>
                                <a target="_blank" href="{{route('admin.blogs.history', $user->id)}}">
                                    <h6 class="text-info"><u>Blog Earnings</u></h6>
                                </a>
                            </div>
                        </div>
                    </div>

                    @if ($user->inactive==0)
                    @if ($adminActive==1)
                    <div class="col-lg-4">
                        <a href="#subModal" data-toggle="modal" data-target="#addBalance"
                            class="text-white text-center btn-block">
                            <div class="card outline-danger bg-success">
                                <div class="card-body">Add Balance</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="#subModal" data-toggle="modal" data-target="#subtractBalance"
                            class="text-white text-center btn-block">
                            <div class="card outline-danger bg-danger">
                                <div class="card-body">Subtract Balance</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="#addUserReferer" data-toggle="modal" data-target="#addReferer"
                            class="text-white text-center btn-block">
                            <div class="card outline-success bg-info">
                                <div class="card-body">Add Referer</div>
                            </div>
                        </a>
                    </div>
                    @endif
                    @if ($adminActive==1 || $adminActive==2 || $adminActive==3)

                    <div class="col-lg-4">
                        <a target="_blank" href="{{route('admin.users.logins', $user->id)}}"
                            class="text-white text-center btn-block">
                            <div class="card outline-dark bg-dark">
                                <div class="card-body">Login History</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="#sendSmsModal" data-toggle="modal" data-target="#sendSmsModal"
                            class="text-white text-center btn-block">
                            <div class="card outline-success bg-info">
                                <div class="card-body">Send Message</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="#activateUser" data-toggle="modal" data-target="#activateUser"
                            class="text-white text-center btn-block">
                            <div class="card outline-danger bg-primary">
                                <div class="card-body">Activate User</div>
                            </div>
                        </a>
                    </div>
                    @if ($user->status>0)
                    <div class="col-lg-4">
                        <a href="#banUser" data-toggle="modal" data-target="#banUser"
                            class="text-white text-center btn-block">
                            <div class="card outline-danger bg-danger">
                                <div class="card-body">Ban User</div>
                            </div>
                        </a>
                    </div>
                    @endif
                    <div class="col-lg-4">
                        <a href="#changePassword" data-toggle="modal" data-target="#changePassword"
                            class="text-white text-center btn-block">
                            <div class="card outline-success bg-warning">
                                <div class="card-body">Change Password</div>
                            </div>
                        </a>
                    </div>
                    @if ($user->status==0)
                    <div class="col-lg-4">
                        <a href="#unBanUser" data-toggle="modal" class="text-white text-center btn-block">
                            <div class="card outline-info bg-success">
                                <div class="card-body">UnBan User</div>
                            </div>
                        </a>
                    </div>
                    @endif
                    @endif
                    @if ($user->active==1)
                    <div class="col-lg-4">
                        <a href="#reverseActivation" data-toggle="modal" data-target="#reverseActivation"
                            class="text-white text-center btn-block">
                            <div class="card outline-info bg-danger">
                                <div class="card-body">Reverse User</div>
                            </div>
                        </a>
                    </div>
                    @endif
                    @if ($adminActive==1 || $adminActive==2 || $adminActive==3)
                    <div class="col-lg-12">
                        {{-- {{ route('auth.register') }} --}}
                        <form wire:submit.prevent="updateUser">
                            {{-- {{ route('admin.user.update', $user->id) }} --}}
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>@lang('First Name')</label>
                                    <input placeholder="{{ __('Enter Your First Name') }}" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror"
                                        wire:model="first_name" autofocus>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>@lang('Last Name')</label>
                                    <input placeholder="{{ __('Enter Your Last Name') }}" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror"
                                        wire:model="last_name" required>
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>@lang('Email')</label>
                                    <input type="email" class="form-control" value="{{ $user->email }}" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label>@lang('Phone')</label>
                                    <input type="text" class="form-control" value="{{ $user->phone }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="country">Select Country</label>
                                    <select class="form-control" wire:model="country" id="country">
                                        <option value="">
                                            {{$country}}
                                        </option>
                                    </select>

                                </div>
                                <div class="col-md-6">
                                    <label>@lang('Username')</label>
                                    <input type="text" class="form-control" value="{{ $user->username }}" readonly>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="form-group row">
                                    <div class="col-lg-12 text-center">
                                        <button class="btn btn-block btn-success mt-2">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                    @endif


                </div>
            </div>
        </div>
    </div>

    {{-- Subtract User Balance --}}
    <div wire:ignore.self class="modal fade" id="subtractBalance" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Subtract User Balance
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="subtract">Enter Amount</label>
                                    <input type="text" class="form-control" wire:model="subtract" id="subtract">
                                    @error('subtract') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="subBal()" data-dismiss="modal" class="btn btn-primary">
                        Subtract Balance
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Reverse Activation --}}
    <div wire:ignore.self class="modal fade" id="reverseActivation" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">
                        <strong>Reverse User Subscription</strong>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5 text-danger>Are you sure you want to <strong class="text-danger">Reverse
                                            {{$user->username}}</strong> with their Referals payments?</h5>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="reverseSubscription()" data-dismiss="modal"
                        class="btn btn-danger">
                        Reverse User
                    </button>
                </div>
            </div>
        </div>
    </div>



    {{-- Add User Balance --}}
    <div wire:ignore.self class="modal fade" id="addBalance" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Add User Balance
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="add">Enter Amount</label>
                                    <input type="text" class="form-control" wire:model="add" id="add">
                                    @error('add') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="addBal()" data-dismiss="modal" class="btn btn-primary">
                        Add Balance
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Add User Referer --}}
    <div wire:ignore.self class="modal fade" id="addReferer" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Add User Referer
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="refer">Enter Referer</label>
                                    <input type="text" class="form-control" wire:model="refer" id="refer"
                                        placeholder="Enter User Referer">

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="addUserReferer()" data-dismiss="modal"
                        class="btn btn-primary">Add Referer
                    </button>
                </div>
            </div>
        </div>
    </div>


    {{-- SMS User Message --}}
    <div wire:ignore.self class="modal fade" id="sendSmsModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Send {{$user->username}} a Text Message </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="sms">Enter Message</label>
                                    <input type="text" class="form-control" wire:model="sms" id="sms"
                                        placeholder="SMS not exceeding 150 characters">
                                    @error('sms') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="sendUserSms()" class="btn btn-primary">Send Message
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{--Change User Password --}}
    <div wire:ignore.self class="modal fade" id="changePassword" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Change {{$user->username."'s "}} Password </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">Enter Password</label>
                                    <input type="text" class="form-control" wire:model="password" id="sms"
                                        placeholder="New Password">
                                    @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="confirmation">Confirm Password</label>
                                    <input type="text" class="form-control" wire:model="confirmation" id="confirmation"
                                        placeholder="Confirm Password">
                                    @error('confirmation') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="resetPassword()" class="btn btn-primary">Change Password
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Ban User Modal --}}
    <div wire:ignore.self class="modal fade" id="banUser" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Add User Balance
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Do you want to <span class="font-weight-bold">BAN</span>
                        {{" ".$user->username}}?
                    </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="banUser()" data-dismiss="modal" class="btn btn-danger">
                        Ban User
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- unBan User Modal --}}
    <div wire:ignore.self class="modal fade" id="unBanUser" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Add User Balance
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Do you want to <span class="font-weight-bold">Un-BAN</span>
                        {{" ".$user->username}}?
                    </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="unBanUser()" data-dismiss="modal" class="btn btn-success">
                        unBan User
                    </button>
                </div>
            </div>
        </div>
    </div>


    {{-- Activate User Modal --}}
    <div wire:ignore.self class="modal fade" id="activateUser" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Activate User {{$user->username}}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Do you want to <span class="font-weight-bold">Activate</span>
                        {{" ".$user->username}}?
                    </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="activateUser()" data-dismiss="modal"
                        class="btn btn-success">
                        Activate User
                    </button>
                </div>
            </div>
        </div>
    </div>



    @push('scripts')
    <script type="text/javascript">
        window.livewire.on('hideModals', () => {
        $('#subtractBalance').modal('hide');
        $('#addBalance').modal('hide');
        $('#activateUser').modal('hide');
        $('#banUser').modal('hide');
        $('#sendSmsModal').modal('hide');
        $('#changePassword').modal('hide');
        
        
    });
    </script>
    @endpush