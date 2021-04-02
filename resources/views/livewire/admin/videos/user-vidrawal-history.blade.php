<div class="container-fluid">
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
                                        <th scope="col">@lang('Amount')</th>
                                        <th scope="col">@lang('Status')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($vidrawals as $vidrawal)
                                    <tr>
                                        <td>
                                            {{showDateTime($vidrawal->created_at) }}
                                        </td>
                                        <td>
                                            {{ $vidrawal->code}}
                                        </td>

                                        <td>
                                            {{ $vidrawal->amount}}
                                        </td>

                                        <td>
                                            @if($vidrawal->status == 1)
                                            <span class="badge badge-success">@lang('Approved')</span>
                                            @elseif ($vidrawal->status == 0)
                                            <span class="badge badge-primary">@lang('Pending')</span>
                                            @elseif ($vidrawal->status == 2)
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
                            {{ $vidrawals->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>