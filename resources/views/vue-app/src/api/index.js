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
// if(window.location.host=="127.0.0.1"||window.location.host=="localhost:8080"){
//     root_host=TEST_ROOT
// }
export default {
    get_api_token:function(data){
        return Vue.http.post(root_host+'/oauth/token',data);
    },
    get_user_info:function(data){
        return Vue.http.get(root_host+'/api/user',data);
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
    get_page_data:function(page_url){
        return Vue.http.get(page_url);
    },
    get_trans_params_table:function(data){
        return Vue.http.post(API_ROOT+"/table",data);
    },
    get_cat_list:function(data){
        return Vue.http.get(API_ROOT+"/goods/cat",data);
    },
    get_search_result:function(data){
        return Vue.http.get(API_ROOT+'/search',data);
    },
    get_goods_type:function(){
        return Vue.http.get(API_ROOT+"/goods/type");
    },
    register_user:function(data){
        return Vue.http.post(API_ROOT+"/api/register",data);
    },
    get_token:function(data){
        return Vue.http.post(API_ROOT+"/api/verify",data);
    }


}