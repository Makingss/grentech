//app 配置文件

export const app_config = {
  //广告配置
  ad: {
    is_show: true,
    src: '/static/images/index_con2.jpg',
    show_time: 3300,//广告展示时间----->intercept_time  
    text: '<div class="brand-logo margin-tb-20"><img src="/static/slice/logo_300.png" /></div><p class="margin-tb-10 color-success">中国领先的无线通信与信息网络服务提供商</p>',
    desc: '',
    url: '#/home',
  },
  logo_image: "/static/slice/logo_300.png", //logo 图片设置
  intercept: true, //是否启用登陆拦截
  intercept_time: 3000, //登陆拦截时间
  intercept_closeable: true, //登陆拦截是否可关闭
  /* 
    storage配置项
    localStorage,
    sessionStorage,
    cookie,
  */
  list_cell_type: 'medium', //列表布局方式
  storage: 'localStorage',
  token: '',
  popup_login: false, //
  navbar: {
    //导航按钮配置
    data: [{
        iconfont: '&#xe6b8;',
        title: '商城',
        url: '/home'
      }, {
        iconfont: '&#xe616;',
        title: '分类',
        url: '/category'
      }, {
        iconfont: '&#xe694;',
        title: '用户中心',
        url: '/user'
      },
      {
        iconfont: '&#xe67b;',
        title: '购物车',
        url: '/cart'
      }
      //, {
      //   iconfont: '&#xe657;',
      //   title: '活动广场',
      //   url: '/activity'
      // }
    ],
    conf: {}
  }
}
