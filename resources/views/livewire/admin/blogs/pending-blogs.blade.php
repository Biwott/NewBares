<div class="container-fluid">
    <div class="row">
        <div class="row mb-2">
            <div class="col-12">
                <h3 class="ml-3 text-dark">
                    Pending Blog Posts
                </h3>
            </div>
        </div>
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
                            Posted by:
                            <strong><a target="_blank"
                                    href="{{'/admin/users/detail/'.$post['user_id']}}">{{ \App\Models\User::find($post['user_id'])->username }}</a>
                            </strong>
                        </div>
                        <div class="col-md-3">
                            Approved Blogs:
                            <strong>
                                {{ \App\Models\Blogpay::where('user_id',$post['user_id'] )->count() }}
                            </strong>
                        </div>
                        <div class="col-md-3">
                            Blog Earnings:
                            <strong>
                                {{ convertCurrency(\App\Models\User::find($post['user_id']), \App\Models\Blogpay::where('user_id',$post['user_id'] )->sum('amount')) }}
                            </strong>
                        </div>
                        <div class="col-md-3">
                            Country:
                            <strong>
                                {{ \App\Models\Currency::find(\App\Models\User::find($post['user_id'])->currency_id)->country }}
                            </strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="mt-2 mr-0 approveBtn btn btn-success  
                            md-trigger btn-sm feather icon-check-square f-12" data-id="{{ $post->id }}">
                                Approve
                            </button>
                            <button class="mt-2 mx-0 declineBtn btn btn-danger   
                            md-trigger btn-sm feather icon-x-square f-12">
                                Decline
                            </button>
                        </div>
                        {{-- Approve Withdrawal Logic --}}
                        <div id="modal-approve" class="modal fade" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Approve User Blog</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form wire:submit.prevent="approve({{$post}})">

                                        <input type="hidden" name="id">
                                        <div class="modal-body">
                                            <h6>Do you want to <span class="font-weight-bold">APPROVE</span>
                                                {{\App\Models\User::find($post->user_id)->first_name }}
                                                {{\App\Models\User::find($post->user_id)->last_name}}'s
                                                Blog of Ksh.{{$amount}}?
                                            </h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Approve</button>
                                            <button type="button" class="btn btn-dark"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Decline Withdrawal Logic --}}
                        <div id="modal-decline" class="modal fade" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Reject User Blog
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form wire:submit.prevent="decline({{$post}})">
                                        <input type="hidden" name="id">
                                        <div class="modal-body">
                                            <h6>Do you want to <span class="font-weight-bold">REJECT</span>
                                                <span class="font-weight-bold withdraw-user"></span>'s
                                                Blog?
                                            </h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger">Reject</button>
                                            <button type="button" class="btn btn-dark"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
@push('scripts')
<script>
    $('.approveBtn').on('click', function() {
    var modal = $('#modal-approve');
    modal.find('input[name=id]').val($(this).data('id'));
    modal.find('.withdraw-amount').text($(this).data('amount'));
    modal.find('.withdraw-user').text($(this).data('username'));
    modal.modal('show');
});        
$('.declineBtn').on('click', function() {
    var modal = $('#modal-decline');
    modal.find('input[name=id]').val($(this).data('id'));
    modal.find('.withdraw-amount').text($(this).data('amount'));
    modal.find('.withdraw-user').text($(this).data('username'));
    modal.modal('show');
});       

</script>
@endpush