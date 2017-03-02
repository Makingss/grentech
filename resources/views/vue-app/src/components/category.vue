<template lang="html">
  <div class="template-content">
    <div class="bar bar-header">
        <search v-model="search_input" position="static" top="0"  class="list-search"></search>
        <tab active-color='#fc378c' v-model="index">
          <tab-item>分类</tab-item>
          <tab-item>场景</tab-item>
          <tab-item>范围</tab-item>
        </tab>
    </div>
    <div class="category content">
      <swiper :show-dots="false" class="category-swiper padding-t-10" v-model="index">
        <swiper-item>
          <tree-list></tree-list>
        </swiper-item>
        <swiper-item>
          <ul class="category-scene">
            <li v-for="(item,index) in scene">
            <router-link :to="item.url" class="link-img">
              <img :src="item.img" alt="">
            </router-link>
            </li>
          </ul>
        </swiper-item>
        <swiper-item>
          <group class="range-content">
            <flexbox wrap="nowrap" :gutter="0">
              <flexbox-item :span="3" class="text-center font-normal">
                频段范围
                <p class="font-mini">(MHZ)</p>
              </flexbox-item>
              <flexbox-item :span="4">
                <x-input title="" type="text" keyboard="number" v-model="range_1">
                </x-input>
              </flexbox-item>
              <flexbox-item :span="1" class="text-center">
                <span class="iconfont">&#xe64b;</span>
              </flexbox-item>
              <flexbox-item :span="4">
                <x-input title="" type="text" keyboard="number" v-model="range_2">
                </x-input>
              </flexbox-item>
            </flexbox>
          </group>
          <group class="range-content">
            <flexbox wrap="nowrap" :gutter="0">
              <flexbox-item :span="3" class="text-center font-normal">
                覆盖范围
                <p class="font-mini">(㎡)</p>
              </flexbox-item>
              <flexbox-item :span="4">
                <x-input title="" type="text" keyboard="number" v-model="area1">
                </x-input>
              </flexbox-item>
              <flexbox-item :span="1" class="text-center">
                <span class="iconfont">&#xe64b;</span>
              </flexbox-item>
              <flexbox-item :span="4">
                <x-input title="" type="text" keyboard="number" v-model="area2">
                </x-input>
              </flexbox-item>
            </flexbox>
          </group>
          <div class="tab-80 block-center margin-tb-20">
            <x-button class="font-1x">
              搜索
            </x-button>
          </div>
        </swiper-item>
      </swiper>
    </div>
  </div>
</template>

<script>
import TreeList from './tree-list'
//import SidePanel from './side-panel'
import {Tab,TabItem,Search,Sticky,Swiper,SwiperItem,Group,Cell,XInput,Flexbox,FlexboxItem,XButton} from 'vux'
export default {
  name:"category",
  data:function(){
    return {
      search_input:'',
      index:0,
      range_min:0,
      range_max:100,
      area1:1,
      area2:100,
      range_1:25,
      range_2:75,
      scene:[
        {
          url:'/list',
          img:'/static/grentech/1.jpg',
          title:'',
          desc:'',
        },{
          url:'/list',
          img:'/static/grentech/2.jpg',
          title:'',
          desc:'',
        },{
          url:'/list',
          img:'/static/grentech/3.jpg',
          title:'',
          desc:'',
        },{
          url:'/list',
          img:'/static/grentech/4.jpg',
          title:'',
          desc:'',
        },{
          url:'/list',
          img:'/static/grentech/5.jpg',
          title:'',
          desc:'',
        },
        {
          url:'/list',
          img:'/static/grentech/6.jpg',
          title:'',
          desc:'',
        }
      ]
    }
  },
  methods:{

  },
  components:{
    Tab,
    TabItem,
    Search,
    TreeList,
    Sticky,
    Swiper,
    SwiperItem,
    Group,
    Cell,
    XInput,
    Flexbox,
    FlexboxItem,
    XButton
  }
}
</script>

<style lang="less">
.range-content .weui_cell_primary{
  background-color: #ccc;
  width: 4rem;
}
.page-list .content{
  padding-top:4.4rem;
}
.template-content{
  height:100%;
}
.category{
  width: 100%;
  height: 100%;
  .vux-slider > .vux-swiper > .vux-swiper-item{
    overflow-y: scroll;
  }
}
.list-search{
  position:absolute;
  top:2.2rem;
}
.category>.tree-list{
  position: absolute;
  width:100%;
  top:5rem;
  left: 0;
}
.category .category-swiper{
  height:100%;

  .vux-swiper{
    height: inherit !important;
  }
}
.bar.bar-header{
  position: relative;
}
.page-list .bar-header .vux-search-box{
  position: absolute!important;
  z-index:10;
  top:0;
  left: 0;

}
.page-list .vux-tab{
  position: absolute;
  top:2.3rem;
  left: 0;
  width: 100%;
  z-index:10;
}
.list>.goods-list{
  position: absolute;
  top:2.2rem;
  left: 0;
}
.category-content{
  height: 100%;
  width: 100%;
  // position: absolute;
  // top:5rem;
  .vux-slider{
    position: inherit;

  }
}
.category-scene{
  padding-bottom: 7.1rem;
}
</style>
