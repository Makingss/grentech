import Vue from 'vue'
import Router from 'vue-router'
import Home from 'components/home'
import Login from 'components/login'
import User from 'components/user'
import Cart from 'components/cart'
import Category from 'components/category'
import List from 'components/list'
import Activity from 'components/activity'
import Register from 'components/register'
import Order from 'components/order'
import Goods from 'components/goods'
import Address from 'components/address'
import Setting from 'components/setting'
import Wallet from 'components/wallet'
import Qrcode from 'components/qrcode'
import Favgoods from 'components/favgoods'
import FindPwd from 'components/find-pwd'
import Service from 'components/service'
import Test from 'components/test'

Vue.use(Router)

export default new Router({
  // mode:'history',
  routes: [
    // {
    //   path: '*',
    //   name: 'home',
    //   component: Home,
    // },
    {
      path: '/',
      name: 'home',
      component: Home,
    },
    {
      path:'/home',
      name:'home',
      component:Home,
    },
    {
      path:'/login',
      name:'login',
      component:Login,
    },{
      path:'/register',
      name:'register',
      component:Register
    },{
      path:'/find-pwd',
      name:'find-pwd',
      component:FindPwd
    },{
      path:'/user',
      name:'user',
      component:User
    },
    {
      name:'cart',
      path:'/cart',
      component:Cart
    },
    {
      name:'category',
      path:'/category',
      component:Category
    },
    {
      name:'list',
      path:'/list',
      component:List
    },{
      name:'activity',
      path:'/activity',
      component:Activity
    },{
      name:'order',
      path:'/order',
      component:Order,
    },{
      name:'goods',
      path:'/goods',
      component:Goods
    },{
      name:'address',
      path:'/address',
      component:Address
    },
    {
      name:'setting',
      path:'/setting',
      component:Setting
    },{
      name:'wallet',
      path:'/wallet',
      component:Wallet
    },{
      name:'qrcode',
      path:'/qrcode',
      component:Qrcode
    },{
      name:'favgoods',
      path:'/favgoods',
      component:Favgoods
    },{
      name:"service",
      path:'/service',
      component:Service
    },{
      name:'test',
      path:'/test',
      component:Test
    }
  ],
  scrollBehavior (to, from, savedPosition) {
      if (savedPosition) {
        return savedPosition
      } else {
        return { x: 0, y: 0 }
      }
  }
})
