<template lang="html">
  <div class="goods content">
    <swiper :list="swiper_list">
    </swiper>
    <flexbox :gutter="0" wrap="nowrap" class="bg-white">
      <flexbox-item class="padding-tb-6 padding-l-10 border-box" :span="9">
        <p class="line-ellispse-2">SongofSong歌中歌X型黑色钉珠连衣裙75305020X型廓形，修身显瘦，彰显优雅的女人味</p>
        <p class="color-danger">¥7390.00</p>
        <p class="color-gray">市场价:<s>¥7390.00</s></p>
      </flexbox-item>
      <flexbox-item :span="3" class="link-img padding-rl-6 border-box">
        <img src="/static/slice/code.jpg" alt="">
      </flexbox-item>
    </flexbox>
    <div class="padding-10 margin-tb-10 bg-white">
      <flexbox :gutter="0" wrap="nowrap">
        <flexbox-item :span="11">
          <p>颜色: <span>红色</span><span>藏蓝</span><span>黑色</span><span>粉红</span></p>
          <p>尺码: <span>38</span><span>39</span><span>40</span><span>42</span></p>
        </flexbox-item>
        <flexbox-item :span="1">
          <span class="iconfont">&#xe65f;</span>
        </flexbox-item>
      </flexbox>

    </div>
    <div class="margin-tb-10 padding-10 bg-white">
      <x-button mini plain type="warn">优惠</x-button>
    </div>
    <div class="goods-desc">
        <tab v-model="index" active-color="#FB4F5B">
          <tab-item>商品详情</tab-item>
          <tab-item>主要参数</tab-item>
          <tab-item>服务信息</tab-item>
        </tab>
        <swiper v-model="index" :show-dots="false">
          <swiper-item class="padding-10">
            商品详情内容
          </swiper-item>
          <swiper-item class="padding-10">
            主要参数内容
          </swiper-item>
          <swiper-item class="padding-10">
            服务信息内容
          </swiper-item>
        </swiper>
    </div>
  </div>
</template>

<script>
import {Swiper,Flexbox,FlexboxItem,XButton,Tab,TabItem,SwiperItem} from 'vux'
export default {
  name:'goods',
  data:function(){
    return {
      index:0,

      swiper_list:[
        {
          url:'/home',
          img:'https://static.vux.li/demo/2.jpg',
          title:'送你一朵小花'
        },{
          url:'/home',
          img:'https://static.vux.li/demo/2.jpg',
          title:'送你一朵小花'
        },{
          url:'/home',
          img:'https://static.vux.li/demo/2.jpg',
          title:'送你一朵小花'
        },{
          url:'/home',
          img:'https://static.vux.li/demo/2.jpg',
          title:'送你一朵小花'
        }
      ]
    }
  },
  methods:{

  },
  created:function(){
    console.log(this.$store.state.goods);
    console.log(this.$router);
  },
  components:{
    Swiper,
    Flexbox,
    FlexboxItem,
    XButton,
    Tab,
    TabItem,
    SwiperItem
  }
}
</script>

<style lang="css">
.page-goods .content{
  background-color: #f7f7f7;
}
</style>
