<!DOCTYPE html>
<html class="sf-js-enabled" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ZF-Immo') }}</title>
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    @vite(['resources/js/app.js'])
    <!-- Styles -->
    @livewireStyles
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css') }}">
    {{-- <!-- Select css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins-init/select2.min.css') }}"> --}}
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css/css/animate.css') }}">

    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    {{-- mon CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/mon-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">
    <script src="{{asset('assets/js/mon-script.js')}}" defer></script>

</head>


</head>

<body themebg-pattern="pattern2" style="">
    {{-- @include('shared.preloader') --}}
    <x-banner />
    <div id="pcoded" class="pcoded iscollapsed" theme-layout="vertical" vertical-placement="left" vertical-layout="wide" pcoded-device-type="desktop" vertical-nav-type="expanded" vertical-effect="shrink" vnavigation-view="view1" nav-type="st2" fream-type="theme1" layout-type="light">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @livewire('navigation-menu')
            <div class="pcoded-main-container" style="margin-top:80px">
                <div class="pcoded-wrapper">
                    {{-- sidebar starts --}}
                    <x-sidebar></x-sidebar>
                    {{-- sidebar ends --}}
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- page content -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    {{ $slot }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
    {{--
    @stack('modals') --}}
    <!-- Required Jquery -->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/popper.js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>


    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
    <script type="text/javascript " src="{{ asset('assets/js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('assets/js/demo-12.js') }}"></script>

</body>

</html>

