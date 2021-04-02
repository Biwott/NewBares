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
                    <a class="nav-link mbr-medium link text-primary display-4" href="#" aria-expanded="false">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mbr-medium link text-primary display-4" href="#about2-4"
                        aria-expanded="false">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mbr-medium link text-primary display-4" href="#features3-6"
                        aria-expanded="false">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mbr-medium link text-primary display-4" href="/blog"
                        aria-expanded="false">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mbr-medium link text-primary display-4" href="#form1-r">Contacts</a>
                </li>
                @if (Route::has('user.login'))
                @auth
                <li class="nav-item">
                    <a class="nav-link mbr-medium link text-primary display-4"
                        href="{{ ('user.dashboard') }}">Dashboard</a>
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
                                <a class="nav-link mbr-medium link text-primary display-4" href="#"
                                    aria-expanded="false">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mbr-medium link text-primary display-4" href="#about2-4"
                                    aria-expanded="false">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mbr-medium link text-primary display-4" href="#features3-6"
                                    aria-expanded="false">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mbr-medium link text-primary display-4" href="/blog"
                                    aria-expanded="false">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mbr-medium link text-primary display-4" href="#form1-r">Contacts</a>
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

    <section class="header3 cid-rIUZcaTS2n" id="header3-3">
        <div class="container-fluid">
            <div class="mbr-row">
                <div
                    class="mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-6 mbr-flex mbr-jc-c mbr-align-center text__block align-left">
                    <div class="title__block">
                        <p class="subtext rounded__10 mbr-fonts-style mbr-black display-4">
                            Earnest Ventures
                        </p>
                        <h3 class="mbr-section-title mbr-bold mbr-fonts-style mbr-black display-2">
                            Smart Investing at your Finger Tips
                        </h3>
                        <span class="divider"></span>
                        <p class="mbr-text mbr-fonts-style display-4">
                            Earnest Ventures is an online platform developed to give our
                            our clients access to untapped financial generation strategies leveraged by our 
                            premium system.
                            including Bitcoin. We understand that the thought of investing and doing
                            it successfully can be a daunting task. This is especially true if you’re a
                            beginner in the Crypto industry. Earnest utilises state of the art prediction
                            algorithims that advices our investors on when to trade.
                        </p>
                        <div class="mbr-section-btn">
                            <a class="btn btn-md mbr-mt-2 btn-success display-4" href="{{route('register')}}">
                                <span class="mbrib-right mbr-iconfont mbr-iconfont-btn"><svg version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 32 32"
                                        fill="currentColor">
                                        <path
                                            d="M17.724 0.3l14.016 14.008c0.348 0.368 0.348 1.008 0 1.376l-14.016 14.010c-0.94 0.936-2.332-0.494-1.44-1.376l13.328-13.324-13.328-13.318c-0.876-0.876 0.52-2.3 1.44-1.38zM1 16h24c1.304 0 1.37-2 0-2h-24c-1.35 0-1.28 2 0 2z">
                                        </path>
                                    </svg></span>
                                <span class="btn__hover">Register Now </span></a>
                            @if (Route::has('user.login'))
                            @auth
                            <a class="btn btn-md mbr-mt-2 btn-secondary display-4"
                                href="{{route(route('user.dashboard'))}}">
                                <span class="mbrib-right mbr-iconfont mbr-iconfont-btn"><svg version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 32 32"
                                        fill="currentColor">
                                        <path
                                            d="M17.724 0.3l14.016 14.008c0.348 0.368 0.348 1.008 0 1.376l-14.016 14.010c-0.94 0.936-2.332-0.494-1.44-1.376l13.328-13.324-13.328-13.318c-0.876-0.876 0.52-2.3 1.44-1.38zM1 16h24c1.304 0 1.37-2 0-2h-24c-1.35 0-1.28 2 0 2z">
                                        </path>
                                    </svg></span>
                                <span class="btn__hover">Dashboard</span></a>
                            @else
                            <a class="btn btn-md mbr-mt-2 btn-secondary display-4" href="{{route('user.login')}}">
                                <span class="mbrib-right mbr-iconfont mbr-iconfont-btn"><svg version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 32 32"
                                        fill="currentColor">
                                        <path
                                            d="M17.724 0.3l14.016 14.008c0.348 0.368 0.348 1.008 0 1.376l-14.016 14.010c-0.94 0.936-2.332-0.494-1.44-1.376l13.328-13.324-13.328-13.318c-0.876-0.876 0.52-2.3 1.44-1.38zM1 16h24c1.304 0 1.37-2 0-2h-24c-1.35 0-1.28 2 0 2z">
                                        </path>
                                    </svg></span>
                                <span class="btn__hover">Log In</span></a>
                            @endauth
                            @endif








                        </div>
                    </div>
                </div>
                <div class="image mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-6 mbr-px-0">
                    <amp-img src="home/images/data1-1436x1915.jpg" alt="image" height="809" width="606.6443864229765"
                        layout="responsive" class="mobirise-loader">
                        <div placeholder="" class="placeholder">
                            <div class="mobirise-spinner">
                                <em></em>
                                <em></em>
                                <em></em>
                            </div>
                        </div>
                    </amp-img>
                </div>
            </div>
        </div>
    </section>

    <section class="about2 cid-rIV0zQc7DE" id="about2-4">
        <div class="container-fluid">
            <div class="mbr-row wrapper">
                <div class="mbr-col-sm-12 mbr-col-md-12 mbr-col-lg-6 image">
                    <amp-img src="home/images/data4-1200x800.jpg" alt="image" height="550" width="825"
                        layout="responsive" class="mobirise-loader">
                        <div placeholder="" class="placeholder">
                            <div class="mobirise-spinner">
                                <em></em>
                                <em></em>
                                <em></em>
                            </div>
                        </div>
                    </amp-img>
                </div>

                <div class="mbr-col-sm-12 mbr-col-md-12 mbr-col-lg-6 mbr-flex mbr-align-center">
                    <div class="text__block align-left">
                        <div class="title">
                            <h3 class="mbr-fonts-style card__title mbr-bold mbr-section-title mbr-black display-2">
                                About Us
                            </h3>
                            <span class="divider"></span>
                        </div>
                        <p class="mbr-fonts-style card__text mbr-section-subtitle display-4">
                            At Earnest Ventures we offer a variety of ways of earning from the
                            Platform Among them including:
                        </p>
                        <div class="content__wrapper mbr-section-subtitle">
                            <div class="mbr-flex">
                                <span class="mbr-iconfont fa-check-square-o fa"><svg width="16" height="16"
                                        viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path
                                            d="M1472 930v318q0 119-84.5 203.5t-203.5 84.5h-832q-119 0-203.5-84.5t-84.5-203.5v-832q0-119 84.5-203.5t203.5-84.5h832q63 0 117 25 15 7 18 23 3 17-9 29l-49 49q-10 10-23 10-3 0-9-2-23-6-45-6h-832q-66 0-113 47t-47 113v832q0 66 47 113t113 47h832q66 0 113-47t47-113v-254q0-13 9-22l64-64q10-10 23-10 6 0 12 3 20 8 20 29zm231-489l-814 814q-24 24-57 24t-57-24l-430-430q-24-24-24-57t24-57l110-110q24-24 57-24t57 24l263 263 647-647q24-24 57-24t57 24l110 110q24 24 24 57t-24 57z">
                                        </path>
                                    </svg></span>
                                <p class="mbr-fonts-style item__service display-4">
                                    Earn through refering users to our Platform(Level 1, Level 2 and Level 3)
                                </p>
                            </div>
                            <div class="mbr-flex">
                                <span class="mbr-iconfont fa-check-square-o fa"><svg width="16" height="16"
                                        viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path
                                            d="M1472 930v318q0 119-84.5 203.5t-203.5 84.5h-832q-119 0-203.5-84.5t-84.5-203.5v-832q0-119 84.5-203.5t203.5-84.5h832q63 0 117 25 15 7 18 23 3 17-9 29l-49 49q-10 10-23 10-3 0-9-2-23-6-45-6h-832q-66 0-113 47t-47 113v832q0 66 47 113t113 47h832q66 0 113-47t47-113v-254q0-13 9-22l64-64q10-10 23-10 6 0 12 3 20 8 20 29zm231-489l-814 814q-24 24-57 24t-57-24l-430-430q-24-24-24-57t24-57l110-110q24-24 57-24t57 24l263 263 647-647q24-24 57-24t57 24l110 110q24 24 24 57t-24 57z">
                                        </path>
                                    </svg></span>
                                <p class="mbr-fonts-style item__service display-4">
                                    Earn throught trading cryptocurrecies
                                </p>
                            </div>
                            <div class="mbr-flex">
                                <span class="mbr-iconfont fa-check-square-o fa"><svg width="16" height="16"
                                        viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path
                                            d="M1472 930v318q0 119-84.5 203.5t-203.5 84.5h-832q-119 0-203.5-84.5t-84.5-203.5v-832q0-119 84.5-203.5t203.5-84.5h832q63 0 117 25 15 7 18 23 3 17-9 29l-49 49q-10 10-23 10-3 0-9-2-23-6-45-6h-832q-66 0-113 47t-47 113v832q0 66 47 113t113 47h832q66 0 113-47t47-113v-254q0-13 9-22l64-64q10-10 23-10 6 0 12 3 20 8 20 29zm231-489l-814 814q-24 24-57 24t-57-24l-430-430q-24-24-24-57t24-57l110-110q24-24 57-24t57 24l263 263 647-647q24-24 57-24t57 24l110 110q24 24 24 57t-24 57z">
                                        </path>
                                    </svg></span>
                                <p class="mbr-fonts-style item__service display-4">
                                    Earn through Paid Video Ad Promotion
                                </p>
                            </div>
                            <div class="mbr-flex">
                                <span class="mbr-iconfont fa-check-square-o fa"><svg width="16" height="16"
                                        viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path
                                            d="M1472 930v318q0 119-84.5 203.5t-203.5 84.5h-832q-119 0-203.5-84.5t-84.5-203.5v-832q0-119 84.5-203.5t203.5-84.5h832q63 0 117 25 15 7 18 23 3 17-9 29l-49 49q-10 10-23 10-3 0-9-2-23-6-45-6h-832q-66 0-113 47t-47 113v832q0 66 47 113t113 47h832q66 0 113-47t47-113v-254q0-13 9-22l64-64q10-10 23-10 6 0 12 3 20 8 20 29zm231-489l-814 814q-24 24-57 24t-57-24l-430-430q-24-24-24-57t24-57l110-110q24-24 57-24t57 24l263 263 647-647q24-24 57-24t57 24l110 110q24 24 24 57t-24 57z">
                                        </path>
                                    </svg></span>
                                <p class="mbr-fonts-style item__service display-4">
                                    Frequent Earnings through Free Spin
                                </p>
                            </div>
                        </div>

                        <div class="mbr-section-btn">
                            <a class="btn btn-md mbr-mt-2 btn-success display-4" href="#">
                                <span class="mbrib-right mbr-iconfont mbr-iconfont-btn"><svg version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 32 32"
                                        fill="currentColor">
                                        <path
                                            d="M17.724 0.3l14.016 14.008c0.348 0.368 0.348 1.008 0 1.376l-14.016 14.010c-0.94 0.936-2.332-0.494-1.44-1.376l13.328-13.324-13.328-13.318c-0.876-0.876 0.52-2.3 1.44-1.38zM1 16h24c1.304 0 1.37-2 0-2h-24c-1.35 0-1.28 2 0 2z">
                                        </path>
                                    </svg></span>
                                <span class="btn__hover">Read More</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features1 cid-rIVaCcYZwL" id="features1-o">
        <div class="container">
            <div class="mbr-row">
                <div class="card mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-3">
                    <div class="card-wrapper rounded__10 mbr-flex mbr-column">
                        <div class="card-img">
                            <div class="art align-center item1 mbr-flex mbr-jc-c mbr-align-center">
                                <span
                                    class="mbr-iconfont mbr-flex mbr-align-center mbr-jc-c mbr-iconfont-btn fa-globe fa"><svg
                                        width="35" height="35" viewBox="0 0 1792 1792"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path
                                            d="M896 128q209 0 385.5 103t279.5 279.5 103 385.5-103 385.5-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103zm274 521q-2 1-9.5 9.5t-13.5 9.5q2 0 4.5-5t5-11 3.5-7q6-7 22-15 14-6 52-12 34-8 51 11-2-2 9.5-13t14.5-12q3-2 15-4.5t15-7.5l2-22q-12 1-17.5-7t-6.5-21q0 2-6 8 0-7-4.5-8t-11.5 1-9 1q-10-3-15-7.5t-8-16.5-4-15q-2-5-9.5-11t-9.5-10q-1-2-2.5-5.5t-3-6.5-4-5.5-5.5-2.5-7 5-7.5 10-4.5 5q-3-2-6-1.5t-4.5 1-4.5 3-5 3.5q-3 2-8.5 3t-8.5 2q15-5-1-11-10-4-16-3 9-4 7.5-12t-8.5-14h5q-1-4-8.5-8.5t-17.5-8.5-13-6q-8-5-34-9.5t-33-.5q-5 6-4.5 10.5t4 14 3.5 12.5q1 6-5.5 13t-6.5 12q0 7 14 15.5t10 21.5q-3 8-16 16t-16 12q-5 8-1.5 18.5t10.5 16.5q2 2 1.5 4t-3.5 4.5-5.5 4-6.5 3.5l-3 2q-11 5-20.5-6t-13.5-26q-7-25-16-30-23-8-29 1-5-13-41-26-25-9-58-4 6-1 0-15-7-15-19-12 3-6 4-17.5t1-13.5q3-13 12-23 1-1 7-8.5t9.5-13.5.5-6q35 4 50-11 5-5 11.5-17t10.5-17q9-6 14-5.5t14.5 5.5 14.5 5q14 1 15.5-11t-7.5-20q12 1 3-17-4-7-8-9-12-4-27 5-8 4 2 8-1-1-9.5 10.5t-16.5 17.5-16-5q-1-1-5.5-13.5t-9.5-13.5q-8 0-16 15 3-8-11-15t-24-8q19-12-8-27-7-4-20.5-5t-19.5 4q-5 7-5.5 11.5t5 8 10.5 5.5 11.5 4 8.5 3q14 10 8 14-2 1-8.5 3.5t-11.5 4.5-6 4q-3 4 0 14t-2 14q-5-5-9-17.5t-7-16.5q7 9-25 6l-10-1q-4 0-16 2t-20.5 1-13.5-8q-4-8 0-20 1-4 4-2-4-3-11-9.5t-10-8.5q-46 15-94 41 6 1 12-1 5-2 13-6.5t10-5.5q34-14 42-7l5-5q14 16 20 25-7-4-30-1-20 6-22 12 7 12 5 18-4-3-11.5-10t-14.5-11-15-5q-16 0-22 1-146 80-235 222 7 7 12 8 4 1 5 9t2.5 11 11.5-3q9 8 3 19 1-1 44 27 19 17 21 21 3 11-10 18-1-2-9-9t-9-4q-3 5 .5 18.5t10.5 12.5q-7 0-9.5 16t-2.5 35.5-1 23.5l2 1q-3 12 5.5 34.5t21.5 19.5q-13 3 20 43 6 8 8 9 3 2 12 7.5t15 10 10 10.5q4 5 10 22.5t14 23.5q-2 6 9.5 20t10.5 23q-1 0-2.5 1t-2.5 1q3 7 15.5 14t15.5 13q1 3 2 10t3 11 8 2q2-20-24-62-15-25-17-29-3-5-5.5-15.5t-4.5-14.5q2 0 6 1.5t8.5 3.5 7.5 4 2 3q-3 7 2 17.5t12 18.5 17 19 12 13q6 6 14 19.5t0 13.5q9 0 20 10.5t17 19.5q5 8 8 26t5 24q2 7 8.5 13.5t12.5 9.5l16 8 13 7q5 2 18.5 10.5t21.5 11.5q10 4 16 4t14.5-2.5 13.5-3.5q15-2 29 15t21 21q36 19 55 11-2 1 .5 7.5t8 15.5 9 14.5 5.5 8.5q5 6 18 15t18 15q6-4 7-9-3 8 7 20t18 10q14-3 14-32-31 15-49-18 0-1-2.5-5.5t-4-8.5-2.5-8.5 0-7.5 5-3q9 0 10-3.5t-2-12.5-4-13q-1-8-11-20t-12-15q-5 9-16 8t-16-9q0 1-1.5 5.5t-1.5 6.5q-13 0-15-1 1-3 2.5-17.5t3.5-22.5q1-4 5.5-12t7.5-14.5 4-12.5-4.5-9.5-17.5-2.5q-19 1-26 20-1 3-3 10.5t-5 11.5-9 7q-7 3-24 2t-24-5q-13-8-22.5-29t-9.5-37q0-10 2.5-26.5t3-25-5.5-24.5q3-2 9-9.5t10-10.5q2-1 4.5-1.5t4.5 0 4-1.5 3-6q-1-1-4-3-3-3-4-3 7 3 28.5-1.5t27.5 1.5q15 11 22-2 0-1-2.5-9.5t-.5-13.5q5 27 29 9 3 3 15.5 5t17.5 5q3 2 7 5.5t5.5 4.5 5-.5 8.5-6.5q10 14 12 24 11 40 19 44 7 3 11 2t4.5-9.5 0-14-1.5-12.5l-1-8v-18l-1-8q-15-3-18.5-12t1.5-18.5 15-18.5q1-1 8-3.5t15.5-6.5 12.5-8q21-19 15-35 7 0 11-9-1 0-5-3t-7.5-5-4.5-2q9-5 2-16 5-3 7.5-11t7.5-10q9 12 21 2 8-8 1-16 5-7 20.5-10.5t18.5-9.5q7 2 8-2t1-12 3-12q4-5 15-9t13-5l17-11q3-4 0-4 18 2 31-11 10-11-6-20 3-6-3-9.5t-15-5.5q3-1 11.5-.5t10.5-1.5q15-10-7-16-17-5-43 12zm-163 877q206-36 351-189-3-3-12.5-4.5t-12.5-3.5q-18-7-24-8 1-7-2.5-13t-8-9-12.5-8-11-7q-2-2-7-6t-7-5.5-7.5-4.5-8.5-2-10 1l-3 1q-3 1-5.5 2.5t-5.5 3-4 3 0 2.5q-21-17-36-22-5-1-11-5.5t-10.5-7-10-1.5-11.5 7q-5 5-6 15t-2 13q-7-5 0-17.5t2-18.5q-3-6-10.5-4.5t-12 4.5-11.5 8.5-9 6.5-8.5 5.5-8.5 7.5q-3 4-6 12t-5 11q-2-4-11.5-6.5t-9.5-5.5q2 10 4 35t5 38q7 31-12 48-27 25-29 40-4 22 12 26 0 7-8 20.5t-7 21.5q0 6 2 16z">
                                        </path>
                                    </svg></span>
                            </div>
                            <div class="image-text mbr-semibold mbr-fonts-style mbr-black display-2">
                                5,000<span class="icon">+</span>
                            </div>
                        </div>
                        <div class="card-box">
                            <p class="card-text mbr-fonts-style mbr-pt-1 display-4">
                                Global reach and impact with reliable solutions aimed at growing income and investments.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-3">
                    <div class="card-wrapper rounded__10 mbr-flex mbr-column">
                        <div class="card-img">
                            <div class="art align-center item2 mbr-flex mbr-jc-c mbr-align-center">
                                <span
                                    class="mbr-iconfont mbr-flex mbr-align-center mbr-jc-c mbr-iconfont-btn fa-list-alt fa"><svg
                                        width="35" height="35" viewBox="0 0 1792 1792"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path
                                            d="M384 1184v64q0 13-9.5 22.5t-22.5 9.5h-64q-13 0-22.5-9.5t-9.5-22.5v-64q0-13 9.5-22.5t22.5-9.5h64q13 0 22.5 9.5t9.5 22.5zm0-256v64q0 13-9.5 22.5t-22.5 9.5h-64q-13 0-22.5-9.5t-9.5-22.5v-64q0-13 9.5-22.5t22.5-9.5h64q13 0 22.5 9.5t9.5 22.5zm0-256v64q0 13-9.5 22.5t-22.5 9.5h-64q-13 0-22.5-9.5t-9.5-22.5v-64q0-13 9.5-22.5t22.5-9.5h64q13 0 22.5 9.5t9.5 22.5zm1152 512v64q0 13-9.5 22.5t-22.5 9.5h-960q-13 0-22.5-9.5t-9.5-22.5v-64q0-13 9.5-22.5t22.5-9.5h960q13 0 22.5 9.5t9.5 22.5zm0-256v64q0 13-9.5 22.5t-22.5 9.5h-960q-13 0-22.5-9.5t-9.5-22.5v-64q0-13 9.5-22.5t22.5-9.5h960q13 0 22.5 9.5t9.5 22.5zm0-256v64q0 13-9.5 22.5t-22.5 9.5h-960q-13 0-22.5-9.5t-9.5-22.5v-64q0-13 9.5-22.5t22.5-9.5h960q13 0 22.5 9.5t9.5 22.5zm128 704v-832q0-13-9.5-22.5t-22.5-9.5h-1472q-13 0-22.5 9.5t-9.5 22.5v832q0 13 9.5 22.5t22.5 9.5h1472q13 0 22.5-9.5t9.5-22.5zm128-1088v1088q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-1088q0-66 47-113t113-47h1472q66 0 113 47t47 113z">
                                        </path>
                                    </svg></span>
                            </div>
                            <div class="image-text mbr-semibold mbr-fonts-style mbr-black display-2">
                                120<span class="icon">+</span>
                            </div>
                        </div>
                        <div class="card-box">
                            <p class="card-text mbr-fonts-style mbr-pt-1 display-4">
                                Testimonials of individuals using our assistive technology positively appraising our
                                effort.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-3">
                    <div class="card-wrapper rounded__10 mbr-flex mbr-column">
                        <div class="card-img">
                            <div class="art align-center item3 mbr-flex mbr-jc-c mbr-align-center">
                                <span
                                    class="mbr-iconfont mbr-flex mbr-align-center mbr-jc-c mbr-iconfont-btn fa-pencil fa"><svg
                                        width="35" height="35" viewBox="0 0 1792 1792"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path
                                            d="M491 1536l91-91-235-235-91 91v107h128v128h107zm523-928q0-22-22-22-10 0-17 7l-542 542q-7 7-7 17 0 22 22 22 10 0 17-7l542-542q7-7 7-17zm-54-192l416 416-832 832h-416v-416zm683 96q0 53-37 90l-166 166-416-416 166-165q36-38 90-38 53 0 91 38l235 234q37 39 37 91z">
                                        </path>
                                    </svg></span>
                            </div>
                            <div class="image-text mbr-semibold mbr-fonts-style mbr-black display-2">
                                97<span class="icon">%</span>
                            </div>
                        </div>
                        <div class="card-box">
                            <p class="card-text mbr-fonts-style mbr-pt-1 display-4">
                                Satisfied customers based on our service delivery with a prompt customer care team.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-3 last-child">
                    <div class="card-wrapper rounded__10 mbr-flex mbr-column">
                        <div class="card-img">
                            <div class="art align-center item4 mbr-flex mbr-jc-c mbr-align-center">
                                <span
                                    class="mbr-iconfont mbr-flex mbr-align-center mbr-jc-c mbr-iconfont-btn fa-calendar fa"><svg
                                        width="35" height="35" viewBox="0 0 1792 1792"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path
                                            d="M192 1664h288v-288h-288v288zm352 0h320v-288h-320v288zm-352-352h288v-320h-288v320zm352 0h320v-320h-320v320zm-352-384h288v-288h-288v288zm736 736h320v-288h-320v288zm-384-736h320v-288h-320v288zm768 736h288v-288h-288v288zm-384-352h320v-320h-320v320zm-352-864v-288q0-13-9.5-22.5t-22.5-9.5h-64q-13 0-22.5 9.5t-9.5 22.5v288q0 13 9.5 22.5t22.5 9.5h64q13 0 22.5-9.5t9.5-22.5zm736 864h288v-320h-288v320zm-384-384h320v-288h-320v288zm384 0h288v-288h-288v288zm32-480v-288q0-13-9.5-22.5t-22.5-9.5h-64q-13 0-22.5 9.5t-9.5 22.5v288q0 13 9.5 22.5t22.5 9.5h64q13 0 22.5-9.5t9.5-22.5zm384-64v1280q0 52-38 90t-90 38h-1408q-52 0-90-38t-38-90v-1280q0-52 38-90t90-38h128v-96q0-66 47-113t113-47h64q66 0 113 47t47 113v96h384v-96q0-66 47-113t113-47h64q66 0 113 47t47 113v96h128q52 0 90 38t38 90z">
                                        </path>
                                    </svg></span>
                            </div>
                            <div class="image-text mbr-semibold mbr-fonts-style mbr-black display-2">
                                5<span class="icon">+</span>
                            </div>
                        </div>
                        <div class="card-box">
                            <p class="card-text mbr-fonts-style mbr-pt-1 display-4">
                                Countries using our services globally and still growing with aim of global outreach.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="title1 cid-rIV7xwykEs" id="title1-h">
        <div class="container">
            <div class="mbr-col-sm-12 mbr-col-md-12 mbr-col-lg-12 mbr-px-0 align-center">
                <div class="title__block align-left align-center">
                    <h3 class="mbr-bold title mbr-section-title mbr-fonts-style mbr-black display-2">
                        What Services Do We Offer?
                    </h3>
                </div>
            </div>
        </div>
    </section>

    <section class="features3 cid-rIV1Y0CzjR" id="features3-6">
        <div class="mbr-overlay"></div>
        <div class="container">
            <div class="mbr-row mbr-jc-c">
                <div class="card mbr-col-sm-12 align-left mbr-col-md-6 mbr-col-lg-3">
                    <div class="card-wrapper mbr-flex mbr-column">
                        <div class="card-img mbr-flex">
                            <div class="icon__wrap rounded__10 mbr-flex mbr-align-center mbr-jc-c">
                                <span class="amp-iconfont align-center fa-group fa"><svg width="60" height="60"
                                        viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path
                                            d="M657 896q-162 5-265 128h-134q-82 0-138-40.5t-56-118.5q0-353 124-353 6 0 43.5 21t97.5 42.5 119 21.5q67 0 133-23-5 37-5 66 0 139 81 256zm1071 637q0 120-73 189.5t-194 69.5h-874q-121 0-194-69.5t-73-189.5q0-53 3.5-103.5t14-109 26.5-108.5 43-97.5 62-81 85.5-53.5 111.5-20q10 0 43 21.5t73 48 107 48 135 21.5 135-21.5 107-48 73-48 43-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-1024-1277q0 106-75 181t-181 75-181-75-75-181 75-181 181-75 181 75 75 181zm704 384q0 159-112.5 271.5t-271.5 112.5-271.5-112.5-112.5-271.5 112.5-271.5 271.5-112.5 271.5 112.5 112.5 271.5zm576 225q0 78-56 118.5t-138 40.5h-134q-103-123-265-128 81-117 81-256 0-29-5-66 66 23 133 23 59 0 119-21.5t97.5-42.5 43.5-21q124 0 124 353zm-128-609q0 106-75 181t-181 75-181-75-75-181 75-181 181-75 181 75 75 181z">
                                        </path>
                                    </svg></span>
                                <span class="number rounded align-center">
                                    <p class="mbr-semibold mbr-fonts-style display-6">
                                        1
                                    </p>
                                </span>
                            </div>
                            <span class="map__divider"></span>
                            <span class="mbr-iconfont mbrib-right"><svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    width="20" height="20" viewBox="0 0 32 32" fill="currentColor">
                                    <path
                                        d="M17.724 0.3l14.016 14.008c0.348 0.368 0.348 1.008 0 1.376l-14.016 14.010c-0.94 0.936-2.332-0.494-1.44-1.376l13.328-13.324-13.328-13.318c-0.876-0.876 0.52-2.3 1.44-1.38zM1 16h24c1.304 0 1.37-2 0-2h-24c-1.35 0-1.28 2 0 2z">
                                    </path>
                                </svg></span>
                        </div>
                        <div class="card-box">
                            <h3 class="card-title mbr-fonts-style mbr-semibold mbr-white display-6">
                                Referal Compensation
                            </h3>
                            <p class="mbr-text mbr-white mbr-fonts-style display-4">
                                We reward our affiliates who onboard members into our platform with
                                Level 1 receiving Ksh. 300 Level 2- Ksh. 150 Level 3. Ksh. 50.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card mbr-col-sm-12 align-left mbr-col-md-6 mbr-col-lg-3">
                    <div class="card-wrapper mbr-flex mbr-column">
                        <div class="card-img mbr-flex">
                            <div class="icon__wrap rounded__10 mbr-flex mbr-align-center mbr-jc-c">
                                <span class="amp-iconfont align-center fa-server fa"><svg width="60" height="60"
                                        viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path
                                            d="M128 1408h1024v-128h-1024v128zm0-512h1024v-128h-1024v128zm1568 448q0-40-28-68t-68-28-68 28-28 68 28 68 68 28 68-28 28-68zm-1568-960h1024v-128h-1024v128zm1568 448q0-40-28-68t-68-28-68 28-28 68 28 68 68 28 68-28 28-68zm0-512q0-40-28-68t-68-28-68 28-28 68 28 68 68 28 68-28 28-68zm96 832v384h-1792v-384h1792zm0-512v384h-1792v-384h1792zm0-512v384h-1792v-384h1792z">
                                        </path>
                                    </svg></span>
                                <span class="number rounded align-center">
                                    <p class="mbr-semibold mbr-fonts-style display-6">
                                        2
                                    </p>
                                </span>
                            </div>
                            <span class="map__divider"></span>
                            <span class="mbr-iconfont mbrib-right"><svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    width="20" height="20" viewBox="0 0 32 32" fill="currentColor">
                                    <path
                                        d="M17.724 0.3l14.016 14.008c0.348 0.368 0.348 1.008 0 1.376l-14.016 14.010c-0.94 0.936-2.332-0.494-1.44-1.376l13.328-13.324-13.328-13.318c-0.876-0.876 0.52-2.3 1.44-1.38zM1 16h24c1.304 0 1.37-2 0-2h-24c-1.35 0-1.28 2 0 2z">
                                    </path>
                                </svg></span>
                        </div>
                        <div class="card-box">
                            <h3 class="card-title mbr-fonts-style mbr-semibold mbr-white display-6">
                                Crypto Multi Trading
                            </h3>
                            <p class="mbr-text mbr-white mbr-fonts-style display-4">
                                Our platforms makes it easy for those who would like
                                to trade in crypto currency to easily earn profits through buying and selling.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card mbr-col-sm-12 align-left mbr-col-md-6 mbr-col-lg-3">
                    <div class="card-wrapper mbr-flex mbr-column">
                        <div class="card-img mbr-flex">
                            <div class="icon__wrap rounded__10 mbr-flex mbr-align-center mbr-jc-c">
                                <span class="amp-iconfont align-center fa-area-chart fa"><svg width="60" height="60"
                                        viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path
                                            d="M2048 1536v128h-2048v-1536h128v1408h1920zm-384-1024l256 896h-1664v-576l448-576 576 576z">
                                        </path>
                                    </svg></span>
                                <span class="number rounded align-center">
                                    <p class="mbr-semibold mbr-fonts-style display-6">
                                        3
                                    </p>
                                </span>
                            </div>
                            <span class="map__divider"></span>
                            <span class="mbr-iconfont mbrib-right"><svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    width="20" height="20" viewBox="0 0 32 32" fill="currentColor">
                                    <path
                                        d="M17.724 0.3l14.016 14.008c0.348 0.368 0.348 1.008 0 1.376l-14.016 14.010c-0.94 0.936-2.332-0.494-1.44-1.376l13.328-13.324-13.328-13.318c-0.876-0.876 0.52-2.3 1.44-1.38zM1 16h24c1.304 0 1.37-2 0-2h-24c-1.35 0-1.28 2 0 2z">
                                    </path>
                                </svg></span>
                        </div>
                        <div class="card-box">
                            <h3 class="card-title mbr-fonts-style mbr-semibold mbr-white display-6">
                                Video Ad Promotion
                            </h3>
                            <p class="mbr-text mbr-white mbr-fonts-style display-4">
                                Earn through watching video ads and get compensted for monetized views.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-3 align-left last-child">
                    <div class="card-wrapper mbr-flex mbr-column">
                        <div class="card-img mbr-flex">
                            <div class="icon__wrap rounded__10 mbr-flex mbr-align-center mbr-jc-c">
                                <span class="amp-iconfont align-center fa-cloud-upload fa"><svg width="60" height="60"
                                        viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path
                                            d="M1344 864q0-14-9-23l-352-352q-9-9-23-9t-23 9l-351 351q-10 12-10 24 0 14 9 23t23 9h224v352q0 13 9.5 22.5t22.5 9.5h192q13 0 22.5-9.5t9.5-22.5v-352h224q13 0 22.5-9.5t9.5-22.5zm640 288q0 159-112.5 271.5t-271.5 112.5h-1088q-185 0-316.5-131.5t-131.5-316.5q0-130 70-240t188-165q-2-30-2-43 0-212 150-362t362-150q156 0 285.5 87t188.5 231q71-62 166-62 106 0 181 75t75 181q0 76-41 138 130 31 213.5 135.5t83.5 238.5z">
                                        </path>
                                    </svg></span>
                                <span class="number rounded align-center">
                                    <span class="mbr-iconfont fa-check fa"><svg width="16" height="16"
                                            viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor">
                                            <path
                                                d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z">
                                            </path>
                                        </svg></span></span>
                            </div>
                            <span class="map__divider"></span>
                            <span class="mbr-iconfont mbrib-right"><svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    width="20" height="20" viewBox="0 0 32 32" fill="currentColor">
                                    <path
                                        d="M17.724 0.3l14.016 14.008c0.348 0.368 0.348 1.008 0 1.376l-14.016 14.010c-0.94 0.936-2.332-0.494-1.44-1.376l13.328-13.324-13.328-13.318c-0.876-0.876 0.52-2.3 1.44-1.38zM1 16h24c1.304 0 1.37-2 0-2h-24c-1.35 0-1.28 2 0 2z">
                                    </path>
                                </svg></span>
                        </div>

                        <div class="card-box">
                            <h3 class="card-title mbr-fonts-style mbr-semibold mbr-white display-6">
                                Cryptocurrency
                            </h3>
                            <p class="mbr-text mbr-white mbr-fonts-style display-4">
                                Get advanced analytics that aid in Buy and sell cryptocurrency taking advantage
                                of our trading bot algorithms.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider__bottom"></div>
            <div class="text__bottom-block mbr-flex mbr-column mbr-align-center">
                <p class="text__bottom mbr-white mbr-fonts-style align-center display-4">
                    We boast on the ground presence in all key markets and topnotch reputation in the borders we
                    operate. <br>We leverage our experience and intelligence to to secure the best deals and
                    partnerships across the world.
                </p>
            </div>
        </div>
    </section>

    <section class="features6 cid-rIVd4UgKwf" id="features6-q">
        <div class="container-fluid">
            <div class="mbr-row">
                <div class="mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-3">
                    <div class="image item1">
                        <div class="mbr-overlay"></div>
                        <amp-img src="home/images/data7-720x480.jpg" alt="image" height="450" width="675"
                            layout="responsive" class="mobirise-loader">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div>
                            </div>
                        </amp-img>
                    </div>
                </div>
                <div class="mbr-col-sm-12 mbr-col-md-6 mbr-flex mbr-jc-c mbr-align-center box mbr-col-lg-3">
                    <div class="text__block text1 align-center">
                        <div>
                            <span class="mbr-iconfont-btn mbr-iconfont icon__text mbri-idea"><svg version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 32 32"
                                    fill="currentColor">
                                    <path
                                        d="M15.333 0c-0.369 0-0.667 0.297-0.667 0.667v2.667c0 0.369 0.297 0.667 0.667 0.667s0.667-0.297 0.667-0.667v-2.667c0-0.369-0.297-0.667-0.667-0.667zM6 4c-0.598 0-0.893 0.721-0.464 1.138l1.328 1.336c0.606 0.608 1.54-0.365 0.94-0.943l-1.328-1.336c-0.125-0.13-0.296-0.195-0.477-0.195zM24.666 4c-0.18 0-0.351 0.065-0.477 0.195l-1.331 1.336c-0.599 0.578 0.334 1.551 0.94 0.943l1.331-1.336c0.43-0.417 0.134-1.138-0.464-1.138zM15.333 6.667c-2.093 0-3.958 1.194-5.258 3.013s-2.076 4.281-2.076 6.987c0 2.706 0.776 5.167 2.076 6.987s3.165 3.013 5.258 3.013c2.093 0 3.958-1.194 5.258-3.013s2.076-4.281 2.076-6.987c0-2.706-0.776-5.167-2.076-6.987s-3.165-3.013-5.258-3.013zM15.333 8c1.589 0 3.059 0.897 4.172 2.456s1.828 3.762 1.828 6.211c0 2.449-0.715 4.652-1.828 6.211-0.622 0.871-1.358 1.526-2.161 1.943 0.026-1.708 0.228-3.133 0.531-4 0.374-1.069 0.913-1.735 1.781-2.237 0.616-0.34 0.346-1.25-0.349-1.25-0.111 0.004-0.22 0.039-0.315 0.096-1.126 0.651-1.916 1.646-2.372 2.951-0.443 1.266-0.611 2.826-0.62 4.776-0.503 0.184-0.903 0.148-1.333 0-0.009-1.95-0.177-3.51-0.62-4.776-0.457-1.304-1.246-2.3-2.372-2.951-0.095-0.057-0.204-0.092-0.315-0.096-0.694 0-0.965 0.91-0.349 1.25 0.868 0.502 1.407 1.168 1.781 2.237 0.303 0.867 0.505 2.314 0.531 4-0.803-0.417-1.54-1.072-2.161-1.943-1.113-1.558-1.828-3.762-1.828-6.211s0.715-4.652 1.828-6.211c1.113-1.559 2.583-2.456 4.172-2.456zM2 16c-0.369 0-0.667 0.297-0.667 0.667s0.297 0.667 0.667 0.667h2.667c0.369 0 0.667-0.297 0.667-0.667s-0.297-0.667-0.667-0.667zM26 16c-0.369 0-0.667 0.297-0.667 0.667s0.297 0.667 0.667 0.667h2.667c0.369 0 0.667-0.297 0.667-0.667s-0.297-0.667-0.667-0.667zM11.333 28c-0.369 0-0.667 0.297-0.667 0.667s0.297 0.667 0.667 0.667h8c0.369 0 0.667-0.297 0.667-0.667s-0.297-0.667-0.667-0.667zM11.333 30.667c-0.369 0-0.667 0.297-0.667 0.667s0.297 0.667 0.667 0.667h8c0.369 0 0.667-0.297 0.667-0.667s-0.297-0.667-0.667-0.667z">
                                    </path>
                                </svg></span>
                        </div>
                        <h3 class="mbr-fonts-style mbr-mt-1 mbr-section-title mbr-bold mbr-black display-5">
                            Honest and Reliable
                        </h3>
                        <p class="mbr-fonts-style card__text display-4">
                            Earnest Ventures strongly believes in creating a future proof investment strategy that will
                            last for years to come.
                        </p>
                        <div class="mbr-section-btn">
                            <a class="btn btn-md mbr-mt-2 btn-success display-4" href="#">
                                <span class="mbrib-right mbr-iconfont mbr-iconfont-btn"><svg version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 32 32"
                                        fill="currentColor">
                                        <path
                                            d="M17.724 0.3l14.016 14.008c0.348 0.368 0.348 1.008 0 1.376l-14.016 14.010c-0.94 0.936-2.332-0.494-1.44-1.376l13.328-13.324-13.328-13.318c-0.876-0.876 0.52-2.3 1.44-1.38zM1 16h24c1.304 0 1.37-2 0-2h-24c-1.35 0-1.28 2 0 2z">
                                        </path>
                                    </svg></span>
                                <span class="btn__hover">Read More</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-3">
                    <div class="image item2">
                        <div class="mbr-overlay"></div>
                        <amp-img src="home/images/data10-720x480.jpg" alt="image" height="450" width="675"
                            layout="responsive" class="mobirise-loader">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div>
                            </div>
                        </amp-img>
                    </div>
                </div>
                <div class="mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-3 mbr-flex mbr-jc-c mbr-align-center box">
                    <div class="text__block text2 align-center">
                        <div>
                            <span class="mbr-iconfont-btn mbr-iconfont icon__text mbri-magic-stick"><svg version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 32 32"
                                    fill="currentColor">
                                    <path
                                        d="M23.869 4.014c-0.005-0-0.011-0-0.017-0-0.12 0-0.233 0.030-0.331 0.082l-4.989 2.603-5.076-2.455c-0.090-0.044-0.196-0.070-0.308-0.070-0.377 0-0.682 0.292-0.682 0.652 0 0.043 0.004 0.085 0.012 0.125l1.048 5.34-4.009 3.857c-0.122 0.118-0.197 0.28-0.197 0.459 0 0.33 0.256 0.602 0.589 0.646l5.645 0.698 2.597 4.837c0.115 0.213 0.344 0.356 0.607 0.356 0.271 0 0.505-0.151 0.615-0.369l2.439-4.916 5.615-0.867c0.328-0.051 0.574-0.32 0.574-0.644 0-0.186-0.082-0.355-0.213-0.473l-4.135-3.735 0.873-5.372c0.005-0.030 0.008-0.065 0.008-0.101 0-0.354-0.296-0.642-0.664-0.652zM22.966 5.872l-0.719 4.407c-0.005 0.029-0.008 0.063-0.008 0.098 0 0.187 0.082 0.355 0.214 0.474l3.392 3.063-4.605 0.712c-0.225 0.035-0.411 0.172-0.506 0.359l-2.002 4.036-2.129-3.97c-0.102-0.188-0.292-0.321-0.517-0.35l-4.63-0.57 3.29-3.162c0.122-0.118 0.198-0.28 0.198-0.459 0-0.043-0.004-0.085-0.013-0.125l-0.86-4.378 4.163 2.012c0.090 0.044 0.196 0.070 0.308 0.070 0.12 0 0.233-0.030 0.331-0.082l4.092-2.136zM32 10c0 0.369-0.297 0.667-0.667 0.667h-2.667c-0.369 0-0.667-0.297-0.667-0.667s0.297-0.667 0.667-0.667h2.667c0.369 0 0.667 0.297 0.667 0.667zM5.977 6.661c-0.643 0-0.923 0.958-0.273 1.268l2.667 1.333c0.731 0.403 1.403-0.831 0.594-1.193l-2.667-1.333c-0.099-0.052-0.209-0.077-0.32-0.076zM23.333 18.667c-0.516-0.004-0.82 0.514-0.589 0.964l1.333 2.667c0.383 0.857 1.533 0.025 1.193-0.594l-1.333-2.667c-0.109-0.226-0.353-0.368-0.603-0.37zM18 0c0.369 0 0.667 0.297 0.667 0.667v2.667c0 0.369-0.297 0.667-0.667 0.667s-0.667-0.297-0.667-0.667v-2.667c0-0.369 0.297-0.667 0.667-0.667zM12.654 17.334c-0.173 0.001-0.337 0.072-0.458 0.195l-11.628 11.625c-0.363 0.363-0.567 0.806-0.567 1.254 0 0.437 0.137 0.857 0.426 1.153s0.71 0.44 1.15 0.44c0.445 0 0.899-0.203 1.267-0.57l11.628-11.625c0.604-0.58-0.351-1.535-0.943-0.943l-11.628 11.625c-0.439 0.439-0.792 0.010-0.391-0.391l11.628-11.625c0.402-0.393 0.134-1.142-0.484-1.138z">
                                    </path>
                                </svg></span>
                        </div>
                        <h3 class="mbr-fonts-style mbr-mt-1 mbr-section-title mbr-bold mbr-black display-5">
                            Flexibible and Adaptible
                        </h3>
                        <p class="mbr-fonts-style card__text display-4">

                            A highly flexible and tailored service which is customized to the individual needs of our
                            customers and clients.

                        </p>
                        <div class="mbr-section-btn">
                            <a class="btn btn-md mbr-mt-2 btn-success display-4" href="#">
                                <span class="mbrib-right mbr-iconfont mbr-iconfont-btn"><svg version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 32 32"
                                        fill="currentColor">
                                        <path
                                            d="M17.724 0.3l14.016 14.008c0.348 0.368 0.348 1.008 0 1.376l-14.016 14.010c-0.94 0.936-2.332-0.494-1.44-1.376l13.328-13.324-13.328-13.318c-0.876-0.876 0.52-2.3 1.44-1.38zM1 16h24c1.304 0 1.37-2 0-2h-24c-1.35 0-1.28 2 0 2z">
                                        </path>
                                    </svg></span>
                                <span class="btn__hover">Read More</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="title1 cid-rIV3LZ5r4B" id="title1-9">
        <div class="container">
            <div class="mbr-col-sm-12 mbr-col-md-12 mbr-col-lg-12 mbr-px-0 align-center">
                <div class="title__block align-left align-center">
                    <h3 class="mbr-bold title mbr-section-title mbr-fonts-style mbr-black display-2">
                        We offer Quality Services to your Progress!
                    </h3>
                    <span class="divider"></span>
                    <h4 class="subtitle mbr-fonts-style display-4">
                        General trading specialists at Earnest Ventures offer <br> customized solutions
                        to help customer with their needs to ensure high returns on their investments.
                    </h4>
                </div>
            </div>
        </div>
    </section>

    <section class="features2 cid-rIV3Ka4RDm" id="features2-8">
        <div class="container">
            <div class="mbr-row">
                <div class="mbr-col-sm-12 card mbr-col-lg-4 mbr-col-md-6">
                    <div class="inner-item rounded__10">
                        <div class="card-img">
                            <div class="image item1">
                                <amp-img src="home/images/data2-696x464.jpg" alt="image" height="200" width="300"
                                    layout="responsive" class="mobirise-loader rounded__10">
                                    <div placeholder="" class="placeholder">
                                        <div class="mobirise-spinner">
                                            <em></em>
                                            <em></em>
                                            <em></em>
                                        </div>
                                    </div>
                                    <a href="#"></a>
                                </amp-img>
                            </div>
                            <div class="card-text align-center">
                                <div class="card-text-box">
                                    <a href="#">
                                        <h3 class="mbr-fonts-style card__title mbr-semibold mbr-black display-6">
                                            Trading Experts
                                        </h3>
                                    </a>
                                    <span class="divider"></span>
                                    <p class="mbr-fonts-style mbr-regular card__text display-4">
                                        Analytics
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mbr-col-sm-12 card mbr-col-lg-4 mbr-col-md-6">
                    <div class="inner-item rounded__10">
                        <div class="card-img">
                            <div class="image item2">
                                <amp-img src="home/images/data5-696x464.jpg" alt="image" height="200" width="300"
                                    layout="responsive" class="mobirise-loader rounded__10">
                                    <div placeholder="" class="placeholder">
                                        <div class="mobirise-spinner">
                                            <em></em>
                                            <em></em>
                                            <em></em>
                                        </div>
                                    </div>
                                    <a href="#"></a>
                                </amp-img>
                            </div>
                            <div class="card-text align-center">
                                <div class="card-text-box">
                                    <a href="#">
                                        <h3 class="mbr-fonts-style card__title mbr-semibold mbr-black display-6">
                                            Profit Growth
                                        </h3>
                                    </a>
                                    <span class="divider"></span>
                                    <p class="mbr-fonts-style mbr-regular card__text display-4">
                                        Cryptocurrency
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mbr-col-sm-12 card mbr-col-lg-4 mbr-col-md-6">
                    <div class="inner-item rounded__10">
                        <div class="card-img">
                            <div class="image item3">
                                <amp-img src="home/images/data6-696x464.jpg" alt="image" height="200" width="300"
                                    layout="responsive" class="mobirise-loader rounded__10">
                                    <div placeholder="" class="placeholder">
                                        <div class="mobirise-spinner">
                                            <em></em>
                                            <em></em>
                                            <em></em>
                                        </div>
                                    </div>
                                    <a href="#"></a>
                                </amp-img>
                            </div>
                            <div class="card-text align-center">
                                <div class="card-text-box">
                                    <a href="#">
                                        <h3 class="mbr-fonts-style card__title mbr-semibold mbr-black display-6">
                                            Progressive Attitude
                                        </h3>
                                    </a>
                                    <span class="divider"></span>
                                    <p class="mbr-fonts-style mbr-regular card__text display-4">
                                        Aggressive
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="title2 cid-rIV79pmQnr" id="title2-g">
        <div class="container">
            <div class="mbr-col-sm-12 mbr-px-0 mbr-col-lg-12 mbr-col-md-12">
                <div class="mbr-col-sm-12 right mbr-flex">
                    <div class="service__icon align-left">
                        <span
                            class="mbr-iconfont mbr-iconfont-btn mbr-flex mbr-align-center mbr-jc-c fa-comments-o fa"><svg
                                width="40" height="40" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor">
                                <path
                                    d="M704 384q-153 0-286 52t-211.5 141-78.5 191q0 82 53 158t149 132l97 56-35 84q34-20 62-39l44-31 53 10q78 14 153 14 153 0 286-52t211.5-141 78.5-191-78.5-191-211.5-141-286-52zm0-128q191 0 353.5 68.5t256.5 186.5 94 257-94 257-256.5 186.5-353.5 68.5q-86 0-176-16-124 88-278 128-36 9-86 16h-3q-11 0-20.5-8t-11.5-21q-1-3-1-6.5t.5-6.5 2-6l2.5-5 3.5-5.5 4-5 4.5-5 4-4.5q5-6 23-25t26-29.5 22.5-29 25-38.5 20.5-44q-124-72-195-177t-71-224q0-139 94-257t256.5-186.5 353.5-68.5zm822 1169q10 24 20.5 44t25 38.5 22.5 29 26 29.5 23 25q1 1 4 4.5t4.5 5 4 5 3.5 5.5l2.5 5 2 6 .5 6.5-1 6.5q-3 14-13 22t-22 7q-50-7-86-16-154-40-278-128-90 16-176 16-271 0-472-132 58 4 88 4 161 0 309-45t264-129q125-92 192-212t67-254q0-77-23-152 129 71 204 178t75 230q0 120-71 224.5t-195 176.5z">
                                </path>
                            </svg></span>
                    </div>

                    <div class="title__block mbr-text">
                        <h3 class="title mbr-section-title mbr-bold mbr-fonts-style mbr-black display-2">
                            What Our Clients Say
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimoni als2 slider slider-with-bullets cid-rIV4Fd3Amy" id="testimonials2-a">
        <amp-state id="selectedtestimonials2a">
            <script type="application/json">
                {
                        "slide": 0
                    }
            </script>
        </amp-state>

        <div class="mbr-overlay"></div>
        <div class="mbr-row">
            <div class="slider-box mbr-flex mbr-column mbr-jc-c mbr-col-sm-12 mbr-col-md-12 mbr-col-lg-12">
                <amp-carousel class="carousel" layout="fixed-height" type="slides" loop="" height="440"
                    on="slideChange:AMP.setState({selectedtestimonials2a: {slide :event.index}})"
                    id="carouseltestimonials2a">
                    <div class="mbr-flex mbr-align-center">
                        <div class="mbr-row mbr-jc-c">
                            <div class="mbr-col-sm-12 mbr-col-md-8 mbr-col-lg-10">
                                <div class="card-box align-center">
                                    <div class="text__block mbr-flex mbr-column mbr-align-center">
                                        <div class="mbr-text mbr-flex quotes__align mbr-jc-c"></div>
                                        <div class="stars mbr-text">
                                            <span
                                                class="mbr-iconfont mbr-flex mbr-align-center mbr-jc-c mbr-iconfont-btn fa-star fa"><svg
                                                    width="15" height="15" viewBox="0 0 1792 1792"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <path
                                                        d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                                    </path>
                                                </svg></span>
                                            <span
                                                class="mbr-iconfont mbr-flex mbr-align-center mbr-jc-c mbr-iconfont-btn fa-star fa"><svg
                                                    width="15" height="15" viewBox="0 0 1792 1792"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <path
                                                        d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                                    </path>
                                                </svg></span>
                                            <span
                                                class="mbr-iconfont mbr-flex mbr-align-center mbr-jc-c mbr-iconfont-btn fa-star fa"><svg
                                                    width="15" height="15" viewBox="0 0 1792 1792"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <path
                                                        d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                                    </path>
                                                </svg></span>
                                            <span
                                                class="mbr-iconfont mbr-flex mbr-align-center mbr-jc-c mbr-iconfont-btn fa-star fa"><svg
                                                    width="15" height="15" viewBox="0 0 1792 1792"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <path
                                                        d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                                    </path>
                                                </svg></span>
                                            <span
                                                class="mbr-iconfont mbr-flex mbr-align-center mbr-jc-c mbr-iconfont-btn fa-star-o fa"><svg
                                                    width="15" height="15" viewBox="0 0 1792 1792"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <path
                                                        d="M1201 1004l306-297-422-62-189-382-189 382-422 62 306 297-73 421 378-199 377 199zm527-357q0 22-26 48l-363 354 86 500q1 7 1 20 0 50-41 50-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                                    </path>
                                                </svg></span>
                                        </div>
                                        <p class="mbr-fonts-style mbr-white quote-text mbr-medium display-5">
                                            Earnest Ventures' Crypto-Trading platform has made a significant difference
                                            to my finances.
                                            I have seen 225% increase in my investments which is pretty remarkable –
                                            Well, I am here to stay!
                                        </p>
                                        <p class="mbr-fonts-style mbr-text mbr-white author mbr-medium display-4">
                                            Alex Mutua
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mbr-flex mbr-align-center">
                        <div class="mbr-row mbr-jc-c">
                            <div class="mbr-col-sm-12 mbr-col-md-8 mbr-col-lg-10">
                                <div class="card-box align-center">
                                    <div class="text__block mbr-flex mbr-column mbr-align-center">
                                        <div class="mbr-text mbr-flex quotes__align mbr-jc-c"></div>
                                        <div class="stars mbr-text">
                                            <span
                                                class="mbr-iconfont mbr-flex mbr-align-center mbr-jc-c mbr-iconfont-btn fa-star fa"><svg
                                                    width="15" height="15" viewBox="0 0 1792 1792"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <path
                                                        d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                                    </path>
                                                </svg></span>
                                            <span
                                                class="mbr-iconfont mbr-flex mbr-align-center mbr-jc-c mbr-iconfont-btn fa-star fa"><svg
                                                    width="15" height="15" viewBox="0 0 1792 1792"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <path
                                                        d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                                    </path>
                                                </svg></span>
                                            <span
                                                class="mbr-iconfont mbr-flex mbr-align-center mbr-jc-c mbr-iconfont-btn fa-star fa"><svg
                                                    width="15" height="15" viewBox="0 0 1792 1792"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <path
                                                        d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                                    </path>
                                                </svg></span>
                                            <span
                                                class="mbr-iconfont mbr-flex mbr-align-center mbr-jc-c mbr-iconfont-btn fa-star fa"><svg
                                                    width="15" height="15" viewBox="0 0 1792 1792"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <path
                                                        d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                                    </path>
                                                </svg></span>
                                            <span
                                                class="mbr-iconfont mbr-flex mbr-align-center mbr-jc-c mbr-iconfont-btn fa-star-half-empty fa"><svg
                                                    width="15" height="15" viewBox="0 0 1792 1792"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <path
                                                        d="M1250 957l257-250-356-52-66-10-30-60-159-322v963l59 31 318 168-60-355-12-66zm452-262l-363 354 86 500q5 33-6 51.5t-34 18.5q-17 0-40-12l-449-236-449 236q-23 12-40 12-23 0-34-18.5t-6-51.5l86-500-364-354q-32-32-23-59.5t54-34.5l502-73 225-455q20-41 49-41 28 0 49 41l225 455 502 73q45 7 54 34.5t-24 59.5z">
                                                    </path>
                                                </svg></span>
                                        </div>
                                        <p class="mbr-fonts-style mbr-white quote-text mbr-medium display-5">
                                            I love this platform!! I am especially impressed by their referal
                                            compesation program. I have earned alot with this platform and
                                            I can attest that they are legitimate and they also pay on time.
                                        </p>
                                        <p class="mbr-fonts-style mbr-text mbr-white author mbr-medium display-4">
                                            Jack Oloo
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mbr-flex mbr-align-center">
                        <div class="mbr-row mbr-jc-c">
                            <div class="mbr-col-sm-12 mbr-col-md-8 mbr-col-lg-10">
                                <div class="card-box align-center">
                                    <div class="text__block mbr-flex mbr-column mbr-align-center">
                                        <div class="mbr-text mbr-flex quotes__align mbr-jc-c"></div>
                                        <div class="stars mbr-text">
                                            <span
                                                class="mbr-iconfont mbr-flex mbr-align-center mbr-jc-c mbr-iconfont-btn fa-star fa"><svg
                                                    width="15" height="15" viewBox="0 0 1792 1792"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <path
                                                        d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                                    </path>
                                                </svg></span>
                                            <span
                                                class="mbr-iconfont mbr-flex mbr-align-center mbr-jc-c mbr-iconfont-btn fa-star fa"><svg
                                                    width="15" height="15" viewBox="0 0 1792 1792"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <path
                                                        d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                                    </path>
                                                </svg></span>
                                            <span
                                                class="mbr-iconfont mbr-flex mbr-align-center mbr-jc-c mbr-iconfont-btn fa-star fa"><svg
                                                    width="15" height="15" viewBox="0 0 1792 1792"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <path
                                                        d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                                    </path>
                                                </svg></span>
                                            <span
                                                class="mbr-iconfont mbr-flex mbr-align-center mbr-jc-c mbr-iconfont-btn fa-star fa"><svg
                                                    width="15" height="15" viewBox="0 0 1792 1792"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <path
                                                        d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                                    </path>
                                                </svg></span>
                                            <span
                                                class="mbr-iconfont mbr-flex mbr-align-center mbr-jc-c mbr-iconfont-btn fa-star fa"><svg
                                                    width="15" height="15" viewBox="0 0 1792 1792"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <path
                                                        d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                                    </path>
                                                </svg></span>
                                        </div>
                                        <p class="mbr-fonts-style mbr-white quote-text mbr-medium display-5">
                                            Their customer care team is prompt always responding immediately to
                                            complaints. I am also
                                            immpressed with their educative video ads that pay.
                                        </p>
                                        <p class="mbr-fonts-style mbr-text mbr-white author mbr-medium display-4">
                                            Jane Kigen
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </amp-carousel>
                <div class="dots-wrapper">
                    <p class="dots">
                        <span role="button" tabindex="0" on="tap:carouseltestimonials2a.goToSlide(index=0)"
                            [class]="selectedtestimonials2a.slide == '0' ? 'current' : ''" class="current"></span>
                    </p>
                    <p class="dots">
                        <span role="button" tabindex="1" on="tap:carouseltestimonials2a.goToSlide(index=1)"
                            [class]="selectedtestimonials2a.slide == '1' ? 'current' : ''"></span>
                    </p>
                    <p class="dots">
                        <span role="button" tabindex="2" on="tap:carouseltestimonials2a.goToSlide(index=2)"
                            [class]="selectedtestimonials2a.slide == '2' ? 'current' : ''"></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="title1 cid-rIV9dEGVAu" id="title1-k">
        <div class="container">
            <div class="mbr-col-sm-12 mbr-col-md-12 mbr-col-lg-12 mbr-px-0 align-center">
                <div class="title__block align-left align-center">
                    <h3 class="mbr-bold title mbr-section-title mbr-fonts-style mbr-black display-2">
                        Plan &amp; Pricing
                    </h3>
                </div>
            </div>
        </div>
    </section>

    <section class="Price cid-rIV56JFhnV" id="price-b">
        <div class="mbr-overlay"></div>
        <div class="container">
            <div class="mbr-row mbr-jc-c">
                <div class="mbr-col-sm-12 mbr-col-md-6 card mbr-col-lg-4 mbr-col-xl-4">
                    <div class="inner-item rounded__7">
                        <div class="card__title align-center">
                            <p class="title__text mbr-medium mbr-fonts-style display-6">
                                Starter Pack
                            </p>
                        </div>
                        <div class="content__wrapper mbr-flex mbr-column mbr-align-center">
                            <div>
                                <p class="item__service mbr-fonts-style mbr-black display-4">
                                    <span class="fa fa-check mbr-iconfont"><svg width="16" height="16"
                                            viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor">
                                            <path
                                                d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z">
                                            </path>
                                        </svg></span>Level 1 Earns Ksh 300 Commision
                                </p>
                                <p class="item__service mbr-fonts-style mbr-black display-4">
                                    <span class="fa fa-check mbr-iconfont"><svg width="16" height="16"
                                            viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor">
                                            <path
                                                d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z">
                                            </path>
                                        </svg></span>Level 2 Earns Ksh 150 Commision
                                </p>
                                <p class="item__service mbr-fonts-style mbr-black display-4">
                                    <span class="fa fa-check mbr-iconfont"><svg width="16" height="16"
                                            viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor">
                                            <path
                                                d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z">
                                            </path>
                                        </svg></span>Level 2 Earns Ksh 50 Commision
                                </p>
                                <p class="item__service mbr-fonts-style mbr-black display-4">
                                    <span class="fa fa-check mbr-iconfont"><svg width="16" height="16"
                                            viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor">
                                            <path
                                                d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z">
                                            </path>
                                        </svg></span>Free video Ads
                                </p>
                                <p class="item__service mbr-fonts-style mbr-black display-4">
                                    <span class="fa fa-check mbr-iconfont"><svg width="16" height="16"
                                            viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor">
                                            <path
                                                d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z">
                                            </path>
                                        </svg></span>Free Welcome Spins
                                </p>
                                <p class="item__service mbr-fonts-style mbr-black display-4">
                                    <span class="fa fa-check mbr-iconfont"><svg width="16" height="16"
                                            viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor">
                                            <path
                                                d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z">
                                            </path>
                                        </svg></span>Free Bonus Spins
                                </p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="price__block rounded__7 mbr-flex mbr-align-center mbr-column">
                                <div class="price mbr-flex">
                                    <span class="price__dollar mbr-fonts-style mbr-black display-5">KES</span>
                                    <div>
                                        <p class="price__price mbr-medium mbr-fonts-style mbr-black">
                                            550
                                        </p>
                                    </div>
                                    <div class="mbr-flex mbr-column cols">
                                        <p class="price__subprice mbr-fonts-style mbr-black mbr-semibold display-5">
                                            00
                                        </p>

                                    </div>
                                </div>
                                <div class="mbr-section-btn">
                                    <a class="btn btn-md btn-success display-4" href="{{ route('register') }}">
                                        <span class="mbrib-right mbr-iconfont mbr-iconfont-btn"><svg version="1.1"
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 32 32" fill="currentColor">
                                                <path
                                                    d="M17.724 0.3l14.016 14.008c0.348 0.368 0.348 1.008 0 1.376l-14.016 14.010c-0.94 0.936-2.332-0.494-1.44-1.376l13.328-13.324-13.328-13.318c-0.876-0.876 0.52-2.3 1.44-1.38zM1 16h24c1.304 0 1.37-2 0-2h-24c-1.35 0-1.28 2 0 2z">
                                                </path>
                                            </svg></span>
                                        <span class="btn__hover">Purchase Now</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
    </section>

    <section class="title3 cid-rIV8EQsLnX" id="title3-j">
        <div class="container">
            <div class="title__block mbr-col-sm-12 mbr-col-md-12 mbr-px-0 mbr-flex">
                <div class="item__icon rounded__10 mbr-align-center mbr-jc-c mbr-flex">
                    <span class="mbr-iconfont align-center mbr-iconfont-btn fa-group fa"><svg width="20" height="20"
                            viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                            <path
                                d="M657 896q-162 5-265 128h-134q-82 0-138-40.5t-56-118.5q0-353 124-353 6 0 43.5 21t97.5 42.5 119 21.5q67 0 133-23-5 37-5 66 0 139 81 256zm1071 637q0 120-73 189.5t-194 69.5h-874q-121 0-194-69.5t-73-189.5q0-53 3.5-103.5t14-109 26.5-108.5 43-97.5 62-81 85.5-53.5 111.5-20q10 0 43 21.5t73 48 107 48 135 21.5 135-21.5 107-48 73-48 43-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-1024-1277q0 106-75 181t-181 75-181-75-75-181 75-181 181-75 181 75 75 181zm704 384q0 159-112.5 271.5t-271.5 112.5-271.5-112.5-112.5-271.5 112.5-271.5 271.5-112.5 271.5 112.5 112.5 271.5zm576 225q0 78-56 118.5t-138 40.5h-134q-103-123-265-128 81-117 81-256 0-29-5-66 66 23 133 23 59 0 119-21.5t97.5-42.5 43.5-21q124 0 124 353zm-128-609q0 106-75 181t-181 75-181-75-75-181 75-181 181-75 181 75 75 181z">
                            </path>
                        </svg></span>
                </div>
                <h2
                    class="title__title mbr-section-title mbr-fonts-style mbr-black mbr-bold mbr-align-center mbr-flex display-2">
                    Talk With Our Experts
                </h2>
            </div>
        </div>
    </section>

    <section class="form1 cid-rIVttOyR2x" id="form1-r">
        <!-- Block parameters controls (Blue "Gear" panel) -->

        <div class="container">
            <div class="form__wrap rounded__10">
                <div class="mbr-column mbr-flex mbr-jc-c" data-form-type="formoid">
                    <!--Formbuilder Form-->
                    <form method="post" class="mbr-form" action-xhr="https://formoid.net/api/amp-form/push"
                        data-form-title="Mobirise Form">
                        <input type="hidden" name="email" data-form-email="true"
                            value="S8N8APruguMrxbuTC0/nocrdM+8bl6Bd4cdqfuPl9Dma12KVWYSLzaw2te6OFAkjDLVpfI/K4tbgQWWWKZEZds2va9BdxSWrogpBygzSMZRaz0UUIxhjbUKhS4V6Ctem" />
                        <div class="mbr-row">
                            <div submit-success="" class="mbr-col-lg-12 mbr-col-md-12 mbr-col-sm-12">
                                <template data-form-alert="" type="amp-mustache">Subscription successful!</template>
                            </div>
                            <div submit-error="" class="mbr-col-lg-12 mbr-col-md-12 mbr-col-sm-12">
                                <template data-form-alert="" type="amp-mustache">Failed! </template>
                            </div>
                        </div>
                        <div class="dragArea mbr-row">
                            <div data-for="form[data][0][1]" class="mbr-col-lg-4 mbr-col-md-6 mbr-col-sm-12 field">
                                <label for="form[data][0][1]-form1-r"
                                    class="form-control-label mbr-fonts-style display-4">First name *</label>
                                <input type="hidden" name="form[data][0][0]" value="Name" id="form[data][0][0]-form1-r"
                                    data-form-field="" />
                                <span class="mbr-iconfont fa-user fa"><svg width="18" height="18"
                                        viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path
                                            d="M1536 1399q0 109-62.5 187t-150.5 78h-854q-88 0-150.5-78t-62.5-187q0-85 8.5-160.5t31.5-152 58.5-131 94-89 134.5-34.5q131 128 313 128t313-128q76 0 134.5 34.5t94 89 58.5 131 31.5 152 8.5 160.5zm-256-887q0 159-112.5 271.5t-271.5 112.5-271.5-112.5-112.5-271.5 112.5-271.5 271.5-112.5 271.5 112.5 112.5 271.5z">
                                        </path>
                                    </svg></span>
                                <input type="text" name="form[data][0][1]" placeholder="First Name"
                                    data-form-field="Name" class="field-input display-4" required="required" value=""
                                    id="form[data][0][1]-form1-r" />
                            </div>

                            <div data-for="form[data][1][1]" class="mbr-col-lg-4 mbr-col-md-6 mbr-col-sm-12 field">
                                <label for="form[data][1][1]-form1-r"
                                    class="form-control-label mbr-fonts-style display-4">Last name *</label>
                                <input type="hidden" name="form[data][1][0]" value="Last Name"
                                    id="form[data][1][0]-form1-r" data-form-field="" />
                                <span class="mbr-iconfont fa-user fa"><svg width="18" height="18"
                                        viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path
                                            d="M1536 1399q0 109-62.5 187t-150.5 78h-854q-88 0-150.5-78t-62.5-187q0-85 8.5-160.5t31.5-152 58.5-131 94-89 134.5-34.5q131 128 313 128t313-128q76 0 134.5 34.5t94 89 58.5 131 31.5 152 8.5 160.5zm-256-887q0 159-112.5 271.5t-271.5 112.5-271.5-112.5-112.5-271.5 112.5-271.5 271.5-112.5 271.5 112.5 112.5 271.5z">
                                        </path>
                                    </svg></span>
                                <input type="text" name="form[data][1][1]" placeholder="Last Name"
                                    data-form-field="Last Name" class="field-input display-4" required="required"
                                    value="" id="form[data][1][1]-form1-r" />
                            </div>
                            <div data-for="form[data][2][1]" class="mbr-col-lg-4 mbr-col-md-6 mbr-col-sm-12 field">
                                <label for="form[data][2][1]-form1-r"
                                    class="form-control-label mbr-fonts-style display-4">What is your inquiry about?
                                    *</label>
                                <span class="mbr-iconfont fa-info fa"><svg width="18" height="18"
                                        viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path
                                            d="M1216 1344v128q0 26-19 45t-45 19h-512q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h64v-384h-64q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h384q26 0 45 19t19 45v576h64q26 0 45 19t19 45zm-128-1152v192q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-192q0-26 19-45t45-19h256q26 0 45 19t19 45z">
                                        </path>
                                    </svg></span>
                                <input type="hidden" name="form[data][2][0]" value="select"
                                    id="form[data][2][0]-form1-r" data-form-field="" />
                                <select name="form[data][2][1]" data-form-field="select" class="field-input display-4"
                                    required="required" id="form[data][2][1]-form1-r">
                                    <option value="Please Select">
                                        Please Select
                                    </option>
                                    <option value="First Choice">
                                        Payment Inquiry
                                    </option>
                                </select>
                            </div>
                            <div data-for="form[data][3][1]" class="mbr-col-lg-4 mbr-col-md-6 mbr-col-sm-12 field">
                                <label for="form[data][3][1]-form1-r"
                                    class="form-control-label mbr-fonts-style display-4">Phone number</label>
                                <span class="mbr-iconfont fa-phone fa"><svg width="18" height="18"
                                        viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path
                                            d="M1600 1240q0 27-10 70.5t-21 68.5q-21 50-122 106-94 51-186 51-27 0-53-3.5t-57.5-12.5-47-14.5-55.5-20.5-49-18q-98-35-175-83-127-79-264-216t-216-264q-48-77-83-175-3-9-18-49t-20.5-55.5-14.5-47-12.5-57.5-3.5-53q0-92 51-186 56-101 106-122 25-11 68.5-21t70.5-10q14 0 21 3 18 6 53 76 11 19 30 54t35 63.5 31 53.5q3 4 17.5 25t21.5 35.5 7 28.5q0 20-28.5 50t-62 55-62 53-28.5 46q0 9 5 22.5t8.5 20.5 14 24 11.5 19q76 137 174 235t235 174q2 1 19 11.5t24 14 20.5 8.5 22.5 5q18 0 46-28.5t53-62 55-62 50-28.5q14 0 28.5 7t35.5 21.5 25 17.5q25 15 53.5 31t63.5 35 54 30q70 35 76 53 3 7 3 21z">
                                        </path>
                                    </svg></span>
                                <input type="hidden" name="form[data][3][0]" value="phone" id="form[data][3][0]-form1-r"
                                    data-form-field="" />
                                <input type="tel" name="form[data][3][1]" placeholder="Full Number"
                                    pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" data-form-field="phone"
                                    class="field-input display-4" value="" id="form[data][3][1]-form1-r" />
                            </div>
                            <div data-for="form[data][4][1]" class="mbr-col-lg-4 mbr-col-md-6 mbr-col-sm-12 field">
                                <label for="form[data][4][1]-form1-r"
                                    class="form-control-label mbr-fonts-style display-4">Work email address *</label>
                                <input type="hidden" name="form[data][4][0]" value="E-mail"
                                    id="form[data][4][0]-form1-r" data-form-field="" />
                                <span class="mbr-iconfont fa-envelope fa"><svg width="18" height="18"
                                        viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path
                                            d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z">
                                        </path>
                                    </svg></span>
                                <input type="email" name="form[data][4][1]" placeholder="email@example.com"
                                    data-form-field="E-mail" class="field-input display-4" required="required" value=""
                                    id="form[data][4][1]-form1-r" />
                            </div>
                            <div class="mbr-col-lg-4 mbr-col-md-6 mbr-col-sm-12 field field__btn mbr-flex">
                                <button type="submit" class="btn btn-sm btn-form btn-success display-4">
                                    Get a free consultation
                                </button>
                            </div>
                        </div>
                    </form>
                    <!--Formbuilder Form-->
                </div>
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