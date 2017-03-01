<template lang="html">
  <div class="template-content">
    <search v-model="search_input" position="static" top="0"  class="list-search"></search>
    <div class="content list">
      <scroller lock-x @on-scroll="onScroll($event)" height="100%" class="x-scroller-container">
        <!-- <p v-for="item in 40">aaaaaaa</p> -->
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
            <img :src="item.img" alt="" slot="card-media">
            <div class="item-title" slot="card-title">{{item.name}}</div>
            <div class="item-subtitle color-danger" slot="card-subtitle">¥{{item.price}}</div>
          </card-list>
          <div class="spinner text-center">
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
      loading:false,
      type:'large',
      search_input:'',
      list_data:[
        {
          url:'#',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          img:'http://mall.yingerfashion.com/public/images/cd/6a/4b/1a799542c9d0a4919d14dba60da2e2246d799cbe.jpg',
          title:'',
          price:'276.00',
          mktprice:'1380.00'
        },
        {
          url:'#',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          img:'http://mall.yingerfashion.com/public/images/cd/6a/4b/1a799542c9d0a4919d14dba60da2e2246d799cbe.jpg',
          title:'',
          price:'276.00',
          mktprice:'1380.00'
        },
        {
          url:'#',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          img:'http://mall.yingerfashion.com/public/images/cd/6a/4b/1a799542c9d0a4919d14dba60da2e2246d799cbe.jpg',
          title:'',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          price:'276.00',
          mktprice:'1380.00'
        },
        {
          url:'#',
          img:'http://mall.yingerfashion.com/public/images/cd/6a/4b/1a799542c9d0a4919d14dba60da2e2246d799cbe.jpg',
          title:'',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          price:'276.00',
          mktprice:'1380.00'
        },{
          url:'#',
          img:'http://mall.yingerfashion.com/public/images/cd/6a/4b/1a799542c9d0a4919d14dba60da2e2246d799cbe.jpg',
          title:'',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          price:'276.00',
          mktprice:'1380.00'
        },{
          url:'#',
          img:'http://mall.yingerfashion.com/public/images/cd/6a/4b/1a799542c9d0a4919d14dba60da2e2246d799cbe.jpg',
          title:'',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          price:'276.00',
          mktprice:'1380.00'
        },{
          url:'#',
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
  methods:{
    onScroll:function($el){
      console.log("scroll");
      console.log($el);
      this.handle_scroll($el);
    },
    handle_scroll:function(el){
      //console.log(el);
      var self=this;
      var _el=$(".x-scroller-container");
      var scroller=$(".x-scroller-container")
      //总高度
      var scrollHeight=_el[0].scrollHeight;
      console.log(scrollHeight);
      let height=parseFloat(_el.height());
      console.log(height);

      // var self=this;
      // let height=parseFloat(el.height());
      // let scrollTop=parseFloat(el.scrollTop());
      // //console.log(height,scrollTop);
      // var view_height=height+scrollTop;
      // var scrollHeight=el[0].scrollHeight;
      //
      // // console.log(view_height,el[0].scrollHeight);
      if(scrollHeight-height-el.top<40){
        console.log("到达底部");
        //调用加载功能
        self.loadMore();
        return;
      }
    },
    loadMore:function(){
      var self=this;
      console.log(this.loading);
        console.log("触发加载1");
      if(this.loading){
        return
      }
      console.log("触发加载2222222222");
      //this.loading=true;
      let scroller=$(".x-scoller-container");
      //console.log(loader);
      this.loading=true;
      setTimeout(()=>{
        let i=this.length;
        this.list_data.push({
          url:'#',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          img:'http://mall.yingerfashion.com/public/images/cd/6a/4b/1a799542c9d0a4919d14dba60da2e2246d799cbe.jpg',
          title:'',
          price:'2xxxxx0',
          mktprice:'1380.00'
        },{
          url:'#',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          img:'http://mall.yingerfashion.com/public/images/cd/6a/4b/1a799542c9d0a4919d14dba60da2e2246d799cbe.jpg',
          title:'',
          price:'2xxxxx0',
          mktprice:'1380.00'
        })
        let scrollTop=scroller[0].scrollHeight-scroller.height()-20;
        scroller.scrollTop(scrollTop);
        self.loading=false;
      },1500)
    }
  }

}
</script>

<style lang="less" scoped>

  .list.content{
    overflow-y: scroll;
    height:100%;
    padding-top:0;
    // padding-bottom: 1rem;
  }
  .list.content .scroll-content{
    padding-bottom: 0;
  }
</style>
