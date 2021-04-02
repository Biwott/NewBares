<div class="container-fluid">
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
                                                <th>#Ref</th>
                                                <th>Opened Time</th>
                                                <th>Username</th>
                                                <th>Amount</th>
                                                <th>Commision</th>
                                                <th>Buy Price</th>
                                                <th>Exchange Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($trades as $trade)
                                            <tr>
                                                <td>
                                                    {{ $trade->id}}
                                                </td>
                                                <td>
                                                    {{showDiffHuman($trade->opened_at)  }}
                                                </td>
                                                <td>
                                                    {{ \App\Models\User::find($trade->user_id)->username }}
                                                </td>
                                                <td>
                                                    {{ number_format($trade->amount, 0, '.', ',') }}
                                                </td>
                                                <td>
                                                    {{ number_format($trade->amount-$trade->amount_exchange, 0, '.' , ',') }}
                                                </td>
                                                <td>
                                                    {{ number_format($trade->buy_price, 2, '.', ',') }}
                                                </td>
                                                <td>
                                                    {{ number_format($trade->buy_price_exchange, 2, '.', ',') }}
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
                                    {{ $trades->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>