<template lang="html">
  <div class="mall_user">
  <header-user></header-user>
    <div class="container block-center" style="width:85%">
      <div class="">
        <el-row>
          <el-col :span="3">
            <navbar-user></navbar-user>
          </el-col>
          <el-col :span="21">
            <div class="margin-l-20">
              <div class="user-info">
                <div class="u-leftcontBox">
                  <div class="u-icon pull-left">
                    <a href="#" class="link-img">
                      <img src="http://i.jd.com/defaultImgs/12.jpg" alt="">
                    </a>
                  </div>
                  <div class="u-pic pull-left margin-rl-6">
                    <div class="u-name font-2x ">
                      <a href="#">jd136403lny</a>
                    </div>
                    <div class="padding-b-4">
                      <span class="iconfont color-primary">&#xe88c;</span>
                      <span class="iconfont color-gray">&#xe8d3;</span>
                      <img src="//img30.360buyimg.com/uba/jfs/t3094/311/8608955278/3086/1d425635/58c6511aN1f50050a.png" alt="">
                    </div>
                    <div class="padding-b-4">
                      <a href="#">账户安全:</a>较高
                    </div>
                    <div class="">
                      <a href="#">我的勋章</a>
                    </div>
                  </div>
                  <div class="info-line">
                    <span class="circle topCircle">
                    </span>
                    <span class="circle bottomCircle">
                    </span>
                  </div>
                </div>
                <div class="u-rightcontBox">
                <div class="u-counts pull-left clear-float">
                  <ul>
                    <li>
                      <i class="iconfont">&#xe61e;</i>
                      <div class="">
                        <a href="#">待付款<i class="num">0</i></a>
                      </div>
                    </li>
                    <li>
                      <i class="iconfont">&#xe68b;</i>
                      <div class="">
                        <a href="#">待收货<i class="num">0</i></a>
                      </div>
                    </li>
                    <li>
                      <i class="iconfont">&#xe6bb;</i>
                      <div class="">
                        <a href="#">待自提<i class="num">0</i></a>
                      </div>
                    </li>
                    <li>
                      <i class="iconfont">&#xe620;</i>
                      <div class="">
                        <a href="#">待评价<i class="num">0</i></a>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="credit-info pull-left color-dark padding-tb-6">
                  <ul>
                    <li class="fore pull-left" v-for="item in 3">
                      <div class="credit-item padding-rl-6">
                        <div class="margin-tb-4">
                          余额:
                          <a href="#" class="padding-l-4">0.00</a>
                        </div>
                        <div class="margin-tb-4">
                          京豆:<a href="#" class="padding-l-4">242</a>
                        </div>
                        <div class="margin-tb-4">
                          京卡/E卡:<a href="#" class="padding-l-4">0</a>
                        </div>
                        <div class="margin-tb-4">
                          优惠券:
                          <a href="#" class="padding-l-4">0</a>
                          <a href="#" class="padding-l-4">领券</a>
                        </div>
                        <div class="margin-tb-4">
                          通信B:<a href="#" class="padding-l-4">0</a>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                </div>
              </div>
              <div class="margin-t-20">
                <el-row>
                  <el-col :span="18">
                    <div class="myorder">
                      <div class="model-main">
                        <div class="clear-float" style="height:20px;line-height:20px;">
                          <h3 class="pull-left padding-l-10 font-1x color-dark">我的订单</h3>
                          <span class="pull-right padding-r-10"><a href="#">查看全部订单</a></span>
                        </div>
                        <div class="tab-80">
                          <div class="block-center container" style="background:#fff url(//mm.bst.126.net/images/order/noOrder.png?20141216);width:140px;height:160px;position:relative">
                            <div class="font-2x color-gray" style="position:absolute;right:-120px;top:50%;">
                                当前没有订单
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <div class="banner-carousel">
                    <div class="margin-tb-10 bc-header">
                      <h2 class="padding-rl-10 bc-name">我关注的商品</h2>
                        <ul class="padding-rl-10 bc-tag">
                          <li class="pull-left  margin-rl-6"><a class="bc-tabItem">降价通知</a></li>
                        </ul>
                      <div class="padding-r-15 bc-move"><a></a>查看更多</div>
                    </div>
                    <div>
                      <el-carousel trigger="click" height="150px" indicator-position="none" arrow="always">
                        <el-carousel-item>
                          <div class="model-1 default clear-float">
                            <div class="pull-left" style="width:120px;margin-right:20px" v-for="item in 5">
                              <a href="#" class='link-img'>
                                  <img  src="//img12.360buyimg.com//n3/jfs/t4717/90/2194391209/230876/e45a190b/58fae6d4N72a86db7.jpg" alt="">
                              </a>
                              <div class="price margin-b-10 text-center">
                                $1780.00
                              </div>
                            </div>
                          </div>
                        </el-carousel-item>
                      </el-carousel>
                    </div>
                  </div>
                  <div class="banner-carousel">
                    <div class="margin-tb-10 bc-header">
                      <h2 class="padding-rl-10 bc-name">买什么</h2>
                        <ul class=" bc-tag">
                          <li class="pull-left padding-rl-6"><a class="bc-tabItem">降价不通知</a></li>
                        </ul>
                      <div class="padding-r-15 bc-move"><a>查看更多</a></div>
                    </div>
                    <div>
                      <el-carousel trigger="click" height="260px" indicator-position="none" arrow="always">
                        <el-carousel-item>
                          <div class="model-2">
                            <ul class="clear-float">
                              <li class="bc-goodsBox border-1px margin-rl-6 pull-left" v-for="item in 2">
                                <div class="clear-float">
                                  <h2 class="bc-title color-gray padding-l-6">超级白菜日:19块9</h2>
                                  <div class="bc-info">
                                    <div class="bc-creator color-dark padding-l-6">
                                      <i class="iconfont font-mini">&#xe8ca;</i>
                                      潮流技术控
                                    </div>
                                    <div class="bc-operate">
                                      <a href="#">
                                        <div class="border-1px border-radius-3 mini-btn">
                                          <i class="iconfont font-mini">&#xe8db;</i>
                                          69
                                        </div>
                                      </a>
                                      <a href="#">
                                        <div class="border-1px border-radius-3 mini-btn">
                                          <i class="iconfont font-mini">&#xe615;</i>
                                          <span>81</span>
                                        </div>
                                      </a>
                                    </div>
                                  </div>
                                  <div class="bc-goods">
                                      <div class="bc-goods-coves pull-left border-1px">
                                        <a href="#" class="link-img">
                                          <img src="//img11.360buyimg.com/n1/s250x250_jfs/t3151/114/8248417009/211084/5b76652e/58c264deN74b04f1c.jpg" alt="">
                                        </a>
                                      </div>
                                      <div class="bc-goods-list pull-left">
                                        <dl class="bc-goods-ul">
                                          <dd class="bc-goods-item border-1px" v-for="item in 4">
                                          <a href="#" class="link-img">
                                            <img src="//img12.360buyimg.com/n1/s76x76_jfs/t2083/137/1280141948/37781/9b871616/56526d68Nbb48195a.jpg" alt="">
                                          </a>
                                          </dd>
                                        </dl>
                                      </div>
                                    </div>
                                  </div>
                              </li>
                            </ul>
                          </div>
                        </el-carousel-item>
                      </el-carousel>
                    </div>
                  </div>
                  <circle-friends></circle-friends>
                  </el-col>
                  <el-col :span="6">
                    <div class="padding-l-10">
                      <plug-in></plug-in>
                    </div>
                  </el-col>
                </el-row>
              </div>
            </div>
          </el-col>
        </el-row>
      </div>
    </div>
    <slogen></slogen>
    <footer-section></footer-section>
  </div>
