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
                                        <th scope="col">{{__('Date')}}</th>
                                        <th scope="col">{{__('Package Name')}}</th>
                                        <th scope="col">{{__('Package Cost')}}</th>
                                        <th scope="col">{{__('Wait ID')}}</th>
                                        <th scope="col">{{__('Expected Income')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($subscriptions as $subscription)
                                    <tr>
                                        <td>{{ showDateTime($subscription->created_at)}}</td>
                                        <td>{{ $subscription->package()->pluck('name')[0] }}</td>
                                        <td>
                                            {{ number_format($subscription->package()->pluck('cost')[0]) }}
                                        </td>
                                        <td>
                                            @if($subscription->status==1)
                                            <span class="badge badge-pill badge-success">@lang('Paid')</span>
                                            @else
                                            <span class="badge badge-pill badge-primary">
                                                Wait
                                                <b>
                                                    {{$subscription->count -$subscription->package()->pluck('slot')[0] + 1}}
                                                </b>
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            <b>
                                                {{ number_format($subscription->package()->pluck('earning')[0]) }}
                                            </b>
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
                            {{ $subscriptions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>