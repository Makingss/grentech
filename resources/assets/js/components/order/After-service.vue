<template lang="html">
  <div class="after-service">
    <div class="header-user border-1px-b">
      <div class="container block-center" style="position:relative">
        <div class="" >
              <a href="#" style="background:url(//misc.360buyimg.com/user/shouhou/2.1.0/css/i/logo.png) no-repeat;display:block;height:80px;background-position:10px"></a>
        </div>
        <div class="nav-list">
          <ul>
            <li><a href="#" class='nav-action'>首页</a></li>
            <li><a href="#">魔镜</a></li>
            <li><a href="#">特色服务</a></li>
            <li><a href="#">葵花宝典</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container block-center margin-tb-20">
      <div class="infor-wrap margin-b-20">
        <el-row class="border-1px">
          <el-col :span="6" class="text-center">
            <ul>
              <li class="padding-tb-6"><p class="font-1x font-bold">Hi! jd136403lny</p></li>
              <li class="padding-tb-6">
                <a href="#"><img  class="circle icon-104" src="http://i.jd.com/defaultImgs/12.jpg" alt=""></a>
              <i class="iconfont"></i></li>
              <li class="padding-tb-6">可尊享的特色服务</li>
              <li class="padding-tb-6"><span>闪电退款额度600.00元</span></li>
            </ul>
            <div class="clear-float margin-tb-10">
              <div class="block-center" style="width:160px">
                <ul>
                  <li class="font-mini padding-rl-4 color-danger pull-left" v-for="item in 6"><i class="iconfont font-min icon-center">&#xe900;</i>上门换新</li>
                </ul>
              </div>
            </div>
          </el-col>
          <el-col :span="4" class="text-center border-1px-r border-1px-l">
            <ul>
              <li class="margin-tb-20">
              <div>
                <i class="iconfont color-danger" style="font-size:100px">&#xe6a5;</i>
              </div>
              <el-button type="danger" size="small"> <a href="/after_orderlist"  class="color-white">申请售后</a></el-button>
            </li>
            <li style="margin-bottom:22px">
              <div>
                <div class="tab-80 block-center text-left" style="padding-left:30px">
                  <div>
                    <a href="#" class="color-danger font-mini"><i class="iconfont">&#xe6f4;</i>返修/退换货记录</a>
                  </div>
                  <div>
                    <a href="#" class="color-danger font-mini"><i class="iconfont">&#xe8b3;</i>退款明细</a>
                  </div>
                  <div>
                    <a href="#" class="color-danger font-mini">  <i class="iconfont">&#xe61a;</i>维修明细</a>
                  </div>
                </div>
              </div>

            </li>
            </ul>
          </el-col>
          <el-col :span="8">
            <div class="block-center">
              <ul class="">
                <li class="pull-left text-center" style="width:178px;height:164px;" v-for="item in 4">
                  <div class="padding-tb-20">
                    <b class="font-gray" style="font-size:60px">0</b>
                    <p>处理中</p>
                  </div>
                </li>
              </ul>
            </div>
          </el-col>
          <el-col :span="6" style="box-shadow:1px 1px 10px #ddd">
            <div class="margin-10">
              <div class="padding-l-10">
                <h3 class="color-dark">
                  公告
                </h3>
                <div class="margin-t-10">
                  <ul>
                    <li v-for="item in 5" class="padding-b-4">[上线] 京东自营生鲜优鲜赔服务上线啦！</li>
                  </ul>
                </div>
              </div>
              <div class="margin-tb-10 clear-float">
                <ul>
                  <li v-for="item in 2" class="pull-left margin-rl-6">
                    <div class="clear-float" style="width:110px;height:110px">
                      <a href="#" class="link-img"><img src="/images/demo/qr.png" alt=""></a>
                    </div>
                    <p class="clear-float line-ellispse-2 text-center padding-tb-6" style="width:110px;">
                      服务+app内测享极速售后
                    </p>
                    </li>
                </ul>
              </div>
            </div>
          </el-col>
        </el-row>
      </div>
      <div class="margin-tb-20">
        <el-row class="border-1px">
          <el-col :span="6">
            <div class="clear-float" style="background:url(//misc.360buyimg.com/user/shouhou/2.1.0/css/i/index-service-apply.jpg) 0 0 no-repeat;height:469px; position:relative">
              <div class="color-white font-3x font-bold text-center margin-t-20">
                服务申请
              </div>
              <div class="text-center margin-t-20 bg-danger padding-tb-10">
                <a href="#" class="color-white font-1x">
                  申请售后
                </a>
              </div>
            </div>
          </el-col>
          <el-col :span="18">
            <div class="clear-float" style="position:relative">
              <div style="position:absolute;top:50%;width:100%;display:block" class="border-1px-b"></div>
              <div class="margin-10">
                <ul>
                  <li class="pull-left padding-10" v-for="item in  6" style="width:195px;height:171px;margin:0 15px 20px 15px">
                    <div class="">
                      <div class="margin-tb-10">
                        订单编号：<a href="#">49881501848</a>
                      </div>
                      <div class="margin-tb-10 color-gray">
                        下单时间：2017-03-03 17:20:32
                      </div>
                      <div class="margin-tb-20">
                        <a href="#"><img src="http://img10.360buyimg.com/N5/jfs/t3085/150/7220278772/137822/ab0a02d3/58b52fdcN76aa4f6a.jpg" alt=""></a>
                      </div>
                      <div>
                        <el-button type="danger" :plain="true" size="mini"><a href="/after_apply">申请</a></el-button>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="text-center border-1px-t padding-t-6">
              <a href="#" class="font-1x">
                查看更多
              </a>
            </div>
          </el-col>
        </el-row>

      </div>
      <div class="">
        <el-row class="border-1px">
          <el-col :span="6">
            <div class="clear-float" style="background:url(//misc.360buyimg.com/user/shouhou/2.1.0/css/i/index-service-apply.jpg) 0 0 no-repeat;height:469px; position:relative">
              <div class="color-white font-3x font-bold text-center margin-t-20">
                服务产品
              </div>
              <div class="text-center margin-t-20 bg-danger padding-tb-10">
                <a href="#" class="color-white font-1x">
                  个人会员服务或产品
                </a>
              </div>
            </div>
          </el-col>
          <el-col :span="6">
            <el-carousel height="467px" class="border-1px-r" indicator-position="none">
              <el-carousel-item v-for="item in 4" :key="item">
                <h2 class="margin-10">
                  手机原装电池换新服务
                </h2>
                <div class="color-danger margin-10">
                  足不出户，极速上门维修
                </div>
                <a href="#" class="link-img">
                  <img src="//myjd.jd.com/misc/img/personal/carousel-1.jpg" alt="">
                </a>
              </el-carousel-item>
            </el-carousel>
          </el-col>
          <el-col :span="12">
            <div class="clear-float padding-10">
              <ul>
                <li class="pull-left margin-rl-6 margin-tb-4" v-for="item in 4">
                  <div class="">
                      <a href="#" class="link-img" >
                        <img src="//myjd.jd.com/misc/img/enterprise/right-1.jpg" style="width:250px;height:180px" alt="">
                      </a>
                  </div>
                  <div class="text-center padding-tb-4"><a href="#" class="color-danger font-1x">专业工程师上门安装</a></div>
                </li>
              </ul>
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
  data:function(){
    return{}
  },
  methods: {
     handleOpen(key, keyPath) {
       console.log(key, keyPath);
     },
     handleClose(key, keyPath) {
       console.log(key, keyPath);
     }
   }
}
</script>

<style lang="less" scoped>
.header-user {
    background-color: #fff;
    width: 100%;
}
.nav-list {
    position: absolute;
    right: 0;
    top: 0;
    height: 100%;
    ul {
        display: block;
        overflow: hidden;
        > li {
            float: left;
            padding: 0 20px;
            font-size: 18px;
            a {
                height: 77px;
                line-height: 77px;
                color: #bbb;
                display: block;
                padding: 0 10px;
            }
        }
    }
}
.nav-action {
    border-bottom: 2px solid #f00;
    color: #f00 !important;
}
</style>
