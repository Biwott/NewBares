<!DOCTYPE html>
<html amp>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="generator" content="Mobirise v4.10.7, mobirise.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
    <link rel="shortcut icon" href="home/images/favicon-128x146.png" type="image/x-icon" />
    <meta name="description" content="" />
    <title>Home</title>
    <link rel="canonical" href="index.html" />
    <link rel="stylesheet" href="home/css/styles.css">
    <noscript>
        <link rel="stylesheet" href="home/css/webkit.css">
    </noscript>
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i,800,800i&amp;display=swap&amp;display=swap"
        rel="stylesheet" />
    <script async src="home/js/v0.js"></script>
    <script async custom-element="amp-sidebar" src="home/js/v0/amp-sidebar-0.1.js"></script>
    <script async custom-element="amp-analytics" src="home/js/v0/amp-analytics-0.1.js"></script>
    <script async custom-element="amp-fx-collection" src="home/js/v0/amp-fx-collection-0.1.js"></script>
    <script async custom-element="amp-youtube" src="home/js/v0/amp-youtube-0.1.js"></script>
    <script async custom-element="amp-carousel" src="home/js/v0/amp-carousel-0.1.js"></script>
    <script async custom-element="amp-bind" src="home/js/v0/amp-bind-0.1.js"></script>
    <script async custom-element="amp-form" src="home/js/v0/amp-form-0.1.js"></script>
    <script async custom-template="amp-mustache" src="home/js/v0/amp-mustache-0.2.js"></script>
    <script async custom-element="amp-animation" src="home/js/v0/amp-animation-0.1.js"></script>
    <script async custom-element="amp-position-observer" src="home/js/v0/amp-position-observer-0.1.js"></script>
</head>

