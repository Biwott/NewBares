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
                                                class="form-control" placeholder="Search By Username/ Phone">
                                        </div>

                                        <div class="input-group">
                                            <div class="checkbox">
                                                <input id="phone" type="checkbox" wire:model="phone_checked" checked="">
                                                <label class="mb-0" for="checkbox0">Search by Phone </label>
                                            </div>
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
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Balance</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($users as $user)
                                            <tr>
                                                <td>
                                                    {{ $user->first_name}}
                                                </td>
                                                <td>
                                                    {{ $user->last_name }}
                                                </td>
                                                <td>
                                                    {{ $user->username }}
                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td>
                                                    {{ $user->phone }}
                                                </td>
                                                <td>
                                                    <b> {{ number_format($user->balance, 2) }} </b>
                                                </td>
                                                <th>                                                
                                                    @if ($user->active == 1)
                                                    <span class="badge badge-success">@lang('Active')</span>
                                                    @else
                                                    <span class="badge badge-warning">@lang('Dormant')</span>
                                                    @endif
                                                </th>
                                                <td>
                                                    <a href="{{ route('admin.users.detail', $user) }}"
                                                        class="btn btn-primary btn-xs " style="height:24px">
                                                        <i class="mdi mdi-monitor"
                                                            style="width: 200px; height: 200px"></i>
                                                    </a>
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