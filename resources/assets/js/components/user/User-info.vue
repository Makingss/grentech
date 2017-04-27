<template lang="html">
  <div class="user-info">
    <div class="u-leftcontBox">
      <div class="u-icon pull-left">
        <a href="#" class="link-img">
          <img src="//storage.jd.com/i.imageUpload/31333634303333393833375f7031343932383433353033333236_mid.jpg" alt="">
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
            <a href="#">待付款 <i class="num">0</i></a>
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
    <div class="credit-info pull-left color-dark">
      <ul>
        <li class="fore pull-left" v-for="item in 3">
          <div class="credit-item">
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
</template>

<script>
export default {}
</script>

<style lang="less" scoped>a:hover {
    color: #f00;
}
.user-info {
    background: url("//misc.360buyimg.com/user/myjd-2015/widget/userinfo/i/userinfo-bg.png") right top repeat-y #fff;
    height: 150px;
    padding: 15px 20px 15px 319px;
    .left-icon{
      background: url(//misc.360buyimg.com/user/myjd-2015/widget/userinfo/i/info-left.png) 0 0 no-repeat;
      left:160px;
      width: 88px;
      height: 180px;
      position: absolute;
      top:0;
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
.info-line{
  position: absolute;
  height: 100%;
  top:0;
  right: 0;
  .circle{
    width: 15px;
    height: 15px;
    background: #f5f5f5;
    display: block;
  }
  .topCircle{
    position: absolute;
    right: 0;
  }
  .bottomCircle{
    position: absolute;
    right: 0;
    bottom: 0;
  }
}

.credit-info{
background: #f5f5f5;
.fore{
  width: 119px;
  padding: 0 4px;
  border-right:1px dotted #bbb;
  &:last-child{
    border:none;
  }
}
}
</style>
