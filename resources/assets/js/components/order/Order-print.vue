<template lang="html">
  <div class="print">
    <div class="container block-center">
      <div class="border-1px" style="padding:10px 20px">
        <div class="border-1px-b padding-tb-10">
          <span class="">订单编号:49881501848</span>
          <span class="margin-rl-6">订购时间：2017-03-03 17:20:32</span>
        </div>
        <div class="padding-tb-10">
          <ul>
            <li class="padding-tb-6">客户姓名:严**</li>
            <li class="padding-tb-6">联系方式:136*****</li>
            <li class="padding-tb-6">客户地址:广东深圳市龙华新区浪琴路9号</li>
          </ul>
        </div>
      </div>
      <div class="margin-tb-10 border-1px">
        <div class="bg-gray padding-10 clear-float">
          <el-row >
            <el-col :span='4'>商品编号</el-col>
            <el-col :span="14">商品名称</el-col>
            <el-col :span="2">数量</el-col>
            <el-col :span="2">商品数量</el-col>
          </el-row>
        </div>
          <div class="padding-10 clear-float">
            <el-row class="clear-float border-1px-b padding-tb-10">
              <el-col :span="4">982043</el-col>
              <el-col :span="14">爱国者（aigo）10000毫安 OL10400 双USB输出 通用便携迷你 移动电源/充电宝 黑色</el-col>
              <el-col :span="2">1</el-col>
              <el-col :span="2">￥68.90</el-col>
            </el-row>
            <div class="pull-right padding-tb-10 padding-r-10">
              <ul>
                <li>商品总额：<span class="padding-l-10">￥68.90</span></li>
                <li>返　　现：<span class="padding-l-10">-¥0.00</span></li>
                <li>运　　费：<span class="padding-l-10">¥6.00</span></li>
                <li>应付总额：<span class="font-1x padding-l-10">¥74.90</span></li>
              </ul>
            </div>
          </div>
      </div>
      <div class="text-right padding-r-10">
        <el-button type="danger">打印</el-button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data:function(){

  }
}
</script>

<style lang="css">
</style>
