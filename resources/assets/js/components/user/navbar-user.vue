<template lang="html">
  <div class="navbar-user">
    <div class="padding-t-10">
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
          title: '设置',
          children: [{
              text: "个人信息",
              path: '/user_info',
          }, {
              text: "账户安全",
              path: '/safety_center'
          }, {
              text: '账号绑定',
              path: '/safety_center'
          },{
            text: "我的级别",
            path: '#'
          },{
            text:"收货地址",
            path:"/address_list"
          },{
            text:"分享绑定",
            path:""
          },{
            text:"邮件订阅",
            path:""
          },{
            text:"消费记录"
          }]
      }]
    }
  }
}
</script>

<style lang="css">
</style>
