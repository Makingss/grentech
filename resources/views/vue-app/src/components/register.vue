<template lang="html">
  <div class="register font-normal content">
  <div class="content-box">
    <div class="login-logo block-center link-img margin-tb-20">
      <img :src="logo_image" alt="" class="margin-tb-20">
    </div>
    <div class="login-form">
      <group label-width="4rem" label-margin-right="2rem" label-align="left">
        <x-input placeholder="用户名" required class="font-normal" v-model="register_data.name"></x-input>
        <x-input placeholder="邮箱" is-type="email" required class="font-normal" v-model="register_data.email"></x-input>
        <x-input placeholder="密码" :min="6" required class="font-normal" v-model="register_data.password"></x-input>
        <x-input placeholder="确认密码" :min="6" required class="font-normal" v-model="register_data.password_confirmation"></x-input>
        <flexbox class="border-1px-t vcode-box" v-if="false">
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
      <x-button type="warn" class="block-center login-btn btn-80" @click.native="submit_register">注册</x-button>
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
import api from '../api'
import * as config from '../config/config.js'
import {Group,XInput,XButton,Flexbox,FlexboxItem} from 'vux'
export default {
  name:"register",
  data:function(){
    return {
      logo_image:config.app_config.logo_image,
      register_data:{
        email:"",
        name:'',
        password:'',
        password_confirmation:'',
      },
      phone:'',
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
  created:function(){
   
  },
  methods:{
    submit_register:function(){
      console.log("提交注册");
      var self=this;
      var register_data=this.register_data;
      if(!!register_data.email&&!!register_data.name&&!!register_data.password&&!!register_data.password_confirmation&&register_data.password==register_data.password_confirmation){
        api.register_user(register_data).then(res=>{
          console.log(res);
          var res_data=res.data;
          if(res_data.res){
            //注册成功
              self.$vux.toast.show({
                text:'<span class="font-normal">'+res_data.req+'</br>请查收验证邮箱</span>',
                onHide(){
                  self.$router.push("/login");
                }
              })
          }else{
            var str='';
            for(var key in res_data){
                str+=res_data[key].toString()+'</br>';
            }
              self.$vux.toast.show({
                text:'<span class="font-normal">'+str+'</span>'
              })
          }
        })
      }
    }
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
.register .content-box{
  padding-top:19%;
  box-sizing:border-box;
}
</style>
