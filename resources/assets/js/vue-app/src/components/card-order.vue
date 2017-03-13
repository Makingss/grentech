<template lang="html">
  <div class="card-order border-1px-b">
    <div class="card-header padding-rl-10 padding-tb-6">
      订单:170108173832357
    </div>
    <div class="card-content border-1px-t">
      <flexbox :gutter="0" wrap='nowrap'class="padding-tb-10">
        <flexbox-item :span="3/12" class="item-media link-img padding-rl-6">
          <img :src="'http://mall.yingerfashion.com/'+data.s_url" alt="">
        </flexbox-item>
        <flexbox-item :span="9/12" class="padding-r-6 border-box">
          <div class="item-title line-ellispse-2">
            {{data.name}}
          </div>
          <div class="item-subtitle color-primary">
            {{data.spec_info}}
          </div>
          <div class="item-subtitle color-danger">
            数量:×{{data.ordernum}}
          </div>
        </flexbox-item>
      </flexbox>
    </div>
    <div class="card-footer border-1px-t padding-rl-10 padding-tb-6">
      查看订单明细
      <span class="pull-right iconfont color-primary" @click.prevent="collapse_change">&#xe772;</span>
    </div>
    <div class="card-second-footer padding-rl-10 padding-tb-6 border-1px-t color-gray" v-if="collapse_footer">
      <p><label>订单: </label>170108173832357</p>
      <p><label>收件人: </label>王小明</p>
      <p><label>联系方式: </label>18503009595</p>
      <p><label>地址: </label>广东省 深圳市 龙华新区 XX 街道 XX 号</p>
      <p><label>运费 </label> ¥0.00</p>
      <p><label>创建时间: </label>2017-02-19 23:57:20</p>
      <p><label>支付方式: </label>微信支付</p>
    </div>
  </div>
</template>

<script>
import {Flexbox,FlexboxItem,FormPreview} from 'vux'
export default {
  name:'card-order',
  data:function(){
    return {
      collapse_footer:false
    }
  },
  components:{
    Flexbox,
    FlexboxItem,
    FormPreview

  },
  methods:{
    collapse_change:function(){
      console.log("change");
      this.collapse_footer=!this.collapse_footer;
    }
  },
  props:{
    data:{
      type:Object
    }
  }
}
</script>

<style lang="css">
  .card-order{
    background-color: #fff;
  }
  .card-order .item-media{
    box-sizing: border-box;
  }
</style>
