<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Withdraws to your Acccount</h4>
                    <h6>
                        <span class="card-subtitle">Trade Balance:</span>
                        <strong>
                            {{convertCurrencyDecimal(auth()->user(), auth()->user()->trade_balance)}}
                        </strong>
                    </h6>
                    <form wire:submit.prevent="withdrawFunds" class="mt-4">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="amount">Enter Amount(Kshs)</label>
                                    <input wire:model="amount" type="text"
                                        class="form-control @error('amount') is-invalid @enderror" id="amount"
                                        placeholder="e.g 1000">
                                </div>
                                @error('amount')
                                <span class="text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Withdraw Funds</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>