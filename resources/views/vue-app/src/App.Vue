<template>
<div id="app" :class="'page-'+page_name">
  <x-header  :left-options="{showBack:header_conf.show_back}" :title="header_conf.title" v-if="!!header_conf&&header_conf.is_show">
  </x-header>
  <tabbar class="text-center navbar" v-if="!!header_conf&&!header_conf.hide_tabbar">
    <tabbar-item v-for="(item,index) in navbar.data" :link="item.url" :class="{'link-active':header_conf.navbar_active!=undefined&&header_conf.navbar_active==index}">
      <span slot="icon" class="icon iconfont font-3x"><i v-html="item.iconfont"></i></span>
      <span slot="label">{{item.title}}</span>
    </tabbar-item>
  </tabbar>

  <span @click="popup" class="switch">开关</span>
  <transition name="slide" mode="out-in">
    <router-view></router-view>
  </transition>

  <popup v-model="popup_login" height="100%">
    <div class="popup-login-close">
      <span @click="popup" class="iconfont padding-rl-10 padding-tb-6 color-danger inline-block">&#xe606;</span>
    </div>
    <div class="login-logo block-center link-img">
      <img src="/static/slice/logo_300.png" alt="" class="margin-tb-20">
    </div>
    <div class="login-form">
      <group label-width="4rem" label-margin-right="2rem" label-align="left">
        <x-input placeholder="手机号" v-model="phone"></x-input>
        <x-input placeholder="密码" v-model="pwd"></x-input>
      </group>
    </div>
    <div class="margin-tb-20 tab-80 block-center">
      <x-button type="primary" class="block-center login-btn btn-80">登陆</x-button>
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
  data: function() {
    return {
      popup_login: false,
      page_name: '',
      search_input: '',
      phone: '',
      pwd: '',
      // title:'用户注册',
      header_conf: {
        title: '',
        is_show: true,
        show_back: false
      },
      navbar: {
        data: [{
          iconfont: '&#xe6b8;',
          title: '商城',
          url: '/home'
        }, {
          iconfont: '&#xe616;',
          title: '分类',
          url: '/category'
        },
        {
          iconfont: '&#xe694;',
          title: '用户中心',
          url: '/user'
        },
        // {
        //   iconfont: '&#xe67b;',
        //   title: '购物车',
        //   url: '/cart'
        // }, {
        //   iconfont: '&#xe657;',
        //   title: '活动广场',
        //   url: '/activity'
        // }
      ],
        conf: {}
      }
    }
  },
  methods: {
    fetch_data: function() {
      this.popup_login = false;
      this.page_name = this.$route.name;
      this.xheader_handler(this.$route);
      //处理 navbar 的 active

    },
    popup: function() {
      this.popup_login = !this.popup_login;
    },
    xheader_handler: function(route) {
      var header_conf = this.handler_xheader(route.name);
      this.header_conf = header_conf;
    }
  },
  created: function() {
    //调用header处理
    this.page_name = this.$route.name;
    var header_conf = this.handler_xheader(this.$route.name);
    //console.log(header_conf);
    this.header_conf = header_conf;
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

<style lang="less">@import '~vux/src/styles/reset.less';
.slide-enter,
.slide-leave {
    opacity: 0;
}
.slide-enter-active,
.slide-leave-active {
    transition: opacity 0.1s ease;
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
}
</style>
