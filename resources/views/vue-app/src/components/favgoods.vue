<template lang="html">
  <div class="favgoods content">
  <div class="content-box">
   <swipeout>
      <swipeout-item class="border-1px-b" v-for="(item,index) in favgoods_data">
        <div slot="right-menu" transition-mode="follow">
          <swipeout-button type="warn">
            删除
          </swipeout-button>
        </div>
        <div slot="content" class="padding-tb-6">
          <router-link :to="item.url">
            <flexbox>
              <flexbox-item class="link-img padding-l-6" :span="3">
                <img :src="item.img" alt="">
              </flexbox-item>
              <flexbox-item :span="9" class="padding-r-10 border-box">
                <p class="line-ellispse-2">{{item.name}}</p>
                 <p class="color-gray">商品编码:{{item.bn}}</p>
                <p>收藏日期 : {{item.createtime}}</p>
              </flexbox-item>
            </flexbox>
          </router-link>

        </div>
      </swipeout-item>
    </swipeout>
  </div>
   
  </div>
</template>

<script>
import {Swipeout,SwipeoutItem,SwipeoutButton,Flexbox,FlexboxItem} from 'vux'
export default {
  name:'favgoods',
  data:function(){
    return {
      favgoods_data:[
        {
          img:'/static/grentech/201611051243571562.jpg',
          url:'/goods',
          bn:'0161105124357156',
          name:'001无线测试商品86319660',
          price:'1290.00',
          createtime:'2017-02-02',
        },{
          img:'/static/grentech/201611071753107968.jpg',
          url:'/goods',
          bn:'0161105124357156',
          name:'002无线测试商品86319660',
          price:'1290.00',
          createtime:'2017-02-03',
        },{
          img:'/static/grentech/201611071844501875.jpg',
          url:'/goods',
          bn:'0161105124357156',
          name:'003无线测试商品86319660',
          price:'1290.00',
          createtime:'2017-02-04',
        }
      ]
    }
  },
  components:{
    Swipeout,
    SwipeoutItem,
    SwipeoutButton,
    Flexbox,
    FlexboxItem
  },
  methods:{

  }
}
</script>

<style lang="css">
</style>
