<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.phoenixcoded.net/mega-able/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Mar 2020 05:10:00 GMT -->
@include('layouts.tema1.komponen.head')

<body>
@include('layouts.tema1.komponen.preloader')


    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <div class="mobile-search waves-effect waves-light">
                            <div class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close"><i class="ti-close input-group-text"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn"><i class="ti-search input-group-text"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('home')}}">
                            <img class="img-fluid" src="{{ asset('gambar/logo/android-icon-48x48.png')}}" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="ti-more"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            {{--search area }}
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close"><i class="ti-close input-group-text"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn"><i class="ti-search input-group-text"></i></span>
                                    </div>
                                </div>
                            </li>
                            {{--search area --}}
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            {{--notification--}}
                            {{--chat button }}
                            <li class="">
                                <a href="#!" class="displayChatbox waves-effect waves-light">
                                    <i class="ti-comments"></i>
                                    <span class="badge bg-c-green"></span>
                                </a>
                            </li>
                            {{--chat button--}}
                            <li class="user-profile header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    <img src="{{asset('gambar/nofoto.png')}}" class="img-radius" alt="User-Profile-Image">
                                    <span>
                                        @auth
                                            {{Auth::user()->name}}
                                        @else
                                            Hallo
                                        @endauth
                                    </span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    @auth
                                        <li class="waves-effect waves-light">
                                            <a href="{{ route('profil.setting') }}">
                                                <i class="ti-settings"></i> Settings
                                            </a>
                                        </li>
                                        <li class="waves-effect waves-light">
                                            <a href="{{route('profil.index')}}">
                                                <i class="ti-user"></i> Profile
                                            </a>
                                        </li>
                                        <li class="waves-effect waves-light">
                                            <a href="#!">
                                                <i class="ti-email"></i> My Messages
                                            </a>
                                        </li>
                                        <li class="waves-effect waves-light">
                                            <a href="auth-lock-screen.html">
                                                <i class="ti-lock"></i> Lock Screen
                                            </a>
                                        </li>
                                        <li class="waves-effect waves-light">
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                <i class="ti-layout-sidebar-left"></i> Logout
                                            </a>
                                        </li>
                                    @else
                                        <li class="waves-effect waves-light">
                                            <a href="{{route('login')}}">
                                                <i class="ti-key"></i> Login
                                            </a>
                                        </li>
                                    @endauth

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            {{--chat--}}

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('layouts.tema1.komponen.sidebar')

                    <div class="pcoded-content">

                        {{--pageheader--}}
                        {{--<x-tema1.pageheader :judul=$judul/>--}}
                        @include('layouts.tema1.komponen.page-header')
                        {{--page header --}}

                        <div class="pcoded-inner-content">

                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        @yield('konten')
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Normal Sign In</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <p>
                                                            <x-tema1.modal header="Hola" class="btn btn-primary"/>
                                                        </p>
                                                        <p class="text-center">
                                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#sign-in">Normal Sign in</button>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>



                                </div>
                            </div>

                            <div id="styleSelector">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->

@include('layouts.tema1.komponen.script')
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</body>

</html>
