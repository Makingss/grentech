<template lang="html">
  <div class="safety-center">
    <div class="container block-center margin-tb-20">
    <h2>安全中心</h2>
    <div class="bg-gray padding-10 margin-tb-20">
      安全级别
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
        <div class="fore3"  v-html="item.html"></div>
      </el-col>
      </el-row>
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
    <div class="margin-tb-20">
        <div class="">
          <el-button type="text" @click="dialogFormVisible = true">新建收货地址</el-button>
          <span> 您已创建2 个收货地址，最多可创建20个</span>
        </div>
        <div class="">
          <el-dialog title="新建收货地址" v-model="dialogFormVisible">
            <el-form ref="form" :model="form"  label-width="100px">
              <el-form-item label="所在地区">
                <el-cascader :options="options">
                </el-cascader>
              </el-form-item>
              <el-form-item label="详细地址">
                <el-input type="textarea"></el-input>
              </el-form-item>
              <el-form-item label="收货人姓名">
                <el-input ></el-input>
              </el-form-item>
              <el-form-item label="手机号码">
                <el-input ></el-input>
              </el-form-item>
              <el-form-item label="电话号码">
                <el-input></el-input>
              </el-form-item>
              <el-form-item label="邮箱">
                <el-input placeholder="接受订单提醒邮件，便于您及时了解订单状态"></el-input>
              </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
              <el-button @click="dialogFormVisible = false">取 消</el-button>
              <el-button type="primary" @click="dialogFormVisible = false">确 定</el-button>
            </div>
          </el-dialog>
        </div>
        <div class="">
          <el-table
          :data="tableData2"
          style="width: 100%"
          :row-class-name="tableRowClassName">
          <el-table-column
          prop="Consignee"
          label="收货人"
          width="180">
        </el-table-column>
        <el-table-column
        prop="address"
        label="收货地址"
        width="180">
      </el-table-column>
      <el-table-column
      prop="contactNumber"
      label="联系电话">
      </el-table-column>
      <el-table-column
      label="操作">
      <template scope="scope">
        <el-button
        @click.native.prevent="deleteRow(scope.$index, tableData4)"
        type="text"
        size="small">
        编辑
      </el-button>
      <el-button
      @click.native.prevent="deleteRow(scope.$index, tableData4)"
      type="text"
      size="small">
      删除
    </el-button>
    </template>
      </el-table-column>
      <el-table-column
      label="设置">
      <template scope="scope">
        <el-button
        @click.native.prevent="deleteRow(scope.$index, tableData4)"
        type="success"
        size="small">
        默认地址
      </el-button>
      </template>
      </el-table-column>
      </el-table>
        </div>
    </div>
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
       options: [{
           value: 'shenzhe',
           label: '深圳',
           children: [{
               value: 'longhua',
               label: '龙华新区',
               children: [{
                   value: 'dalan',
                   label: '大浪',
               }, {
                   value: 'dalan2',
                   label: '大浪2',
               }, ]
           }, {
               value: 'luohu',
               label: '罗湖区',
               children: [{
                   value: 'luohu1',
                   label: '罗湖1',
               }, {
                   value: 'luohu2',
                   label: '罗湖2',
               }, ]
           }]
       }],
       tableData2:[{
         Consignee:"严海潮",
         address:"深圳哪条村",
         contactNumber:"13640339837",
       }]
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
