<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MAKING') }}</title>
    <!-- mall 商城 -->
    <!-- Styles -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/reset.css" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
        ])!!};
        Laravel.apiToken = "{{Auth::check()? 'Bearer '.Auth::user()->api_token : 'Bearer '}}";
    </script>
</head>
<body>
<div id="app">
    <div class="navbar">
        <div class="nav-container container font-mini block-center">
            <span>XX 欢迎你! </span>
            <span class="padding-rl-10 border-1px-r">登陆</span>
            <span class="padding-rl-10 border-1px-r">免费注册</span>
            <div class="pull-right">
                <span class="padding-rl-10 border-1px-r">我的订单</span>
                <span class="padding-rl-10 border-1px-r">个人中心</span>
                <span class="padding-rl-10 border-1px-r">客户服务</span>
            </div>
        </div>
    </div>
    @yield('content')
    
</div>

<script src="/js/app.js"></script>

</body>
</html>
