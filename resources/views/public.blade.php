@extends('layouts.app')

@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&display=swap" rel="stylesheet">

    <!-- Styles ok -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>

    <link href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/js/datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/js/owl-carousel/owl.carousel.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/themecss/lib.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/js/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/js/lightslider/lightslider.css') }}" rel="stylesheet"/>


    <link href="{{ asset('assets/css/themecss/so_megamenu.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/themecss/so-categories.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/themecss/so-listing-tabs.css') }}" rel="stylesheet"/>
    <link id="color_scheme" href="{{ asset('assets/css/home3.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet"/>


@endsection

@section('title') Chashipolli.com @endsection

@section('content')
        <header-menu></header-menu>

        <router-view></router-view>

    <footer-section></footer-section>
@endsection

@section('scripts')

    <link rel="stylesheet" property="stylesheet"  href="{{ asset('assets/css/themecss/cpanel.css') }}" type="text/css" media="all"/>

    <!-- Include Libs & Plugins
    ============================================ -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/themejs/libs.js') }}"></script>
    <script src="{{ asset('assets/js/unveil/jquery.unveil.js') }}"></script>
    <script src="{{ asset('assets/js/countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js') }}"></script>
    <script src="{{ asset('assets/js/datetimepicker/moment.js') }}"></script>
    <script src="{{ asset('assets/js/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/lightslider/lightslider.js') }}"></script>

    <!-- Theme files
    ============================================ -->
    <script src="{{ asset('assets/js/themejs/application.js') }}"></script>
    <script src="{{ asset('assets/js/themejs/toppanel.js') }}"></script>
    <script src="{{ asset('assets/js/themejs/so_megamenu.js') }}"></script>
    <script src="{{ asset('assets/js/themejs/addtocart.js') }}"></script>
    <script src="{{ asset('assets/js/themejs/accordion.js') }}"></script>
    <script src="{{ asset('assets/js/themejs/cpanel.js') }}"></script>


@endsection

