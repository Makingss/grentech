import api from '../api'
export default {
    state:{
        token:{
            access_token:'',
            expires_in:0,
            refresh_token:'',
            token_type:'',
        }
    },
    mutations:{
        SETTOKEN(state,token){
            state.token=token;
        }
    },
    actions:{
        GETTOKEN({commit},params){
            api.get_api_token(params).then(res=>{
                console.log(res);
                commit('SETTOKEN',res.data);
            })
        }
    }
}