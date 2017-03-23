{{--@extends('layouts.app')--}}
        {{--@section('content')--}}
<!-- HEADER TOP -->
<div class="header-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{config('name','MAKING')}}
        </a>
        <ul class="actions unstyled clearfix">
            <a href="{{ url('/login') }}">
                <button class="mini ui button">登录</button>
            </a>
            <a href="{{ url('/register') }}">
                <button class="mini ui button">注册</button>
            </a>
        </ul>

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-7">
                <!-- CONTACT INFO -->
                <!--<div class="contact-info">
                    <i class="iconfont-headphones round-icon"></i>
                    <strong>+444 (100) 1234</strong>
                    <span>(Mon- Fri: 09.00 - 21.00)</span>
                </div>-->
                <!-- // CONTACT INFO -->
            </div>
            <div class="col-xs-12 col-sm-6 col-md-5">
                <ul class="actions unstyled clearfix">
                    <li>
                        <!-- SEARCH BOX -->
                        <div class="search-box">
                            <form action="#" method="post">
                                <div class="input-iconed prepend">
                                    <button class="input-icon"><i class="iconfont-search"></i></button>
                                    <label for="input-search" class="placeholder">.…</label>
                                    <input type="text" name="q" id="input-search" class="round-input full-width" required/>
                                </div>
                            </form>
                        </div>
                        <!-- // SEARCH BOX -->
                    </li>
                    <li data-toggle="sub-header" data-target="#sub-social">
                        <!-- SOCIAL ICONS -->
                        <a href="javascript:void(0);" id="social-icons">
                            <i class="iconfont-share round-icon"></i>
                        </a>

                        <div id="sub-social" class="sub-header">
                            <ul class="social-list unstyled text-center">
                                <li><a href="#"><i class="iconfont-facebook round-icon"></i></a></li>
                                <li><a href="#"><i class="iconfont-twitter round-icon"></i></a></li>
                                <li><a href="#"><i class="iconfont-google-plus round-icon"></i></a></li>
                                <li><a href="#"><i class="iconfont-pinterest round-icon"></i></a></li>
                                <li><a href="#"><i class="iconfont-rss round-icon"></i></a></li>
                            </ul>
                        </div>
                        <!-- // SOCIAL ICONS -->
                    </li>
                    <li data-toggle="sub-header" data-target="#sub-cart">
                        <!-- SHOPPING CART -->
                        <a href="javascript:void(0);" id="total-cart">
                            <i class="iconfont-shopping-cart round-icon"></i>
                        </a>

                        <div id="sub-cart" class="sub-header">
                            <div class="cart-header">
                                <span>您的购物车为空！</span>
                                <small><a href="cart.html">(所有)</a></small>
                            </div>
                            <ul class="cart-items product-medialist unstyled clearfix"></ul>
                            <div class="cart-footer">
                                <div class="cart-total clearfix">
                                    <span class="pull-left uppercase">合计</span>
                                    <span class="pull-right total">￥ 0</span>
                                </div>
                                <div class="text-right">
                                    <a href="cart.html" class="btn btn-default btn-round view-cart">查看购物车</a>
                                </div>
                            </div>
                        </div>
                        <!-- // SHOPPING CART -->
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <!-- ADD TO CART MESSAGE -->
    <div class="cart-notification">
        <ul class="unstyled"></ul>
    </div>
    <!-- // ADD TO CART MESSAGE -->
</div>