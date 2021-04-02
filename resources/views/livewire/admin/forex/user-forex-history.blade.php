<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$user->username."'s ' ".$page_title}}</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered m-b-0 ">
                                <thead>
                                    <tr>

                                        <th scope="col">{{__('#ID')}}</th>
                                        <th scope="col">{{__('Pair')}}</th>
                                        <th scope="col">{{__('Type')}}</th>
                                        <th scope="col">{{__('Amount')}}</th>
                                        <th scope="col">{{__('Buy Price')}}</th>
                                        <th scope="col">{{__('Sell Price')}}</th>
                                        <th scope="col">{{__('Profit Margin')}}</th>
                                        <th scope="col">{{__('Result')}}</th>
                                        <th scope="col">{{__('Date')}}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $order)
                                    <tr>
                                        <td>
                                            @if ($order->status ==1)
                                            {{ '#501'.$order->id }}
                                            @else
                                            {{ '#630'.$order->id }}
                                            @endif
                                        </td>
                                        <td>
                                            {{\App\Models\Pair::find($order->pair_id)->name}}
                                        </td>
                                        <td>

                                            @if ($order->status==1)
                                            <button class="btn btn-success btn-sm"> BUY</button>
                                            @else
                                            <button class="btn btn-danger btn-sm"> SELL</button>
                                            @endif
                                        </td>
                                        <td>
                                            {{convertCurrency(auth()->user(), $order->amount) }}
                                        </td>
                                        <td>
                                            {{convertCurrencyDecimal(auth()->user(), $order->buy_price_exchange) }}
                                        </td>

                                        <td>
                                            @if ($order->status ==3)
                                            {{convertCurrencyDecimal(auth()->user(), $order->sell_price_exchange) }}
                                            @else
                                            -
                                            @endif

                                        </td>


                                        <td>
                                            @if ($order->status ==3)
                                            {{convertCurrencyDecimal(auth()->user(), $order->gain) }}
                                            @else
                                            -
                                            @endif

                                        </td>
                                        <td>
                                            @if ($order->status == 1)
                                            -
                                            @else

                                            {{ number_format($order->percentage, 2,'.', ',').'%'}}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($order->status == 1)
                                            {{showDateTime($order->opened_at)}}
                                            @else
                                            {{showDateTime($order->closed_at)}}
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