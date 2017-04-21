import Vue from 'vue'
import VueResource from 'vue-resource'
Vue.use(VueResource)

// 拦截器设置,设置 Laravel 的 csrfToken
// Vue.http.interceptors.push((request, next) => {
//     request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
//     next();
// });

Vue.http.interceptors.push((request, next) => {
  request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
  if (!!window.localStorage.access_token) request.headers.set('Authorization', "Bearer " + window.localStorage.access_token);
  request.headers.set("Accept", 'application/json');
  next(function (response) {
    if (!window.localStorage.access_token) {
      // response.ok=false;
      response.login_status = false;
      // response.statusText="not_login"
    }
  });
});

var login_intercept = {
  then: function (callback) {
    callback({
      ok: false,
      login_status: false,
      statusText: '请先登录'
    });
  },
}


const API_ROOT = '';
const TEST_ROOT = "http://119.22.23.185"
var root_host = '';


function get_headers() {
  return {
    'Accept': 'application/json',
    'Authorization': "Bearer " + window.localStorage.access_token,
  };
}

// if(window.location.host=="127.0.0.1"||window.location.host=="localhost:8080"){
//     root_host=TEST_ROOT
// }
export default {
  get_api_token: function (data) {
    return Vue.http.post(API_ROOT + '/oauth/token', data);
  },
  refresh_token: function (data) {
    return Vue.http.post(API_ROOT + 'oauth/token', data);
  },
  user_login: function (data) {
    return Vue.http.post(API_ROOT + "/api/login", data);
  },
  get_user_info: function (data) {
    if (!window.localStorage.access_token) return login_intercept;
    return Vue.http.get(API_ROOT + '/api/user');
  },
  getGoodsData: function (data) {
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
    return Vue.http.get(API_ROOT + '/api/goods', {
      params: data
    });
    // return Vue.http.post(API_ROOT+'/api/goods',{relations:"image_attach",parameters:""});
  },
  get_page_data: function (url, data) {
    return Vue.http.get(url, {
      params: data
    });
  },
  get_trans_params_table: function (data) {
    return Vue.http.post(API_ROOT + "/table", data);
  },
  get_cat_list: function (data) {
    return Vue.http.get(API_ROOT + "/goods/cat", {
      params: data
    });
  },
  get_search_result: function (data) {
    return Vue.http.get(API_ROOT + '/search', {
      params: data
    });
  },
  get_goods_type: function () {
    return Vue.http.get(API_ROOT + "/goods/type");
  },
  register_user: function (data) {
    return Vue.http.post(API_ROOT + "/api/register", data);
  },
  get_token: function (data) {
    return Vue.http.post(API_ROOT + "/api/verify", data);
  },
  get_keywords: function (data) {
    return Vue.http.get(API_ROOT + '/getkeywords', {
      params: data
    })
  },
  get_similar_by_kwd: function (data) {
    return Vue.http.get(API_ROOT + 'similar', {
      params: data
    })
  },
  get_cart_data: function (data) {
    if (!window.localStorage.access_token) return login_intercept;
    console.log("************");
    return Vue.http({
      url: API_ROOT + '/api/cart',
      method: 'GET',
    });
  },
  add_cart: function (data) {
    if (!window.localStorage.access_token) return login_intercept;
    console.log("************");
    // return Vue.http.post(API_ROOT+'/api/cartAdd',data,{
    //     headers:get_headers()
    // });
    return Vue.http.post(API_ROOT + '/api/cartAdd', data);
  },
  update_cart: function (data) {
    if (!window.localStorage.access_token) return login_intercept;
    /*
        quantity:'',数量
        goods_id:'288',
        id:'',
     */
    return Vue.http.post(API_ROOT + '/api/cartUpdate', data)
  },
  del_cart: function (data) {
    if (!window.localStorage.access_token) return login_intercept;
    // var headers=get_headers();
    return Vue.http.post(API_ROOT + '/api/cartDelete', data)
  },
  add_order: function (data) {
    /* 
      ship_area:'',
      ship_addr:'',
      ship_name:'',
      ship_mobile:'',
      memo:'',
      addr_id:'',//暂时不传
      cart_id:''
    */
    if (!window.localStorage.access_token) return login_intercept;
    return Vue.http.post(API_ROOT + "/api/orderAdd", data)
  },
  get_addrs: function (data) {
    if (!window.localStorage.access_token) return login_intercept;
    return Vue.http.get(API_ROOT+'/api/addrs',data)
  },
  add_addr:function(data){
    /*
      area:'',
      addr:'',
      name:'',
      mobile:''
     */
    if (!window.localStorage.access_token) return login_intercept;
    return Vue.http.post(API_ROOT+'/api/addrAdd',data)
  },
  del_addr:function(data){
    /**
     * addr_id:''
     * 
     */
    if (!window.localStorage.access_token) return login_intercept;
    return Vue.http.post(API_ROOT+'/api/addrDelete',data)
  },
  update_addr:function(data){
    /**
     * area:'',
     * addr:'',
     * name:'',
     * mobile:'',
     * addr_id:''
     */
     if (!window.localStorage.access_token) return login_intercept;
     return Vue.http.post(API_ROOT+'/api/addrUpdate',data)
  }

}
