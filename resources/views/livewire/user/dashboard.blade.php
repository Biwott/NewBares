<div wire:init="loadNotify" class="container-fluid">
    <!-- Row -->
    <div class="row">
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card">
                <div class="box p-3 rounded bg-info text-center">
                    <h1 class="font-weight-light text-white">
                        {{convertCurrency(auth()->user(), auth()->user()->balance)}}</h1>
                    <h6 class="text-white">Current Balance</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card">
                <div class="box p-3 rounded bg-danger text-center">
                    <h1 class="font-weight-light text-white">
                        {{convertCurrency(auth()->user(), auth()->user()->referals()->where('type', 'join')->sum('amount'))}}
                    </h1>
                    <h6 class="text-white">Referal Earnings</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card">
                <div class="box p-3 rounded bg-primary text-center">
                    <h1 class="font-weight-light text-white">
                        {{convertCurrency(auth()->user(), auth()->user()->withdrawals()->where('status', 1)->sum('amount'))}}
                    </h1>
                    <h6 class="text-white">Total Withdrawals</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card">
                <div class="box p-3 rounded bg-success text-center">
                    <h1 class="font-weight-light text-white">
                        {{convertCurrency(auth()->user(), auth()->user()->watches()->where('status', 1)->sum('amount'))}}
                    </h1>
                    <h6 class="text-white">Video Earnings</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
    <!-- Row -->
    <div class="row">

        <div class="col-lg-6">
            <!-- Row -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title"><b>My Referal Link</b></h6>
                            <div class="row align-center">
                                <div class="input-group mx-2">
                                    <input type="text" id="copyReferal" name="copyReferal" class="form-control form-control-sm"
                                        value="{{url('/').'/register/'.Auth::user()->username}}"
                                        style="background: none !important" readonly>
                                    <div class="input-group-append">
                                        <span onclick="copyFunction()" class="btn btn-sm btn-info">
                                            <span class="">Copy</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Total Deposits</h4>
                            <div class="text-right">
                                <h2 class="font-weight-light mb-0">
                                    {{ convertCurrency(auth()->user(),  
                                    auth()->user()->deposits->where('status', 1)->sum('amount'))}}
                                    <i class="ti-arrow-up text-info"></i>
                                </h2>

                            </div>
                            <span class="text-white">100%</span>
                            <div class="progress bg-info">
                                {{-- <div class="progress-bar bg-success" role="progressbar" style="width: 80%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Forex Balance</h4>
                            <div class="text-right">
                                <h2 class="font-weight-light mb-0">
                                    {{convertCurrency(auth()->user(), auth()->user()->trade_balance)}}
                                    <i class="ti-arrow-up text-warning"></i>
                                </h2>

                            </div>
                            <span class="text-white">100%</span>
                            <div class="progress bg-warning">
                                {{-- <div class="progress-bar bg-success" role="progressbar" style="width: 80%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Active Referals</h4>
                            <div class="text-right">
                                <h2 class="font-weight-light mb-0">
                                    {{ auth()->user()->where('referer_id', auth()->user()->id)->where('active' ,'>', 0)->count()." users"}}
                                    <i class="ti-arrow-up text-primary"></i>
                                </h2>

                            </div>
                            <span class="text-white">100%</span>
                            <div class="progress bg-primary">
                                {{-- <div class="progress-bar bg-success" role="progressbar" style="width: 80%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Blog Earnings</h4>
                            <div class="text-right">
                                <h2 class="font-weight-light mb-0">
                                    {{convertCurrency(auth()->user(),  auth()->user()->blogpays()->sum('amount'))}}
                                    <i class="ti-arrow-up text-success"></i>
                                </h2>

                            </div>
                            <span class="text-white">100%</span>
                            <div class="progress bg-success">
                                {{-- <div class="progress-bar bg-success" role="progressbar" style="width: 80%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <!-- Row -->
            <div wire:ignore class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-md-flex align-items-center">
                                <h4 class="card-title">Live Trade Analytics</h4>
                                <a href="{{route('user.trade.forex')}}" class="btn btn-success btn-sm ml-2 mb-2">Trade
                                    Now</a>
                                <div class="ml-auto">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h6 class=""><i class="fa fa-circle mr-1 text-danger"></i>LIVE
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div style="height: 350px;">
                                <iframe id="tradingview_d1541"
                                    src="https://www.tradingview.com/widgetembed/?frameElementId=tradingview_d1541&amp;symbol=BINANCE%3ABTCUSD&amp;interval=D&amp;hidesidetoolbar=1&amp;symboledit=1&amp;saveimage=1&amp;toolbarbg=f1f3f6&amp;studies=%5B%5D&amp;theme=light&amp;style=1&amp;timezone=Etc%2FUTC&amp;studies_overrides=%7B%7D&amp;overrides=%7B%7D&amp;enabled_features=%5B%5D&amp;disabled_features=%5B%5D&amp;locale=en&amp;utm_source=www.tradingview.com&amp;utm_medium=widget_new&amp;utm_campaign=chart&amp;utm_term=BINANCE%3ABTCUSDT"
                                    style="width: 100%; height: 100%; margin: 0 !important; padding: 0 !important;"
                                    frameborder="0" allowtransparency="true" scrolling="no" allowfullscreen=""
                                    __idm_frm__="108"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    function copyFunction() {
    var copyText = document.getElementById("copyReferal");
    copyText.select();
    copyText.setSelectionRange(0, 99999); 
    document.execCommand("copy");
  }
</script>
@endpush