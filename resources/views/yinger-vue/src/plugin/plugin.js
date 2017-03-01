
    function plugin(Vue){
      //全局header控制
      Vue.prototype.router_action=function(conf,callback){
        console.log("路由header处理");
      }
      Vue.prototype.handler_xheader=function(name){
        console.log("x_header:"+name);
        var name_conf={
          'home':{
            title:'商城主页',
            show_back:false,
            is_show:false,
            show_search_bar:true
          },
          'login':{
            title:"用户注册",
            show_back:false,
            is_show:true,
            show_search_bar:false
          },
          'user':{
            title:'用户中心',
            show_back:false,
            is_show:false,
            show_search_bar:false
          },
          'cart':{
            title:'购物车',
            show_back:false,
            is_show:true,
            show_search_bar:false
          },
          'category':{
            title:'分类',
            show_back:false,
            is_show:false,
            show_search_bar:true
          },
          'list':{
            title:'商品列表',
            show_back:false,
            is_show:false,
            show_search_bar:false
          },
          'activity':{
            title:'活动广场',
            show_back:false,
            is_show:true,
            show_search_bar:false
          },
          'register':{
            title:'立即注册',
            show_back:false,
            is_show:true,
            show_search_bar:false
          },
          'order':{
            title:'订单',
            show_back:false,
            is_show:true,
            show_search_bar:false,
          },
          'goods':{
            title:'商品详情',
            show_back:false,
            is_show:false,
            show_search_bar:false
          },
          'address':{
            title:'地址管理',
            show_back:false,
            is_show:true,
            show_search_bar:false
          },
          'setting':{
            title:'设置',
            show_back:false,
            is_show:true,
            show_search_bar:false
          },
          'wallet':{
            title:'我的钱包',
            show_back:false,
            is_show:false,
            show_search_bar:false
          },
          'qrcode':{
            title:'二维码',
            show_back:false,
            is_show:false,
            show_search_bar:false
          },
          'favgoods':{
            title:"收藏商品",
            show_back:false,
            is_show:true,
            show_search_bar:false,
          },
          'find-pwd':{
            title:'找回密码',
            show_back:false,
            is_show:true,
            show_search_bar:false,
          },
          'service':{
            title:'服务支持',
            show_back:false,
            is_show:true,
            show_search_bar:false,
          }
        }
        return name_conf[name];
      }
      /****************正则转驼峰式命名********************/
      Vue.prototype.trans_camel=function(str){
        if(!str) return;
        var reg=/([A-Z])/g;
        var str1=str.replace(reg,"-$1").toLowerCase();
        //console.log(str1);
        return str1;
      };

      /**
       * [send_operation_log description]
       * @return {[type]} [description]
       *发送操作日志
       *parms
       *--user_id
       *--event_time//秒
       *--event_data
       *--login_ip
       */
      Vue.prototype.send_operation_log=function(parms,callback){
          parms.method='config_log';
          parms.event_time=parseInt(new Date().getTime()/1000);

          var user_id='';
          if(!!window.sessionStorage.admin_info){
            user_id=JSON.parse(window.sessionStorage.admin_info).user_id;
          }
          parms.user_id=user_id;
          $.post("/ueditor/server/controller/component.php",parms,function(res){
              console.log(res);
          })
      }

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
    }

  export default plugin;
