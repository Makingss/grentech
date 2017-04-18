import Vue from 'vue'
import VueResource from 'vue-resource'
Vue.use(VueResource)

// 设置 Laravel 的 csrfToken
Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
    next();
});

const API_ROOT = '';
const TEST_ROOT="http://119.22.23.185"
var root_host='';


function get_headers(){
    return {
        'Accept':'application/json',
        'Authorization':"Bearer "+window.localStorage.access_token,
    };
}

// if(window.location.host=="127.0.0.1"||window.location.host=="localhost:8080"){
//     root_host=TEST_ROOT
// }
export default {
    get_api_token:function(data){
        return Vue.http.post(API_ROOT+'/oauth/token',data);
    },
    refresh_token:function(data){
        return Vue.http.post(API_ROOT+'oauth/token',data);
    },
    user_login:function(data){
        return Vue.http.post(API_ROOT+"/api/login",data);
    },
    get_user_info:function(data){
        return Vue.http.get(API_ROOT+'/api/user',{
            headers:get_headers()
        });
    },
    getGoodsData: function(data) {
        // filtered:[brand_id, goods_id, type_id, cat_id, bn]  
        // parameters  relations  per_page 
        /*type:[
          Goods_types',
          "goods_cats"
          'mechanics',
          'goods_ports',
          'assemblies',
          'standardfits',
          'electrics',
          'goods_keywords',
          'products',
          'brands',
          'goods_lv_price',
          'member_goods',
          'image_attach',
          'images'
        ]*/
        // console.log(data);
        return Vue.http.get(API_ROOT + '/api/goods', {params:data});
        // return Vue.http.post(API_ROOT+'/api/goods',{relations:"image_attach",parameters:""});
    },
    get_page_data:function(url,data){
        return Vue.http.get(url,{params:data});
    },
    get_trans_params_table:function(data){
        return Vue.http.post(API_ROOT+"/table",data);
    },
    get_cat_list:function(data){
        return Vue.http.get(API_ROOT+"/goods/cat",{params:data});
    },
    get_search_result:function(data){
        return Vue.http.get(API_ROOT+'/search',{params:data});
    },
    get_goods_type:function(){
        return Vue.http.get(API_ROOT+"/goods/type");
    },
    register_user:function(data){
        return Vue.http.post(API_ROOT+"/api/register",data);
    },
    get_token:function(data){
        return Vue.http.post(API_ROOT+"/api/verify",data);
    },
    get_keywords:function(data){
        return Vue.http.get(API_ROOT+'/getkeywords',{params:data})
    },
    get_similar_by_kwd:function(data){
        return Vue.http.get(API_ROOT+'similar',{params:data})
    },
    get_cart_data:function(data){
       
        var headers=get_headers();
        console.log("************");
        console.log(headers);
        return Vue.http({
            url:API_ROOT+'/api/cart',
            method:'GET',
            // data,
            headers:get_headers()
        });
    },
    add_cart:function(data){
        var headers=get_headers();
        console.log("************");
        console.log(headers);
        return Vue.http.post(API_ROOT+'/api/cartAdd',data,{
            headers:get_headers()
        });
    },
    update_cart:function(data){
        var headers=get_headers();
        /*
            quantity:'',数量
            goods_id:'288',
            id:'',
         */
        return Vue.http.post(API_ROOT+'/api/cartUpdate',data,{
            headers:get_headers()
        })
    },
    del_cart:function(data){
        var headers=get_headers();
        return Vue.http.post(API_ROOT+'/api/cartDelete',data,{
            headers:get_headers()
        })
    }


}