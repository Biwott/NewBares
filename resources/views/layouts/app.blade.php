<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, monster admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, material design, material dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Monster is powerful and clean admin dashboard template, inpired from Google's Material Design">
    <meta name="robots" content="noindex,nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Earnest Ventures -the Ultimate Deal</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monsteradmin/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <!-- Custom CSS -->
    <link href="{{asset('assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/js/pages/chartist/chartist-init.css')}}" rel="stylesheet">
    <link href="{{asset('assets/extra-libs/css-chart/css-chart.css')}}" rel="stylesheet">
    <link href="{{asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
    <link href="{{asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/libs/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/extra-libs/toastr/dist/build/toastr.min.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @stack('css')
    @livewireStyles
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    @include('partials.preloader')
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('partials.header ')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('partials.sidenav')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            {{-- @include('partials.breadcrumb') --}}
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            {{ $slot }}
            @yield('content')
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ======================================================s======== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            {{-- @include('partials.footer') --}}
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    {{-- @include('partials.customizer') --}}
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/extra-libs/taskboard/js/jquery.ui.touch-punch-improved.js')}}"></script>
    <script src="{{asset('assets/extra-libs/taskboard/js/jquery-ui.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <script src="{{asset('dist/js/app.min.js')}}"></script>
    <script src="{{asset('dist/js/app.init.mini-sidebar.js')}}"></script>
    <script src="{{asset('dist/js/app-style-switcher.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('dist/js/feather.min.js')}}"></script>
    <script src="{{asset('dist/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/extra-libs/toastr/dist/build/toastr.min.js')}}"></script>
    <script src="{{asset('assets/extra-libs/toastr/toastr-init.js')}}"></script>
    <script>
        window.addEventListener('alert', (event) => { 
            toastr[event.detail.type](event.detail.message, 
            event.detail.title ?? '');
            toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                }        
        })
    </script>
    <!--This page JavaScript -->
    <script src="{{asset('assets/libs/moment/moment.js')}}"></script>
    <script src="{{asset('assets/libs/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <script src="{{asset('dist/js/pages/calendar/cal-init.js')}}"></script>
    <script src="{{asset('assets/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('assets/libs/echarts/dist/echarts.min.js')}}"></script>
    <script src="{{asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('dist/js/pages/dashboards/dashboard4.js')}}"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>