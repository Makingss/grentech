<template>
  <div id="app" :class="'page-'+page_name">
      <x-header :left-options="{showBack:header_conf.show_back}" :title="header_conf.title" v-if="!!header_conf&&header_conf.is_show">
      </x-header>
      <tabbar class="text-center">
        <tabbar-item v-for="(item,index) in navbar.data" :link="item.url">
          <span slot="icon" class="icon iconfont"><i v-html="item.iconfont"></i></span>
          <span slot="label">{{item.title}}</span>
        </tabbar-item>
      </tabbar>
        <transition name="slide" mode="out-in">
          <router-view></router-view>
        </transition>
  </div>
</template>
<script>
import {XHeader,Tabbar,TabbarItem,Search} from 'vux'
export default {
  name: 'app',
  data:function(){
    return {
      page_name:'',
      search_input:'',
      // title:'用户注册',
      header_conf:{
        title:'',
        is_show:true,
        show_back:false
      },
      navbar:{
        data:[
          {
            iconfont:'&#xe6b8;',
            title:'商城',
            url:'/home'
          },{
            iconfont:'&#xe616;',
            title:'分类',
            url:'/category'
          },{
            iconfont:'&#xe694;',
            title:'用户中心',
            url:'/user'
          },{
            iconfont:'&#xe67b;',
            title:'购物车',
            url:'/cart'
          },{
            iconfont:'&#xe657;',
            title:'活动广场',
            url:'/activity'
          },
        ],
        conf:{}
      }
    }
  },
  methods:{
    fetch_data:function(){
      this.page_name=this.$route.name;
      this.xheader_handler(this.$route);
    },
    xheader_handler:function(route){
      var header_conf=this.handler_xheader(route.name);
      this.header_conf=header_conf;
    }
  },
  created:function(){
    //调用header处理
    this.page_name=this.$route.name;
    var header_conf=this.handler_xheader(this.$route.name);
    this.header_conf=header_conf;
  },
  watch:{
    $route:'fetch_data'
  },
  components:{
    XHeader,
    Tabbar,
    TabbarItem,
    Search
  }
}
</script>

<style lang="less">
@import '~vux/src/styles/reset.less';
.slide-enter,.slide-leave{
  opacity: 0;
}
.slide-enter-active,.slide-leave-active{
  transition:opacity .3s ease;
}

</style>
