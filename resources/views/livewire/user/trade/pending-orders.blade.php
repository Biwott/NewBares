<div wire:init="loadNotify" class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$page_title}}</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered m-b-0 ">
                                <thead>
                                    <tr>

                                        <th scope="col">{{__('#ID')}}</th>
                                        <th scope="col">{{__('Type')}}</th>
                                        <th scope="col">{{__('Amount')}}</th>
                                        <th scope="col">{{__('Buy Price')}}</th>
                                        <th scope="col">{{__('Sell Price')}}</th>
                                        <th scope="col">{{__('Profit Margin')}}</th>
                                        <th scope="col">{{__('Time')}}</th>
                                        <th scope="col">{{__('Status')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $order)
                                    <tr>
                                        <td>
                                            @if ($order->status ==0)
                                            {{ '#501'.$order->id }}
                                            @else
                                            {{ '#630'.$order->id }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($order->status ==0)
                                            <button class="btn btn-success btn-sm"> BUY</button>
                                            @else
                                            <button class="btn btn-danger btn-sm"> SELL</button>
                                            @endif
                                        </td>
                                        <td>
                                            {{convertCurrency(auth()->user(), $order->amount) }}
                                        </td>
                                        <td>
                                            {{convertCurrencyDecimal(auth()->user(), $order->buy_price) }}
                                        </td>

                                        <td>
                                            @if ($order->status ==2)
                                            {{convertCurrencyDecimal(auth()->user(), $order->sell_price) }}
                                            @else
                                            -
                                            @endif

                                        </td>

                                        
                                        <td>
                                            @if ($order->status ==2)
                                            {{convertCurrencyDecimal(auth()->user(), $order->gain) }}
                                            @else
                                            -
                                            @endif

                                        </td>
                                        <td>
                                            {{showDiffHuman($order->created_at)}}
                                        </td>
                                        <td>
                                            @if ($order->status == 0)
                                            <span class="badge badge-success">@lang('Pending')</span>
                                            @else
                                            <span class="badge badge-danger">@lang('Pending')</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="90%">{{$empty_message}}</td>
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
</div>