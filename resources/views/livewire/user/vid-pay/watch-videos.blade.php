<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-md-5 align-self-center">
        </div>
        <div class="col-md-7 d-flex justify-content-end align-self-center d-none d-md-flex">
            <div class="d-flex">
                <div class="dropdown mr-2 hidden-sm-down">
                    <a href="javascript:void(0)" class="btn btn-secondary">
                        Video Balance: {{convertCurrency(auth()->user(),  $balance)}}
                    </a>
                </div>
                <div class="dropdown mr-2 hidden-sm-down">
                    <a href="{{route('user.vidpay.withdraw')}}" class="btn btn-primary">
                        <i class="mdi mdi-minus-circle"></i>
                        Withdraw Funds
                    </a>
                </div>
                <a href="{{route('user.vidpay.subscribe')}}" class="btn btn-info"><i class="mdi mdi-plus-circle"></i>
                    Subscribe Now
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- column -->
        @if($subscribed==1)
        <!-- Card -->
        @forelse($videos as $video)
        <div class="col-md-3">
            <div class="card">
                <img id="img" class="card-img-top img-responsive" alt="Thumnail"
                    src="http://i2.ytimg.com/vi/{{$video->slug}}/hqdefault.jpg">
                <div class="card-body">
                    <h4 class="card-title mb-0">{{mb_strimwidth($video->title, 0, 40, "...")}}</h4>
                    {{-- <p class="card-text mb-0">{{mb_strimwidth($video->description, 0, 30, "...")}}</p> --}}

                    @if(!$video->watches()->exists()|| $video->watches()->exists() && $video->watches[0]->status==0 )

                    <p class="card-text mb-0"><i> {{convertCurrency(auth()->user(),  $video->reward)}}</i></p>
                    <a href="{{ route('user.vidpay.view', ['video' => $video])}}" class="btn btn-sm btn-success">
                        <i class="fas fa-play-circle "></i>
                        Watch Now
                    </a>
                    @elseif ($video->watches()->exists() && $video->watches[0]->status==1 )
                    <p class="card-text mb-0"><i>Received {{convertCurrency(auth()->user(),  $video->reward)}}</i></p>
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger">
                        <i class="fas fa-play-circle "></i>
                        Already Viewed
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-3">
            <div class="card">
                <img id="img" class="card-img-top img-responsive" alt="Thumnail"
                    src="http://i2.ytimg.com/vi/Zhac_t3nmBw/hqdefault.jpg">
                <div class="card-body">
                    <h4 class="card-title mb-0">No Video Available</h4>
                    <p class="card-text mb-0">No Video Available</p>
                    <p class="card-text mb-0"><i>No Video Available</i></p>
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger">
                        <i class="fas fa-play-circle "></i>
                        None Available
                    </a>
                </div>
            </div>
        </div>
        @endforelse
        @else
        <!-- Card -->
        @forelse($free_vids as $free_vid)
        <div class="col-md-3">
            <div class="card">
                <img id="img" class="card-img-top img-responsive" alt="Thumnail"
                    src="http://i2.ytimg.com/vi/{{$free_vid->slug}}/hqdefault.jpg">
                <div class="card-body">
                    <h4 class="card-title mb-0">{{mb_strimwidth($free_vid->title, 0, 40, "...")}}</h4>
                    {{-- <p class="card-text mb-0">{{mb_strimwidth($free_vid->description, 0, 30, "...")}}</p> --}}

                    @if(!$free_vid->watches()->exists()|| $free_vid->watches()->exists() &&
                    $free_vid->watches[0]->status==0 )

                    <p class="card-text mb-0"><i>{{convertCurrency(auth()->user(),  $free_vid->reward)}}</i></p>
                    <a href="{{ route('user.vidpay.view', ['video' => $free_vid])}}" class="btn btn-sm btn-success">
                        <i class="fas fa-play-circle "></i>
                        Watch Free Video
                    </a>
                    @elseif ($free_vid->watches()->exists() && $free_vid->watches[0]->status==1 )
                    <p class="card-text mb-0"><i>Received {{convertCurrency(auth()->user(),  $free_vid->reward)}}</i>
                    </p>
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger">
                        <i class="fas fa-play-circle "></i>
                        Already Viewed
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="card">
            <img id="img" class="card-img-top img-responsive" alt="Thumnail"
                src="http://i2.ytimg.com/vi/Zhac_t3nmBw/hqdefault.jpg">
            <div class="card-body">
                <h4 class="card-title mb-0">Empty</h4>
                <p class="card-text mb-0">Empty</p>
                <p class="card-text mb-0"><i>Empty</i></p>
                <a href="javascript:void(0)" class="btn btn-sm btn-danger">
                    <i class="fas fa-play-circle "></i>
                    None Now
                </a>
            </div>
        </div>
        @endforelse
        @endif
    </div>
</div>