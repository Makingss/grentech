<template lang="html">
  <div class="order content">
    <sticky class="order-sticky" v-if="false">
      <tab active-color="#1ABC9C" v-model="index">
        <tab-item :selected="actived===item" v-for="(item,index) in list">{{item}}
        </tab-item>
      </tab>
    </sticky>
    <div class="tab-swiper vux-center">
          <card-order :data="item_order" v-for="(item_order,index_order) in order_list" class="margin-b-10">
          </card-order>
    </div>
  </div>
</template>
<script>
import CardOrder from './card-order.vue'
import {Sticky,Tab,TabItem,Swiper,SwiperItem} from 'vux'
export default {
  name:"orderNeedpay",
  data:function(){
    return {
      footer:{
        title:"查看订单明细",
        url:''
      },
      index:0,
      actived:"待付款",
      //list:["待付款","待发货","待收货","待收货","售后"],
      list:["待付款"],
      order_list:[
        {
          order_id:'170108173832357',
          createtime:'1477390310',
          bn:'301901000092',
          name:'基站定向双极化固定下倾角天线',
          quantity:'1',
          price:'1422.00',
          mktprice:'1690.00',
          product_id:'15745',
          s_url:'/uploads/image/20170417/dkALB5VvA4NDhG7zgKHZ9QvxHDXQYQPsTgD00hB7.jpeg',
          ship_addr:'大浪',
          ship_area:'北京/北京市/东城区',
          ship_name:'吴燕平',
          ship_status:"0",
          spec_info1:'790~960',
          spec_info2:'15',
          spec_info3:'0',
          total_amount:'1422.00',
        },{
          order_id:'170108173832357',
          createtime:'1477390310',
          bn:'301901000092',
          name:'基站双频双极化固定下倾角天线',
          quantity:'1',
          price:'1422.00',
          mktprice:'1690.00',
          product_id:'15745',
          s_url:'/uploads/image/20170417/dkALB5VvA4NDhG7zgKHZ9QvxHDXQYQPsTgD00hB7.jpeg',
          ship_addr:'大浪',
          ship_area:'北京/北京市/东城区',
          ship_name:'吴燕平',
          ship_status:"0",
          spec_info1:'790~960',
          spec_info2:'15',
          spec_info3:'0',
          total_amount:'1422.00',
        }
      ]
    }
  },
  components:{
    Sticky,
    Tab,
    TabItem,
    Swiper,
    SwiperItem,
    CardOrder
  },
  methods:{

  }
}
</script>

<style lang="less">
.order{
  height: 100%;
}
.order-sticky{
  z-index:9999;
}
.order .vux-swiper{
  height: auto;
  overflow: inherit;
}
  .tab-swiper-content{
    height: 100%;
  }
</style>
