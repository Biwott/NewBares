<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$user->username."\'s ".$page_title}}</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered m-b-0 ">
                                <thead>
                                    <tr>
                                        <th scope="col">@lang('Date')</th>                                       
                                        <th scope="col">@lang('Code')</th>
                                        <th scope="col">@lang('Blog Title')</th>
                                        <th scope="col">@lang('Amount')</th>                                       
                                        <th scope="col">@lang('Status')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($blogpays as $blogpay)
                                    <tr>
                                        <td>
                                            {{$blogpay->created_at }}
                                        </td>
                                        <td>
                                            {{ $blogpay->code}}
                                        </td>
                                        <td>
                                            {{ \Canvas\Models\Post::find($blogpay->post_id)->title}}
                                        </td>
                                        <td>
                                            {{ $blogpay->amount}}
                                        </td>
                                        <td>
                                            @if($blogpay->status == 1)
                                            <span class="badge badge-success">@lang('Approved')</span>
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
                            {{ $blogpays->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>