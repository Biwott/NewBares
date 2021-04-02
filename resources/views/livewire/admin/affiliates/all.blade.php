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
                                                <th>Join Date</th>
                                                <th>User Active</th>
                                                <th>Username</th>
                                                <th>Phone</th>
                                                <th>Referrered by</th>
                                                <th>Referer Phone</th>
                                                <th>Commision Paid</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($users as $user)
                                            <tr>

                                                <td>{{showDateTime($user->create_at)}}
                                                </td>
                                                <td>
                                                    @if($user->subscriptions()->exists())
                                                    <label class="badge badge-pill badge-success">Active</label>
                                                    @else
                                                    <label class="badge badge-pill badge-warning">Dormant</label>
                                                    @endif
                                                </td>
                                                <td>{{$user->username}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td>{{App\Models\User::find($user->referer_id)->username}}</td>
                                                <td>{{App\Models\User::find($user->referer_id)->phone}}</td>

                                                <td>
                                                    @if($user->subscriptions()->exists())
                                                    Ksh {{                                                
                                                   (App\Models\Package::where('id', $user->subscriptions->first()['package_id'])->pluck('cost')[0]*0.1)
                                                }}
                                                    @else
                                                    <label>0</label>
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
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>