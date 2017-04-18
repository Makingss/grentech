<template lang="html">
  <div class="cart content">
        <swipeout v-for="(item,index) in cart_data" v-if="cart_data.length" :key="index" class="border-1px-b">
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
        <div class="text-center" style="margin-top:40%;" v-if="!cart_data.length">
          <span class="iconfont color-gray" style="font-size:60px;">&#xe67b;</span>
        </div>
        <tabbar class="color-white">
            <tabbar-item class="bg-white">
              <flexbox slot="label" class="text-center color-dark" :gutter="0">
                <flexbox-item class="vertical-flex border-1px-r">
                  <router-link to="home" class="block">
                    <span class="iconfont">&#xe6b8;</span><span>商城</span>
                  </router-link>
                </flexbox-item>
                <flexbox-item class="vertical-flex">
                  <router-link class="block" to="order">
                     <span class="iconfont">&#xe634;</span><span>需求清单</span>
                  </router-link>
                </flexbox-item>
              </flexbox>
            </tabbar-item>
             <tabbar-item class="bg-danger" @click.native="submit_order">
              <span slot="label" class="color-white">提交需求</span>
            </tabbar-item>
        </tabbar>
  </div>
</template>
<script>
import PanelCart from './panel-cart.vue'
import api from '../api/index.js'
import * as config from '../config/config.js'
import {
  Flexbox,
  FlexboxItem,
  XButton,
  Swipeout,
  SwipeoutItem,
  SwipeoutButton,
  Sticky,
  Tabbar,
  TabbarItem
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
          if(res.data.data.length){
            self.cart_data=res.data.data;
          }else{
            self.$vux.toast.show({
                text:'<span class="font-normal">购物车为空</span>',
                type:'text'
            });
          }
        }else{
          
        }
      })
    },
    submit_order:function(){
      console.log("提交订单需求");
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
    Sticky,
    Tabbar,
    TabbarItem
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
