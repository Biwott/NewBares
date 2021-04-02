<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Buy CryptoCurrency with User Funds</h4>
                    <h6 class="card-subtitle"> *Uses Funds from your Main Account Only</h6>
                    <form autocomplete="off" wire:submit.prevent="buyCoin" class="mt-4">
                        <div class="row">
                            <div class="form-group mb-3 mx-3">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="pair">Currency Pair</label>
                                        <select class="form-control" wire:model="pair" id="pair">
                                            <option value="">
                                                --Select Pair--
                                            </option>
                                            @foreach($pairs as $pair)
                                            <option value="{{$pair->id}}">
                                                {{$pair->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('pair')
                                        <span class="text text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exchange"><u>Exchange Rate</u></label>
                                        <div>
                                            <input class="form-control" value="{{$exchange}}" type="text" readonly>
                                            <label for="equavalent"><u>Equivalent</u></label>
                                            <input class="form-control" value="{{$equavalent}}" type="text" readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="amount">Enter Amount(Kshs)</label>
                                    <input wire:model="amount" type="text"
                                        class="form-control @error('amount') is-invalid @enderror" id="amount"
                                        placeholder="Ksh1,000-50,000">
                                </div>
                                @error('amount')
                                <span class="text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="expected">Expected Amount{{$currency}}<span
                                            class="text text-info">***</span></label>
                                    <input value="{{$expected}}" type="text" class="form-control" readonly>
                                </div>
                                @error('expected')
                                <span class="text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Buy Currency</button>
                    </form>
                    <div class="col-10 alert alert-info mt-2" role="alert">
                        <b>***Expected Amount</b> does not take account of exchange fees
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>