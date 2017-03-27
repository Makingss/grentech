<template lang="html">
  <div class="user content bg-white">
    <div class="content-box">
 <div class="text-center user-bg">
     <p class="center user-avatar">
        <img :src="user_avatar" alt="" class="circle">
      </p>
      <div class="user-login">
        <p class="padding-tb-10">
          <router-link to="/login" class="color-white">
            登陆
          </router-link>
        </p>
        <p class="padding-tb-10" v-if="false">
          <router-link to="/register" class="color-white">
            立即注册
          </router-link>
        </p>
      </div>
    </div>
    <card :header="{title:'订单'}" v-if="false">
      <div slot="content" class="flex-nowrap order-list text-center">
        <div class="vux-1px-l vux-1px-r" v-for="(item,index) in order_list_data">
          <router-link :to="item.url" class="block">
            <span class="color-danger">
              <i class="iconfont font-3x" v-html="item.icon"></i>
            </span>
            <div>
              {{item.title}}
            </div>
          </router-link>
        </div>
      </div>
    </card>
    <card :header="{title:'菜单'}" class="noborder-before margin-0">
      <div slot="content">
        <flexbox :gutter="0" wrap="wrap">
          <flexbox-item :span="1/4" v-for="(item,index) in others_data" class="text-center padding-tb-15">
            <router-link :to="item.url" class="block">
              <div class="vux-1px-r vux-1px-l">
                <span><i class="iconfont font-2x" v-html="item.icon"></i></span>
                <div>
                  {{item.title}}
                </div>
              </div>
            </router-link>
          </flexbox-item>
        </flexbox>
      </div>
    </card>
    <div class="text-center color-gray brand-info">
      <p>&copy;国人天线</p>
    </div>
    </div>
  </div>
</template>
<script>
import {Card,Flexbox,FlexboxItem} from 'vux'
export default {
  name:'user',
  data:function(){
    return {
      user_avatar_bg:'/static/slice/a1.jpg',
      user_avatar:'/static/slice/user_logo.jpg',
      order_list_data:[
        {
          title:'待付款',
          url:"/order",
          icon:'&#xe61a;',
          show_badge:true,
        },{
          title:'待发货',
          url:"/order",
          icon:'&#xe632;',
          show_badge:true,
        },{
          title:'待收货',
          url:"/order",
          icon:'&#xe66f;',
          show_badge:true,
        },{
          title:'已收货',
          url:"/order",
          icon:'&#xe619;',
          show_badge:true,
        },{
          title:'售后',
          url:"/order",
          icon:'&#xe617;',
          show_badge:true,
        }
      ],
      others_data:[
        {
          title:'我的收益',
          icon:"&#xe612;",
          url:'/wallet',
          show_badge:false
        },
        // {
        //   title:'我的卡券',
        //   icon:"&#xe62f;",
        //   url:'/user',
        //   show_badge:false
        // },
        {
          title:'二维码',
          icon:"&#xe614;",
          url:'/qrcode',
          show_badge:false
        },
        // {
        //   title:'地址管理',
        //   icon:"&#xe620;",
        //   url:'/address',
        //   show_badge:false
        // },
        // {
        //   title:'个人设置',
        //   icon:"&#xe61d;",
        //   url:'/setting',
        //   show_badge:false
        // },
        {
          title:'报表中心',
          icon:"&#xe61f;",
          url:'/vchart',
          show_badge:false
        },
        // {
        //   title:'商品收藏',
        //   icon:"&#xe61e;",
        //   url:'/favgoods',
        //   show_badge:false
        // },
        {
          title:'帮助',
          icon:"&#xe622;",
          url:'/service',
          show_badge:false
        }
      ]
    }
  },
  components:{
    Card,
    Flexbox,
    FlexboxItem
  }
}
</script>

<style lang="less" scoped>
.user-login{
  position: relative;
  z-index:88;
}
.user-avatar{
  // margin-top:.8rem;
  position:relative;
  z-index:88;
  padding-top:15px;
}
.user-avatar img{
  width: 4rem;
  height: 4rem;
}
.order-list>div{
  padding:.5rem 0;
}
// .user-bg{
//    background: -webkit-radial-gradient(center, ellipse cover, rgba(101, 100, 109, 1) 0%, rgba(46, 61, 82, 1) 100%); /* Chrome10-25,Safari5.1-6 */
//    background: radial-gradient(ellipse at center, rgba(101, 100, 109, 1) 0%, rgba(46, 61, 82, 1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
//    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#65646d', endColorstr='#2e3d52', GradientType=1); /* IE6-9 fallback on horizontal gradient */
// }
.user-bg{
  background: #5184bc; /* Old browsers */
  background: -moz-linear-gradient(45deg,  #5184bc 0%, #3e60a8 100%); /* FF3.6-15 */
  background: -webkit-linear-gradient(45deg,  #5184bc 0%,#3e60a8 100%); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(45deg,  #5184bc 0%,#3e60a8 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#5184bc', endColorstr='#3e60a8',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
}
.brand-info{
  position:absolute;
  bottom:4rem;
  left:0;
  width:100%;
}

</style>
