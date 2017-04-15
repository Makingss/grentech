<template lang="html">
  <flexbox class="panel-cart padding-tb-6">
    <flexbox-item class="item-media text-center link-img" :span="3/12">
      <img src="http://mall.yingerfashion.com/public/images/30/75/7f/002cc761ab5a577585d67c853181b0630cc46057.jpg?1478140161#h" alt="">
    </flexbox-item>
    <flexbox-item class="item-content":spam="9/12">
      <div class="item-title padding-rl-10">
        2016春夏款/宝蓝钉珠长款真丝礼服连衣裙85605882
      </div>
      <div class="item-subtitle padding-rl-10">
        颜色:红色/尺码:36
      </div>
      <div class="item-subtitle">
        <x-number :title="quantity" :min="1" :value="1" class="padding-rl-10 padding-tb-6 font-normal" width="40px">
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
  components:{
    Flexbox,
    FlexboxItem,
    XNumber
  }
}
</script>

<style lang="css">
</style>
