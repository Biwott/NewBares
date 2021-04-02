<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">My Referal Link</h6>
                    <div class="row align-center">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="text" id="copyReferal" name="copyReferal" class="form-control"
                                    value="{{url('/').'/register/'.Auth::user()->username}}"
                                    style="background: none !important" readonly>
                                <div class="input-group-append">
                                    <span onclick="copyFunction()" class="btn btn-info">
                                        <span class="">Copy Link</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <h4 class="card-title">{{$page_title}}</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered m-b-0 ">
                                <thead>
                                    <tr>
                                        <th>Payment Date</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th>Commision</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($referals as $referal)
                                    <tr>
                                        <td>
                                            {{showDateTime($referal->created_at)}}
                                        </td>
                                        <td>
                                            <label style="text-transform: capitalize">
                                                {{\App\Models\User::find($referal->referal_id)->first_name}}
                                            </label>
                                        </td>
                                        <td>
                                            <label style="text-transform: capitalize">
                                                {{\App\Models\User::find($referal->referal_id)->last_name}}
                                            </label>
                                        </td>
                                        <td>
                                            {{\App\Models\User::find($referal->referal_id)->username}}
                                        </td>
                                        <td>
                                            <b> {{convertCurrency(auth()->user(),$referal->amount) }}</b>
                                        </td>
                                        <td>
                                            @if ($referal->status==1)
                                            <span class="badge badge-success">@lang('Paid')</span>
                                            @elseif($referal->status==2)
                                            <span class="badge badge-danger">@lang('Reversed')</span>
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
                            {{ $referals->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    function copyFunction() {
    var copyText = document.getElementById("copyReferal");
    copyText.select();
    copyText.setSelectionRange(0, 99999); 
    document.execCommand("copy");
  }
</script>
@endpush