import api from '../api/index.js';

export default {
  state:{
    goods_list:[],
    page:1,
    per_page:10,
  },
  mutations:{
    SETGOODSLIST(state,goods_data){
      state.goods_list=goods_data;
      // console.log(state.goods_list);
    }
  },
  actions:{
    GETGOODSLIST({commit},params){
      api.getGoodsData(params).then(function(res){
        commit('SETGOODSLIST',res.data);
      })
    }
  }

}
