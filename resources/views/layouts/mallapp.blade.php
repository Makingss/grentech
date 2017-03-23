<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MAKING') }}</title>
    <link rel="stylesheet" type="text/css" href="//cdn.bootcss.com/semantic-ui/2.2.9/semantic.min.css">
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <!-- PARTICULAR PAGES CSS FILES -->
    <link rel="stylesheet" href="/sites-css/owl.carousel.css">
    <link rel="stylesheet" href="/sites-css/owl.theme.css">
    <link href="/sites-css/flexslider.css" rel="stylesheet"/>
    <!-- // PARTICULAR PAGES CSS FILES -->
    <link rel="stylesheet" href="/sites-css/responsive.css">
    <!-- // PAGE WRAPPER -->


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>;
        Laravel.apiToken = "{{Auth::check()? 'Bearer '.Auth::user()->api_token : 'Bearer '}}";
    </script>

    <!--[if IE 8]>
    <script src="/sites-js/respond.min.js"></script>
    <script src="/sites-js/selectivizr-min.js"></script>
    <![endif]-->
    <!--
    <script src="js/jquery.min.js"></script>
    -->
    <script>window.jQuery || document.write('<script src="/sites-js/jquery.min.js"><\/script>');</script>
    <script src="/sites-js/modernizr.min.js"></script>


    <!-- Essential Javascripts -->
    <script src="/sites-js/minified.js"></script>
    <!-- // Essential Javascripts -->

    <!-- Particular Page Javascripts -->
    <script src="/sites-js/owl.carousel.js"></script>
    <script src="/sites-js/jquery.flexslider-min.js"></script>
    <!-- // Particular Page Javascripts -->


    <script src="/js/app.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="//cdn.bootcss.com/semantic-ui/2.2.9/semantic.min.js"></script>
    <script>
        $('#flash-overlay-modal').modal();
        $('#captcha').on('click', function () {
            var captcha = $(this);
            var url = '/captcha/' + captcha.attr('data-captcha-config') + '/?' + Math.random();
            captcha.attr('src', url);
        });
    </script>

</head>
{{--<body>--}}
<div id="app">
    {{--<div class="header-top">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<!-- Branding Image -->--}}
                {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                    {{--{{config('name','MAKING')}}--}}
                {{--</a>--}}
                {{--<ul class="nav navbar-nav navbar-right">--}}
                    {{--@if (Auth::guest())--}}
                        {{--<li><a href="{{ url('/login') }}">--}}
                                {{--<button type="button" class="btn btn-primary">登录</button>--}}
                            {{--</a></li>--}}
                        {{--<li><a href="{{ url('/register') }}">--}}
                                {{--<button type="button" class="btn btn-primary">注册</button>--}}
                            {{--</a></li>--}}
                    {{--@else--}}
                        {{--<li class="dropdown">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                                {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                            {{--</a>--}}

                            {{--<ul class="dropdown-menu" role="menu">--}}
                                {{--<li>--}}
                                    {{--<a href="{{ url('/logout') }}"--}}
                                       {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                        {{--退出登录--}}
                                    {{--</a>--}}

                                    {{--<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">--}}
                                        {{--{{ csrf_field() }}--}}
                                    {{--</form>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                {{--</ul>--}}
                {{--@endif--}}
                {{--<div class="col-xs-12 col-sm-6 col-md-7">--}}
                    {{--<!-- CONTACT INFO -->--}}
                    {{--<!--<div class="contact-info">--}}
                        {{--<i class="iconfont-headphones round-icon"></i>--}}
                        {{--<strong>+444 (100) 1234</strong>--}}
                        {{--<span>(Mon- Fri: 09.00 - 21.00)</span>--}}
                    {{--</div>-->--}}
                    {{--<!-- // CONTACT INFO -->--}}
                {{--</div>--}}
                {{--<div class="col-xs-12 col-sm-6 col-md-5">--}}
                    {{--<ul class="actions unstyled clearfix">--}}
                        {{--<li>--}}
                            {{--<!-- SEARCH BOX -->--}}
                            {{--<div class="search-box">--}}
                                {{--<form action="#" method="post">--}}
                                    {{--<div class="input-iconed prepend">--}}
                                        {{--<button class="input-icon"><i class="iconfont-search"></i></button>--}}
                                        {{--<label for="input-search" class="placeholder">.…</label>--}}
                                        {{--<input type="text" name="q" id="input-search" class="round-input full-width" required/>--}}
                                    {{--</div>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                            {{--<!-- // SEARCH BOX -->--}}
                        {{--</li>--}}
                        {{--<li data-toggle="sub-header" data-target="#sub-social">--}}
                            {{--<!-- SOCIAL ICONS -->--}}
                            {{--<a href="javascript:void(0);" id="social-icons">--}}
                                {{--<i class="iconfont-share round-icon"></i>--}}
                            {{--</a>--}}

                            {{--<div id="sub-social" class="sub-header">--}}
                                {{--<ul class="social-list unstyled text-center">--}}
                                    {{--<li><a href="#"><i class="iconfont-facebook round-icon"></i></a></li>--}}
                                    {{--<li><a href="#"><i class="iconfont-twitter round-icon"></i></a></li>--}}
                                    {{--<li><a href="#"><i class="iconfont-google-plus round-icon"></i></a></li>--}}
                                    {{--<li><a href="#"><i class="iconfont-pinterest round-icon"></i></a></li>--}}
                                    {{--<li><a href="#"><i class="iconfont-rss round-icon"></i></a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                            {{--<!-- // SOCIAL ICONS -->--}}
                        {{--</li>--}}
                        {{--<li data-toggle="sub-header" data-target="#sub-cart">--}}
                            {{--<!-- SHOPPING CART -->--}}
                            {{--<a href="javascript:void(0);" id="total-cart">--}}
                                {{--<i class="iconfont-shopping-cart round-icon"></i>--}}
                            {{--</a>--}}

                            {{--<div id="sub-cart" class="sub-header">--}}
                                {{--<div class="cart-header">--}}
                                    {{--<span>您的购物车为空！</span>--}}
                                    {{--<small><a href="cart.html">(所有)</a></small>--}}
                                {{--</div>--}}
                                {{--<ul class="cart-items product-medialist unstyled clearfix"></ul>--}}
                                {{--<div class="cart-footer">--}}
                                    {{--<div class="cart-total clearfix">--}}
                                        {{--<span class="pull-left uppercase">合计</span>--}}
                                        {{--<span class="pull-right total">￥ 0</span>--}}
                                    {{--</div>--}}
                                    {{--<div class="text-right">--}}
                                        {{--<a href="cart.html" class="btn btn-default btn-round view-cart">查看购物车</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!-- // SHOPPING CART -->--}}
                        {{--</li>--}}

                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="navbar-default">--}}
            {{--@include('flash::message');--}}
            {{--@if (session()->has('flash_notification.message'))--}}
                {{--<div class="alert alert-{{ session('flash_notification.level') }}">--}}
                    {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}

                    {{--{!! session('flash_notification.message') !!}--}}
                {{--</div>--}}
            {{--@endif--}}
        {{--</div>--}}
        {{--@yield('content')--}}
    {{--</div>--}}
</div>
{{--</body>--}}
</html>
