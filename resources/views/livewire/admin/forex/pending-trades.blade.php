<div wire:init="loadNotify" class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-between bd-highlight mb-3">
                                    <div class=" col-md-9 p-2 bd-highlight">
                                        <h4 class="card-title">{{$page_title}}</h4>
                                    </div>
                                    <div class="col-md-3 p-2 bd-highlight">
                                        <div class="input-group">
                                            <input type="search" id="copyReferal" wire:model="search"
                                                class="form-control" placeholder="Search By Username">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap dataTable"
                                        role="grid" aria-describedby="zero_config_info">
                                        <thead>
                                            <tr>
                                                <th>Pair</th>
                                                <th>Date</th>
                                                <th>Buy Price</th>
                                                <th>Amount</th>
                                                <th>Username</th>
                                                <th>Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($orders as $order)
                                            <tr>

                                                <td>{{\App\Models\Pair::find($order->pair_id)->name}}
                                                </td>
                                                <td>{{showDateTime($order->created_at)}}
                                                </td>
                                                <td>{{convertCurrencyDecimal(\App\Models\User::find($order->user_id),$order->buy_price)  }}
                                                </td>
                                                <td>{{ convertCurrencyDecimal(\App\Models\User::find($order->user_id), $order->amount) }}
                                                </td>
                                                <td style="text-transform: lowercase">
                                                    <a href="{{'/admin/users/detail/'.$order->user_id}}"
                                                        target="_blank">
                                                        {{ $order->user()->pluck('username')->first() }}
                                                    </a>
                                                </td>
                                                <td>
                                                    @if ($order->status==0)
                                                    <button data-toggle="modal" data-target="#buyTrade"
                                                        wire:click.prevent="editBuy({{ $order }})" class="approveBtn btn btn-success  
                                                    md-trigger btn-sm feather icon-check-square f-12">
                                                        Buy
                                                    </button>
                                                    {{-- Buy Trade  --}}
                                                    <div wire:ignore.self class="modal fade" id="buyTrade" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-success">
                                                                    <h5 class="modal-title text-white"
                                                                        id="exampleModalLabel">
                                                                        Approve Pending Trade(BUY)
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>

                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <div class="form-group">
                                                                                    <label for="amount">
                                                                                        Amount Bought
                                                                                    </label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="{{$buyAmount}}"
                                                                                        id="amount" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <div class="form-group">
                                                                                    <label for="commision">
                                                                                        Trade Fees
                                                                                    </label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        wire:model="buyCommision"
                                                                                        id="buyCommision">
                                                                                    @error('buyCommision') <span
                                                                                        class="text-danger">{{ $message }}</span>@enderror

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <div class="form-group">
                                                                                    <label for="newBuyPrice">
                                                                                        Crypto Buy Price
                                                                                    </label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        wire:model="newBuyPrice"
                                                                                        id="newBuyPrice">
                                                                                    @error('newBuyPrice') <span
                                                                                        class="text-danger">{{ $message }}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <div class="form-group">
                                                                                    <label for="newBuyPriceWithComm">
                                                                                        New Less Commision
                                                                                    </label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="{{$newBuyPriceWithComm}}"
                                                                                        id="newBuyPriceWithComm"
                                                                                        readonly>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <div class="form-group">
                                                                                    <label for="newBuyAmount">
                                                                                        New Buy Amount
                                                                                    </label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="{{$newBuyAmount}}"
                                                                                        id="newBuyAmount" readonly>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        wire:click.prevent="cancelBuy()"
                                                                        class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="button"
                                                                        wire:click.prevent="approveBuy({{$order}})"
                                                                        class="btn btn-success"
                                                                        data-dismiss="modal">APPROVE BUY</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @elseif($order->status==2)
                                                    <button data-toggle="modal" data-target="#sellTrade"
                                                        wire:click.prevent="editSell({{ $order }})" class="approveBtn btn btn-success  
                                                            md-trigger btn-sm feather icon-check-square f-12">
                                                        Sell
                                                    </button>
                                                    {{-- Sell Trade  --}}
                                                    <div wire:ignore.self class="modal fade" id="sellTrade"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content ">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Approve Pending Trade(SELL)
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <div class="form-group">
                                                                                    <label for="amount">
                                                                                        Sale Amount
                                                                                    </label>
                                                                                    <input type="text"
                                                                                        class="form-control"                                                                                        
                                                                                        value="{{ convertCurrencyDecimal(\App\Models\User::find($order->user_id), $sellAmount)}}"
                                                                                        id="sellAmount" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <div class="form-group">
                                                                                    <label for="sellCommision">
                                                                                        Sell Commision
                                                                                    </label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        wire:model="sellCommision"
                                                                                        id="sellCommision">
                                                                                    @error('sellCommision') <span
                                                                                        class="text-danger">{{ $message }}</span>@enderror

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <div class="form-group">
                                                                                    <label for="newSellPrice">
                                                                                        Crypto Sell Price
                                                                                    </label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        wire:model="newSellPrice"
                                                                                        id="newSellPrice">
                                                                                    @error('newSellPrice') <span
                                                                                        class="text-danger">{{ $message }}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <div class="form-group">
                                                                                    <label for="newSellPriceWithComm">
                                                                                        New Less Commision
                                                                                    </label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                       
                                                                                        value="{{ convertCurrencyDecimal(\App\Models\User::find($order->user_id), $newSellPriceWithComm)}}"
                                                                                        id="newSellPriceWithComm"
                                                                                        readonly>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="newBuyAmount">
                                                                                        New Sell Amount
                                                                                    </label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="{{ convertCurrencyDecimal(\App\Models\User::find($order->user_id), $newSellAmount)}}"
                                                                                        id="newSellAmount" readonly>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="sellGain">
                                                                                        Sell Gain
                                                                                    </label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="{{ convertCurrencyDecimal(\App\Models\User::find($order->user_id), $sellGain)}}"
                                                                                        id="sellGain" readonly>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        wire:click.prevent="cancelSell()"
                                                                        class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="button"
                                                                        wire:click.prevent="approveSell({{$order}})"
                                                                        class="btn btn-success"
                                                                        data-dismiss="modal">APPROVE SELL</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if ( $order->status==0)
                                                    <button class="declineSellBtn btn btn-danger   
                                                            md-trigger btn-sm feather icon-x-square f-12"
                                                        data-id="{{ $order->id }}"
                                                        data-amount="{{ convertCurrency(\App\Models\User::find($order->user_id), $order->amount)}}"
                                                        data-username="{{ $order->user()->pluck('username')->first() }}">
                                                        Decline
                                                    </button>
                                                    {{-- Decline BUY --}}
                                                    <div id="modal-decline-buy" class="modal fade" tabindex="-1"
                                                        role="dialog">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Decline Buy Trade Order?
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form wire:submit.prevent="declineBuy({{$order}})">
                                                                    <input type="hidden" name="id">
                                                                    <div class="modal-body">
                                                                        <h6>Do you want to <span
                                                                                class="font-weight-bold">REJECT</span>
                                                                            <span
                                                                                class="font-weight-bold withdraw-amount text-danger"></span>
                                                                            BUY of
                                                                            <span
                                                                                class="font-weight-bold withdraw-user"></span>?
                                                                        </h6>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-warning">Decline
                                                                            Trade</button>
                                                                        <button type="button" class="btn btn-dark"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @elseif($order->status==2)
                                                    <button class="declineBuyBtn btn btn-warning   
                                                                md-trigger btn-sm feather icon-x-square f-12"
                                                        data-id="{{ $order->id }}"
                                                        data-amount="{{ convertCurrency(\App\Models\User::find($order->user_id), $order->amount)}}"
                                                        data-username="{{ $order->user()->pluck('username')->first() }}">
                                                        Decline
                                                    </button>
                                                    {{-- Decline SELL --}}
                                                    <div id="modal-decline-sell" class="modal fade" tabindex="-1"
                                                        role="dialog">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Decline Sell Trade Order?
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form wire:submit.prevent="declineSell({{$order}})">
                                                                    <input type="hidden" name="id">
                                                                    <div class="modal-body">
                                                                        <h6>Do you want to <span
                                                                                class="font-weight-bold">REJECT</span>
                                                                            <span
                                                                                class="font-weight-bold withdraw-amount text-danger"></span>
                                                                            SELL of
                                                                            <span
                                                                                class="font-weight-bold withdraw-user"></span>?
                                                                        </h6>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Decline
                                                                            Trade</button>
                                                                        <button type="button" class="btn btn-dark"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
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
    </div>
</div>

@push('scripts')
<script>
    $('.declineBuyBtn').on('click', function() {
    var modal = $('#modal-decline-buy');
    modal.find('input[name=id]').val($(this).data('id'));
    modal.find('.withdraw-amount').text($(this).data('amount'));
    modal.find('.withdraw-user').text($(this).data('username'));
    modal.modal('show');
});   
$('.declineSellBtn').on('click', function() {
    var modal = $('#modal-decline-sell');
    modal.find('input[name=id]').val($(this).data('id'));
    modal.find('.withdraw-amount').text($(this).data('amount'));
    modal.find('.withdraw-user').text($(this).data('username'));
    modal.modal('show');
});     
</script>
<script type="text/javascript">
    window.livewire.on('forexClose', () => {
        $('#buyTrade').modal('hide');
        $('#sellTrade').modal('hide');
    });
</script>
@endpush