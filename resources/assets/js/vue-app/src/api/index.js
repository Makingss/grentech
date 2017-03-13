import Vue from 'vue'
import VueResource from 'vue-resource'
Vue.use(VueResource)

Vue.http.interceptors.push((request,next)=>{
  request.headers.set('X-CSRF-TOKEN',Laravel.csrfToken);
  next();
});
const API_ROOT='';

export default({
  getNewsRecommend:function(){
    return Vue.resource(API_ROOT+'/news').get();
  },
  getNewsLists:function(){
    return Vue.resource(API_ROOT+'/newslist').get();
  },
  getNewsDetail:function(id){
    return Vue.resource(API_ROOT+'/newsdetail/'+id).get();
  }
})
