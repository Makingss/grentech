<template lang="html">
  <div class="wallet content">
    <div class="user-logo margin-tb-20">
      <div class="circle block-center link-img">
        <img src="/static/slice/girl_avatar.jpg" alt="">
      </div>
      <div class="text-center margin-tb-10">
        王小明
      </div>
    </div>
    <swiper height="200px">
      <swiper-item v-for="(item,index) in card_list">
        <div class="link-img tab-80 block-center border-radius-5" :show-dots="false">
          <img :src="item.img" alt="">
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
</template>

<script>
import {Swiper,SwiperItem,Group,Cell} from 'vux'
export default {
  name:'wallet',
  data:function(){
    return {
      card_list:[
        {
          url:'#',
          img:'/static/images/index/index_open_012.jpg',
        },{
          url:'#',
          img:'/static/images/index/index_open_007.jpg',
        }
      ]
    }
  },
  components:{
    Swiper,
    SwiperItem,
    Group,
    Cell
  },
  methods:{

  }
}
</script>

<style lang="less">
.user-logo .circle {
  overflow:hidden;
  width: 4rem;
  height: 4rem;
}
.user-logo .circle{

}
</style>
