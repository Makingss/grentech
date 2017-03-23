<template>
  <div class="home content">
    <swiper :list="swiper_list" dots-position="center"></swiper>
    <router-link to="/test" class="color-danger" v-if="false">test 测试</router-link>
    <div class="cat-goods">
      <divider class="padding-10">产品分类</divider>
      <div class="cat-cover link-img">
        <img :src="category.cover.img" alt="">
      </div>
      <flexbox :gutter="0" wrap="wrap">
        <flexbox-item :span="1/3" v-for="(item,index) in category.data" class="padding-tb-6">
          <router-link :to="item.url" class="link-img">
            <div>
              <img :src="item.img" alt="">
            </div>
            <div class="text-center">
              <div class="item-title color-danger">
                ￥{{item.name}}
              </div>
              <div class="item-subtitle color-gray">
                <span>{{item.desc}}</span>
              </div>
            </div>
          </router-link>
        </flexbox-item>
      </flexbox>
    </div>
    <div class="hot-sales">
      <divider class="padding-rl-10">热销产品</divider>
      <div class="cat-cover link-img">
        <img :src="hot_sales.cover.img" alt="">
      </div>
      <flexbox :gutter="0" wrap="wrap">
        <flexbox-item :span="1/3" v-for="(item,index) in hot_sales.data" class="padding-tb-6 border-box">
          <router-link :to="item.url" class="link-img">
            <div>
              <img :src="item.img" alt="">
            </div>
            <div class="text-center">
              <div class="item-title color-danger">
                ￥{{item.name}}
              </div>
              <div class="item-subtitle color-gray">
                <span>{{item.desc}}</span>
              </div>
            </div>
          </router-link>
        </flexbox-item>
      </flexbox>
    </div>
    <div>
      <divider class="padding-10">推荐商品</divider>
      <div class="link-img">
        <img :src="scroller_data.cover.img" alt="">
      </div>
    </div>

    <div class="scroll-content infinite-scroll container">
      <flexbox wrap="wrap" :gutter="0" class="scroll-content">
        <flexbox-item v-for="(item,index) in scroller_data.data" :span="1/2" class="link-img padding-tb-6 border-box" :class="{'padding-r-2':index%2==0,'padding-l-2':index%2==1}" :data-i="index%2">
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
      <div class="load-more text-center" v-show="loading">
        <spinner type="circles"></spinner>
      </div>
    </div>

  </div>
</template>

