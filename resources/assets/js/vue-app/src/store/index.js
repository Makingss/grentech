import Vue from 'vue'
import Vuex from 'vuex'
import news from './news.js'

Vue.use(Vuex);
export default new Vuex.store({
  modules:{
    news
  }
})
