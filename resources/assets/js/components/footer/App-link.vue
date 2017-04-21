<template>
<div class="app-link">
    <div class="banner">
        <div class="container block-center tab-70">
            <div class="pic ">
                <div class="qrcode">
                    <ul>
                        <li class='pull-left'>
                            <div class="downbtn margin-tb-10 border-radius-3">
                                <a href="#" class="block font-1x">
                                    <i class="iconfont">&#xe616;</i>IPhone版下载
                                </a>
                            </div>
                            <div class="downbtn margin-tb-10 border-radius-3 ">
                                <a href="#" class="block font-1x">
                                    <i class="iconfont">&#xe61f;</i>Android版下载
                                </a>
                            </div>
                        </li>
                        <li  class='pull-left'>
                            <div class="margin-10">
                                <img src="/images/demo/qr.png" alt="">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="margin:150px auto">
      <div class="container block-center tab-80 clear-float">
        <dl class="introWrap">
          <dd class="text-center pull-left margin-10" v-for="item in 3">
            <p class="font-4x padding-tb-10">全球好货</p>
            <p class="text-center">
              <span class="pci inline-block"></span>
            </p>
            <p class="font-1x padding-tb-10 margin-t-10">
              在全球精选真正好用、有用的口碑商品，</br>提升你的生活品质，节省你的挑选时间。
            </p>
            <p class="intro"></p>
          </dd>
        </dl>
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
    },
    methods: {

    }
}
</script>
<style media="less" scoped>
.banner {
    background-color: #B60730;
    height: 440px;
    z-index: 1;
}
.tab-70{
  width: 70%;
}
.pic {
    position: relative;
    height: 497px;
    background: url(//haitao.nos.netease.com/e2e84290-b43a-498a-bc33-d972e208a26b.jpg?imageView&thumbnail=1000x0&quality=90) no-repeat left top;
    z-index: 10;
}

.qrcode {
  position: absolute;
  right:0;
  bottom:0;
  margin:0 150px 120px 0;
}

.downbtn {
    background-color: rgba(255,255,255,0.3);
    width: 184px;
    height: 51px;
    text-align: center;
    line-height: 51px;
    font-size: 14px;
}
.downbtn a{
  color:#fff;
}
.downbtn a:hover{
    background-color: rgba(255,255,255,0.5);
    border-radius: 3px;
}
.intro{
  background:url(//mm.bst.126.net/images/footer/downloads/intro.jpg?191224b536dfdae9fb53d8f085ec60a9) top left no-repeat;
  width:350px;
  height: 350px;
  display: block;
  background-position:0 -350px;
}
.pci{
  background:url(//mm.bst.126.net/images/footer/downloads/intro.jpg?191224b536dfdae9fb53d8f085ec60a9) top left no-repeat;
  width: 80px;
  height: 80px;
  background-position:0 -1050px;
}

</style>
