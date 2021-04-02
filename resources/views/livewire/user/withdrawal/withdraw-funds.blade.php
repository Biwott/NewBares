<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Withdraw Funds</h4>
                    <h6 class="card-subtitle"> Get Paid Via Mpesa </h6>
                    <form wire:submit.prevent="withdrawFunds" class="mt-4">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="phone">Mobile Phone No.</label>
                                    <input wire:model="phone" type="email" class="form-control" id="phone" readonly>
                                </div>
                            </div>
                        </div>
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
                        <div class="row">
                            <div class="col-md-10">

                                <div class="form-group">
                                    <label for="receivable">Receivable Amount(Kshs)</label>
                                    <input wire:model="receivable" type="text" class="form-control" id="receivable"
                                        placeholder="0.00" readonly>
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Withdraw Funds</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>