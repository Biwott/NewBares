<div wire:init="loadNotify" class="container-fluid">
    <div class="row mb-2">
        <div class="col-md-5 align-self-center">
        </div>
        <div class="col-md-7 d-flex justify-content-end align-self-center d-none d-md-flex">
            <div class="d-flex">
                <div class="dropdown mr-2 hidden-sm-down">
                    <a href="javascript:void(0)" class="btn btn-secondary">
                        Balance: {{convertCurrency(auth()->user(), $balance)}}
                    </a>
                </div>
                <div class="dropdown mr-2 hidden-sm-down">
                    <a href="{{route('user.trade.withdraw')}}" class="btn btn-primary">
                        <i class="mdi mdi-minus-circle"></i>
                        Withdraw
                    </a>
                </div>
                <a href="{{route('user.trade.invest')}}" class="btn btn-success">
                    <i class="mdi mdi-plus-circle"></i>
                    Invest
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <h4 class="card-title">Open Orders</h4>
                        <div class="ml-auto">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6 class="">
                                        <div wire:poll.10s>
                                            <i class="fa fa-circle mr-1 text-success"></i>Bitcoin Price:<b> Kshs  {{number_format($this->refreshCrypto(), 4, '.', ',') }}</b>
                                        </div>
                                    </h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered m-b-0 ">
                                <thead>
                                    <tr>
                                        <th scope="col">@lang('#Ref')</th>
                                        <th scope="col">@lang('Pair')</th>
                                        <th scope="col">@lang('Invested Amount')</th>
                                        <th scope="col">@lang('Buy Rate')</th>
                                        <th scope="col">@lang('Current Rate')</th>
                                        <th scope="col">@lang('Gain(Profit)')</th>
                                        <th scope="col">@lang('%Margin')</th>
                                        <th scope="col">@lang('Age')</th>
                                        <th scope="col">@lang('Action')</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $order)
                                    <tr>

                                        <td>
                                            {{$order->id}}
                                        </td>

                                        <td>
                                            {{\App\Models\Pair::find($order->pair_id)->name }}
                                        </td>
                                        <td>
                                            {{convertCurrencyDecimal(auth()->user(),  $order->amount)}}
                                        </td>
                                        <td>
                                            {{convertCurrencyDecimal(auth()->user(),  $order->buy_price_exchange)}}
                                        </td>
                                        <td>
                                            <div wire:poll.10s>
                                                @if ($order->status == 1)
                                                {{convertCurrencyDecimal(auth()->user(), $this->refreshCrypto()) }}
                                                @else
                                                {{convertCurrencyDecimal(auth()->user(), $order->sell_price) }}
                                                @endif
                                            </div>

                                        </td>
                                        <td>
                                            @if ($order->status == 1)
                                            {{ convertCurrencyDecimal(auth()->user(), $this->getCurrentMargin($order))}}
                                            @else
                                            {{ convertCurrencyDecimal(auth()->user(), $order->gain)}}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($order->status == 1)
                                            {{number_format($this->getPercentageMargin($order), 2,'.', ',').'%'}}
                                            @else

                                            {{ number_format($order->percentage, 2,'.', ',').'%'}}
                                            @endif
                                        </td>
                                        <td>
                                            {{showDiffHuman($order->opened_at)}}
                                        </td>
                                        <td>
                                            @if ($order->status == 1)
                                            <button data-toggle="modal" data-target="#approveTrade"
                                                wire:click.prevent="edit({{ $order }})"
                                                class="approveBtn btn btn-outline-success btn-sm md-trigger btn-mini feather icon-check-square f-12">
                                                SELL
                                            </button>
                                            {{-- Approve Trade  --}}
                                            <div wire:ignore.self class="modal fade" id="approveTrade" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Initiate Currency SELL
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>

                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label for="amount">
                                                                                Invested Amount
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                value="{{convertCurrencyDecimal(\App\Models\User::find($order->user_id), $amount)}}"
                                                                                readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label for="profit_amount">
                                                                                Profit Amount
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                value="{{convertCurrencyDecimal(\App\Models\User::find($order->user_id), $profit_amount)}}"
                                                                                id="profit_amount" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label for="percentage_margin">
                                                                                %Margin
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                value="{{$percentage_margin}}"
                                                                                id="percentage_margin" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label for="current_amount">
                                                                                Final Amount<span
                                                                                    class="text text-info">***</span>
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                value="{{convertCurrencyDecimal(\App\Models\User::find($order->user_id), $current_amount)}}"
                                                                                readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-10 alert alert-info mt-2 ml-2"
                                                                    role="alert">
                                                                    <span class="font-weight-light"><b>***Final
                                                                            Amount</b> is subject to exchange
                                                                        fees</span>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" wire:click.prevent="cancel()"
                                                                class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="button"
                                                                wire:click.prevent="sellOrder({{$order}})"
                                                                class="btn btn-success" data-dismiss="modal">Approve
                                                                <b>SELL</b></button>
                                                        </div F>

                                                    </div>

                                                </div>
                                            </div>
                                            @elseif($order->status == 2)
                                            <span class="badge badge-pill badge-danger text-white">@lang('Pending
                                                Sell')</span>
                                            @endif

                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="100%">{{$empty_message}}</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-sm-12 col-md-7">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <h4 class="card-title">Live Trade Analytics</h4>
                        <div class="ml-auto">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6 class=""><i class="fa fa-circle mr-1 text-danger"></i>LIVE
                                    </h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div style="height: 370px;">
                        <iframe id="tradingview_d1541"
                            src="https://www.tradingview.com/widgetembed/?frameElementId=tradingview_d1541&amp;symbol=BINANCE%3ABTCUSD&amp;interval=D&amp;hidesidetoolbar=1&amp;symboledit=1&amp;saveimage=1&amp;toolbarbg=f1f3f6&amp;studies=%5B%5D&amp;theme=light&amp;style=1&amp;timezone=Etc%2FUTC&amp;studies_overrides=%7B%7D&amp;overrides=%7B%7D&amp;enabled_features=%5B%5D&amp;disabled_features=%5B%5D&amp;locale=en&amp;utm_source=www.tradingview.com&amp;utm_medium=widget_new&amp;utm_campaign=chart&amp;utm_term=BINANCE%3ABTCUSDT"
                            style="width: 100%; height: 100%; margin: 0 !important; padding: 0 !important;"
                            frameborder="0" allowtransparency="true" scrolling="no" allowfullscreen=""
                            __idm_frm__="108"></iframe>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-block">
                    <div style="height: 455px;">
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            <div class="tradingview-widget-copyright"><a
                                    href="https://uk.tradingview.com/symbols/BINANCE-BTCUSD/technicals/" rel="noopener"
                                    target="_blank"><span class="blue-text"></span></a>
                            </div>
                            <script type="text/javascript"
                                src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js"
                                async>
                                {
                                    "interval": "1M",
                                    "width": "100%",
                                    "isTransparent": true,
                                    "height": "100%",
                                    "symbol": "BINANCE:BTCUSD",
                                    "showIntervalTabs": true,
                                    "locale": "uk",
                                    "colorTheme": "dark"
                                }
                            </script>
                        </div>
                        <!-- TradingView Widget END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@push('scripts')
<script type="text/javascript">
    window.livewire.on('forexClose', () => {
        $('#approveTrade').modal('hide');
    });
</script>
@endpush