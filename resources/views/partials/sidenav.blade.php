<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{route('user.dashboard')}}"
                        aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Dashboard
                        </span>
                    </a>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i data-feather="credit-card"
                            class="feather-icon"></i><span class="hide-menu">My Wallet</span></a>
                    <ul aria-expanded="false" class="collapse first-level">

                        <li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="download" class="feather-icon"></i> <span
                                    class="hide-menu">Deposit</span></a>
                            <ul aria-expanded="false" class="collapse second-level">
                                <li class="sidebar-item ml-4">
                                    <a href="{{route('user.deposit.funds')}}" class="sidebar-link">
                                        <span class="hide-menu">
                                            Deposit Now
                                        </span>
                                    </a>
                                </li>
                                <li class="sidebar-item ml-4">
                                    <a href="  {{route('user.deposit.history')}}" class="sidebar-link">
                                        <span class="hide-menu">
                                            Deposit History
                                        </span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="upload" class="feather-icon"></i> <span
                                    class="hide-menu">Withdrawal</span></a>
                            <ul aria-expanded="false" class="collapse second-level">
                                <li class="sidebar-item ml-4"><a href="{{route('user.withdrawal.funds')}}"
                                        class="sidebar-link"><span class="hide-menu">
                                            Withdraw
                                            Now</span></a>
                                </li>
                                <li class="sidebar-item ml-4"><a href="{{route('user.withdrawal.history')}}"
                                        class="sidebar-link"><span class="hide-menu">
                                            Withdrawal
                                            History</span></a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i data-feather="trending-up"
                            class="feather-icon"></i><span class="hide-menu">Forex Option </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('user.trade.forex')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Cypto Trade
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('user.trade.pending-orders')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Pending Orders
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('user.trade.history')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Trading History
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('user.trade.withdrawal.history')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Withdrawal History
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i data-feather="trello"
                            class="feather-icon rotate-refresh"></i><span class="hide-menu">Blog and Earn </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{url(config('canvas.path').'/posts/create')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Post Blog
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('canvas')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Blog Stats
                                </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{route('user.blogs.earnings')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Pay History
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i data-feather="aperture"
                            class="feather-icon rotate-refresh"></i><span class="hide-menu">Spin </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('user.spin.lucky')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Lucky Spin
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('user.spin.welcome')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Welcome Spin
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('user.spin.free')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Free Spin
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i data-feather="box"
                            class="feather-icon"></i><span class="hide-menu">Super Invest </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('user.package.all')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Purchase Package
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('user.package.history')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Investment History
                                </span>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i data-feather="film"
                            class="feather-icon"></i><span class="hide-menu">VidPay Earn </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('user.vidpay.videos')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Watch Videos
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('user.vidpay.history')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Earning History
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('user.vidpay.withdrawals')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Withdrawal History
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i data-feather="link"
                            class="feather-icon"></i><span class="hide-menu">Referal Earnings </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href=" {{route('user.affiliates.join')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Join Referals
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('user.affiliates.activate')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Activate User
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('user.affiliates.dormant')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Dormant Referals
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i data-feather="sliders"
                            class="feather-icon"></i><span class="hide-menu">Account Settings
                        </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href=" {{route('user.settings.profile')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Edit Profile
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('user.settings.password')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Change Password
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('user.misc.notify')}}" aria-expanded="false"><i data-feather="bell"
                            class="feather-icon"></i><span class="hide-menu">User Notification</span></a></li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i data-feather="help-circle" class="feather-icon rotate-refresh"></i>
                        <span class="hide-menu">Help</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('user.misc.support')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Contact Support
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('user.misc.help')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    How It Works
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                        <livewire:auth.logout />
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Notifications"><i class="mdi mdi-bell-outline"></i></a>
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>