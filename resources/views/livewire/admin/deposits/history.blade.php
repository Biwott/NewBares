<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$this->username ."'s ".$page_title}}</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered m-b-0 ">
                                <thead>
                                    <tr>
                                        <th scope="col">{{__('Date')}}</th>
                                        <th scope="col">{{__('Transact. ID')}}</th>
                                        <th scope="col">{{__('Method')}}</th>
                                        <th scope="col">{{__('Amount')}}</th>
                                        <th scope="col">{{__('Status')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($deposits as $deposit)
                                    <tr>
                                        <td>
                                            {{showDateTime($deposit->created_at)}}
                                        </td>
                                        <td>
                                            {{ $deposit->reference }}
                                        </td>
                                        <td>
                                            {{  \App\Models\Method::find($deposit->method_id)->name }}
                                        </td>
                                        <td>
                                            {{ $deposit->amount }}
                                        </td>
                                        <td>
                                            @if($deposit->status == 1)
                                            <span class="badge badge-success">@lang('Approved')</span>
                                            @elseif ($deposit->status == 0)
                                            <span class="badge badge-primary">@lang('Pending')</span>
                                            @elseif ($deposit->status == 2)
                                            <span class="badge badge-danger">@lang('Rejected')</span>
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