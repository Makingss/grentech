    import * as config from '../config/config.js'

    function plugin(Vue){
      //全局header控制

      Vue.prototype.handler_xheader=function(name){
        console.log("x_header:"+name);
        var name_conf={
          'home':{
            title:'商城主页',
            show_back:false,
            is_show:false,
            show_search_bar:true,
            navbar_active:0,
          },
          'login':{
            title:"用户注册",
            show_back:false,
            is_show:false,
            show_search_bar:false,
            navbar_active:2,
            hide_tabbar:true
          },
          'user':{
            title:'用户中心',
            show_back:false,
            is_show:false,
            show_search_bar:false,
            navbar_active:2,
          },
          'cart':{
            title:'购物车',
            show_back:false,
            is_show:true,
            show_search_bar:false,
            navbar_active:3,
            hide_tabbar:true,
          },
          'category':{
            title:'分类',
            show_back:false,
            is_show:false,
            show_search_bar:true,
            navbar_active:1,
          },
          'list':{
            title:'商品列表',
            show_back:false,
            is_show:false,
            show_search_bar:false,
            navbar_active:1,
          },
          'activity':{
            title:'活动广场',
            show_back:false,
            is_show:true,
            show_search_bar:false,
            navbar_active:4,
          },
          'register':{
            title:'立即注册',
            show_back:false,
            is_show:false,
            show_search_bar:false,
            navbar_active:2,
            hide_tabbar:true
          },
          'order':{
            title:'订单',
            show_back:false,
            is_show:true,
            show_search_bar:false,
            navbar_active:2,
          },
          'goods':{
            title:'商品详情',
            show_back:false,
            is_show:false,
            show_search_bar:false,
            navbar_active:1,
          },
          'address':{
            title:'地址管理',
            show_back:false,
            is_show:true,
            show_search_bar:false,
            navbar_active:2,
          },
          'setting':{
            title:'设置',
            show_back:false,
            is_show:true,
            show_search_bar:false,
            navbar_active:2,
          },
          'wallet':{
            title:'我的钱包',
            show_back:false,
            is_show:false,
            show_search_bar:false,
            navbar_active:2,
          },
          'qrcode':{
            title:'二维码',
            show_back:false,
            is_show:false,
            show_search_bar:false,
            navbar_active:2,
          },
          'vchart':{
            title:'我的报表',
            show_back:false,
            is_show:true,
            show_search_bar:false,
            navbar_active:2,
          },
          'favgoods':{
            title:"收藏商品",
            show_back:false,
            is_show:true,
            show_search_bar:false,
            navbar_active:2,
          },
          'find-pwd':{
            title:'找回密码',
            show_back:false,
            is_show:true,
            show_search_bar:false,
            navbar_active:2,
          },
          'service':{
            title:'服务支持',
            show_back:false,
            is_show:true,
            show_search_bar:false,
            navbar_active:2,
          },
          'jump':{
            title:'跳转页面',
            show_back:false,
            is_show: false,
            show_search_bar:false,
            navbar_active:2,
            hide_tabbar:true,
          },
          'test':{
            title:'测试',
            show_back:false,
            is_show:false,
            show_search_bar:false,
            navbar_active:2
          }
        }
        return name_conf[name];
      }
      Vue.prototype.save_token=function(data){
         window[config.app_config.storage].access_token=data.access_token;
         window[config.app_config.storage].expires_in=data.expires_in;
         window[config.app_config.storage].refresh_token=data.refresh_token;
         window[config.app_config.storage].service_time=data.service_time;
         window[config.app_config.storage].token_type=data.token_type;
      }
      /****************正则转驼峰式命名********************/
      Vue.prototype.trans_camel=function(str){
        if(!str) return;
        var reg=/([A-Z])/g;
        var str1=str.replace(reg,"-$1").toLowerCase();
        //console.log(str1);
        return str1;
      };

      Vue.prototype.wx_upload_img=function(absolute_path,relative_path,callback){
        $.post('/index.php/wap2/groupactivity_wxcard/wx_upload',{
         absolute_path:absolute_path,
         relative_path:relative_path
       },function(res){
         callback(res);
        //  console.log(res);
       })
      }

      Vue.prototype.get_goods_by_bn=function(bn,callback){
            var vm=this;
            $.post("/ueditor/server/controller/component.php",{
                method:'_getproduct',
                bn:bn
            },function(res){
              try{
                var json=JSON.parse(res);
                if(!json) vm.$message.error("未查询到商品信息");
                callback(json);
              }catch(e){
                console.log(e);
                vm.$message.error("未查询到商品信息");
              }
            })
        };

        Vue.prototype.get_admin_info=function(){
          var admin_info=null;
          if(!!window.sessionStorage.admin_info&&window.sessionStorage.admin_info!="undefined"){
            admin_info=JSON.parse(window.sessionStorage.admin_info);
          }
          return admin_info;
        }

      Vue.prototype.trans_time=function(time,conf){
        var now=new Date().getTime();
        console.log(time);
        if(time.length==10) time=time*1000;
        var t=time||now;
        //time为时间戳
        if(!!conf&&conf.formate=="UTC"){
          return new Date(t);
        }else{
          var time_stamp = parseInt(t);
          _time = new Date(time_stamp);
          var date = _time.getDate();
          var month = _time.getMonth() + 1;
          var year = _time.getFullYear();
          var hour = _time.getHours();
          var minute = _time.getMinutes();
          var second = _time.getSeconds();
          var local_date = {
            date: date < 10 ? "0" + date : date,
            month: (month + 1) < 10 ? "0" + month : month,
            year: year,
            hour: hour < 10 ? "0" + hour : hour,
            minute: minute < 10 ? "0" + minute : minute,
            second: second < 10 ? "0" + second : second
          };

          return local_date;
        }
      };

      Vue.prototype.get_url_parm=function(parm){
        var reg = new RegExp("(^|&)" + url + "=([^&]*)(&|$)");
        var r = window.location.search.slice(1).match(reg);
        if (r != null) return unescape(r[2]);
        return null;
      }

    }

  export default plugin;
