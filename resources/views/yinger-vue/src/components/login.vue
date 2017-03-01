<template lang="html">
  <div class="login font-normal content">
    <div class="login-logo block-center link-img margin-tb-20">
      <img src="/static/slice/logo_300.png" alt="" class="margin-tb-20">
    </div>
    <div class="login-form">
      <group label-width="4rem" label-margin-right="2rem" label-align="left">
        <x-input placeholder="手机号" v-model="phone"></x-input>
        <x-input placeholder="密码" v-model="pwd"></x-input>
      </group>
    </div>
    <div class="margin-tb-20">
      <x-button type="primary" class="block-center login-btn btn-80">登陆</x-button>
    </div>
    <div class="login-link text-center clear-float">
      <div class="tab-50 pull-left">
        <router-link to="/register">快速注册</router-link>
      </div>
      <div class="tab-50 pull-left">
        <router-link to="/find-pwd">忘记密码</router-link>
      </div>
      <div class="tab-50 pull-left">
        <router-link to="/home">商城主页</router-link>
      </div>
    </div>
  </div>
</template>

<script>
import {Group,XInput,XButton} from 'vux'
export default {
  name:'login',
  data:function(){
    return {
      phone:'',
      pwd:''
    }
  },
  components:{
    Group,
    XInput,
    XButton
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
