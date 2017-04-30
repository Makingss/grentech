<template>
<div class="login">
    <div class="header">
        <div class="container block-center">
            <el-row>
                <el-col :span="4">
                    <div class="login-icon" style="">
                        <a href="/home" class="link-img">
                            <img src="//misc.360buyimg.com/lib/img/e/logo-201305-b.png" alt="">
                        </a>
                    </div>
                </el-col>
                <el-col :span="16">
                    <div class="login-info" style=" ">
                        <span class="font-3x font-bold">欢迎登录</span>
                    </div>
                </el-col>
                <el-col :span="4">
                    <div class="login-link font-mini">
                        <i class="iconfont">&#xe61c;</i>
                        <span class="">登录页面?</span><a href="/login" class="color-danger">调查问答</a>
                    </div>
                </el-col>
            </el-row>
        </div>
    </div>
    <div class="content">
        <div class="brand-bg" :style="bgimg">
            <div class="brand-login margin-t-20">
                <el-tabs v-model="activeName" style="background-color:white">
                    <el-tab-pane disabled></el-tab-pane>
                    <el-tab-pane disabled></el-tab-pane>
                    <el-tab-pane label="扫码登录" name="first" style="margin-left:10px">
                        <div class="qr-login">
                            <div class="qr-main">
                                <img src="/images/demo/1.jpg" alt="" class="padding-10 qr-img" style="">
                                <div class="qr-error">
                                  <div class="qr-item">
                                    <div class="qr-text">
                                      <div>二维码失效</div>
                                      <el-button>刷新</el-button>
                                    </div>
                                    <a href="#" class="qr-bg"></a>
                                  </div>
                                </div>
                            </div>

                            <div class="qr-panel padding-10 color-dark">
                                打开
                                <a href="#" class="color-danger">手机京东</a> 扫描二维码
                                <div class=" padding-t-10">
                                    <i class="iconfont"></i>免输入
                                    <i class="iconfont"></i>更快
                                    <i class="iconfont"></i>更安全
                                </div>
                            </div>

                        </div>
                    </el-tab-pane>
                    <el-tab-pane label="账户登录" class="login-box" name="second">
                        <div class="padding-tb-10 error-info" style="width:280px !important;height:30px !important;margin:0 auto;">
                            <el-alert :title="error.text" type="error" show-icon @click="clear()"></el-alert>
                        </div>
                        <div>
                            <div class="block-center tab-80 border-1px login-laber">
                                <i class="iconfont font-2x border-1px-r padding-rl-6">&#xe8ca;</i>
                                <div class="login-laber-item">
                                    <input type="text" name="user" placeholder="请输入用户名" v-model="form.userName">
                                </div>

                            </div>
                            <div class="block-center border-1px tab-80 login-laber">
                                <i class="iconfont font-2x border-1px-r padding-rl-6">&#xe61d;</i>
                                <div class="login-laber-item">
                                    <input type="text" name="userPwd" placeholder="请输入密码" v-model="form.userPwd">
                                </div>

                            </div>
                            <div class="text-right block-center tab-80">
                                <a href="#" class="color-dark">忘记密码</a>
                            </div>
                            <div class="block-center text-center padding-10">
                                <el-button type="danger" style="width:90%;" @click="submit">登录</el-button>
                            </div>
                        </div>
                    </el-tab-pane>
                    <div class="border-1px-t">
                        <div class="pull-left padding-10">
                          <span>
                            <a href="#" class="clear-float">
                                <i class="iconfont color-primary font-2x icon-center">&#xe627;</i>
                                <span class="font-mini">QQ</span>
                            </a>
                          </span>
                          <span>|</span>
                          <span>
                            <a href="#" class="clear-float">
                                <i class="iconfont color-primary font-2x icon-center">&#xe64c;</i>
                                <span class="font-mini">微信</span>
                            </a>
                          </span>
                        </div>
                        <div class="pull-right padding-10">
                          <a href="#">
                            <i class="iconfont color-primary icon-center">&#xe8f1;</i>
                            <span>立即注册</span>
                          </a>
                        </div>
                    </div>
                </el-tabs>
            </div>
        </div>
    </div>
    <div class="footer margin-10 text-center">
        <div class="links">
            <a rel="nofollow" target="_blank" href="//www.jd.com/intro/about.aspx">
                关于我们
            </a> |
            <a rel="nofollow" target="_blank" href="//www.jd.com/contact/">
                联系我们
            </a> |
            <a rel="nofollow" target="_blank" href="//zhaopin.jd.com/">
                人才招聘
            </a> |
            <a rel="nofollow" target="_blank" href="//www.jd.com/contact/joinin.aspx">
                商家入驻
            </a> |
            <a rel="nofollow" target="_blank" href="//www.jd.com/intro/service.aspx">
                广告服务
            </a> |
            <a rel="nofollow" target="_blank" href="//app.jd.com/">
                手机京东
            </a> |
            <a target="_blank" href="//club.jd.com/links.aspx">
                友情链接
            </a> |
            <a target="_blank" href="//media.jd.com/">
                销售联盟
            </a> |
            <a href="//club.jd.com/" target="_blank">
                京东社区
            </a> |
            <a href="//gongyi.jd.com" target="_blank">
                京东公益
            </a> |
            <a target="_blank" href="//en.jd.com/" clstag="pageclick|keycount|20150112ABD|9">English Site</a>
        </div>
        <div class="copyright">
            Copyright&nbsp;©&nbsp;2004-2017&nbsp;&nbsp;京东JD.com&nbsp;版权所有
        </div>
    </div>
