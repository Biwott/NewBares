<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="#">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{asset('assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="{{asset('assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                    <!-- dark Logo text -->
                    <img src="{{asset('assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                    <!-- Light Logo text -->
                    <img src="{{asset('assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" />
                </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light"
                        href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-arrow-left"></i></a>
                </li>
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                        <div class="notify">
                            @if(auth()->user()->unreadNotifications->count()>0)
                            <span class="heartbit"></span>
                            <span class="point"></span>
                            @endif
                        </div>
                    </a>
                    <div class="dropdown-menu mailbox animated bounceInDown">
                        <ul class="list-style-none">
                            <li>
                                <div class="font-weight-medium border-bottom rounded-top py-3 px-4">
                                    Notifications
                                    @if(auth()->user()->unreadNotifications->count()>0)
                                    <div>
                                        <h6 class="m-b-0 m-t-5">{{auth()->user()->unreadNotifications->count()}}
                                            @if(auth()->user()->unreadNotifications->count()==1)
                                            New Notification
                                            @else
                                            New Notifications
                                            @endif</h6>

                                    </div>
                                    @else
                                    <div>
                                        <span class="font-light">No New</span>
                                        <span class="font-light">Notifications</span>
                                    </div>
                                    @endif
                                </div>
                            </li>
                            <li>
                                <div class="message-center notifications position-relative" style="height:250px;">
                                    @forelse(auth()->user()->unreadNotifications as $unreadNotification)
                                    <!-- Message -->
                                    <a href="{{ route('user.misc.notify') }}"
                                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                        <span class="btn btn-primary rounded-circle btn-circle"><i
                                                class="ti-bell"></i></span>
                                        <div class="w-75 d-inline-block v-middle pl-2">
                                            <h5 class="message-title mb-0 mt-1">{{$unreadNotification->data['title']}}
                                            </h5>
                                            <span class="font-12 text-nowrap d-block text-muted text-truncate">
                                                {{$unreadNotification->data['body']}}
                                            </span>
                                            <span class="font-12 text-nowrap d-block text-muted">
                                                {{showDiffHuman($unreadNotification->created_at)}}
                                            </span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    @empty
                                    <!-- Message -->
                                    <a href="{{ route('user.misc.notify') }}"
                                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                        <span class="btn btn-primary rounded-circle btn-circle"><i
                                                class="ti-bell"></i></span>
                                        <div class="w-75 d-inline-block v-middle pl-2">
                                            <h5 class="message-title mb-0 mt-1">No New Notifation
                                            </h5>
                                            <span class="font-12 text-nowrap d-block text-muted text-truncate">
                                                Nothing to Display
                                            </span>
                                            <span class="font-12 text-nowrap d-block text-muted">
                                            </span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    @endforelse
                                </div>
                            </li>
                            <li>
                                <a class="nav-link border-top text-center text-dark pt-3"
                                    href="{{ route('markAsRead')}}">
                                    <strong>Mark all as Read</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- End Comment -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Messages -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End Messages -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- mega menu -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End mega menu -->
                <!-- ============================================================== -->
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                            src="{{ \Laravolt\Avatar\Facade::create(auth()->user()->first_name.' '.auth()->user()->last_name)->toBase64() }}"
                            alt="user" width="36"></a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <div class="d-flex no-block align-items-center p-3 mb-2 border-bottom">
                            <div class=""><img
                                    src="{{ \Laravolt\Avatar\Facade::create(auth()->user()->first_name.' '.auth()->user()->last_name)->toBase64() }}"
                                    alt="user" class="rounded" width="80">
                            </div>
                            <div class="ml-2">
                                <h4 class="mb-0">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</h4>
                                <p class=" mb-0"><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                        data-cfemail="e1978093948fa1868c80888dcf828e8c">{{auth()->user()->username}}</a></p>
                                <a href="/user/settings/profile" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                            </div>
                        </div>
                        <a class="dropdown-item" href="/user/settings/profile"><i class="ti-user mr-1 ml-1"></i> My
                            Profile</a>
                        <a class="dropdown-item" href="/user/dashboard"><i class="ti-wallet mr-1 ml-1"></i> My
                            Balance</a>
                        <a class="dropdown-item" href="/user/misc/notify"><i class="ti-email mr-1 ml-1"></i> Inbox</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/user/settings/profile"><i class="ti-settings mr-1 ml-1"></i> Account
                            Setting</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <livewire:auth.logout2 /></a>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- create new -->
                <!-- ============================================================== -->

            </ul>
        </div>
    </nav>
</header>