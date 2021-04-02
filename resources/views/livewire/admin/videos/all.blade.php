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
                                                <th>Date</th>
                                                <th>Code</th>
                                                <th>Username</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($vidrawals as $vidrawal)
                                            <tr>
                                                <td>{{showDateTime($vidrawal->created_at)}}
                                                </td>
                                                <td>{{ $vidrawal->code }}</td>
                                                <td style="text-transform: lowercase">
                                                    <a
                                                        href="{{'/admin/users/detail/'.$vidrawal->user_id}}">{{ $vidrawal->user()->pluck('username')->first() }}</a>
                                                </td>

                                                <td>{{ convertCurrency(\App\Models\User::find($vidrawal->user_id), $vidrawal->amount) }}
                                                </td>
                                                <td>
                                                    @if(request()->is('admin/videos/pending'))
                                                    <button class="approveBtn btn btn-success  
                                                    md-trigger btn-sm feather icon-check-square f-12"
                                                        data-id="{{ $vidrawal->id }}"
                                                        data-amount="{{ convertCurrency(\App\Models\User::find($vidrawal->user_id), $vidrawal->amount) }}"
                                                        data-username="{{ $vidrawal->user()->pluck('username')->first() }}">
                                                        Approve
                                                    </button>
                                                    <button class="declineBtn btn btn-danger   
                                                    md-trigger btn-sm feather icon-x-square f-12"
                                                        data-id="{{ $vidrawal->id }}"
                                                        data-amount="{{ convertCurrency(\App\Models\User::find($vidrawal->user_id), $vidrawal->amount) }}"
                                                        data-username="{{ $vidrawal->user()->pluck('username')->first() }}">
                                                        Decline
                                                    </button>

                                                    {{-- Approve Withdrawal Logic --}}
                                                    <div id="modal-approve" class="modal fade" tabindex="-1"
                                                        role="dialog">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Approve User Withdrawal</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form wire:submit.prevent="approve({{$vidrawal}})">

                                                                    <input type="hidden" name="id">
                                                                    <div class="modal-body">
                                                                        <h6>Do you want to <span
                                                                                class="font-weight-bold">APPROVE</span>
                                                                            <span
                                                                                class="font-weight-bold withdraw-amount text-success"></span>
                                                                            Withdrawal of <span
                                                                                class="font-weight-bold withdraw-user"></span>?
                                                                        </h6>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Approve</button>
                                                                        <button type="button" class="btn btn-dark"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Decline Withdrawal Logic --}}
                                                    <div id="modal-decline" class="modal fade" tabindex="-1"
                                                        role="dialog">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Decline User Withdrawal
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form wire:submit.prevent="decline({{$vidrawal}})">
                                                                    <input type="hidden" name="id">
                                                                    <div class="modal-body">
                                                                        <h6>Do you want to <span
                                                                                class="font-weight-bold">REJECT</span>
                                                                            <span
                                                                                class="font-weight-bold withdraw-amount text-danger"></span>
                                                                            Withdrawal of
                                                                            <span
                                                                                class="font-weight-bold withdraw-user"></span>?
                                                                        </h6>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Reject</button>
                                                                        <button type="button" class="btn btn-dark"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @else
                                                    @if($vidrawal->status == 0)
                                                    <span class="badge badge-pill badge-primary">@lang('Pending')</span>
                                                    @elseif ($vidrawal->status == 1)
                                                    <span
                                                        class="badge badge-pill badge-success">@lang('Approved')</span>
                                                    @elseif ($vidrawal->status == 2)
                                                    <span class="badge badge-pill badge-danger">@lang('Rejected')</span>
                                                    @endif
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
                                    {{ $vidrawals->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
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