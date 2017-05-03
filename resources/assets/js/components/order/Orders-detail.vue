<template lang="html">
  <div class="orders-detail">
      <header-user></header-user>
      <div class="container block-center">
        <div class="padding-tb-10">
          <span><a href="/home">我的京东</a>></span>
          <span><a href="/mall_user">订单中心</a>></span>
          <span>订单:499861744</span>
        </div>
        <div class="order-state  clear-float padding-10">
          <el-row>
            <el-col :span="6" class="text-center  text-center border-1px-r">
              <div class="margin-tb-20 color-gray">
                订单号:49881501848
              </div>
            <div class="staus padding-tb-4 font-2x font-bold color-success">完成</div>
            <div class="margin-t-20 margin-b-10">
              <el-button size="small" :plain="true" type="success">查看发票详情</el-button>
            </div>
            <div class="margin-b-20">
                <el-button size="small" :plain="true" type="danger"><a href="/order_evaluate">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;评&nbsp;价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a></el-button>
            </div>
            <div class="margin-t-20 color-gray">
              <i class="iconfont font-mini">&#xe65e;</i>
              打印订单
            </div>
            </el-col>
            <el-col :span="18" class="padding-l-10">
              <div class="margin-tb-20 color-gray">
                订单已经完成，感谢您在京东商城购物，欢迎您对本次交易及所购商品进行评价。
              </div>
              <div class="margin-tb-20">
                <ul class="clear-float margin-tb-20">
                  <li class="pull-left">
                    <div class="process clear-float">
                        <div class="process-item">
                          <div class="node text-center">
                            <i class="node-icon iconfont font-4x color-primary">&#xe61c;</i>
                            <ul class="margin-t-10 font-mini">
                              <li>提交订单</li>
                              <li>2017-03-03</li>
                              <li>17:22:00</li>
                            </ul>
                          </div>
                          <div class="proce padding-tb-4" style="">
                            <i class="iconfont color-primary point">&#xe62d;</i>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="pull-left">
                      <div class="process clear-float">
                          <div class="process-item">
                            <div class="node text-center">
                              <i class="node-icon iconfont font-4x color-primary">&#xe8b4;</i>
                              <ul class="margin-t-10 font-mini">
                                <li>支付成功</li>
                                <li>2017-03-04</li>
                                <li>17:22:10</li>
                              </ul>
                            </div>
                            <div class="proce padding-tb-4" style="">
                              <i class="iconfont color-primary point">&#xe62d;</i>
                            </div>
                          </div>
                        </div>
                      </li>
                    <li class="pull-left">
                      <div class="process clear-float">
                          <div class="process-item">
                            <div class="node text-center">
                              <i class="node-icon iconfont font-4x color-primary">&#xe68b;</i>
                              <ul class="margin-t-10 font-mini">
                                <li>商品出库</li>
                                <li>2017-03-04</li>
                                <li>17:22:10</li>
                              </ul>
                            </div>
                            <div class="proce padding-tb-4" style="">
                              <i class="iconfont color-primary point">&#xe62d;</i>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="pull-left">
                        <div class="process clear-float">
                            <div class="process-item">
                              <div class="node text-center">
                                <i class="node-icon iconfont font-4x color-primary">&#xe882;</i>
                                <ul class="margin-t-10 font-mini">
                                  <li>商品出库</li>
                                  <li>2017-03-04</li>
                                  <li>17:22:10</li>
                                </ul>
                              </div>
                              <div class="proce padding-tb-4" style="">
                                <i class="iconfont color-primary point">&#xe62d;</i>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="pull-left">
                          <div class="process clear-float">
                              <div class="process-item">
                                <div class="node text-center">
                                  <i class="node-icon iconfont font-4x color-primary">&#xe6ac;</i>
                                  <ul class="margin-t-10 font-mini">
                                    <li>商品收货</li>
                                    <li>2017-03-04</li>
                                    <li>17:22:10</li>
                                  </ul>
                                </div>
                                <div class="proce padding-tb-4" v-show="false">
                                  <i class="iconfont color-primary point">&#xe62d;</i>
                                </div>
                              </div>
                            </div>
                          </li>
                </ul>
              </div>
              <div class="">
                <div class="pull-left">
                  <i class="iconfont font-mini"></i>
                  京豆
                  <span class="color-danger">+7</span>
                </div>
                <div class="pull-left padding-l-4">
                  <i class="iconfont font-mini">&#xe8ca;</i>
                  会员成长值
                  <span class="color-danger">+5</span>
                </div>
              </div>
            </el-col>
          </el-row>
        </div>
        <div class="order-track  clear-float padding-10">
          <el-row>
            <el-col :span="6" class="text-center  text-center">
              <div class="o-item">
                <div class="pull-left o-img">
                  <a href="#" class="link-img">
                      <img src="//img10.360buyimg.com/N4/jfs/t3085/150/7220278772/137822/ab0a02d3/58b52fdcN76aa4f6a.jpg" alt="">
                  </a>
                </div>
                <div class="pull-left o-info">
                  <ul>
                    <li>送货方式:普通快递</li>
                    <li>承运人：京东快递</li>
                    <li>货运单号：49881501848</li>
                  </ul>
                </div>
              </div>
            </el-col>
            <el-col :span="18" class="padding-l-10">
              <div class="">
                <div class="track-list">
                  <ul>
                    <li class="track-item" v-for="item  in 10">
                      <i class="circle-icon" style=""></i>
                      <div class="tranck-info">
                        <span class="data padding-rl-10">2017-03-04 周六</span>
                        <span class="time padding-rl-10">07:00:00</span>
                        <span class="text padding-rl-10  font-bold" style="width:500px;overflow:hidden;display:inline-flex">京东配送员【聂堂晖】已出发，联系电话【18520862577或0755-29185753，感谢您的耐心等待，参加评价还能赢取京豆呦】</span>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </el-col>
          </el-row>
        </div>
        <div class="order-info bg-gray clear-float ">
          <div class="info-item margin-tb-20 padding-10 pull-left" v-for="item in 4">
            <div class="color-dark padding-b-20 padding-l-15">
              收货人信息
            </div>
            <div class="">
              <ul>
                <li class="padding-l-15" v-for="item in 2">
                  <div class="margin-tb-4" >
                    <div class="pull-left">地址：</div>
                    <div class="line-ellispse-2">广东深圳市龙华新区浪琴路9号影儿时尚集团商学院二楼</div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="border-1px margin-b-20">
          <div class="bg-gray text-center padding-10">
            <el-row>
             <el-col :span="8">商品</el-col>
             <el-col :span="4">商品编号</el-col>
             <el-col :span="4">京东价</el-col>
             <el-col :span="4">商品数量</el-col>
             <el-col :span="2">京豆</el-col>
             <el-col :span="2">操作</el-col>
            </el-row>
          </div>
          <div class="margin-tb-10 border-1px-b">
            <div class="padding-10 text-center">
              <el-row>
                <el-col :span="8">
                  <div class="pull-left border-1px margin-rl-6">
                     <img src="//img10.360buyimg.com/N6/s60x60_jfs/t3085/150/7220278772/137822/ab0a02d3/58b52fdcN76aa4f6a.jpg" alt="">
                  </div>
                 <div class="pull-left text-left padding-l-10">
                   <div class="line-ellispse-2" style="width:250px">爱国者（aigo）10000毫安 OL10400 双USB输出 通用便携迷你 移动电源/充电宝
                   <span class="">黑色</span>
                   </div>
                   <div class="">
                    <i class="iconfont font-mini">&#xe62e;</i>
                     找搭配
                   </div>
                 </div>
                </el-col>
                <el-col :span="4">982043</el-col>
                <el-col :span="4">¥68.90</el-col>
                <el-col :span="4">x1</el-col>
                <el-col :span="2">7</el-col>
                <el-col :span="2" class="text-center">
                  <div class=""><a href="/order_evaluate">评价|晒单</a> </div>
                  <div class=""><el-button size="mini">立即购买</el-button></div>
                </el-col>
              </el-row>
            </div>
          </div>
          <div class="text-right">
          <ul>
            <li class="padding-rl-15 margin-tb-10">
              <div class="">
                <span class="padding-rl-15">商品总额:</span>
                <span class="padding-rl-15">¥148.00</span>
              </div>
            </li>
            <li class="padding-rl-15 margin-tb-10">
              <div class="">
                <span class="padding-rl-15">返现:</span>
                <span class="padding-rl-15">-¥30.00</span>
              </div>
            </li>
            <li class="padding-rl-15 margin-tb-10">
              <div class="">
                <span class="padding-rl-15">商品优惠:</span>
                <span class="padding-rl-15">-¥6.00</span>
              </div>
            </li>
            <li class="padding-rl-15 margin-tb-10">
              <div class="">
                <span class="padding-rl-15">运费:</span>
                <span class="padding-rl-15">¥0.00</span>
              </div>
            </li>
            <li class="padding-rl-15 margin-tb-10">
              <div class="total color-danger">
                <span class="padding-rl-15">应付总额:</span>
                <span class="padding-rl-15">¥112.00</span>
              </div>
            </li>
          </ul>
        </div>
        </div>
      </div>
      <slogen></slogen>
      <footer-section></footer-section>

  </div>
