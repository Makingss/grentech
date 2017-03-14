<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MAKING') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>;
        Laravel.apiToken = "{{Auth::check()? 'Bearer '.Auth::user()->api_token : 'Bearer '}}";
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{config('name','MAKING')}}
                </a>
            </div>

            {{--<div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
                    <!-- Left Side Of Navbar -->
            {{--<ul class="nav nav-tabs nav-justified" role="tablist">--}}
            {{--<li><a href="{{ url('/#') }}">--}}
            {{--<button type="button" class="btn btn-link">站点</button>--}}
            {{--</a></li>--}}
            {{--<li><a href="{{ url('/#') }}">--}}
            {{--<button type="button" class="btn btn-link">订单</button>--}}
            {{--</a></li>--}}
            {{--<li><a href="{{ url('/#') }}">--}}
            {{--<button type="button" class="btn btn-link">商品</button>--}}
            {{--</a></li>--}}
            {{--<li><a href="{{ url('/#') }}">--}}
            {{--<button type="button" class="btn btn-link">会员</button>--}}
            {{--</a></li>--}}
            {{--<li><a href="{{ url('/#') }}">--}}
            {{--<button type="button" class="btn btn-link">营销</button>--}}
            {{--</a></li>--}}
            {{--<li><a href="{{ url('/#') }}">--}}
            {{--<button type="button" class="btn btn-link">报表</button>--}}
            {{--</a></li>--}}
            {{--<li><a href="{{ url('/#') }}">--}}
            {{--<button type="button" class="btn btn-link">微店</button>--}}
            {{--</a></li>--}}
            {{--<li><a href="{{ url('/#') }}">--}}
            {{--<button type="button" class="btn btn-link">文章</button>--}}
            {{--</a></li>--}}
            {{--<li><a href="{{ url('/#') }}">--}}
            {{--<button type="button" class="btn btn-link">视频</button>--}}
            {{--</a></li>--}}
            {{--<li><a href="{{ url('/#') }}">--}}
            {{--<button type="button" class="btn btn-link">问答</button>--}}
            {{--</a></li>--}}

            {{--</ul>--}}

                    <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">
                            <button type="button" class="btn btn-primary">登录</button>
                        </a></li>
                    <li><a href="{{ url('/register') }}">
                            <button type="button" class="btn btn-primary">加入MAKING</button>
                        </a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    退出登录
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        {{--</div>--}}
    </nav>
    <div class="navbar-default">
        {{--@include('flash::message');--}}
        @if (session()->has('flash_notification.message'))
            <div class="alert alert-{{ session('flash_notification.level') }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                {!! session('flash_notification.message') !!}
            </div>
        @endif
    </div>
    @yield('content')
</div>
{{--<script src="https://unpkg.com/vue/dist/vue.js"></script>--}}
        <!-- Scripts -->
<script src="/js/app.js"></script>
<script>
    $('#flash-overlay-modal').modal();
    $('#captcha').on('click', function () {
        var captcha = $(this);
        var url = '/captcha/' + captcha.attr('data-captcha-config') + '/?' + Math.random();
        captcha.attr('src', url);
    });
</script>
</body>
</html>
