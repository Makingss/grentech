<template lang="html">
  <div class="login font-normal content">
    <div class="content-box">
      <div class="login-logo block-center link-img margin-tb-20">
        <img :src="logo_image" alt="" class="margin-tb-20">
      </div>
      <div class="login-form">
        <group label-width="4rem" label-margin-right="2rem" label-align="left">
          <x-input placeholder="用户名" class="font-normal" v-model="username"></x-input>
          <x-input placeholder="密码" class="font-normal" type="password" v-model="password"></x-input>
        </group>
      </div>
      <div style="height:36px;line-height:36px" class="login-msg padding-rl-10 color-danger">
        {{login_msg}}
      </div>
      <div class="margin-tb-20">
        <x-button type="warn" class="block-center login-btn btn-80" @click.native="submit_login">登录</x-button>
      </div>
      <div class="login-link text-center clear-float">
        <div class="tab-50 pull-left" v-if="false">
          <router-link to="/register">快速注册</router-link>
        </div>
        <div class="tab-50 pull-left" v-if="false">
          <router-link to="/find-pwd">忘记密码</router-link>
        </div>
        <div class="tab-50 pull-left" v-if="false">
          <router-link to="/home">商城主页</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import * as config from '../config/config.js'
  import api from '../api'
  import {
    Group,
    XInput,
    XButton
  } from 'vux'
  export default {
    name: 'login',
    data: function() {
      return {
        logo_image: config.app_config.logo_image,
        username: '',
        password: '',
        login_msg: "",
      }
    },
    methods: {
      submit_login: function() {
        var self = this;
        if (this.username == "") {
          this.$vux.toast.show({
            text: '<span class="font-normal">用户名不能为空</span>',
            type: "warn"
          })
          return;
        } else if (this.password == "") {
          this.$vux.toast.show({
            text: '<span class="font-normal">请输入密码</span>',
            type: "warn"
          })
          return;
        };
        api.user_login({
          username: self.username,
          password: self.password
        }).then(res => {
          console.log(res);
  
          if (res.ok) {
            if (res.data.res) {
              var res_data = res.data;
              self.$vux.toast.show({
                text: '<span class="font-normal">' + res_data.req + '</span>',
                type: 'success'
              });
              self.save_token(res_data.data);
              setTimeout(function() {
                self.$router.push("/user");
              }, 2000)
            } else {
              self.login_msg = res.data.req;
            }
  
          } else {
            self.login_msg = res.data.req;
          }
        })
      }
    },
    components: {
      Group,
      XInput,
      XButton
    }
  }
</script>

<style lang="less" scoped>
  .login-logo {
    width: 30%;
  }
  
  .login-btn {
    width: 80%;
    margin: 0 auto;
  }
  
  .login .content-box {
    padding-top: 20%;
    box-sizing: border-box;
  }
</style>
