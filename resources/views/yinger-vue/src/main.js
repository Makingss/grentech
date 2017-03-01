// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import FastClick from 'fastclick'
import router from './router'
import App from './App'
// import infiniteScroll from './directives/infiniteScroll'
import {loading} from './util/util.js'


//引入 nprogress
import NProgress from 'nprogress'
import 'nprogress/nprogress.css'

//引入 zepto 插件
import $ from 'n-zepto'

// Vue.use(NProgress)
//引入 animate.css 动画库
// require('vue2-animate/dist/vue2-animate.min.css')

router.beforeEach((to, from, next) => {
  NProgress.start();
  loading.show();
  //console.log(loading);
  next()
})
router.afterEach(transition => {
  NProgress.done();
  loading.hide();
});

FastClick.attach(document.body)
//引入资源文件
import YingerVue from './js/yinger-vue.js'
import Style from './styles/style.css'
import Reset from './styles/reset.css'

//引入vue插件扩展
import Plugin from './plugin/plugin'
Vue.use(Plugin);

// Vue.directive('infiniteScroll',infiniteScroll)

/* eslint-disable no-new */
new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
