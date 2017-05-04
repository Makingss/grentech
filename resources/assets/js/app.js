require('./bootstrap');

// import Vue from 'vue';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-default/index.css';
Vue.use(ElementUI);


//首页相关组件
Vue.component('header-section', require('./components/home/Header-section.vue'));
Vue.component('navbar', require('./components/home/Navbar.vue'));
Vue.component('banner-section', require('./components/home/Banner-section.vue'));
Vue.component('content-section', require('./components/home/Content-section.vue'));
Vue.component('slogen', require('./components/home/Slogen.vue'));
Vue.component('footer-section', require('./components/home/Footer-section.vue'));
Vue.component('about-us', require('./components/home/About-us.vue'));

//购物车页面
Vue.component('shopcart', require('./components/shopcart/Shopcart.vue'));

//商品详情页面
Vue.component('goods-detail', require('./components/goods/Goods-detail.vue'));

//search 搜索页
Vue.component('search', require('./components/search/Search.vue'));

//app-link app 引导页
Vue.component('app-link', require('./components/footer/App-link.vue'));

//mall_user用户界面
Vue.component("mall-user", require("./components/user/Mall-user.vue"));

//用户相关组件
Vue.component("user-info", require("./components/user/User-info.vue"));
Vue.component("banner-carousel", require("./components/user/Banner-carousel.vue"));
Vue.component("plug-in", require("./components/user/Plug-in.vue"));
Vue.component("circle-friends", require("./components/user/Circle-friends.vue"));
Vue.component("header-user", require("./components/user/Header-user.vue"));
Vue.component("navbar-user", require("./components/user/Navbar-user.vue"));
Vue.component("navbar-personal", require("./components/user/Navbar-personal.vue"));

//安全中心
Vue.component("safety-center", require("./components/user/Safety-center.vue"));

//收货地址
Vue.component("address-list", require("./components/user/Address.vue"));

//售后服务
Vue.component("after-service", require("./components/order/After-service.vue"));
Vue.component("after-orderlist", require("./components/order/After-orderlist.vue"));
Vue.component("after-apply", require("./components/order/After-apply.vue"));

//订单详情页
Vue.component("myorder", require("./components/order/Myorder.vue"));
Vue.component("orders-detail", require("./components/order/Orders-detail.vue"));
Vue.component("order-evaluate", require("./components/order/Order-evaluate.vue"));


//登陆界面
Vue.component("login", require("./components/passport/Login.vue"));
Vue.component("register", require("./components/passport/Register.vue"));

//测试方法
Vue.component('follow-botton', require('./components/QuestionFollowBotton.vue'));
Vue.component('example', require('./components/Example.vue'));
Vue.component('passport-clients', require('./components/passport/Clients.vue'));

Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'));

Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'));
const app = new Vue({
    el: '#app',
}).$mount("#app");
