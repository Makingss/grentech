{{--<header id="site-header" role="banner">--}}
    {{--@include('mall.layouts.headertop')--}}
{{--</header>--}}
    <!-- // HEADER TOP -->
    <!-- MAIN HEADER -->
    <div class="main-header-wrapper">
        <div class="container">
            <div class="main-header">
                <!-- CURRENCY / LANGUAGE / USER MENU -->
                <div class="actions">
                    <!--<div class="center-xs">
                        <!-- CURRENCY -->
                        <!--<ul class="option-list unstyled">
                            <li class="active"><a href="#" data-toggle="tooltip" title="USD - US Dollar">$</a></li>
                            <li><a href="#" data-toggle="tooltip" title="GBP - British Pound">£</a></li>
                            <li><a href="#" data-toggle="tooltip" title="EUR - Euro">€</a></li>
                        </ul>
                        <!-- // CURRENCY -->
                        <!-- LANGUAGES -->
                        <!--<ul class="option-list unstyled">
                            <li class="active"><a href="#" data-toggle="tooltip" title="English">EN</a></li>
                            <li><a href="#" data-toggle="tooltip" title="French">FR</a></li>
                            <li><a href="#" data-toggle="tooltip" title="Deutsch">DE</a></li>
                        </ul>
                        <!-- // LANGUAGES -->
                   <!-- </div>
                    -->
                    <div class="clearfix"></div>
                    <!-- USER RELATED MENU -->
                    <nav id="tiny-menu" class="clearfix">
                        <ul class="user-menu">
                            <li><a href="#">我的帐户</a></li>
                            <li><a href="cart.html">清单</a></li>
                            <li><a href="checkout.html">结算</a></li>
                            <li><a href="#">退出</a></li>
                        </ul>
                    </nav>
                    <!-- // USER RELATED MENU -->
                </div>
                <!-- // CURRENCY / LANGUAGE / USER MENU -->
                <!-- SITE LOGO -->
                <div class="logo-wrapper">
                    <a href="index-2.html" class="logo" title="GFashion - Responsive e-commerce HTML Template">
                        <img src="/img/logo.png" alt="GFashion - Responsive e-commerce HTML Template"/>
                    </a>
                </div>
                <!-- // SITE LOGO -->
                <!-- SITE NAVIGATION MENU -->
                <nav id="site-menu" role="navigation">
                    <ul class="main-menu hidden-sm hidden-xs">
                        <li class="active">
                            <a href="{{url('mall/')}}">Home</a>
                        </li>
                        <li>
                            <a href="products.html">Women</a>
                        </li>
                        <li>
                            <a href="products.html">Men</a>

                            <!-- MEGA MENU -->
                            <div class="mega-menu" data-col-lg="9" data-col-md="12">
                                <div class="row">

                                    <div class="col-md-3">
                                        <h4 class="menu-title">Clothing</h4>
                                        <ul class="mega-sub">
                                            <li><a href="products.html">Casual Wear</a></li>
                                            <li><a href="products.html">Evening Wear</a></li>
                                            <li><a href="products.html">Formal Attire</a></li>
                                            <li><a href="products.html">Womens Jeans</a></li>
                                            <li><a href="products.html">Mens Jeans</a></li>
                                            <li><a href="products.html">Fall Styles</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-3">
                                        <h4 class="menu-title">Accessories</h4>
                                        <ul class="mega-sub">
                                            <li><a href="products.html">Casual Wear</a></li>
                                            <li><a href="products.html">Evening Wear</a></li>
                                            <li><a href="products.html">Formal Attire</a></li>
                                            <li><a href="products.html">Womens Jeans</a></li>
                                            <li><a href="products.html">Mens Jeans</a></li>
                                            <li><a href="products.html">Fall Styles</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-3">
                                        <h4 class="menu-title">Brands</h4>
                                        <ul class="mega-sub">
                                            <li><a href="products.html">Casual Wear</a></li>
                                            <li><a href="products.html">Evening Wear</a></li>
                                            <li><a href="products.html">Formal Attire</a></li>
                                            <li><a href="products.html">Womens Jeans</a></li>
                                            <li><a href="products.html">Mens Jeans</a></li>
                                            <li><a href="products.html">Fall Styles</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="carousel slide m-b" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="item active">
                                                    <img src="/images/men/slide1.jpg" alt=""/>
                                                </div>
                                                <div class="item">
                                                    <img src="/images/men/slide2.jpg" alt=""/>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="text-semibold uppercase m-b-sm">Featured Products</h5>
                                        <p>Lorem ipsum dolor sit, consectetur adipiscing elit. Etiam neque velit, blandit sed scelerisque.</p>
                                        <a href="products.html" class="btn btn-default btn-round">Go to Shop →</a>
                                    </div>

                                </div>
                            </div>
                            <!-- // MEGA MENU -->

                        </li>
                        <li>
                            <a href="components.html">Components</a>
                        </li>
                        <li>
                            <a href="store-locator.html">Store Locator</a>
                        </li>
                        <li>
                            <a href="contact-us.html">Contact Us</a>
                        </li>
                        <li>
                            <a href="#">Buy Me!</a>
                        </li>
                    </ul>

                    <!-- MOBILE MENU -->
                    <div id="mobile-menu" class="dl-menuwrapper visible-xs visible-sm">
                        <button class="dl-trigger"><i class="iconfont-reorder round-icon"></i></button>
                        <ul class="dl-menu">
                            <li class="active">
                                <a href="javsacript:void(0);">Home</a>
                            </li>
                            <li>
                                <a href="javsacript:void(0);">Women</a>
                            </li>
                            <li>
                                <a href="javsacript:void(0);">Men</a>

                                <ul class="dl-submenu">
                                    <li>
                                        <a href="products.html">Clothing</a>
                                        <ul class="dl-submenu">
                                            <li><a href="products.html">Casual Wear</a></li>
                                            <li><a href="products.html">Evening Wear</a></li>
                                            <li><a href="products.html">Formal Attire</a></li>
                                            <li><a href="products.html">Womens Jeans</a></li>
                                            <li><a href="products.html">Mens Jeans</a></li>
                                            <li><a href="products.html">Fall Styles</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="products.html">Accessories</a>
                                        <ul class="dl-submenu">
                                            <li><a href="products.html">Casual Wear</a></li>
                                            <li><a href="products.html">Evening Wear</a></li>
                                            <li><a href="products.html">Formal Attire</a></li>
                                            <li><a href="products.html">Womens Jeans</a></li>
                                            <li><a href="products.html">Mens Jeans</a></li>
                                            <li><a href="products.html">Fall Styles</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="products.html">Brands</a>
                                        <ul class="dl-submenu">
                                            <li><a href="products.html">Casual Wear</a></li>
                                            <li><a href="products.html">Evening Wear</a></li>
                                            <li><a href="products.html">Formal Attire</a></li>
                                            <li><a href="products.html">Womens Jeans</a></li>
                                            <li><a href="products.html">Mens Jeans</a></li>
                                            <li><a href="products.html">Fall Styles</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- // MOBILE MENU -->

                </nav>
                <!-- // SITE NAVIGATION MENU -->
            </div>
        </div>
    </div>
    <!-- // MAIN HEADER -->