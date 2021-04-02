<div wire:init="loadNotify" class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    @if (auth()->user()->active==0)

                    <h4 class="card-title">Subscribe to Basic Plan</h4>
                    <h6 class="card-subtitle"> Lipa na Mpesa </h6>
                    <h6 class="card-subtitle"> </h6>
                    <div class="alert alert-danger alert-dismissible fade show col-9">
                        Kindly Subscribe Before Proceeding
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>


                    @else
                    <h4 class="card-title">Deposit Funds</h4>
                    <h6 class="card-subtitle"> Lipa na Mpesa </h6>

                    @endif
                    @if (auth()->user()->active==0)
                    <form wire:submit.prevent="subscribeUser" class="mt-4">
                    @else
                    <form wire:submit.prevent="depositFunds" class="mt-4">
                    @endif                   
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="phone">Paying Phone No.</label>
                                    <input wire:model="phone" type="email" class="form-control" id="phone" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">

                                <div class="form-group">
                                    <label for="amount">Enter Amount to Pay(Ksh)</label>
                                    <input wire:model="amount" type="text"
                                        class="form-control @error('amount') is-invalid @enderror" id="amount"
                                        @if($inActive) readonly @else placeholder="e.g 1000" @endif>
                                </div>
                                @error('amount')
                                <span class="text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div wire:loading.remove>
                            <button id="payment" type="submit" class="btn btn-primary">Send Payment Request</button>
                        </div>
                        <div wire:loading.delay>
                            <button id="processing" class="btn btn-success" type="button" disabled="">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Processing Payment...
                            </button>
                        </div>
                    </form>
                    @if (auth()->user()->active==0)
                    <a href="{{route('user.misc.help')}}">
                        <p class="text-left mt-2"><b>How to Works?</b></p>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>