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
        <span @click="popup" class="iconfont padding-rl-10 padding-tb-6 font-3x color-danger inline-block">&#xe606;</span>
      </div>
      <div class="login-logo block-center link-img" style="margin-top:30%">
        <img :src="logo_image" alt="" class="margin-tb-20">
      </div>
      <div class="login-form">
        <group label-width="4rem" label-margin-right="2rem" label-align="left">
          <x-input class="font-normal" placeholder="用户名" v-model="username"></x-input>
          <x-input class="font-normal" placeholder="密码" type="password" v-model="password"></x-input>
        </group>
      </div>
      <div style="height:36px;line-height:36px" class="login-msg padding-rl-10 color-danger">
        {{login_msg}}
      </div>
      <div class="margin-tb-20 tab-80 block-center">
        <x-button type="warn" class="block-center login-btn btn-80" @click.native="submit_login">登陆</x-button>
      </div>
      <div class="login-link text-center clear-float">
        <div class="tab-50 pull-left" v-if="false">
          <router-link to="/register">快速注册</router-link>
        </div>
        <div class="tab-50 pull-left" v-if="false">
          <router-link to="/find-pwd">忘记密码</router-link>
        </div>
        <div class="tab-50 pull-left" v-if="false">
          <router-link to="/home">商城主页</router-link>
        </div>
      </div>
    </popup>
  </div>
</template>
<script>
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
        logo_image:config.app_config.logo_image,
        username:'',
        password:'',
        login_msg:"",
        popup_login: false,
        page_name: '',
        search_input: '',
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
      submit_login:function(){
          var self=this;
          if(this.username==""){
            this.$vux.toast.show({
              text:'<span class="font-normal">用户名不能为空</span>',
              type:"warn"
            })
            return;
          }else if(this.password==""){
            this.$vux.toast.show({
              text:'<span class="font-normal">请输入密码</span>',
              type:"warn"
            })
            return;
          };
          api.user_login({
            username:self.username,
            password:self.password
          }).then(res=>{
            console.log(res);
            if(res.ok){
              var res_data=res.data;
              if(res.data.res){

                self.$vux.toast.show({
                  text:'<span class="font-normal">'+res_data.req+'</span>',
                  type:'success'
                });
                self.save_token(res_data.data);
                setTimeout(function(){
                  self.popup_login=false;
                },500)
              }else{
                self.popup_login=true;
                self.login_msg=res_data.req;
                // self.$vux.toast.show({
                //   text:'<span class="font-normal">'+res.data.req+'</span>',
                //   type:'warn'
                // })

              }
            }else{
              self.login_msg=res.data.req;
              self.popup_login=true;
            }
          })
      },
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
       //判断当前是否存在用户信息,启用登陆拦截
       var result=null;

       if (config.app_config.intercept) {
         //如果已存在用户信息,重新拉取授权,否则进行登陆拦截
         if(!!window.localStorage.refresh_token&&!!window.localStorage.client_id&&window.localStorage.client_secret){
          result=this.refresh_token();
          if(result==1){
            self.intercept_login();
          }
          console.log("]]]]]]]]]]]]]]]");
          console.log(result);
         }else{
           //登陆拦截
           self.intercept_login();
         }
        }
      },
      intercept_login:function(){
        var self=this;
        setTimeout(function(){
              self.popup_login=config.app_config.intercept;
              self.intercept_closeable=config.app_config.intercept_closeable;
        },config.app_config.intercept_time);
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
