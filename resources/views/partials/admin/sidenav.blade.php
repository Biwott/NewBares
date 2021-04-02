<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{route('admin.dashboard')}}"
                        aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Dashboard
                        </span>
                    </a>
                </li>

                {{-- Manage Users --}}
                @if (auth()->user()->active < 6) <li class="sidebar-item"> <a
                        class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span
                            class="hide-menu">Manage Users</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('admin.users.all')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    All Users
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.users.active')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Active Users
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.users.dormant')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Dormant Users
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.users.free_agents')}}" class="sidebar-link">
                                <span class="hide-menu">
                                    Free Agents
                                </span>
                            </a>
                        </li>
                    </ul>
                    </li>
                    @endif

                    {{-- Manage Deposits --}}
                    @if (auth()->user()->active < 4) <li class="sidebar-item"> <a
                            class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false"><i data-feather="download" class="feather-icon"></i><span
                                class="hide-menu">Deposit System</span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{route('admin.deposits.all')}}" class="sidebar-link">
                                    <span class="hide-menu">
                                        All Deposits
                                    </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('admin.deposits.approved')}}" class="sidebar-link">
                                    <span class="hide-menu">
                                        Approved Deposits
                                    </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('admin.deposits.pending')}}" class="sidebar-link">
                                    <span class="hide-menu">
                                        Pending Deposits
                                    </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('admin.deposits.rejected')}}" class="sidebar-link">
                                    <span class="hide-menu">
                                        Rejected Deposits
                                    </span>
                                </a>
                            </li>
                        </ul>
                        </li>
                        @endif


                        {{-- Manage Withdrawals --}}
                        @if (auth()->user()->active < 5) <li class="sidebar-item"> <a
                                class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="upload" class="feather-icon"></i><span
                                    class="hide-menu">Withdrawal System
                                    @if (\App\Models\Withdrawal::where('status', 0)->exists())
                                    <span class="badge badge-pill bg-warning text text-white">!</span>
                                    @endif
                                </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{route('admin.withdrawals.all')}}" class="sidebar-link">
                                        <span class="hide-menu">
                                            All Withdrwals
                                        </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{route('admin.withdrawals.pending')}}" class="sidebar-link">
                                        <span class="hide-menu">
                                            @if (\App\Models\Withdrawal::where('status', 0)->exists())
                                            <span
                                                class="badge badge-pill bg-info text text-white">{{\App\Models\Withdrawal::where('status', 0)->count()}}</span>
                                            @endif
                                            Pending Withdrawals
                                        </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{route('admin.withdrawals.approved')}}" class="sidebar-link">
                                        <span class="hide-menu">
                                            Approved Withdrwals
                                        </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{route('admin.withdrawals.rejected')}}" class="sidebar-link">
                                        <span class="hide-menu">
                                            Rejected Withdrwals
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            </li>
                            @endif

                            {{-- Manage Affiliates--}}
                            @if (auth()->user()->active < 3) <li class="sidebar-item"> <a
                                    class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false"><i data-feather="link" class="feather-icon"></i><span
                                        class="hide-menu">Affiliate System</span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item">
                                        <a href="{{route('admin.affiliates.all')}}" class="sidebar-link">
                                            <span class="hide-menu">
                                                All Referals
                                            </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{route('admin.affiliates.active')}}" class="sidebar-link">
                                            <span class="hide-menu">
                                                Active Referals
                                            </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{route('admin.affiliates.dormant')}}" class="sidebar-link">
                                            <span class="hide-menu">
                                                Dormant Referrals
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                                </li>
                                @endif


                                {{-- Manage Spins--}}
                                @if (auth()->user()->active < 2) <li class="sidebar-item"> <a
                                        class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                        aria-expanded="false"><i data-feather="aperture" class="feather-icon"></i><span
                                            class="hide-menu">Manage Spins</span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item">
                                            <a href="{{route('admin.spins.all')}}" class="sidebar-link">
                                                <span class="hide-menu">
                                                    All Spins
                                                </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="{{route('admin.spins.segments')}}" class="sidebar-link">
                                                <span class="hide-menu">
                                                    Spin Segments
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    </li>
                                    @endif

                                    {{-- Manage Videos --}}
                                    @if (auth()->user()->active < 3) <li class="sidebar-item"> <a
                                            class="sidebar-link has-arrow waves-effect waves-dark"
                                            href="javascript:void(0)" aria-expanded="false"><i data-feather="film"
                                                class="feather-icon"></i><span class="hide-menu">Manage Videos
                                                @if (\App\Models\Vidrawal::where('status', 0)->exists())
                                                <span class="badge badge-pill bg-primary text text-white">!</span>
                                                @endif

                                            </span></a>
                                        <ul aria-expanded="false" class="collapse  first-level">
                                            <li class="sidebar-item">
                                                <a href="{{route('admin.videos.settings')}}" class="sidebar-link">
                                                    <span class="hide-menu">
                                                        Active Videos
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{route('admin.videos.all')}}" class="sidebar-link">
                                                    <span class="hide-menu">
                                                        All Vidrawals

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{route('admin.videos.pending')}}" class="sidebar-link">
                                                    <span class="hide-menu">
                                                        Pending Vidrawals
                                                        @if (\App\Models\Vidrawal::where('status', 0)->exists())
                                                        <span
                                                            class="badge badge-pill bg-info text text-white">{{\App\Models\Vidrawal::where('status', 0)->count()}}</span>
                                                        @endif
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{route('admin.videos.approved')}}" class="sidebar-link">
                                                    <span class="hide-menu">
                                                        Approved Vidrawals
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{route('admin.videos.rejected')}}" class="sidebar-link">
                                                    <span class="hide-menu">
                                                        Rejected Vidrawals
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                        </li>
                                        @endif

                                        {{-- Manage Forex --}}
                                        @if (auth()->user()->active < 2) <li class="sidebar-item"> <a
                                                class="sidebar-link has-arrow waves-effect waves-dark"
                                                href="javascript:void(0)" aria-expanded="false"><i
                                                    data-feather="trending-up" class="feather-icon"></i><span
                                                    class="hide-menu">Manage Forex
                                                    @if (\App\Models\Tradedrawal::where('status', 0)->exists())
                                                    <span class="badge badge-pill bg-success text text-white">!</span>
                                                    @endif
                                                </span></a>
                                            <ul aria-expanded="false" class="collapse  first-level">
                                                <li class="sidebar-item">
                                                    <a href="{{route('admin.forex.pending-trades')}}" class="sidebar-link">
                                                        <span class="hide-menu">
                                                            Pending Trades
                                                        </span>
                                                    </a>

                                                    <a href="{{route('admin.forex.open-trades')}}" class="sidebar-link">
                                                        <span class="hide-menu">
                                                            Open Trades
                                                        </span>
                                                    </a>
                                                    <a href="{{route('admin.forex.closed-trades')}}"
                                                        class="sidebar-link">
                                                        <span class="hide-menu">
                                                            Closed Trades
                                                        </span>
                                                    </a>
                                                    <a href="{{route('admin.forex.pending-tradedrawals')}}"
                                                        class="sidebar-link">
                                                        <span class="hide-menu">
                                                            Pending Tradedrawals
                                                            @if (\App\Models\Tradedrawal::where('status', 0)->exists())
                                                            <span
                                                                class="badge badge-danger bg-primary text text-white">!</span>
                                                            @endif
                                                        </span>
                                                    </a>
                                                    <a href="{{route('admin.forex.approved-tradedrawals')}}"
                                                        class="sidebar-link">
                                                        <span class="hide-menu">
                                                            Approved Tradedrawals
                                                        </span>
                                                    </a>
                                                    <a href="{{route('admin.forex.declined-tradedrawals')}}"
                                                        class="sidebar-link">
                                                        <span class="hide-menu">
                                                            Declined Tradedrawals
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                            </li>
                                            @endif

                                            {{-- Manage Blogs --}}
                                            @if (auth()->user()->active < 6) <li class="sidebar-item"> <a
                                                    class="sidebar-link has-arrow waves-effect waves-dark"
                                                    href="javascript:void(0)" aria-expanded="false"><i
                                                        data-feather="trello" class="feather-icon"></i><span
                                                        class="hide-menu">Manage Blogs</span></a>
                                                <ul aria-expanded="false" class="collapse  first-level">
                                                    <li class="sidebar-item">
                                                        <a href="{{route('admin.blogs.pending')}}" class="sidebar-link">
                                                            <span class="hide-menu">
                                                                Pending Blogs
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="sidebar-item">
                                                        <a href="{{route('admin.blogs.approved')}}"
                                                            class="sidebar-link">
                                                            <span class="hide-menu">
                                                                Approved Blogs
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="sidebar-item">
                                                        <a href="{{route('admin.blogs.rejected')}}"
                                                            class="sidebar-link">
                                                            <span class="hide-menu">
                                                                Rejected Blogs
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                </li>
                                                @endif


                                                <li class="sidebar-item">
                                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                        href="#" aria-expanded="false">
                                                        <livewire:admin.auth.logout />
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