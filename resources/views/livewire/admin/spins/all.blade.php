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
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap dataTable"
                                        role="grid" aria-describedby="zero_config_info">
                                        <colgroup>
                                            <col span="1" style="width: 10%;">
                                            <col span="1" style="width: 10%;">
                                            <col span="1" style="width: 15%;">
                                            <col span="1" style="width: 10%;">
                                            <col span="1" style="width: 10%;">
                                            <col span="1" style="width: 10%;">
                                            <col span="1" style="width: 10%;">
                                            <col span="1" style="width: 10%;">
                                            <col span="1" style="width: 15%;">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th style="column-width: 10px;">Name</th>
                                                <th>Min</th>
                                                <th>Max</th>
                                                <th>Spin From</th>
                                                <th>Spin To</th>
                                                <th>Limit</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($spins as $spin)
                                            <tr>
                                                <td>
                                                    {{ $spin->name}}
                                                </td>
                                                <td>
                                                    {{ $spin->min_amount }}
                                                </td>
                                                <td>
                                                    {{ $spin->max_amount }}
                                                </td>
                                                <td>
                                                    {{showDateTime( $spin->spin_from) }}
                                                </td>
                                                <td>
                                                    {{showDateTime( $spin->spin_to) }}
                                                </td>
                                                <td>
                                                    {{ $spin->spin_limit }}
                                                </td>
                                                <td>

                                                    @if ($spin->status == 0)
                                                    <span class="badge badge-pill badge-danger">
                                                        @lang('Disabled')
                                                    </span>
                                                    @elseif ($spin->status == 1)
                                                    <span class="badge badge-pill badge-success">
                                                        @lang('Active')
                                                    </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($spin->name == 'Free')
                                                    <button data-toggle="modal" data-target="#updateFreeSpin"
                                                        wire:click.prevent="edit({{ $spin }})"
                                                        class="btn btn-primary btn-sm">Edit</button>
                                                    @endif
                                                    <div wire:ignore.self class="modal fade" id="updateFreeSpin"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Edit Free Spin
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <input type="hidden" wire:model="spin_id">
                                                                            <label for="minimum">Minimum Gain</label>
                                                                            <input type="text" class="form-control"
                                                                                wire:model="minimum" id="minimum">
                                                                            @error('minimum') <span
                                                                                class="text-danger">{{ $message }}</span>@enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="maximum">Maximum Gain</label>
                                                                            <input type="text" class="form-control"
                                                                                wire:model="maximum" id="maximum">
                                                                            @error('maximum') <span
                                                                                class="text-danger">{{ $message }}</span>@enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="date_from">DateTime From</label>
                                                                            <input type="datetime-local" class="form-control"
                                                                                wire:model="date_from" id="date_from">
                                                                            @error('date_from') <span
                                                                                class="text-danger">{{ $message }}</span>@enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="date_to">DateTime To</label>
                                                                            <input type="datetime-local" class="form-control"
                                                                                wire:model="date_to" id="date_to">
                                                                            @error('date_to') <span
                                                                                class="text-danger">{{ $message }}</span>@enderror
                                                                        </div>
                                                                        <div class="form-group">

                                                                            <label for="limit">Spin Limit</label>
                                                                            <input type="text" class="form-control"
                                                                                wire:model="limit" id="limit">
                                                                            @error('limit') <span
                                                                                class="text-danger">{{ $message }}</span>@enderror
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" wire:click.prevent="cancel()"
                                                                        class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="button" wire:click.prevent="update()"
                                                                        class="btn btn-primary"
                                                                        data-dismiss="modal">Save
                                                                        changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                    {{ $spins->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>