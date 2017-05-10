<template lang="html">
  <div class="safety-center">
    <header-user></header-user>
    <div class="container block-center margin-tb-20">
      <el-row>
        <el-col :span="3">
          <navbar-user></navbar-user>
        </el-col>
        <el-col :span="21">
          <div class="padding-tb-10 padding-l-15">
            <h2>安全中心</h2>
            <div class="padding-10 margin-tb-20 " style="background:#FFFDEE">
              <span class="font-bold">
                安全级别:
              </span>
              <span>
                <span style="width:80px;display:inline-block;"><el-progress :text-inside="true" :stroke-width="9" :percentage="90" status="success"></el-progress></span>
                <span class="color-success padding-l-10">较高</span>
              </span>
              <span class="color-danger padding-l-10">建议您启动全部安全设置，以保障账户及资金安全。</span>

            </div>
            <div class="text-center border-1px-b safe-item" v-for="item in SafetyList">
              <el-row>
                <el-col :span="6" class="border-1px-r">
                  <div class="fore1 font-2x">
                    <i class="iconfont font-4x font-bold" :class="item.iconColor" v-html="item.icon"></i>
                    <span class="font-bold color-dark" v-html="item.title"></span>
                    <span class='iconfont'></span>
                  </div>
                </el-col>
                <el-col :span="14">
                  <div class="fore2 text-left":class="item.textColor ? item.textColor:'color-gray'" v-text="item.text">
                  </div>
                </el-col>
                <el-col :span="4">
                <div class="fore3"  v-html="item.html"  @click="dialogVisible = true"></div>
              </el-col>
              </el-row>
            </div>
            <div class="">
              <el-dialog title="修改登录密码"  v-model="dialogVisible">
                <div class="" v-show="!isSuccess">
                  <div class="text-center">
                    <el-steps :space="100" :active="active" align-center="true" finish-status="success">
                      <el-step title="验证身份"></el-step>
                      <el-step title="修改登录密码"></el-step>
                      <el-step title="完成"></el-step>
                    </el-steps>
                  </div>
                  <div style="padding-left:80px;padding-top:20px">
                    <div class="" v-show="items">
                      <el-form label-width="140px" label-position="right">
                        <div class="" v-show="!status">
                          <el-form-item label="已验证手机：" >
                            <el-input placeholder="13640339837"  style="width:200px" disabled></el-input>
                            <a  @click="changeItme()">通过支付密码验证</a>
                          </el-form-item>
                          <el-form-item label="请填写手机校验码：">
                            <el-input style="width:200px"></el-input>
                            <el-button>获取短信校验码</el-button>
                          </el-form-item>
                          <el-form-item label="验证码:">
                            <el-input style="width:200px"></el-input>
                            <span class="">
                              <span>验证码</span>
                              <span>看不清?<a href="#" class="color-danger">换一张</a></span>
                            </span>
                          </el-form-item>
                          <el-form-item label="请填写手机校验码：">
                            <el-input style="width:200px"></el-input>
                            <el-button>获取短信校验码</el-button>
                          </el-form-item>
                          <el-button type="danger" size="small" @click="next()">提交</el-button>
                        </div>
                        <div class="" v-show="status" :active="active" >
                          <el-form-item label="新的登录密码:">
                            <el-input style="width:200px"></el-input>
                          </el-form-item>
                          <el-form-item label="请再输入一次密码:">
                            <el-input style="width:200px"></el-input>
                          </el-form-item>
                          <el-form-item label="验证码:">
                            <el-input style="width:200px"></el-input>
                            <span class="">
                              <span>验证码</span>
                              <span>看不清?<a href="#" class="color-danger">换一张</a></span>
                            </span>
                          </el-form-item>
                          <el-button type="danger" size="small" @click="second()">提交</el-button>
                        </div>
                      </el-form>
                    </div>
                    <div class="" v-show="!items">
                      <el-form label-width="140px" label-position="right">
                        <el-form-item label="请输入支付密码">
                          <el-input style="width:200px"></el-input>
                          <a  @click="changeItme()">通过已验证手机验证</a>
                        </el-form-item>
                        <el-form-item label="验证码:">
                          <el-input style="width:200px"></el-input>
                          <span class="">
                            <span>验证码</span>
                            <span>看不清?<a href="#" class="color-danger">换一张</a></span>
                          </span>
                        </el-form-item>
                      </el-form>
                    </div>
                  </div>
                </div>
                <div v-show="isSuccess">
                  <div class="text-center">
                        <i class="iconfont color-success icon-center" style='font-size:56px'>&#xe8e6;</i>
                        <div class="color-primary">修改完成,请重新登录</div>
                        <div class="">
                          <a href="/passport_login">返回登录页</a>
                        </div>
                  </div>
                </div>
              </el-dialog>
            </div>
            <div class="bg-light padding-10 margin-tb-10">
              <h3 class="padding-tb-6">安全服务提示</h3>
              <ol class="padding-l-15">
                <li>确认您登录的是京东网址http://www.jd.com，注意防范进入钓鱼网站，不要轻信各种即时通讯工具发送的商品或支付链接，谨防网购诈骗。</li>
                <li>建议您安装杀毒软件，并定期更新操作系统等软件补丁，确保账户及交易安全。</li>
              </ol>
            </div>
            <div class="bg-light padding-10 margin-tb-10">
              <h3 class="padding-tb-6">常见问题</h3>
              <ol class="padding-l-15">
                <li><a href="#">支付密码如何开启？</a></li>
                <li><a href="#">如何验证/绑定手机？</a></li>
              </ol>
            </div>
            <div class="bg-light padding-10 margin-tb-10">
              <div class="">
                <h3 class="padding-tb-6">账号绑定</h3>
                <div class="bg-white margin-tb-4
                " style="position: relative">
                  <div class="padding-l-10">
                    <i class="iconfont color-danger">&#xe627;</i>
                    绑定QQ账号
                    <span class="color-yellow">未绑定</span>
                  </div>
                  <span class="" style="position:absolute;top:10px;right:30px">
                    <a href="#">绑定</a>
                  </span>
                </div>
                <div class="bg-white" style="position: relative">
                  <div class="padding-l-10">
                    <i class="iconfont color-success">&#xe64c;</i>
                    绑定微信
                    <span class="color-yellow">未绑定</span>
                  </div>
                  <span class="" style="position:absolute;top:10px;right:30px">
                    <a href="#">绑定</a>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </el-col>
      </el-row>
  </div>
  </div>