<script>
//import {loader} from '../util/util.js'
import {Swiper,Flexbox,FlexboxItem,Scroller,Spinner,Divider} from 'vux'
export default {
  name: 'home',
  data () {
    return {
      loading: false,
      scrollTop:0,
      swiper_list:[
        {
          url:'javascript:',
          img:'https://static.vux.li/demo/1.jpg',
          title:'测试轮播标题1'
        },{
          url:'javascript:',
          img:'https://static.vux.li/demo/2.jpg',
          title:'测试轮播标题2'
        },{
          url:'javascript:',
          img:'https://static.vux.li/demo/3.jpg',
          title:'测试轮播标题3'
        },
      ],
      uuid:'',
      category:{
        cover:{
          url:'',
          img:'/static/grentech/20161118174329771.jpg',
        },
        data:[
          {
            img:'/static/grentech/201611051243571562.jpg',
            url:'/goods?goods_id=62&item_index=0',
            name:'NMS 网管',
            cat:'基站',
            desc:'简单管理网络设备'
          },{
            img:'/static/grentech/201611071753107968.jpg',
            url:'/goods?goods_id=62&item_index=0',
            name:'NMS 网管',
            cat:'基站',
            desc:'简单管理网络设备'
          },{
            img:'/static/grentech/201611071844501875.jpg',
            url:'/goods?goods_id=62&item_index=0',
            name:'NMS 网管',
            cat:'基站',
            desc:'简单管理网络设备'
          },{
            img:'/static/grentech/201611221355144218.jpg',
            url:'/goods?goods_id=62&item_index=0',
            name:'NMS 网管',
            cat:'基站',
            desc:'简单管理网络设备'
          },{
            img:'/static/grentech/201611231413171562.jpg',
            url:'/goods?goods_id=62&item_index=0',
            name:'NMS 网管',
            cat:'基站',
            desc:'简单管理网络设备'
          },{
            img:'/static/grentech/201611071754125468.jpg',
            url:'/goods?goods_id=62&item_index=0',
            name:'NMS 网管',
            cat:'基站',
            desc:'简单管理网络设备'
          }
        ]
      },
      hot_sales:{
        cover:{
          url:'/goods?goods_id=62&item_index=0',
          img:'/static/grentech/20170116185915616-(1).jpg',
        },
        data:[
          {
            img:'/static/grentech/201611071754125468.jpg',
            url:'/goods?goods_id=62&item_index=0',
            name:'NMS 网管',
            cat:'基站',
            desc:'简单管理网络设备',
            price:'1209.00'
          },{
            img:'/static/grentech/201611231413171562.jpg',
            url:'/goods?goods_id=62&item_index=0',
            name:'NMS 网管',
            cat:'基站',
            desc:'简单管理网络设备',
            price:'1209.00'
          },{
            img:'/static/grentech/201611221355144218.jpg',
            url:'/goods?goods_id=62&item_index=0',
            name:'NMS 网管',
            cat:'基站',
            desc:'简单管理网络设备',
            price:'1209.00'
          },{
            img:'/static/grentech/201611051243571562.jpg',
            url:'/goods?goods_id=62&item_index=0',
            name:'NMS 网管',
            cat:'基站',
            desc:'简单管理网络设备',
            price:'1209.00'
          }
        ]
      },
      scroller_data:{
        cover:{
          url:'',
          img:'/static/grentech/201612070950019218.jpg'
        },
        data:[
          {
            url:'/goods?goods_id=62&item_index=0',
            name:'测试商品列表',
            img:'/static/grentech/201611221355144218.jpg',
            title:'',
            price:'276.00',
            mktprice:'1380.00'
          },
          {
            url:'/goods?goods_id=62&item_index=0',
            name:'测试商品列表',
            img:'/static/grentech/201611051243571562.jpg',
            title:'',
            price:'276.00',
            mktprice:'1380.00'
          },
          {
            url:'/goods?goods_id=62&item_index=0',
            name:'测试商品列表',
            img:'/static/grentech/201611221355144218.jpg',
            title:'',
            name:'测试商品列表',
            price:'276.00',
            mktprice:'1380.00'
          },
          {
            url:'/goods?goods_id=62&item_index=0',
            img:'/static/grentech/201611231413171562.jpg',
            title:'',
            name:'测试商品列表',
            price:'276.00',
            mktprice:'1380.00'
          },
          {
            url:'/goods?goods_id=62&item_index=0',
            img:'/static/grentech/201611071754125468.jpg',
            title:'',
            name:'测试商品列表',
            price:'276.00',
            mktprice:'1380.00'
          },
          {
            url:'/goods?goods_id=62&item_index=0',
            img:'/static/grentech/201611071754125468.jpg',
            title:'',
            name:'测试商品列表',
            price:'276.00',
            mktprice:'1380.00'
          }
        ]
      }
    }
  },
  computed:{
    length:function(){
      return this.scroller_data.data.length;
    }
  },
  mounted:function(){
    var self=this;
    $(".content").on('scroll',function(){
      //计算位置关系
      //console.log(this);
      self.handle_scroll($(this));
    })
  },
  methods:{
    handle_scroll:function(el){
      //console.log(el);
      var self=this;
      let height=parseFloat(el.height());
      let scrollTop=parseFloat(el.scrollTop());
      //console.log(height,scrollTop);
      var view_height=height+scrollTop;
      var scrollHeight=el[0].scrollHeight;

      // console.log(view_height,el[0].scrollHeight);
      if(scrollHeight-view_height<40){
        // console.log(scrollHeight-view_height);
        //调用加载功能
        self.loadMore();
        return;
      }
    },
    loadMore:function(){
      var self=this;
      if(this.loading){
        return
      }
      console.log("触发加载");
      this.loading=true;
      let scroller=$(".container");
      //console.log(loader);
      this.loading=true;
      setTimeout(()=>{
        let i=this.length;
        this.scroller_data.data.push({
            url:'/goods?goods_id=62&item_index=0',
            img:'/static/grentech/201611071754125468.jpg',
            title:'',
            name:'测试商品列表',
            price:'276.00',
            mktprice:'1380.00'
          },{
            url:'/goods?goods_id=62&item_index=0',
            img:'/static/grentech/201611071754125468.jpg',
            title:'',
            name:'测试商品列表',
            price:'276.00',
            mktprice:'1380.00'
          })
        let scrollTop=scroller[0].scrollHeight-scroller.height()-20;
        scroller.scrollTop(scrollTop);
        self.loading=false;
      },1500)
    }
  },
  components:{
    Swiper,
    Flexbox,
    FlexboxItem,
    Scroller,
    Spinner,
    Divider
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .scroll-content{
    width:100%;
  }
</style>
