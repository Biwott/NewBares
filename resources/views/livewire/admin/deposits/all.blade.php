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
                                        <div class="input-group">
                                            <div class="checkbox">
                                                <input id="phone" type="checkbox" wire:model="code_checked" checked="">
                                                <label class="mb-0" for="checkbox0">Search by Code </label>
                                            </div>
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
                                                <th>Date</th>
                                                <th>Method</th>
                                                <th>Transaction #</th>
                                                <th>Username</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($deposits as $deposit)
                                            <tr>
                                                <td>
                                                    {{showDateTime($deposit->created_at)}}
                                                </td>
                                                <td>
                                                    {{\App\Models\Method::find($deposit->method_id)->name}}
                                                </td>
                                                <td>
                                                    {{ $deposit->reference}}
                                                </td>

                                                <td style="text-transform: lowercase">
                                                    <a
                                                        href="{{'/admin/users/detail/'.$deposit->user_id}}">{{ $deposit->user()->pluck('username')->first() }}</a>
                                                </td>

                                                <td>
                                                    {{ number_format($deposit->amount,2)  }}
                                                </td>
                                                <td>
                                                    @if($deposit->status == 0)
                                                    <span class="badge badge-pill badge-primary">
                                                        @lang('Pending')
                                                    </span>
                                                    @elseif ($deposit->status == 1)
                                                    <span class="badge badge-pill badge-success">
                                                        @lang('Approved')
                                                    </span>
                                                    @elseif ($deposit->status == 2)
                                                    <span class="badge badge-pill badge-danger">
                                                        @lang('Rejected')
                                                    </span>
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
                                    {{ $deposits->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>