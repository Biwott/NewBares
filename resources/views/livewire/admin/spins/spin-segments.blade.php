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

                                        <thead>
                                            <tr>
                                                <th style="column-width: 10px;">Name</th>
                                                <th>Color</th>
                                                <th>Amount</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($segments as $segment)
                                            <tr>
                                                <td>
                                                    {{ $segment->name}}
                                                </td>
                                                <td>
                                                    {{ $segment->color }}
                                                </td>
                                                <td>
                                                    {{ $segment->amount }}
                                                </td>
                                                <td>

                                                    {{-- <button class="editBtn btn btn-success  
                                                    md-trigger btn-mini feather icon-check-square f-12"
                                                        data-seg_id="{{ $segment->id }}"
                                                    data-name="{{ $segment->name }}"
                                                    data-color="{{ $segment->color }}"
                                                    data-amount="{{ $segment->amount }}">
                                                    Edit
                                                    </button> --}}
                                                    <button data-toggle="modal" data-target="#updateModal"
                                                        wire:click.prevent="edit({{ $segment }})"
                                                        class="btn btn-primary btn-sm">Edit</button>

                                                    <div wire:ignore.self class="modal fade" id="updateModal"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Modal
                                                                        title</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <input type="hidden" wire:model="seg_id">
                                                                            <label for="name">Name {{$name}}</label>
                                                                            <input type="text" class="form-control"
                                                                                wire:model="name" id="name">
                                                                            @error('name') <span
                                                                                class="text-danger">{{ $message }}</span>@enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="color">Color</label>
                                                                            <input type="text" class="form-control"
                                                                                wire:model="color" id="color">
                                                                            @error('color') <span
                                                                                class="text-danger">{{ $message }}</span>@enderror
                                                                        </div>
                                                                        <div class="form-group">

                                                                            <label for="amount">Amount</label>
                                                                            <input type="text" class="form-control"
                                                                                wire:model="amount" id="amount">
                                                                            @error('amount') <span
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
                                    {{ $segments->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- @push('scripts')
<script>
    $('.editBtn').on('click', function() {
   var modal = $('#modal-approve');
   modal.find('input[id=seg_id]').val($(this).data('seg_id'));
    modal.find('input[id=name]').val($(this).data('name'));
    modal.find('input[id=color]').val($(this).data('color'));
    modal.find('input[id=amount]').val($(this).data('amount'));
    modal.modal('show');
});        
     

</script>
@endpush --}}