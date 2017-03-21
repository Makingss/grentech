<template lang="html">
  <div class="register font-normal content">
  <div class="content-box">
    <div class="login-logo block-center link-img margin-tb-20">
      <img src="/static/slice/logo_300.png" alt="" class="margin-tb-20">
    </div>
    <div class="login-form">
      <group label-width="4rem" label-margin-right="2rem" label-align="left">
        <x-input placeholder="手机号" class="font-normal" v-model="phone"></x-input>
        <x-input placeholder="密码" class="font-normal" v-model="pwd"></x-input>
        <flexbox class="border-1px-t vcode-box">
          <flexbox-item :span="9">
              <x-input placeholder="获取验证码" class="font-normal" v-model="sms_code"></x-input>
          </flexbox-item>
          <flexbox-item :span="3">
                <x-button mini plain class="font-mini vcode-btn">验证码</x-button>
          </flexbox-item>
        </flexbox>
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
  </div>
</template>

<script>
import {Group,XInput,XButton,Flexbox,FlexboxItem} from 'vux'
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
    XButton,
    Flexbox,
    FlexboxItem
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
.vcode-btn{
  // position: absolute;
  // right: 0;
  z-index:99;
  background-color: #1ABC9C;
  border:none;
  color:#fff;
}
.vcode-btn:active{
  background-color: #169a85;
  color:#fff;
}
.vcode-box:before{
  left:15px;
}
</style>
