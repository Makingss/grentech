<template lang="html">
  <flexbox class="panel-cart padding-tb-6">
    <flexbox-item class="item-media text-center link-img" :span="3/12">
      <img :src="item.images.url" alt="">
    </flexbox-item>
    <flexbox-item class="item-content":spam="9/12">
      <div class="item-title padding-l-10">
        {{item.name}}
      </div>
      <div class="item-subtitle padding-l-10">
        SAP:{{item.bn}}
      </div>
      <div class="item-subtitle padding-l-10">
        <p>产品描述:{{item.product_desc}}</p>
        <p>市场价: <span class="color-danger font-bold">¥{{item.price}}</span></p>
        <s class="color-gray" v-if="item.mktprice">¥{{item.mktprice}}</s>
      </div>
      <div class="item-subtitle">
        <x-number :title="quantity" :min="1" :value="item.quantity" class="padding-rl-10 padding-tb-6 font-normal" width="40px">
        </x-number>
      </div>
    </flexbox-item>
  </flexbox>
</template>
<script>
import {Flexbox,FlexboxItem,XNumber} from 'vux'
export default {
  name:'panel-cart',
  data:function(){
    return {
      quantity:'数量',
      value:2,
      min:1,
      max:10,
    }
  },
  props:{
    item:Object
  },
  created:function(){
    console.log(this.item);
  },
  components:{
    Flexbox,
    FlexboxItem,
    XNumber
  }
}
</script>

<style lang="css">
</style>
