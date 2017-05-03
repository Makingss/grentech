<template lang="html">
  <div class="navbar-user">
    <div class="margin-t-10">
      <ul>
        <li v-for="item in navLeftBox" class="margin-b-10">
          <dl>
            <dt class="font-bold padding-b-4 border-1px-b-x font-1x">
            <a href="#" v-text="item.title"></a></dt>
            <dd v-for="item2  in item.children" class="padding-tb-6"><a :href="item2.path" v-text="item2.text"></a></dd>
          </dl>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data:function(){
    return{
      navLeftBox: [{
          title: '订单中心',
          children: [{
              text: "我的订单",
              path: '/myorder',
          }, {
              text: "团购订单",
              path: '#'
          }, {
              text: '本地生活订单',
              path: '#'
          },{
            text:"评价晒单",
            path:"/myorder"
          }]
      }, {
          title: '关注中心',
          children: [{
              text: "关注商品",
              path: '#',
          }, {
              text: "关注店铺",
              path: '#',
          }, ]
      }, {
          title: '资产中心',
          children: [{
              text: "小金库",
              path: '#'
          }, {
              text: "小白条",
              path: ""
          }]
      }, {
          title: '特色业务',
          children: [{
              text: "我的营业厅",
              path: '#'
          }, {
              text: "定期送",
              path: ""
          }]
      }, {
          title: '客服中心',
          children: [{
              text: "返修退换货",
              path: '#'
          }, {
              text: "意见建议",
              path: "#"
          }, {
              text: "我的问答",
              path: "#"
          }]
      }, {
          title: "设置",
          children: [{
              text: "个人信息",
              path: "/user_info"
          }, {
              text: "收货地址",
              path: "#"
          }]
      }]
    }
  }
}
</script>

<style lang="css">
</style>
