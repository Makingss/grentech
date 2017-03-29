<template lang="html">
  <div class="wallet content">
    <div class="content-box">
      <div class="user-logo">
        
        <div class="text-center bg-dark color-white padding-tb-10">
          <div class="circle link-img" v-if="false">
             <img src="/static/slice/girl_avatar.jpg" alt="">
          </div>
          <p class="font-mini padding-tb-10">总金额</p>
          <countup class="font-3x" :start-val="9999/10*8" :end-val="9999.00" :decimals="1" :duration="4"></countup>
          <p class="font-mini padding-tb-10">上周收益 +100.00</p>
        </div>
      </div>
      <swiper height="200px" class="margin-t-20">
        <swiper-item v-for="(item,index) in card_list">
          <div class="link-img tab-80 block-center border-radius-5" :show-dots="false">
          <!-- <img :src="item.img" alt=""> -->
          <div class="bank-card" :class="{'bank-PA':index==0,'bank-IC':index==1,'bank-BC':index==2}">
              <p class="padding-t-10 bank-name padding-l-10">{{item.title}}</p>
              <p class="padding-t-10 bank-type font-mini padding-l-10">{{item.bank_type}}</p>
              <p class="padding-t-10 text-center bank-code font-2x">{{item.bank_code}}</p>
          </div>
          </div>
        </swiper-item>
      </swiper>
      <div class="padding-rl-10 text-center">
        <group title="收支明细" class="text-left">
        <cell title="¥100.00" class="font-normal" v-for="item in 10">
          <div class="slot">
            <p>170316143214739</p>
            <p>2017-03-20 00:00:00</p>
          </div>
        </cell>
        </group>
      </div>
    </div>
    
  </div>
</template>

<script>

import {Swiper,SwiperItem,Group,Cell,Countup} from 'vux'
export default {
  name:'wallet',
  data:function(){
    return {
      card_list:[
        {
          url:'#',
          title:"平安银行",
          bank_type:'储蓄卡',
          bank_code:'**** ***** ****5958',
          img:'/static/images/index/index_open_012.jpg',
        },{
          url:'#',
          title:"工商银行",
          bank_type:'储蓄卡',
          bank_code:'**** ***** ****5900',
          img:'/static/images/index/index_open_007.jpg',
        },{
          url:'#',
          title:"农业银行",
          bank_type:'储蓄卡',
          bank_code:'**** ***** ****1058',
          img:'/static/images/index/index_open_007.jpg',
        }
      ]
    }
  },
  components:{
    Swiper,
    SwiperItem,
    Group,
    Cell,
    Countup
  },
  methods:{

  }
}
</script>

<style lang="less">
.user-logo .circle {
  overflow:hidden;
  width: 2rem;
  height: 2rem;
}
.bank-card{
  width:100%;
  height:160px;
  color:#fff;
}
.bank-name{
  padding-top:20px;
}
.bank-code{
  padding-top:16px;
}
.bank-PA{
  /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#e55d67+0,e55774+55,e6517e+100 */
  background: #e55d67; /* Old browsers */
  background: -moz-linear-gradient(45deg,  #e55d67 0%, #e55774 55%, #e6517e 100%); /* FF3.6-15 */
  background: -webkit-linear-gradient(45deg,  #e55d67 0%,#e55774 55%,#e6517e 100%); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(45deg,  #e55d67 0%,#e55774 55%,#e6517e 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e55d67', endColorstr='#e6517e',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */

}
.bank-IC{
  /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#5184bc+0,3e60a8+100 */
  background: #5184bc; /* Old browsers */
  background: -moz-linear-gradient(45deg,  #5184bc 0%, #3e60a8 100%); /* FF3.6-15 */
  background: -webkit-linear-gradient(45deg,  #5184bc 0%,#3e60a8 100%); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(45deg,  #5184bc 0%,#3e60a8 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#5184bc', endColorstr='#3e60a8',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */

}
.bank-BC{
  /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#29af81+0,1c9db4+100 */
  background: #29af81; /* Old browsers */
  background: -moz-linear-gradient(45deg,  #29af81 0%, #1c9db4 100%); /* FF3.6-15 */
  background: -webkit-linear-gradient(45deg,  #29af81 0%,#1c9db4 100%); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(45deg,  #29af81 0%,#1c9db4 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#29af81', endColorstr='#1c9db4',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */

}
</style>
