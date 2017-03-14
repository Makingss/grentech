@extends('layouts.app')
@section('content')

        <!--<div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
        <a href="{{ url('/home') }}">Home</a>
                @else
        <a href="{{ url('/login') }}">登录</a>
                    <a href="{{ url('/register') }}">注册</a>
                @endif
        </div>
    -->
@endif
<form>
    <div id="app">
        <question-follow-button question="" user="{{Auth::id()}}"></question-follow-button>
        {{--<send-code-field></send-code-field>--}}
    </div>
</form>
@stop