<body>
    <div id="top-page"></div>
    <amp-animation id="showScrollToTopAnim" layout="nodisplay">
        <script type="application/json">
            {
                "duration": "200ms",
                "fill": "both",
                "iterations": "1",
                "direction": "alternate",
                "animations": [{
                    "selector": "#scrollToTopButton",
                    "keyframes": [{
                        "opacity": "0.4",
                        "visibility": "visible"
                    }]
                }]
            }
        </script>
    </amp-animation>
    <amp-animation id="hideScrollToTopAnim" layout="nodisplay">
        <script type="application/json">
            {
                "duration": "200ms",
                "fill": "both",
                "iterations": "1",
                "direction": "alternate",
                "animations": [{
                    "selector": "#scrollToTopButton",
                    "keyframes": [{
                        "opacity": "0",
                        "visibility": "hidden"
                    }]
                }]
            }
        </script>
    </amp-animation>
    <div id="scrollToTopMarker">
        <amp-position-observer on="enter:hideScrollToTopAnim.start; exit:showScrollToTopAnim.start" layout="nodisplay">
        </amp-position-observer>
    </div>
    <amp-sidebar id="sidebar" class="cid-rIUU7c2QEy" layout="nodisplay" side="right">
        <div class="builder-sidebar" id="builder-sidebar">
            <button on="tap:sidebar.close" class="close-sidebar">
                <span></span>
                <span></span>
            </button>

            <!-- NAVBAR ITEMS -->
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                <li class="nav-item">
                    <a class="nav-link mbr-medium link text-primary display-4" href="/#" aria-expanded="false">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mbr-medium link text-primary display-4" href="/#about2-4" aria-expanded="false">About
                        Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mbr-medium link text-primary display-4" href="/#features3-6"
                        aria-expanded="false">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mbr-medium link text-primary display-4" href="/blog"
                        aria-expanded="false">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mbr-medium link text-primary display-4" href="/#form1-r">Contacts</a>
                </li>
                @if (Route::has('user.login'))
                @auth
                <li class="nav-item">
                    <a class="nav-link mbr-medium link text-primary display-4"
                        href="{{ route('user.dashboard') }}">Dashboard</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link mbr-medium link text-primary display-4"
                        href="{{ route('user.login') }}">Login</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link mbr-medium link text-primary display-4" href="{{ route('register') }}"
                        aria-expanded="false">Register</a>
                </li>
                @endif
                @endauth
                @endif
            </ul>
            <!-- NAVBAR ITEMS END -->
        </div>
    </amp-sidebar>

    <!-- Analytics -->
    <amp-analytics type="googleanalytics" id="analytics1">
        <script type="application/json">
            {
                    "vars": {
                        "account": "UA-63126154-1"
                    },
                    "triggers": {
                        "trackPageview": {
                            "on": "visible",
                            "request": "pageview"
                        }
                    }
                }
        </script>

    </amp-analytics>
    <!-- /Analytics -->

    <section class="menu1 menu horizontal-menu cid-rIUU7c2QEy" id="menu1-1">
        <!-- <div class="menu-wrapper"> -->

        <nav class="navbar navbar-dropdown navbar-expand-lg navbar-fixed-top">
            <div class="menu-container mbr-column mbr-jc-c container-fluid">

                <div class="border__bottom"></div>
                <!-- SHOW LOGO -->
                <div class="mbr-flex menu__block mbr-jc-sb mbr-jc-c">
                    <div class="navbar-brand">
                        <div class="navbar-logo">
                            <amp-img src="home/images/logo-200x54.png" alt="Earnest">
                                <div placeholder="" class="placeholder">
                                    <div class="mobirise-spinner">
                                        <em></em>
                                        <em></em>
                                        <em></em>
                                    </div>
                                </div>
                                <a href="/"></a>
                            </amp-img>
                        </div>
                    </div>
                    <!-- SHOW LOGO END -->
                    <!-- COLLAPSED MENU -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- NAVBAR ITEMS -->
                        <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                            <li class="nav-item">
                                <a class="nav-link mbr-medium link text-primary display-4" href="/#"
                                    aria-expanded="false">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mbr-medium link text-primary display-4" href="/#about2-4"
                                    aria-expanded="false">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mbr-medium link text-primary display-4" href="/#features3-6"
                                    aria-expanded="false">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mbr-medium link text-primary display-4" href="/blog"
                                    aria-expanded="false">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mbr-medium link text-primary display-4" href="/#form1-r">Contacts</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link mbr-medium link text-primary display-4"
                                    href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                            </li>
                        </ul>
                        <!-- NAVBAR ITEMS END -->
                    </div>
                    <div class="questions mbr-flex mbr-align-center mbr-jc-c">

                        <ul class="navbar-nav nav-dropdown">
                            @if (Route::has('user.login'))
                            @auth
                            <li class="nav-item">
                                <a class="nav-link mbr-medium link text-primary display-4"
                                    href="{{ route('user.dashboard') }}" aria-expanded="false">Dashboard</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link mbr-medium link text-primary display-4"
                                    href="{{ route('user.login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link mbr-medium link text-primary display-4"
                                    href="{{ route('register') }}" aria-expanded="false">Register Now</a>
                            </li>
                            @endif
                            @endauth
                            @endif
                        </ul>
                    </div>
                    <!-- COLLAPSED MENU END -->
                    <button on="tap:sidebar.toggle" class="ampstart-btn hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </nav>
        <!-- AMP plug -->

        <!-- </div> -->
    </section>

    <section class="title1 cid-rIV6G7Mt4O" id="title1-e">
        <div class="container">
            <div class="mbr-col-sm-12 mbr-col-md-12 mbr-col-lg-12 mbr-px-0 align-center">
                <div class="title__block align-left align-center">
                    <h3 class="mbr-bold title mbr-section-title mbr-fonts-style mbr-black display-2">
                        Recent Blogs
                    </h3>
                </div>
            </div>
        </div>
    </section>

    <section class="features5 cid-rIV5D0JJV0" id="features5-c">
        <div class="container">
            <div class="mbr-row">
                @forelse($data['posts'] as $post)
                <div class="mbr-col-sm-12 card mbr-col-lg-4 mbr-col-md-6">
                    <div class="inner-item rounded__10">
                        <div class="card-text align-left">
                            <div class="card-text-box">

                                <a href="#">
                                    <br>
                                    <h3 class="mbr-fonts-style card__title mbr-semibold mbr-black display-6">
                                        {{ mb_strimwidth($post['title'], 0, 100, "...") }}
                                    </h3>
                                </a>
                                <p class="mbr-fonts-style mbr-regular card__text display-4">
                                    {!! mb_strimwidth($post['body'], 0, 200, "...") !!}
                                </p>
                                <div class="divider__card"></div>
                                <div class="bottom__block mbr-flex mbr-jc-sb mbr-align-center">
                                    <div class="admin">
                                        <p class="mbr-fonts-style mbr-regular admin__text display-4">
                                            <div class="mbr-section-btn">
                                                <a class="btn btn-md mbr-mt-2 btn-success display-4"
                                                    href="{{url('/').'/blog/'.$post['slug']}}">
                                                    <span class="mbrib-right mbr-iconfont mbr-iconfont-btn"><svg
                                                            version="1.1" xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 32 32" fill="currentColor">
                                                            <path
                                                                d="M17.724 0.3l14.016 14.008c0.348 0.368 0.348 1.008 0 1.376l-14.016 14.010c-0.94 0.936-2.332-0.494-1.44-1.376l13.328-13.324-13.328-13.318c-0.876-0.876 0.52-2.3 1.44-1.38zM1 16h24c1.304 0 1.37-2 0-2h-24c-1.35 0-1.28 2 0 2z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <span class="btn__hover">Read More...</span></a>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="mbr-row">
                    <div class="card">
                        <div class="card-body">
                            <p>. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                NO POSTS AVAILABLE!</p>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

  
    <section class="footer2 cid-rIV6mtnyQY" id="footer2-d">
        <div class="footer-container container mbr-flex mbr-align-center mbr-jc-sb mbr-row-reverse">
            <div class="mbr-row link-items mbr-fonts-style align-center display-4">
                <a on="tap:top-page.scrollTo(duration=200)" href="#index.html">
                    <p class="mbr-white fLink mbr-fonts-style display-4">
                        Home
                    </p>
                </a>
                @if (Route::has('user.login'))
                @auth
                <a href="{{route('user.dashboard')}}">
                    <p class="mbr-white fLink mbr-fonts-style display-4">
                        Dashboard
                    </p>
                </a>
                @else
                <a href="{{route('user.login')}}">
                    <p class="mbr-white fLink mbr-fonts-style display-4">
                        Login
                    </p>
                </a>

                @if (Route::has('register'))
                <a href="{{route('register')}}">
                    <p class="mbr-white fLink mbr-fonts-style display-4">
                        Register
                    </p>
                </a>
                @endif
                @endauth
                @endif

            </div>

            <div class="divider__foot"></div>
            <div class="align-center">
                <p class="mbr-fonts-style copyright mbr-white display-4">
                    © Copyright 2021 Earnest Ventures
                </p>
            </div>
        </div>
    </section>

    <button id="scrollToTopButton" on="tap:top-page.scrollTo(duration=200)">
        <a class="scroll-to-top-arrow"></a>
    </button>
</body>

</html> >