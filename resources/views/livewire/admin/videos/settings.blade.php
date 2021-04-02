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




                                            <button data-toggle="modal" data-target="#createNewVideo"
                                                class="btn btn-success"><i class="mdi mdi-plus-circle"></i> New
                                                Video</button>
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap dataTable"
                                        role="grid" aria-describedby="zero_config_info">
                                        <colgroup>
                                            <col span="1" style="width: 10%;">
                                            <col span="1" style="width: 3%;">
                                            <col span="1" style="width: 15%;">
                                            <col span="1" style="width: 10%;">
                                            <col span="1" style="width: 10%;">
                                            <col span="1" style="width: 10%;">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>Date Active</th>
                                                <th>Title</th>
                                                <th>Video Slug</th>                                            
                                                <th>Reward</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($videos as $video)
                                            <tr>
                                                <td>
                                                    {{showDateTime( $video->date_active) }}
                                                </td>
                                                <td>
                                                    {{ mb_strimwidth($video->title, 0, 40, "...")}}
                                                </td>

                                                <td>
                                                    {{ $video->slug}}
                                                </td>

                                                <td>
                                                    {{ $video->reward }}
                                                </td>
                                                <td>

                                                    <button data-toggle="modal" data-target="#updateVideo"
                                                        wire:click.prevent="edit({{ $video }})"
                                                        class="btn btn-primary btn-sm">Edit</button>

                                                    {{-- Edit Video Modal --}}
                                                    <div wire:ignore.self class="modal fade" id="updateVideo"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Edit Video
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <input type="hidden" wire:model="video_id">
                                                                            <label for="slug">
                                                                                Video Slug
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                wire:model="slug" id="slug">
                                                                            @error('slug') <span
                                                                                class="text-danger">{{ $message }}</span>@enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="title">
                                                                                Video Title
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                wire:model="title" id="title">
                                                                            @error('title') <span
                                                                                class="text-danger">{{ $message }}</span>@enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="description">
                                                                                Video Description
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                wire:model="description"
                                                                                id="description">
                                                                            @error('description') <span
                                                                                class="text-danger">{{ $message }}</span>@enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="date_active">
                                                                                Date Active
                                                                            </label>
                                                                            <input type="datetime-local"
                                                                                class="form-control"
                                                                                wire:model="date_active"
                                                                                id="date_active">
                                                                            @error('date_active') <span
                                                                                class="text-danger">{{ $message }}</span>@enderror
                                                                        </div>
                                                                        <div class="form-group">

                                                                            <label for="reward">
                                                                                Video Reward
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                wire:model="reward" id="reward">
                                                                            @error('reward') <span
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


                                                    {{-- Create Video Modal --}}
                                                    <div wire:ignore.self class="modal fade" id="createNewVideo"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Edit Video
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <input type="hidden" wire:model="video_id">
                                                                            <label for="slug">
                                                                                Video Slug
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                wire:model="slug" id="slug">
                                                                            @error('slug') <span
                                                                                class="text-danger">{{ $message }}</span>@enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="title">
                                                                                Video Title
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                wire:model="title" id="title">
                                                                            @error('title') <span
                                                                                class="text-danger">{{ $message }}</span>@enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="description">
                                                                                Video Description
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                wire:model="description"
                                                                                id="description">
                                                                            @error('description') <span
                                                                                class="text-danger">{{ $message }}</span>@enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="date_active">
                                                                                Date Active
                                                                            </label>
                                                                            <input type="datetime-local"
                                                                                class="form-control"
                                                                                wire:model="date_active"
                                                                                id="date_active">
                                                                            @error('date_active') <span
                                                                                class="text-danger">{{ $message }}</span>@enderror
                                                                        </div>
                                                                        <div class="form-group">

                                                                            <label for="reward">
                                                                                Video Reward
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                wire:model="reward" id="reward">
                                                                            @error('reward') <span
                                                                                class="text-danger">{{ $message }}</span>@enderror
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" wire:click.prevent="cancel()"
                                                                        class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="button" wire:click.prevent="store()"
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
                                    {{ $videos->links() }}
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
<script type="text/javascript">
    window.livewire.on('videoStore', () => {
        $('#createNewVideo').modal('hide');
    });
</script>
@endpush