</div>
</template>
<script>
var md5 = require('md5');
export default {
    data: function() {
        return {
            activeName: 'second',
            bgimg: "background: url(//img14.360buyimg.com/da/jfs/t4801/42/913388643/164704/de206047/58ea6cc4Ne702102a.jpg) 0px 0px no-repeat;background-color: #73848C;height:475px;",
            form: {
                userName: "",
                userPwd: "",
            },
            error: {
                text: "用户名或密码不正确",
                value: false
            }
        }
    },
    methods: {
        submit: function() {
            console.log(1111)
            var vm = this;
            var form = {
                user_name: vm.form.userName,
                user_pwd: vm.form.userPwd,
                method: ''
            }
            $.post("", form, function(response) {
                try {
                    var json = Json.parse(response);
                    if (!json.res) {
                        vm.error.value = true;
                        window.sessionStorage.uname = "";
                        window.sessionStorage.upwd = '';
                        window.sessionStorage.l_status = "false";
                    } else {
                        form.user_pwd = md5(form.user_pwd);
                        form.user_id = json.user_id;
                        form.method = '';
                        window.sessionStorage.admin_info = JSON.stringify(form);
                        window.sessionStorage.l_status = "true";
                        vm.$root.actions = null;
                        vm.$route.push("/home");
                    }

                } catch (e) {

                }
            })
        },
    }
}
</script>
<style lang="less" scoped>
.header {
    background-color: white;
    box-shadow: 1px 1px 10px #bbb;
    padding-top: 10px;
    padding-left: 10px;
}
.login-icon {
    width: 181px;
    height: 64px;
}
.login-info {
    line-height: 64px;
}
.login-link {
    height: 64px;
    vertical-align: bottom;
    display: table-cell;
}

.content {
    background-color: #73848C;
    height: 475px;
    .brand-bg {
        margin: 0 auto;
        width: 65%;
        position: relative;
    }
    .brand-login {
        width: 334px;
        position: absolute;
        right: 0;
    }
    .card-style {
        border: 1px solid red;
    }
    .qr-main {
        margin: 0 auto;
        text-align: center;
        position: relative;
        padding: 10px;
        .qr-img{
          width:147px;height:147px;border:1px solid #888;
        }
        .qr-error {
            width:93%;position:absolute;top:10px;text-align:center;
        }
        .qr-item{
          margin:0 auto;padding:10px;height:147px;width:147px;line-height:70px;position:relative;
        }
        .qr-text{
          color:#fff;
        }
        .qr-bg{
          background:black;width:100%;height:100%;opacity:0.6;position:absolute;top:1px;left:1px;
        }
    }
    .qr-panel {
        width: 90%;
        margin: 0 auto;
        text-align: center;
    }
    .login-box {
        input {
            height: 30px;
            width: 80%;
            border: none;
        }
        .login-laber {
            position: relative;
            height: 30px;
            line-height: 30px;
            margin-bottom: 20px;
        }
        .login-laber-item {
            position: absolute;
            top: 0;
            left: 35px;
            width: 100%;
        }
    }
    .icon-center{
      vertical-align:middle;
    }

}
</style>
