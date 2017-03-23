//app 配置文件

export const app_config={
  //广告配置
  ad:{
     is_show:false,
     src:'/static/images/update_sys.jpg',
     show_time:2750,
     text:'广告文字',
     desc:'',
     url:'#/home',
  },
  intercept:true,//是否启用登陆拦截
  intercept_time:2000,//登陆拦截时间
  intercept_closeable:true,//登陆拦截是否可关闭
  /* 
    storage配置项
    localStorage,
    sessionStorage,
    cookie,
  */
  storage:'localStorage',
  token:'',
  popup_login:false,
  navbar:{
    //导航按钮配置
    data: [{
            iconfont: '&#xe6b8;',
            title: '商城',
            url: '/home'
          }, {
           iconfont: '&#xe616;',
           title: '分类',
           url: '/category'
         },{
           iconfont: '&#xe694;',
           title: '用户中心',
           url: '/user'
         },
            // {
            //   iconfont: '&#xe67b;',
            //   title: '购物车',
            //   url: '/cart'
            // }, {
            //   iconfont: '&#xe657;',
            //   title: '活动广场',
            //   url: '/activity'
            // }
        ],
        conf: {}
  }
}