</template>

<script>
export default {
    data: function() {
        return {
            SafetyList: [{
                icon: "&#xe8e7;",
                iconColor: "color-success",
                title: " 登录密码 ",
                text: "互联网账号存在被盗风险，建议您定期更改密码以保护账户安全。",
                textColor: "color-danger",
                html: "<a href='#'>修改</a>"
            }, {
                icon: "&#xe6cc;",
                iconColor: "color-yellow",
                title: " 邮箱验证 ",
                text: "验证后，可用于快速找回登录密码，接收账户余额变动提醒。",
                textColor: "",
                html: "<button>立即认证</button>"
            }, {
                icon: "&#xe8e7;",
                iconColor: "color-success",
                title: " 手机验证 ",
                text: "您验证的手机： 136*****837  若已丢失或停用，请立即更换，避免账户被盗",
                textColor: "",
                html: "<a href='#'>修改</a>"
            }, {
                icon: "&#xe88c;",
                iconColor: "color-blue",
                title: " 支付密码 ",
                text: "建议您定期更换新的支付密码，提高安全性。",
                textColor: "",
                html: "<a href='#'>修改</a>"
            }, {
                icon: "&#xe8e7;",
                iconColor: "color-success",
                title: " 实名认证 ",
                text: "您认证的实名信息： **潮 44***************",
                textColor: "",
                html: "<a href='#'>查看</a>"
            }, ],
            dialogTableVisible: false,
            dialogFormVisible: false,
            dialogVisible: false,
            items: true,
            active: 1,
            status: false,
            isSuccess: false,
            form: {
                name: '',
                region: '',
                date1: '',
                date2: '',
                delivery: false,
                type: [],
                resource: '',
                desc: ''
            },
            formLabelWidth: '120px',
        }
    },
    methods: {
        changeItme() {
            return this.items = !this.items;
        },
        next() {
            if (this.active++ > 3) this.active = 0;
            this.status = !this.status;
        },
        second() {
            if (this.active++ > 3) this.active = 0;
            this.status = !this.status;
            this.isSuccess = !this.isSuccess;
        }
    }
}
</script>

<style lang="less" scoped>
.safe-item {
    padding: 10px;
    .fore1 {}
    .fore2,
    .fore3 {
        height: auto;
        line-height: 40px;
        padding: 5px 0 5px 10px;
    }
}
.color-blue {
    color: #109EFF;
}
.color-yellow {
    color: #FFCC00;
}
</style>
