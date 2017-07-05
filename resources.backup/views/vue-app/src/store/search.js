import api from '../api'
export default {
    state:{
        goods_list:[],
        page:1,
        per_page:10,
    },
    mutations:{
        SETSEARCHLIST(state,data){
            state.goods_list=data;
        }
    },
    actions:{
        GETSEARCHLIST({commit},params){
            api.get_search_result(params).then(res=>{
                commit('SETGOODSLIST',res.data);
            })
        }
    }   
}