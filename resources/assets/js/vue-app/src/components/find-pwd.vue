<template lang="html">
  <div class="find-pwd content">
      <div class="link-img tab-30 block-center margin-tb-20">
        <img src="/static/slice/logo_300.png" alt="" class="margin-tb-20">
      </div>
      <group label-width="4rem" label-margin-right="2rem" label-align="left" class="margin-tb-20">
        <x-input class="font-normal" title="手机号码" placeholder="手机号" v-model="phone"></x-input>
        <!-- <x-input class="font-normal" title="密码" placeholder="密码" v-model="pwd"></x-input> -->
        <x-input class="font-normal" title="验证码" placeholder="获取验证码" v-model="sms_code"></x-input>
      </group>
      <div class="tab-80 margin-tb-20 block-center">
        <x-button class="font-1x" type="primary">找回密码<x-button>
      </div>
  </div>
</template>

<script>
import {Group,XInput,XButton} from 'vux'
export default {
  name:'find-pwd',
  data:function(){
    return {
      phone:'',
      pwd:'',
      sms_code:'',
    }
  },
  components:{
    Group,
    XInput,
    XButton
  }
}
</script>

<style lang="css">
.login-logo{
  width:30%;
}
</style>