</template>

<script>
export default {
    data: function() {
        return {

        }
    }
}
</script>

<style lang="less" scoped>
a:hover {
    color: #f00;
}
.user-info {
    background: url("//misc.360buyimg.com/user/myjd-2015/widget/userinfo/i/userinfo-bg.png") right top repeat-y #fff;
    height: 150px;
    padding: 15px 20px 15px 319px;
    .left-icon {
        background: url("//misc.360buyimg.com/user/myjd-2015/widget/userinfo/i/info-left.png") 0 0 no-repeat;
        left: 160px;
        width: 88px;
        height: 180px;
        position: absolute;
        top: 0;
    }
}
.u-leftcontBox {
    height: 126px;
    position: relative;
    left: -319px;
    padding: 22px 0 0;
    float: left;
}
.u-icon {
    width: 104px;
    height: 104px;
    > a {
        border: 3px solid #ddd;
        border-radius: 50%;
        display: block;
    }
}
.u-pic {
    float: left;
    width: 180px;
    border-right: 1px dotted #888;
}
.u-rightcontBox {
    float: left;
    padding: 16px 0;
    margin-left: -319px;
    width: 100%;
}
.u-counts {
    width: 180px;
    ul {
        width: 100%;
        > li {
            width: 100%/2;
            text-align: center;
            float: left;
            margin-bottom: 10px;
        }
    }
}
.info-line {
    position: absolute;
    height: 100%;
    top: 0;
    right: 0;
    .circle {
        width: 15px;
        height: 15px;
        background: #f5f5f5;
        display: block;
    }
    .topCircle {
        position: absolute;
        right: 0;
    }
    .bottomCircle {
        position: absolute;
        right: 0;
        bottom: 0;
    }
}

.credit-info {
    background: #f5f5f5;
    .fore {
        width: 119px;
        padding: 0 4px;
        border-right: 1px dotted #bbb;
        &:last-child {
            border: none;
        }
    }
}

.mini-btn {
    padding: 0 4px;
    font-size: 12px;
    display: inline-block;
    text-align: center;
    text-align: center;
}
.small-btn {
    text-align: center;
    font-size: 12px;
    padding: 5px;
    display: inline-block;
}
.large-btn {
    display: inline-block;
    text-align: center;
    padding: 6px;
    font-size: 12px;
}
.bc-header{
  position:relative;
  height:40px;
  line-height:40px;
  .bc-tag{
    position:absolute;
    top:0;
    left:120px;
  }
  .bc-tabItem{
    background: #eee;
    padding:5px 10px;
  }
  .bc-move{
    position:absolute;
    top:0;
    right:0;
  }
}

.bc-info{
    position: relative;
    margin: 5px 0;
    .bc-creator {
        height: 20px;
        line-height: 20px;
    }
    .bc-operate {
        position: absolute;
        top: 0;
        right: 0;
    }
}
.bc-goodsBox {
    width: 326px;
    float:left;
    padding:4px;
}
.banner-carousel{
  box-shadow:0px 1px 15px #ddd;
}
.model-1,.model-2{
  width: 700px;
  margin:0 auto;
}

.bc-goods {
    width: 100%;
    height: 162px;
    overflow: hidden;
    .bc-goods-coves {
        width: 140px;
        height: 140px;
        padding-bottom: 2px;
        margin-left:10px;
        margin-right:5px;
    }
    .bc-goods-list {
        width: 148px;
        height: 148px;
    }
    .bc-goods-ul {
        width: 100%;
        display: block;
        .bc-goods-item {
            width: 69px;
            float: left;
            margin:0 2px 2px 0;
            box-sizing: border-box;
            box-sizing: inherit;
        }
    }
}
</style>
