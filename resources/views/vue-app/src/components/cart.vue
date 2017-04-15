<template lang="html">
  <div class="cart content">
        <swipeout v-for="(item,index) in cart_data" :key="index" class="border-1px-b">
          <swipeout-item @on-close="handleEvents('on-close')" @on-open="handleEvents('on-open')" transition-mode="follow" :right-menu-width="80">
            <div slot="right-menu">
              <swipeout-button @click="handle_delete($event)" type="warn">
                删除
              </swipeout-button>
            </div>
            <div slot="content">
                <panel-cart :item="item"></panel-cart>
            </div>
          </swipeout-item>
        </swipeout>
        <flexbox :gutter="0" wrap="nowrap" class="bar bar-secondary">
          <flexbox-item :span="8/12" class="bar-item">
            <div class="padding-rl-10">
                <span class="font-1x">合计:</span>
                <span class="color-danger font-2x">￥</span>
                <span class="color-danger font-3x">1099.00</span>
            </div>
          </flexbox-item>
          <flexbox-item :span="4/12">
            <x-button type="warn" class="bar-item font-1x">
              立即结算
            </x-button>
          </flexbox-item>
        </flexbox>
  </div>
</template>
<script>
import PanelCart from './panel-cart.vue'
import api from '../api/index.js'
import {
  Flexbox,
  FlexboxItem,
  XButton,
  Swipeout,
  SwipeoutItem,
  SwipeoutButton,
  Sticky
} from 'vux'
export default {
  name: 'cart',
  data: function() {
    return {
      type: '1',
      cart_data:[],
    }
  },
  created:function(){
    this.fetch_data();
    //拉取数据
  },
  methods: {
    handleEvents:function(){

    },
    handle_delete:function(){

    },
    fetch_data:function(){
      var self=this;
      api.get_cart_data().then(res=>{
        console.log(res);
        if(res.ok){
          self.cart_data=res.data;
        }
      })
    }
  },
  components: {
    PanelCart,
    Flexbox,
    FlexboxItem,
    XButton,
    Swipeout,
    SwipeoutItem,
    SwipeoutButton,
    Sticky
  }
}
</script>

<style lang="css">
.cart{
  padding-bottom: 2.3rem;
}
.page-cart .cart .bar-secondary{
  bottom: 0;
}
</style>
