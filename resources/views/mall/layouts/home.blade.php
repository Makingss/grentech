    <div class="flexslider">
        <ul class="slides">
            <!-- THE FIRST SLIDE -->
            <li>
                <!-- THE MAIN IMAGE IN THE SLIDE -->
                <img src="/rev-slider/img/slides/Street-Fashion.jpg" alt=""/>

                <!-- THE CAPTIONS OF THE FIRST SLIDE -->
                <div class="flex-caption h6 text-bold gfc uppercase animated"
                     data-animation="fadeInLeftBig"
                     data-x="800"
                     data-y="110"
                     data-speed="600"
                     data-start="1200">New Collection
                </div>

                <div class="flex-caption herotext text-bold gfc animated"
                     data-animation="fadeInRightBig"
                     data-x="580"
                     data-y="140"
                     data-speed="900"
                     data-start="2000">Autumn Fashions
                </div>

                <div class="flex-caption h6 text-bold gfc text-center animated"
                     data-animation="fadeInDown"
                     data-x="639"
                     data-y="260"
                     data-speed="1600"
                     data-start="2900">
                    Comfy knits and warm jackets for cooler Autumn days<br/>
                    <a href="products.html" class="btn btn-primary uppercase">Shop Now</a>
                </div>

            </li>

            <!-- THE SECOND SLIDE -->
            <li style="background: #fa6f57;">
                <!-- THE MAIN IMAGE IN THE SLIDE -->
                <img src="/img/transparent.png" alt=""/>

                <div class="flex-caption super-giant gfc animated uppercase"
                     data-animation="fadeInUp"
                     data-x="center"
                     data-y="60"
                     data-speed="500"
                     data-start="900">Sale
                </div>

                <div id="caption-left-round" class="flex-caption round gfc animated uppercase"
                     data-animation="fadeInLeftBig"
                     data-x="140"
                     data-y="60"
                     data-speed="600"
                     data-start="1200">
                    <div class="vmid"><span>Mid<br/>Season</span></div>
                </div>

                <div class="flex-caption round gfc animated uppercase"
                     data-animation="fadeInRightBig"
                     data-x="925"
                     data-y="60"
                     data-speed="600"
                     data-start="1200">
                    <div class="vmid"><span>Up to<br/>70% off</span></div>
                </div>

                <div class="flex-caption h3 gfc animated uppercase"
                     data-animation="fadeInDown"
                     data-x="center"
                     data-y="250"
                     data-speed="400"
                     data-start="1800"><strong class="text-bold">500’s </strong>of New Products
                </div>

            </li>

            <!-- THE SECOND SLIDE -->
            <li>
                <!-- THE MAIN IMAGE IN THE SLIDE -->
                <img src="/rev-slider/img/slides/3303349658_cfaebb811f_o.jpg" alt=""/>

                <div class="flex-caption herotext text-bold gfc bg-dark animated uppercase"
                     data-animation="fadeInUpBig"
                     data-x="760"
                     data-y="60"
                     data-speed="900"
                     data-start="100">Free Shipping
                </div>

                <div class="flex-caption h2 text-bold gfc bg-dark animated uppercase"
                     data-animation="fadeInUpBig"
                     data-x="797"
                     data-y="175"
                     data-speed="600"
                     data-start="900">On Order over $2.000
                </div>

            </li>

        </ul>
    </div>

    <script>
        jQuery(function ($) {
            var $slider = $('#home-slider > .flexslider');
            $slider.find('.flex-caption').each(function () {
                var $this = $(this);
                var configs = {
                    left: $this.data('x'),
                    top: $this.data('y'),
                    speed: $this.data('speed') + 'ms',
                    delay: $this.data('start') + 'ms'
                };
                if (configs.left == 'center' && $this.width() !== 0) {
                    configs.left = ( $slider.width() - $this.width() ) / 2;
                }
                if (configs.top == 'center' && $this.height() !== 0) {
                    configs.top = ( $slider.height() - $this.height() ) / 2;
                }

                $this.data('positions', configs);

                $this.css({
                    'left': configs.left + 'px',
                    'top': configs.top + 'px',
                    'animation-duration': configs.speed,
                    'animation-delay': configs.delay
                });
            });

            $(window).on('resize', function () {
                var wW = $(window).width(),
                        zoom = ( wW >= 1170 ) ? 1 : wW / 1349;
                $('.flex-caption.gfc').css('zoom', zoom);
            });
            $(window).trigger('resize');


            $slider.imagesLoaded(function () {
                $slider.flexslider({
                    animation: 'slide',
                    easing: 'easeInQuad',
                    slideshow: false,
                    nextText: '<i class="iconfont-angle-right"></i>',
                    prevText: '<i class="iconfont-angle-left"></i>',
                    start: function () {
                        flex_fix_pos(1);
                    },
                    before: function (slider) {
                        // initial caption animation for next show
                        $slider.find('.slides li .animation-done').each(function () {
                            $(this).removeClass('animation-done');
                            var animation = $(this).attr('data-animation');
                            $(this).removeClass(animation);
                        });

                        flex_fix_pos(slider.animatingTo + 1);
                    },
                    after: function () {
                        // run caption animation
                        $slider.find('.flex-active-slide .animated').each(function () {
                            var animation = $(this).attr('data-animation');
                            $(this).addClass('animation-done').addClass(animation);
                        });
                    }
                });
            });


            function flex_fix_pos(i) {
                $slider.find('.slides > li:eq(' + i + ') .gfc').each(function () {
                    var $this = $(this),
                            pos = $(this).data('positions');

                    if (pos.left == 'center') {
                        pos.left = ( $slider.width() - $this.width() ) / 2;
                        $this.css('left', pos.left + 'px');
                        $this.data('positions', pos);
                    }
                    if (pos.top == 'center') {
                        pos.top = ( $slider.height() - $this.height() ) / 2;
                        $this.css('left', pos.top + 'px');
                        $this.data('positions', pos);
                    }
                });
            }
        });
    </script>