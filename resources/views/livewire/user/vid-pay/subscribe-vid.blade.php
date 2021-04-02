<div class="container-fluid">
    <!--BLOCK ROW START-->
    <div id="generic_price_table">
        <div class="container">
            <!--BLOCK ROW START-->
            <div class="row">
                @foreach($packages as $package)
                <div class="col-md-4">
                    @if (App\Models\Subscription::where('user_id',
                    Auth::id())->where('package_id', $package->id)->exists())
                    <!--PRICE CONTENT START-->
                    <div class="generic_content clearfix">
                        <!--HEAD PRICE DETAIL START-->
                        <div class="generic_head_price clearfix">
                            <!--HEAD CONTENT START-->
                            <div class="generic_head_content clearfix">
                                <!--HEAD START-->
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span>{{$package->name}}</span>
                                </div>
                                <!--//HEAD END-->
                            </div>
                            <!--//HEAD CONTENT END-->
                            <!--PRICE START-->
                            <div class="generic_price_tag clearfix">
                                <span class="price">
                                    <span class="sign">Ksh</span>
                                    <span class="currency">{{$package->cost}}</span>
                                    <span class="cent">.00</span>
                                    {{-- <span class="month">/MON</span> --}}
                                </span>
                            </div>
                            <!--//PRICE END-->
                        </div>
                        <!--//HEAD PRICE DETAIL END-->

                        <!--FEATURE LIST START-->
                        <div class="generic_feature_list">
                            <ul>
                                <li class="pl-3 text-left"><span>></span> {{$package->feateure1}}</li>
                                <li class="pl-3 text-left"><span>></span> {{$package->feateure2}}</li>
                                <li class="pl-3 text-left"><span>></span> {{$package->feateure3}}</li>
                                <li class="pl-3 text-left"><span>></span> {{$package->feateure4}}</li>
                                <li class="pl-3 text-left"><span>></span> {{$package->feateure5}}</li>
                                <li class="pl-3 text-left"><span>></span> {{$package->feateure6}}</li>
                            </ul>
                        </div>
                        <!--//FEATURE LIST END-->
                        <!--BUTTON START-->
                        <div class="generic_price_btn clearfix">
                            <a wire:click="subscribePackage({{$package}})" href="javascript:void(0)">Add Package</a>
                        </div>
                        <!--//BUTTON END-->
                    </div>
                    <!--//PRICE CONTENT END-->
                    @else 
                    <!--PRICE CONTENT START-->
                    <div class="generic_content active clearfix">

                        <!--HEAD PRICE DETAIL START-->
                        <div class="generic_head_price clearfix">

                            <!--HEAD CONTENT START-->
                            <div class="generic_head_content clearfix">

                                <!--HEAD START-->
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span>{{$package->name}}</span>
                                </div>
                                <!--//HEAD END-->
                            </div>
                            <!--//HEAD CONTENT END-->

                            <!--PRICE START-->
                            <div class="generic_price_tag clearfix">
                                <span class="price">
                                    <span class="sign">Ksh</span>
                                    <span class="currency">{{$package->cost}}</span>
                                    <span class="cent">.00</span>
                                    {{-- <span class="month">/MON</span> --}}
                                </span>
                            </div>
                            <!--//PRICE END-->

                        </div>
                        <!--//HEAD PRICE DETAIL END-->

                        <!--FEATURE LIST START-->
                        <div class="generic_feature_list">
                            <ul>
                                <li class="pl-3 text-left"><span>></span> {{$package->feateure1}}</li>
                                <li class="pl-3 text-left"><span>></span> {{$package->feateure2}}</li>
                                <li class="pl-3 text-left"><span>></span> {{$package->feateure3}}</li>
                                <li class="pl-3 text-left"><span>></span> {{$package->feateure4}}</li>
                                <li class="pl-3 text-left"><span>></span> {{$package->feateure5}}</li>
                                <li class="pl-3 text-left"><span>></span> {{$package->feateure6}}</li>
                            </ul>
                        </div>
                        <!--//FEATURE LIST END-->

                        <!--BUTTON START-->
                        <div class="generic_price_btn clearfix">
                            <a wire:click="subscribePackage({{$package}})" href="javascript:void(0)">
                                Purchase
                            </a>
                        </div>

                        <!--//BUTTON END-->

                    </div>
                    <!--//PRICE CONTENT END-->
                    @endif
                </div>
                @endforeach
            </div>
            <!--//BLOCK ROW END-->
        </div>
    </div>
</div>
@push('css')
<link href="{{asset('dist/css/pricing.css')}}" rel="stylesheet">
@endpush