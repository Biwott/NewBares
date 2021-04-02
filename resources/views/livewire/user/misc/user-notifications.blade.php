<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">My Notification</h5>
                    <h6 class="card-subtitle">check out your nofication history</h6>
                    <div class="steamline m-t-40">
                        @forelse(auth()->user()->notifications()->paginate(5) as $notification)
                        <div class="sl-item">
                            <div class="sl-left bg-success"> <span class="btn btn-primary rounded-circle btn-circle"><i
                                        class="fa fa-bell"></i></span></div>
                            <div class="sl-right">
                                <div class="font-medium"> {{$notification->data['title']}}
                                    <span class="sl-date">
                                        {{showDiffHuman($notification->created_at)}}
                                    </span>
                                </div>
                                <div class="desc"> {{$notification->data['body']}}</div>
                            </div>
                        </div>
                        @empty
                        <div class="sl-item">
                            <div class="sl-left bg-success"> <span class="btn btn-danger rounded-circle btn-circle"><i
                                        class="fa fa-bell"></i></span></div>
                            <div class="sl-right">
                                <div class="font-medium">No Notification</div>
                                <div class="desc">Nothing to display </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>