</template>

<script>
export default {}
</script>

<style lang="less" scoped>
.order-state {
    background-color: #f5f5f5;
    border-top: 2px solid #71b247;
    margin-bottom: 20px;
}
.order-info,
.order-track {
    background-color: #f5f5f5;
    margin-bottom: 20px;
}
.order-info {
    .info-item {
        width: 250px;
        border-right: 1px solid #ddd;
        &:last-child {
            border: none;
        }
    }
}
.process {
    width: 140px;
    .process-item {
        position: relative;
    }
    .node {
        width: 80px;
    }
    .proce {
        position: absolute;
        top: -40px;
        left: 60px;
    }
    .point {
        font-size: 80px;
    }
}
.o-item {
    height: 102px;
    margin: 20px 0;
    &:after {
        content: '.';
        height: 0;
        display: block;
        clear: both;
        visibility: hidden;
    }
    .o-img {
        border: 1px solid #eee;
    }
    .o-info {
        margin: 20px 10px;
        text-align: left;
    }
}
.circle-icon {
    position: relative;
    display: inline-block;
    border-radius: 50%;
    width: 4px;
    height: 4px;
    background-color: #888;
    border: 2px solid #ccc;
    &:before {
        position: absolute;
        content: '';
        left: 0;
        height: 100%;
        width: 3px;
        background: #f00;
    }
}
.circle-icon-action {
    background-color: #f00;
    box-shadow: 0 0 10px #f00;
}
.track-list {
    border-left: 1px solid #ddd;
    height: 200px;
    overflow-y: scroll;
    padding: 10px 0 0 30px;
    .track-item {
        }
    .tranck-info {
        display: inline-block;
        padding: 10px 0 0 20px;
        &:first-child {
            padding: 0;
        }
    }
}
</style>
