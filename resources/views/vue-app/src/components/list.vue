<template lang="html">
  <div class="template-content">
    <div class="search-icon text-center" @click="toggleType">
      <span class="iconfont font-3x color-success">&#xe62a;</span>
    </div>
    <search v-model="search_input" position="static" top="0"  class="list-search border-box"></search>
    <div class="content list">
      <scroller lock-x use-pullup height="100%"
      @on-pullup-loading="load"
        ref="listScroll"
        :pullup-config="pullupConfig"
      class="x-scroller-container">
        <div class="">
          <flexbox wrap="wrap" :gutter="0" class="scroll-content" v-if="type=='large'">
            <flexbox-item v-for="(item,index) in list_data" :span="1/2" class="link-img padding-tb-6 border-box" :class="{'padding-r-2':index%2==0,'padding-l-2':index%2==1}" :data-i="index%2">
              <router-link to="/goods" class="block">
                <div>
                  <img :src="item.img" alt="">
                </div>
                <div class="padding-rl-10">
                  <div class="item-title line-ellispse-2">
                    {{item.name}}
                  </div>
                  <div class="item-subtitle color-danger">
                    ￥{{item.price}}
                  </div>
                </div>
              </router-link>
            </flexbox-item>
          </flexbox>
          <card-list v-for="(item,index) in list_data" v-if="type=='medium'">
            <router-link :to="item.url" class="block" slot="card-media">
              <img :src="item.img" alt="">
            </router-link>
            <router-link :to="item.url" slot="card-title">
              <div class="item-title">{{item.name}}</div>
            </router-link>
              <div class="item-subtitle color-danger" slot="card-subtitle">¥{{item.price}}</div>
          </card-list>
          <div class="spinner text-center" slot="pull-up" v-if="true">
            <spinner type="circles"></spinner>
          </div>
        </div>
      </scroller>
    </div>
  </div>
</template>

<script>
import CardList from './card-list'
import {Flexbox,FlexboxItem,Search,Scroller,Spinner} from 'vux'
const list_type=['small','medium','large'] //small--小图, medium--横向  large --并排
export default {
  name:'list',
  data:function(){
    return {
      demo4Value: {
        pullupStatus: 'default'
      },
      loading:false,
      type:'medium',
      search_input:'',
      pullupConfig:{
        content: '上拉加载更多',
        downContent: '松开进行加载',
        upContent: '上拉加载更多',
        loadingContent: '加载中...'
      },
      list_data:[
        {
          url:'/goods',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          img:'http://mall.yingerfashion.com/public/images/cd/6a/4b/1a799542c9d0a4919d14dba60da2e2246d799cbe.jpg',
          title:'',
          price:'276.00',
          mktprice:'1380.00'
        },
        {
          url:'/goods',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          img:'http://mall.yingerfashion.com/public/images/cd/6a/4b/1a799542c9d0a4919d14dba60da2e2246d799cbe.jpg',
          title:'',
          price:'276.00',
          mktprice:'1380.00'
        },
        {
          url:'/goods',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          img:'http://mall.yingerfashion.com/public/images/cd/6a/4b/1a799542c9d0a4919d14dba60da2e2246d799cbe.jpg',
          title:'',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          price:'276.00',
          mktprice:'1380.00'
        },
        {
          url:'/goods',
          img:'http://mall.yingerfashion.com/public/images/cd/6a/4b/1a799542c9d0a4919d14dba60da2e2246d799cbe.jpg',
          title:'',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          price:'276.00',
          mktprice:'1380.00'
        },{
          url:'/goods',
          img:'http://mall.yingerfashion.com/public/images/cd/6a/4b/1a799542c9d0a4919d14dba60da2e2246d799cbe.jpg',
          title:'',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          price:'276.00',
          mktprice:'1380.00'
        },{
          url:'/goods',
          img:'http://mall.yingerfashion.com/public/images/cd/6a/4b/1a799542c9d0a4919d14dba60da2e2246d799cbe.jpg',
          title:'',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          price:'276.00',
          mktprice:'1380.00'
        },{
          url:'/goods',
          img:'http://mall.yingerfashion.com/public/images/cd/6a/4b/1a799542c9d0a4919d14dba60da2e2246d799cbe.jpg',
          title:'',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          price:'276.00',
          mktprice:'1380.00'
        }
      ]
    }
  },
  components:{
    Flexbox,
    FlexboxItem,
    Search,
    CardList,
    Scroller,
    Spinner
  },
  created:function(){
    //console.log($(".page-list .weui_search_bar:before"));
  },
  methods:{
    toggleType:function(){
      //console.log("切换");
      this.type=this.type=='medium'?'large':'medium';
    },
    load:function(){
      console.log("上拉加载");
      setTimeout(()=>{
        this.list_data.push({
          url:'/goods',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          img:'http://mall.yingerfashion.com/public/images/cd/6a/4b/1a799542c9d0a4919d14dba60da2e2246d799cbe.jpg',
          title:'',
          price:'276.00',
          mktprice:'1380.00'
        },
        {
          url:'/goods',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          img:'http://mall.yingerfashion.com/public/images/cd/6a/4b/1a799542c9d0a4919d14dba60da2e2246d799cbe.jpg',
          title:'',
          price:'276.00',
          mktprice:'1380.00'
        })
        setTimeout(()=>{
          this.$refs.listScroll.donePullup();
        },100)

      },2000)
    }
  }

}
</script>

<style scoped>
  .list.content{
    overflow-y: scroll;
    height:100%;
    padding-top:0;
  }
  .list-search{
    position: static!important;
  }
  .list.content .scroll-content{
    padding-bottom: 0;
  }
.search-icon{
  width:38px;
  height:44px;
  position: absolute;
  top:0;
  left:0;
  z-index:199;

}
.list-search{
  padding-left: 2.2rem;
  background-color: #EFEFF4;
}

</style>
