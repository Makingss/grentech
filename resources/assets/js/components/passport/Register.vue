<template>
  <div class="register">
    <div class="header">
      <div class="container block-center">
        <el-row>
          <el-col :span="4">
              <div class="login-icon" style="">
                  <a href="/home" class="link-img">
                      <img src="//misc.360buyimg.com/lib/img/e/logo-201305-b.png" alt="">
                  </a>
              </div></el-col>
            <el-col :span="16">
                <div class="login-info" style=" ">
                  <span class="font-3x font-bold" >欢迎注册</span>
                </div></el-col>
            <el-col :span="4">
            <div class="login-link font-1x">
              <span class="">已有账号?</span><a href="/login" class="color-danger">请登录</a>
            </div>
            </el-col>
        </el-row>
      </div>
    </div>
      <div class="content ">
        <div class="container block-center">
          <el-row>
            <el-col :span="12" class="border-1px-r padding-r-15">
              <div class="block-center el-left-box">
                <el-form ref='form' :model="form" :rules="rules" label-width="100px">
                  <div class="margin-tb-10" style="border:1px solid #bbb;">
                    <el-form-item label="用户名" prop="name" style="margin:0 !important;" class="padding-tb-5">
                      <input type="text" name="name" v-model="form.name" class="el-input" placeholder="请入您的账户名和登录名">
                    </el-form-item>
                  </div>
                  <div class="margin-tb-10" style="border:1px solid #bbb;">
                    <el-form-item label="设置密码"prop="pwd" style="margin:0 !important;" class="padding-tb-5">
                      <input type="text" name="pwd" v-model="form.pwd" class="el-input" placeholder="请入您的密码">
                    </el-form-item>
                  </div>
                  <div class="margin-tb-10" style="border:1px solid #bbb;">
                    <el-form-item label="确认密码" prop="secondPwd" style="margin:0 !important;" class="padding-tb-5">
                      <input type="text" name="secondPwd" v-model="form.secondPwd" class="el-input" placeholder="请再输入您的密码">
                    </el-form-item>
                  </div>
                  <div class="margin-tb-10 hide email" style="border:1px solid #bbb;">
                    <el-form-item label="邮箱"  style="margin:0 !important;" class="padding-tb-5">
                      <input type="text" name="email" v-model="form.phone" class="el-input" placeholder="建议使用常用的邮箱">
                    </el-form-item>
                  </div>
                  <div class="margin-tb-10" style="border:1px solid #bbb;">
                    <el-form-item label="手机号"  style="margin:0 !important;" class="padding-tb-5">
                      <input type="text" name="phnneID" v-model="form.phone" class="el-input" placeholder="建议使用常用的手机">
                    </el-form-item>
                  </div>
                  <div class="text-right font-mini color-primary">
                    <span><a href="#" @click="toggleClass()">邮箱验证</a></span>
                  </div>

                  <div class="margin-tb-10" style="border:1px solid #bbb;">
                    <el-form-item label="验证码" prop="authCode"style="margin:0 !important;" class="padding-tb-5">
                      <el-row style="margin:0 !important;">
                        <el-col :span="16">
                         <input type="text" name="authCode" v-model="form.info" class="el-input" placeholder="请输入验证码"></el-col>
                         <el-col :span="8">
                           <div class="text-center">
                             <a href="#">验证码</a>
                           </div>
                         </el-col>
                      </el-row>
                    </el-form-item>
                  </div>
                  <div class="margin-tb-10" style="border:1px solid #bbb;">
                    <el-form-item label="手机验证码" prop="phoneCode" style="margin:0 !important;" class="padding-tb-5">
                      <el-row style="margin:0 !important;">
                        <el-col :span="16">
                         <input type="text" name="phoneCode" v-model="form.info" class="el-input" placeholder="请输入手机验证码"></el-col>
                         <el-col :span="8">
                           <div class="text-center">
                             <a href="#">获取验证码</a>
                           </div>
                         </el-col>
                      </el-row>
                    </el-form-item>
                  </div>
                  <el-form-item  prop="delivery" >
                    <el-switch on-text="是" off-text="否" v-model="form.delivery"></el-switch>
                    <a href="#" class="font-mini">阅读并同意《用户注册协议》</a>
                  </el-form-item>
                  <div class="text-center">
                    <el-button type="danger" style="width:350px" @click="submitForm('ruleForm')">立即注册</el-button>
                  </div>

                </el-form>
              </div>
            </el-col>
            <el-col :span="12">
              <div class="margin-10" style="width:150px;height:300px;text-align:center">
              <div class="border-1px-b">
                <a href="#">
                  <i class="iconfont"></i>
                  <span>企业用户登录</span>
                </a>
              </div>
              <div class=" ">
                <a href="#">
                  <i class="iconfont"></i>
                  <span>github login in</span>
                </a>
              </div>
              </div>
            </el-col>
          </el-row>
        </div>
      </div>
      <div class="footer margin-10 text-center">
          <div class="links">
              <a rel="nofollow"  v-for="link in footerLinks" target="_blank" :href="link.usrl">
                  {{link.cont}}
                  <span>|</span>
              </a>
          </div>
          <div class="copyright">
              Copyright&nbsp;©&nbsp;2004-2017&nbsp;&nbsp;京东JD.com&nbsp;版权所有
          </div>
      </div>
  </div>
</template>
<script type="text/javascript">
  export default{
      data:function(){
        return{
          form:{
            name:"",
            pwd:"",
            secondPwd:"",
            phone:"",
            value:"",
            info:"",
            delivery:false
          },
          rules:{
            name:[
              { required: true, message: '请输入账户名和登录名', trigger: 'blur'},
              { min: 3, max: 5, message: '长度在 3 到 5 个字符', trigger: 'blur' }
            ],
            pwd:[
              { required: true, message: '请输入密码', trigger: 'blur'},
              { min: 8, max: 16, message: '长度在 8 到 16 个字符', trigger: 'blur' }
            ],
            secondPwd:[
              { required: true, message: '请输入确认密码', trigger: 'blur'},
              { min: 8, max: 16, message: '长度在 8 到 16 个字符', trigger: 'blur' }
            ],
            authCode:[
              {required:true,message:'请输入验证码',trigger:"blur"}
            ],
            phoneCode:[
              {required:true,message:'请输入手机验证码',trigger:"blur"}
            ]
          },
          footerLinks:[
            {
              cont:"关于我们",
              url:"#"
            },{
              cont:"联系我们",
              url:"#"
            },{
              cont:"人才招聘",
              url:"#"
            },{
              cont:"商家入驻",
              url:"#"
            },{
              cont:"广告服务",
              url:"#"
            },{
              cont:"友情连接",
              url:"#"
            },{
              cont:"  销售联盟",
              url:"#"
            },{
              cont:"English Site",
              url:"#"
            }

          ]
        }
    },
    methods:{
      submitForm:function(){

      },
      resetForm:function(){

      },
      toggleClass:function(event){
        $(".email").toggleClass("hide");
      }
    }
  }
</script>
<style media="less" scoped>
  .header{
    background-color: white;
    box-shadow: 1px 1px 10px #bbb;
    padding-top: 10px;
    padding-left:10px;
  }
    .login-icon {
      width:181px;
      height:64px
    }
    .login-info {
      line-height:64px
    }
    .login-link {
      height: 64px;
      vertical-align: bottom;
      display: table-cell;
    }

    .el-row {
    margin-bottom: 20px;
    &:last-child {
      margin-bottom: 0;
      }
    }
    .el-left-box{
        width:70%;
    }
    .el-input{
      height:36px;
      width:100%;
      border:none;
    }

</style>
