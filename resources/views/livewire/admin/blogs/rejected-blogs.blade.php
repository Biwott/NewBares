<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-12">
            <h3 class="ml-3 text-danger">
                Rejected Blog Posts
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @forelse($posts as $post)
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h2><a href="{{url('/').'/blog/'.$post['slug']}}">{{ $post['title'] }}</a></h2>
                            <p>{!! $post['body'] !!}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-3">
                            Posted by
                            <strong><a target="_blank"
                                    href="{{'/admin/users/detail/'.$post['user_id']}}">{{ \App\Models\User::find($post['user_id'])->username }}</a>
                            </strong>
                        </div>
                        <div class="col-md-3">
                            Approved Blogs:
                            <strong>{{ \App\Models\Blogpay::where('user_id',$post['user_id'] )->count() }} </strong>

                        </div>
                        <div class="col-md-3">
                            Blog Earnings:<strong>
                                {{ convertCurrency(\App\Models\User::find($post['user_id']), \App\Models\Blogpay::where('user_id',$post['user_id'] )->sum('amount')) }}</strong>
                        </div>

                        <div class="col-md-3">
                            Country:
                            <strong>
                                {{ \App\Models\Currency::find(\App\Models\User::find($post['user_id'])->currency_id)->country }}
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="card">
                <div class="card-body">
                    <p>{{$empty_message}}</p>
                </div>
            </div>
            @endforelse

            <div class="row">
                <div class="col-12">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>