import Vue from 'vue'
import VueResource from 'vue-resource'
Vue.use(VueResource)

// 设置 Laravel 的 csrfToken
Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
    next();
});

const API_ROOT='';

export default{
  // 首页推荐信息
    getNewsRecommend: function() {
        return Vue.resource(API_ROOT + '/api/news').get();
    },
    // 列表信息
    getNewsLists: function() {
        return Vue.resource(API_ROOT + '/api/newslist').get();
    },
    // 详情
    getNewsDetail: function(id) {
        return Vue.resource(API_ROOT + '/api/newsdetail/' + id).get();
    },
    getGoodsData:function(data){
      // filtered:[brand_id, goods_id, type_id, cat_id, bn]
      // parameters  relations  per_page
      /*type:[
        Goods_types',
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
      // return Vue.http.get(API_ROOT+'/api/goods',{relations:["image_attach","member_goods"],parameters:[]});
      return Vue.http.get(API_ROOT+'/api/goods',{relations:"image_attach",parameters:""});
    }

}
