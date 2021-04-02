<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$user->username."'s ".$page_title}}</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered m-b-0 ">
                                <thead>
                                    <tr>
                                        <th scope="col">{{__('Watch Date')}}</th>
                                        <th scope="col">{{__('Video Name')}}</th>
                                        <th scope="col">{{__('Video Length')}}</th>
                                        <th scope="col">{{__('Completion')}}</th>
                                        <th scope="col">{{__('Reward')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($watches as $watch)
                                    <tr>
                                        <td>
                                            {{ showDateTime($watch->updated_at)}}
                                        </td>
                                        <td>
                                            {{ mb_strimwidth($watch->video->title, 0, 40, "...") }}
                                        </td>
                                        <td>
                                            {{  $watch->time . " seconds"}}
                                        </td>
                                        <td>
                                            {{ $watch->percentage ."%"}}
                                        </td>


                                        <td>
                                            @if($watch->status == 1)
                                            {{'Ksh '. $watch->video->reward }}
                                            @elseif ($watch->status == 0)
                                            {{ 'Ksh 0.00' }}
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
                            {{ $watches->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>