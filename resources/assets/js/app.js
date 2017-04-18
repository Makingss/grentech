require('./bootstrap');

// import Vue from 'vue';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-default/index.css';
Vue.use(ElementUI);


//首页相关组件
Vue.component('header-section',require('./components/home/Header-section.vue'));
Vue.component('navbar',require('./components/home/Navbar.vue'));
Vue.component('banner-section',require('./components/home/Banner-section.vue'));
Vue.component('content-section',require('./components/home/Content-section.vue'));
Vue.component('slogen',require('./components/home/Slogen.vue'));
Vue.component('footer-section',require('./components/home/Footer-section.vue'));
Vue.component('about-us',require('./components/home/About-us.vue'));

//购物车页面
Vue.component('shopcart',require('./components/shopcart/Shopcart.vue'));

//商品详情页面
Vue.component('goods-detail',require('./components/goods/Goods-detail.vue'));

//search 搜索页
Vue.component('search',require('./components/search/Search.vue'));

//app-link app 引导页
Vue.component('app-link',require('./components/footer/App-link.vue'));

//登陆界面
Vue.component("login",require("./components/passport/Login.vue"));
Vue.component("register",require("./components/passport/Register.vue"));

const app = new Vue({
    el: '#app',
}).$mount("#app");
