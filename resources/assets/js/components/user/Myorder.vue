<template lang="html">
 <div class="myorder">
   <h3 class="bg-gray padding-tb-10 padding-l-15">
     我的订单
   </h3>
   <el-tabs>
       <el-tab-pane label="全部订单">
         <div class="clear-float">
           <div class="bg-gray text-center padding-10">
             <el-row>
              <el-col :span="4">
                <el-dropdown>
                  <span>
                    三个月内的订单<i class="color-gray el-icon-caret-bottom el-icon--right"></i>
                  </span>
                  <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item>今年之内的订单</el-dropdown-item>
                    <el-dropdown-item>2016年的订单</el-dropdown-item>
                  </el-dropdown-menu>
                </el-dropdown>
              </el-col>
              <el-col :span="4">订单详情</el-col>
              <el-col :span="4">收货人</el-col>
              <el-col :span="4">金额</el-col>
              <el-col :span="4">
                 <el-dropdown><span>全部状态<i class="color-gray el-icon-caret-bottom el-icon--right"></i></span>
              <el-dropdown-menu slot="dropdown">
                  <el-dropdown-item>全部状态</el-dropdown-item>
                  <el-dropdown-item>等待付款</el-dropdown-item>
                </el-dropdown-menu>
              </el-dropdown>
            </el-col>
            <el-col :span="4">操作</el-col>
             </el-row>
           </div>
           <div class="border-1px margin-tb-10" v-for="item in 2">
             <el-row>
               <el-col :span="24">
                 <div class="text-left padding-tb-4 bg-gray clear-float">
                   <span class="pull-left padding-rl-10">2017-04-02 18:00:00</span>
                   <span class="pull-left padding-rl-10">订单号:49881501848</span>
                   <span class="pull-left padding-rl-10">京东</span>
                   <span class="pull-right padding-rl-10"><i class="iconfont font-mini">&#xe8c7;</i></span>
                 </div>
               </el-col>
             </el-row>
             <div class="padding-10">
               <el-row>
                 <el-col :span="12">
                   <div class="pull-left border-1px margin-rl-6">
                      <img src="//img10.360buyimg.com/N6/s60x60_jfs/t3085/150/7220278772/137822/ab0a02d3/58b52fdcN76aa4f6a.jpg" alt="">
                   </div>
                  <div class="pull-left tab-80">
                    <div class="line-ellispse-2">爱国者（aigo）10000毫安 OL10400 双USB输出 通用便携迷你 移动电源/充电宝
                    <span class="">黑色</span>
                    </div>
                    <div class="">
                     <i class="iconfont font-mini">&#xe62e;</i>
                      找搭配
                    </div>
                  </div>
                 </el-col>
                 <el-col :span="1">x1</el-col>
                 <el-col :span="2">申请售后</el-col>
                 <el-col :span="2">严海潮</el-col>
                 <el-col :span="2">
                   <div class="">总额:$740</div>
                   <div class="">货到付款</div>
                 </el-col>
                 <el-col :span="2">
                   <div class="">已完成</div>
                   <div class="">积分  +7</div>
                   <div class=""><a href="/orders_detail">订单详情</a></div>
                 </el-col>
                 <el-col :span="3" class="text-center">
                   <div class="">评价|晒单</div>
                   <div class=""><el-button size="mini">立即购买</el-button></div>
                 </el-col>
               </el-row>
             </div>
           </div>
         </div>
       </el-tab-pane>
       <el-tab-pane label="待付款">
         <div class="bg-gray text-center padding-10">
           <el-row>
            <el-col :span="4">
              <el-dropdown>
                <span>
                  三个月内的订单<i class="color-gray el-icon-caret-bottom el-icon--right"></i>
                </span>
                <el-dropdown-menu slot="dropdown">
                  <el-dropdown-item>今年之内的订单</el-dropdown-item>
                  <el-dropdown-item>2016年的订单</el-dropdown-item>
                </el-dropdown-menu>
              </el-dropdown>
            </el-col>
            <el-col :span="4">订单详情</el-col>
            <el-col :span="4">收货人</el-col>
            <el-col :span="4">金额</el-col>
            <el-col :span="4">
               <el-dropdown><span>全部状态<i class="color-gray el-icon-caret-bottom el-icon--right"></i></span>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item>全部状态</el-dropdown-item>
                <el-dropdown-item>等待付款</el-dropdown-item>
              </el-dropdown-menu>
            </el-dropdown>
          </el-col>
          <el-col :span="4">操作</el-col>
           </el-row>
         </div>
         <div class="border-1px margin-tb-10" v-for="item in 2">
           <el-row>
             <el-col :span="24">
               <div class="text-left padding-tb-4 bg-gray clear-float">
                 <span class="pull-left padding-rl-10">2017-04-02 18:00:00</span>
                 <span class="pull-left padding-rl-10">订单号:123456</span>
                 <span class="pull-left padding-rl-10">京东</span>
                 <span class="pull-right padding-rl-10"><i class="iconfont font-mini">&#xe8c7;</i></span>
               </div>
             </el-col>
           </el-row>
           <div class="padding-10">
             <el-row>
               <el-col :span="12">
                 <div class="pull-left border-1px margin-rl-6">
                    <img src="//img10.360buyimg.com/N6/s60x60_jfs/t3085/150/7220278772/137822/ab0a02d3/58b52fdcN76aa4f6a.jpg" alt="">
                 </div>
                <div class="pull-left tab-80">
                  <div class="line-ellispse-2">爱国者（aigo）10000毫安 OL10400 双USB输出 通用便携迷你 移动电源/充电宝
                  <span class="">黑色</span>
                  </div>
                  <div class="">
                   <i class="iconfont font-mini">&#xe62e;</i>
                    找搭配
                  </div>
                </div>
               </el-col>
               <el-col :span="1">x1</el-col>
               <el-col :span="2">申请售后</el-col>
               <el-col :span="2">严海潮</el-col>
               <el-col :span="2">
                 <div class="">总额:$740</div>
                 <div class="">货到付款</div>
               </el-col>
               <el-col :span="2">
                 <div class="">已完成</div>
                 <div class="">积分  +7</div>
                 <div class=""><a href="/orders_detail">订单详情</a></div>
               </el-col>
               <el-col :span="3" class="text-center">
                 <div class="">评价|晒单</div>
                 <div class=""><el-button size="mini">立即购买</el-button></div>
               </el-col>
             </el-row>
           </div>
         </div>
       </el-tab-pane>
       <el-tab-pane label="待收货">角色管理</el-tab-pane>
       <el-tab-pane label="待评价">定时任务补偿</el-tab-pane>
       <div class="text-center">
         <el-pagination
         layout="prev, pager, next"
         :total="1">
       </el-pagination>
       </div>
    </el-tabs>
 </div>
</template>

<script>
export default {

}
</script>

<style lang="less" scoped>
.tab-titleBox {
    background: #f5f5f5;
    width: 100%;
    tr {
        td {
            padding: 5px 10px;
            text-align: center;
        }
    }
}
.tab-contBox{
  width: 100%;
  padding:0;
  margin: 0;
  td{
    padding:4px;
  }
}
</style>
