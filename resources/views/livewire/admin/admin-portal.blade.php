<div class="container-fluid">
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card bg-danger">
                <div class="card-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-12">
                            <span class="display-8">
                                <h2 class="text-white">
                                    {{\App\Models\User::all()->count()}}
                                </h2>
                            </span>
                            <h5 class="text-white">Total Users</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card bg-success">
                <div class="card-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-12">
                            <span class="display-8">
                                <h2 class="text-white">
                                    @if ($super_permission)
                                    {{\App\Models\User::all()->where('active', 1)->count()}}
                                    @else
                                    &nbsp;-
                                    @endif
                                </h2>
                            </span>
                            <h5 class="text-white">Active Users</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card bg-info">
                <div class="card-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-12">
                            <span class="display-8">
                                <h2 class="text-white">{{\App\Models\User::where('active', 0)->count()}}</h2>
                            </span>
                            <h5 class="text-white">Dormant Users</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card bg-dark">
                <div class="card-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-12">
                            <span class="display-8">
                                <h2 class="text-white">

                                    @if ($super_permission || $other_permission ||$users_permission || $pay_permission )
                                    {{number_format(\App\Models\User::where('active', 1)->sum('balance'), 0, '.', ',')}}
                                    @else &nbsp; - @endif </h2>
                            </span>
                            <h5 class="text-white">User Balance</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Column -->
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card">
                <div class="box p-2 rounded bg-primary text-center">
                    <h3 class="fw-light text-white">
                        @if ($super_permission || $other_permission ||$users_permission || $pay_permission )
                        {{number_format(\App\Models\Deposit::where('status', 1)->sum('amount'), 0, '.', ',')}} @else
                        &nbsp; - @endif </h3>
                    <h5 class="text-white">Total Deposits</h5>
                </div>
            </div>
        </div>

        <!-- Column -->
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card">
                <div class="box p-2 rounded bg-secondary text-center">
                    <h3 class="fw-light text-white">
                        @if ($super_permission || $other_permission ||$users_permission || $pay_permission )
                        {{number_format(\App\Models\Withdrawal::where('status', 1)->sum('amount'), 0, '.', ',')}}
                        @else &nbsp; - @endif </h3>
                    <h5 class="text-white">Total Withdrawals</h5>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card">
                <div class="box p-2 rounded bg-danger text-center">
                    <h3 class="fw-light text-white">{{\App\Models\Withdrawal::where('status', 0)->count()}}</h3>
                    <h5 class="text-white">Pending Withdrawals</h5>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card">
                <div class="box p-2 rounded bg-warning text-center">
                    <h3 class="fw-light text-white">
                        @if ($super_permission || $other_permission ||$users_permission || $pay_permission )
                        {{number_format(\App\Models\Withdrawal::where('status', 0)->sum('amount'), 0, '.', ',')}}
                        @else &nbsp; @endif </h3>
                    <h5 class="text-white">Pending Withdrawals($)</h5>
                </div>
            </div>
        </div>



        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card bg-dark">
                <div class="card-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-12">
                            <span class="display-8">
                                <h2 class="text-white">
                                    {{\App\Models\User::where('referer_id', 0)->where('active','>', 0)->count()}}
                                </h2>
                            </span>
                            <h5 class="text-white">Active Free-Agents</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card bg-info">
                <div class="card-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-12">
                            <span class="display-8">
                                <h2 class="text-white">
                                    {{\App\Models\User::where('referer_id', 0)->where('active', 0)->count()}}
                                </h2>
                            </span>
                            <h5 class="text-white">Dormant Free-Agents</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card bg-success">
                <div class="card-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-12">
                            <span class="display-8">
                                <h2 class="text-white">{{\App\Models\User::where('active', 0)->count()}}</h2>
                            </span>
                            <h5 class="text-white">Dormant Users</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card bg-primary">
                <div class="card-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-12">
                            <span class="display-8">
                                <h2 class="text-white">
                                    {{\App\Models\Withdrawal::where('status', 2)->count()}}
                                </h2>
                            </span>
                            <h5 class="text-white">Rejected Withdrawals</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
    <!-- Row -->

    @if ($super_permission )
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive mt-2">
                        <table class="table stylish-table mb-0 no-wrap v-middle">
                            <thead>
                                <tr>
                                    <th class="font-weight-normal text-muted border-0 border-bottom" colspan="2">Data
                                    </th>

                                    <th class="font-weight-normal text-muted border-0 border-bottom">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Active Users</h6>
                                    </td>
                                    <td>{{\App\Models\User::where('active','>', 0)->count()}}</td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Level 1 Users</h6>
                                    </td>
                                    <td> {{\App\Models\Referal::where('level', 1)->where('type', 'Join')->count()}}</td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Level 2 Users</h6>
                                    </td>
                                    <td>{{\App\Models\Referal::where('level', 2)->where('type', 'Join')->count()}}</td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>

                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Level 3 Users</h6>
                                    </td>
                                    <td>{{\App\Models\Referal::where('level', 3)->where('type', 'Join')->count()}}</td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>

                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Daily Spins</h6>
                                    </td>
                                    <td>{{\App\Models\Spinning::where('type', 'Normal')->whereDate('created_at', \Carbon\Carbon::today())->count()}}
                                    </td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>

                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Weekly Spins</h6>
                                    </td>



                                    <td>{{\App\Models\Spinning::where('type', 'Normal')->whereBetween('created_at', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])->count()}}
                                    </td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>

                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Daily Spins($)</h6>
                                    </td>
                                    <td>
                                        {{number_format(\App\Models\Spinning::where('type', 'Normal')->whereDate('created_at', \Carbon\Carbon::today())->sum('amount'), 0, '.',  ',' )}}
                                    </td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>

                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Weekly Spins($)</h6>
                                    </td>
                                    <td>{{number_format(\App\Models\Spinning::where('type', 'Normal')->whereBetween('created_at', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])->sum('amount'), 0 ,'.',',')}}
                                    </td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive mt-2">
                        <table class="table stylish-table mb-0 no-wrap v-middle">
                            <thead>
                                <tr>
                                    <th class="font-weight-normal text-muted border-0 border-bottom" colspan="2">Data
                                    </th>

                                    <th class="font-weight-normal text-muted border-0 border-bottom">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">F-Agent Earnings</h6>
                                    </td>

                                    <td> {{number_format(\App\Models\Adminref::where('level', 0)->where('type', 'Join')->sum('amount'), 0, '.', ',')}}
                                    </td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Level 1 Earnings</h6>
                                    </td>

                                    <td>

                                        {{number_format(\App\Models\Adminref::where('level', 1)->where('type', 'Join')->sum('amount'), 0, '.', ',')}}

                                    </td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Level 2 Earnings</h6>
                                    </td>

                                    <td> {{number_format(\App\Models\Adminref::where('level', 2)->where('type', 'Join')->sum('amount'), 0, '.', ',')}}
                                    </td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Level 3 Earnings</h6>
                                    </td>

                                    <td> {{number_format(\App\Models\Adminref::where('level', 3)->where('type', 'Join')->sum('amount'), 0, '.', ',')}}
                                    </td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Active Video Users</h6>
                                    </td>
                                    <td>{{\App\Models\User::where('video_status', 1)->whereDate('video_expiry_on', '>', \Carbon\Carbon::today())->count()}}
                                    </td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Daily Video Earnings</h6>
                                    </td>
                                    <td>{{\App\Models\Watch::where('status', 1)->whereDate('created_at', \Carbon\Carbon::today())->count()}}
                                    </td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Daily SMS Usage</h6>
                                    </td>
                                    <td>{{\App\Models\Sms::whereDate('created_at', \Carbon\Carbon::today())->count()}}
                                    </td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Weekly SMS Usage</h6>
                                    </td>
                                    <td>{{\App\Models\Sms::whereBetween('created_at', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])->count()}}
                                    </td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive mt-2">
                        <div class="col-6">
                            <a href="#sendSmsModal" data-toggle="modal" data-target="#sendSmsModal"
                                class="text-white text-center btn-block">
                                <div class="card outline-success bg-info">
                                    <div class="card-body">Send Invites</div>
                                </div>
                            </a>
                        </div>
                        {{-- SMS User Message --}}
                        <div key="6726423" wire:ignore.self class="modal fade" id="sendSmsModal" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Invite Messages a Text Message </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <div class="form-group">
                                                        <label for="access_token">Send Count</label>
                                                        <input type="text" class="form-control" value="{{$count}}"
                                                            readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="access_token">Enter Access Token</label>
                                                        <input type="text" class="form-control"
                                                            wire:model="access_token" id="access_token"
                                                            placeholder="Enter a valid access token">
                                                        @error('access_token') <span
                                                            class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" wire:click.prevent="sendInvites()"
                                            class="btn btn-primary">Send Message
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table stylish-table mb-0 no-wrap v-middle">
                            <thead>
                                <tr>
                                    <th class="font-weight-normal text-muted border-0 border-bottom" colspan="2">Data
                                    </th>

                                    <th class="font-weight-normal text-muted border-0 border-bottom">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Daily Spinearn</h6>
                                    </td>

                                    <td>
                                        {{
                                            \App\Models\Spinning::where('status', 2)->whereDate('created_at', \Carbon\Carbon::today())->sum('winning')-                        
                                            \App\Models\Spinning::where('status', 1)->whereDate('created_at', \Carbon\Carbon::today())->sum('winning')
                                        }}
                                    </td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Weekly Spinearn</h6>
                                    </td>

                                    <td>
                                        {{
                                            \App\Models\Spinning::where('status', 2)->whereBetween('created_at', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])->sum('winning')-
                                            \App\Models\Spinning::where('status', 1)->whereBetween('created_at', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])->sum('winning')
                                        }}
                                    </td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Daily B-Earnings</h6>
                                    </td>

                                    <td>
                                        {{\App\Models\Blogpay::where('status', 1)->whereDate('created_at', \Carbon\Carbon::today())->sum('amount')}}
                                    </td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Weekly B-Earnings</h6>
                                    </td>

                                    <td>{{\App\Models\Blogpay::where('status', 1)->whereBetween('created_at', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])->sum('amount')}}
                                    </td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Active Trades</h6>
                                    </td>
                                    <td>{{\App\Models\Trade::where('status', 1)->count()}}</td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Daily Trades</h6>
                                    </td>
                                    <td>
                                        {{
                                            \App\Models\Trade::whereDate('opened_at', \Carbon\Carbon::today())->sum('buy_commision')+
                                            \App\Models\Trade::whereDate('closed_at', \Carbon\Carbon::today())->sum('sell_commision')
                                        }}
                                    </td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Weekly Trades</h6>
                                    </td>
                                    <td>

                                        {{
                                            
                                            \App\Models\Trade::whereBetween('opened_at', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])->sum('buy_commision')+
                                            \App\Models\Trade::whereBetween('closed_at', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])->sum('sell_commision')
                                        }}
                                    </td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6 class="font-weight-medium mb-0 nowrap">Monthly Trades</h6>
                                    </td>

                                    <td>
                                        {{                                            
                                            \App\Models\Trade::whereMonth('opened_at', '=', date('m'))->sum('buy_commision')+ 
                                            \App\Models\Trade::whereMonth('opened_at', '=', date('m'))->sum('buy_commision') 
                                        }}
                                    </td>
                                    <td><a href="#" class="badge badge-light-primary text-primary"><u>View
                                                Details</u></a></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>