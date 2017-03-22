// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import VueResource from 'vue-resource'
 import store from './store/index.js'

import FastClick from 'fastclick'
import router from './router'
import App from './App.vue'
import * as util from './util/util.js'
import  * as filters from './filter/filter.js'
import * as config from './config/config.js'

import api from './api'
//引入 nprogress
// import NProgress from 'nprogress'
// import 'nprogress/nprogress.css'

//引入 zepto 插件
import $ from 'n-zepto'

//引入 animate.css 动画库
// require('vue2-animate/dist/vue2-animate.min.css')
let ad=config.app_config.ad;
router.beforeEach((to, from, next) => {
  console.log("路由切换");
  //判断 token---登陆拦截
  if(config.app_config.intercept){
  
     if(!!localStorage.access_token&&localStorage.access_token!='undefined'){

      }else{
            //弹出登陆框
          
      }
      store.state.popuplogin.popup_login=true;
  }
  
  //拉取 token
  // api.get_api_token({
  //       grant_type:"password",
  //       client_id:3,
  //       scope:"",
  //       username:"pengbd3@163.com",
  //       password:"5230178",
  //       client_secret:"okDZ28XNOjIE4n7gy07jnKxWizIOmQPKhQrWuQ6S"
  //     }).then(res=>{
  //      //vuex 状态控制
  //       var access_token=res.data.access_token;
  //       store.state.token.token=res.data;
  //       //加入 localStorage存储静态数据 
  //       window[config.app_config.storage].access_token=res.data.access_token;
  //       window[config.app_config.storage].expires_in=res.data.expires_in;
  //       window[config.app_config.storage].refresh_token=res.data.refresh_token;
  //       window[config.app_config.storage].token_type=res.data.token_type;
  //       //get 一用户信息测试 
  //         // api.get_user_info({
  //         //     headers:{
  //         //       'Accept':'application/json',
  //         //       'Authorization':"Bearer "+access_token,
  //         //     }
  //         // }).then(res=>{
  //         //   console.log(res.data);
  //         // })
  //     });
  // NProgress.start();
  if(!from.name&&to.name=="home"){
    //init app
    console.log("首次进入");
    router.app.isIndex=true;
    if(ad.is_show){
      util.init_ad.show(ad.url,ad.src,ad.show_time,ad.text);
    }
  }else{
    util.loading.show();
    router.app.isIndex=false;
  }
  next()
})
router.afterEach(transition => {
  // NProgress.done();
  util.loading.hide();
  if(ad.is_show){
    setTimeout(function(){
      $(".init-ad").addClass("init-ad-leave");
      setTimeout(function(){
          util.init_ad.hide();
      },750);
    },ad.show_time-750);
  }
});

FastClick.attach(document.body)
//引入资源文件
// import YingerVue from './js/yinger-vue.js'
import Style from './styles/style.css'
import Reset from './styles/reset.css'

//引入vue插件扩展
import Plugin from './plugin/plugin'

//调用模块
Vue.use(Plugin);
Vue.use(VueResource);


Vue.filter('date',filters.dateFilter)

// Vue.directive('infiniteScroll',infiniteScroll)

/* eslint-disable no-new */
new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
