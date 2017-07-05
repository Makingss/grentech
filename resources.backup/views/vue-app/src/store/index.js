import Vue from 'vue';
import Vuex from 'vuex';
import news from './news.js';
import goods from './goods.js'
import token from './token.js'
import popuplogin from './popuplogin'
Vue.use(Vuex);

export default new Vuex.Store({
    // 可以设置多个模块
    modules: {
        news,
        goods,
        token,
        popuplogin
    }
});
