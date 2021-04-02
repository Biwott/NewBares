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
                                        <th scope="col">@lang('Date')</th>
                                        <th scope="col">@lang('Request ID')</th>
                                        <th scope="col">@lang('Method')</th>
                                        <th scope="col">@lang('Amount')</th>
                                        <th scope="col">@lang('Charges')</th>
                                        <th scope="col">@lang('Total')</th>
                                        <th scope="col">@lang('Status')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($withdrawals as $withdrawal)
                                    <tr>
                                        <td>
                                            {{$withdrawal->created_at }}
                                        </td>
                                        <td>
                                            {{ $withdrawal->code}}
                                        </td>
                                        <td>
                                            {{ _('MPESA') }}
                                        </td>
                                        <td>
                                            {{ $withdrawal->amount}}
                                        </td>
                                        <td>
                                            {{ $withdrawal->charge }}
                                        </td>
                                        <td>
                                            <b> {{ $withdrawal->final_amount }}</b>
                                        </td>
                                        <td>
                                            @if($withdrawal->status == 1)
                                            <span class="badge badge-success">@lang('Approved')</span>
                                            @elseif ($withdrawal->status == 0)
                                            <span class="badge badge-primary">@lang('Pending')</span>
                                            @elseif ($withdrawal->status == 2)
                                            <span class="badge badge-danger">@lang('Rejected')</span>
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
                            {{ $withdrawals->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>