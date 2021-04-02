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
                                        <h4 class="card-title">{{$user->username."'s ".$page_title}}</h4>
                                    </div>                                  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap dataTable"
                                        role="grid" aria-describedby="zero_config_info">
                                        <thead>
                                            <tr>
                                                <th scope="col">Date</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">IP</th>
                                                <th scope="col">Location</th>
                                                <th scope="col">Browser</th>
                                                <th scope="col">OS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($logins as $login)
                                            <tr>
                                                <td>
                                                    {{ showDiffHuman($login->created_at) }}
                                                </td>
                                                <td>
                                                    {{ \App\Models\User::find($login->user_id)->username }}
                                                </td>
                                                <td>
                                                    {{ $login->user_ip }}
                                                </td>
                                                <td>
                                                    {{ $login->location }}
                                                </td>
                                                <td>
                                                    {{ $login->browser }}
                                                </td>
                                                <td>
                                                    {{ $login->os }}
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
                                    {{ $logins->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>