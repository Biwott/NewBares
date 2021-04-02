<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$username."\'s ".$page_title}}</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered m-b-0 ">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th>Mobile</th>
                                        <th>Commision</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($referals as $referal)
                                    <tr>
                                        <td>
                                            <label style="text-transform: capitalize">
                                                {{\App\Models\User::find($referal->user_id)->first_name}}
                                            </label>
                                        </td>
                                        <td>
                                            <label style="text-transform: capitalize">
                                                {{\App\Models\User::find($referal->user_id)->last_name}}
                                            </label>
                                        </td>
                                        <td>
                                            <label style="text-transform: capitalize">
                                                {{\App\Models\User::find($referal->user_id)->username}}
                                            </label>
                                        </td>
                                        <td>{{\App\Models\User::find($referal->user_id)->phone}}</td>
                                        <td>
                                            {{ $referal->amount }}
                                        </td>
                                        <td>{{showDateTime($referal->created_at)}}
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