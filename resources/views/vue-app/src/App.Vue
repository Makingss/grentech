<template>
  <div id="app" :class="'page-'+page_name">
    <x-header :left-options="{showBack:header_conf.show_back}" :title="header_conf.title" v-if="!!header_conf&&header_conf.is_show">
    </x-header>
    <tabbar class="text-center navbar" v-if="!!header_conf&&!header_conf.hide_tabbar">
      <tabbar-item v-for="(item,index) in navbar.data" :link="item.url" :class="{'link-active':header_conf.navbar_active!=undefined&&header_conf.navbar_active==index}">
        <span slot="icon" class="icon iconfont font-4x"><i v-html="item.iconfont"></i></span>
        <span slot="label">{{item.title}}</span>
      </tabbar-item>
    </tabbar>
    <span @click="popup" v-if="false" class="switch">开关</span>
    <transition name="slide" mode="out-in">
    <!-- keep-alive -->
        <router-view transition="slide"></router-view>
    </transition>

    <popup v-model="popup_login" class="popup-login" height="100%">
      <div class="popup-login-close pull-left" v-if="intercept_closeable">
        <span @click="popup" class="iconfont padding-rl-10 padding-tb-6 color-danger inline-block">&#xe606;</span>
      </div>
      <div class="login-logo block-center link-img" style="margin-top:30%">
        <img src="/static/slice/logo_300.png" alt="" class="margin-tb-20">
      </div>
      <div class="login-form">
        <group label-width="4rem" label-margin-right="2rem" label-align="left">
          <x-input class="font-normal" placeholder="手机号" v-model="phone"></x-input>
          <x-input class="font-normal" placeholder="密码" v-model="pwd"></x-input>
        </group>
      </div>
      <div class="margin-tb-20 tab-80 block-center">
        <x-button type="warn" class="block-center login-btn btn-80">登陆</x-button>
      </div>
      <div class="login-link text-center clear-float">
        <div class="tab-50 pull-left">
          <router-link to="/register">快速注册</router-link>
        </div>
        <div class="tab-50 pull-left">
          <router-link to="/find-pwd">忘记密码</router-link>
        </div>
        <div class="tab-50 pull-left">
          <router-link to="/home">商城主页</router-link>
        </div>
      </div>
    </popup>
  </div>
</template>
<script>
// <keep-alive> </keep-alive>
import * as config from './config/config.js'
import api from './api'
  import {
    XHeader,
    Tabbar,
    TabbarItem,
    Search,
    Popup,
    Group,
    XInput,
    XButton
  } from 'vux'

  export default {
    name: 'app',
    data: function () {
      return {
        popup_login: false,
        page_name: '',
        search_input: '',
        phone: '',
        pwd: '',
        
        intercept_closeable:true,
        // title:'用户注册',
        header_conf: {
          title: '',
          is_show: true,
          show_back: false
        },
        navbar: {
          
        }
      }
    },
    computed:{
      
    },
    methods: {
      fetch_data: function () {
        this.popup_login = false;
        this.page_name = this.$route.name;
        this.xheader_handler(this.$route);
        //处理 navbar 的 active
      },
      init_app:function(){
        var self=this;
        //调用header处理
        this.page_name = this.$route.name;
        var header_conf = this.handler_xheader(this.$route.name);
        this.header_conf = header_conf;
        this.navbar=config.app_config.navbar;

         //3s后启用登陆拦截
        setTimeout(function(){
            self.popup_login=self.$store.state.popuplogin.popup_login;
            self.intercept_closeable=config.app_config.intercept_closeable;
            console.log(self.popup_login);
            console.log("登陆拦截");
         },config.app_config.intercept_time)
      },
      popup: function () {
        this.popup_login = !this.popup_login;
      },
      xheader_handler: function (route) {
        var header_conf = this.handler_xheader(route.name);
        this.header_conf = header_conf;
      }
    },
    created: function () {
      this.init_app();
     
    },
    watch: {
      $route: 'fetch_data'
    },
    components: {
      XHeader,
      Tabbar,
      TabbarItem,
      Search,
      Popup,
      Group,
      XInput,
      XButton
    }
  }

</script>

<style lang="less">
  // .slide-enter,
  // .slide-leave {
  //   opacity: 0;
  // }
  
  // .slide-enter-active,
  // .slide-leave-active {
  //   transition: opacity 0.5s ease;
  // }
  .slide-transition { 
   transition: all 0.1s ease;
  }
  .switch {
    position: absolute;
    top: 10px;
    right: 20px;
    background-color: #e4393c;
    color: #fff;
    z-index: 100000;
  }
  
  .popup-login-close~.login-logo {
    margin-top: 20%;
  }
  
  #app .vux-popup-dialog {
    background-color: #fff;
    // background-color:#283852;
  }
  
</style>
