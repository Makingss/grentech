<template lang="html">
  <div class="register font-normal content">
    <div class="login-logo block-center link-img margin-tb-20">
      <img src="/static/slice/logo_300.png" alt="" class="margin-tb-20">
    </div>
    <div class="login-form">
      <group label-width="4rem" label-margin-right="2rem" label-align="left">
        <x-input placeholder="手机号" v-model="phone"></x-input>
        <x-input placeholder="密码" v-model="pwd"></x-input>
        <x-input placeholder="获取验证码" v-model="sms_code"></x-input>
      </group>
    </div>
    <div class="margin-tb-20">
      <x-button type="primary" class="block-center login-btn btn-80">注册</x-button>
    </div>
    <div class="login-link text-center clear-float">
      <div class="tab-50 pull-left">
        <router-link to="/home">商城主页</router-link>
      </div>
      <div class="tab-50 pull-left">
        <router-link to="/login">已有账号</router-link>
      </div>
    </div>
  </div>
</template>

<script>
import {Group,XInput,XButton} from 'vux'
export default {
  name:"register",
  data:function(){
    return {
      phone:'',
      pwd:'',
      sms_code:''
    }
  },
  components:{
    Group,
    XInput,
    XButton
  },
  methods:{

  }
}
</script>

<style lang="less" scoped>
.login-logo{
  width:30%;
}
.login-btn{
  width: 80%;
  margin: 0 auto;
}
</style>
