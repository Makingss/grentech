<template lang="html">
  <div class="After-apply">
    <header-user></header-user>
    <div class="container block-center margin-tb-20">
      <el-row>
        <el-col :span="3">
          <div class="">
            <navbar-user></navbar-user>
          </div>
        </el-col>
        <el-col :span="21">
          <div class="padding-l-10">
            <h3 class="padding-10 bg-gray">售后申请单</h3>
            <div class="margin-tb-10">
              <el-table :data="tableData" border style="width:100%">
                <el-table-column
                label="订单详情"
                >
                <template scope="scope">
                  <div class="">
                      <img class="pull-left" :src="scope.row.img" alt="">
                      <div class="line-ellispse-2 font-mini">
                        {{scope.row.title}}
                      </div>
                  </div>
                </template>
                </el-table-column>
                <el-table-column label="包装清单" prop="text"></el-table-column>
                <el-table-column label="赠品清单" prop="giveText"></el-table-column>
                <el-table-column label="购买数量" prop="number"></el-table-column>
              </el-table>
            </div>
          <div>
            <el-form action="action" ref="form" label-width="80px">
              <div class="border-1px margin-tb-10 padding-10">
                <el-form-item label="服务类型">
                  <el-button  type="danger" :plain="true" size="small">退换货</el-button>
                  <el-button  type="danger" :plain="true" size="small">维修</el-button>
                </el-form-item>
                <el-form-item label="提交数量">
                  <el-input-number v-model="num" @change="handleChange" size="small" :min="1" :max="10"></el-input-number>
                </el-form-item>
                <el-form-item label="选择原因">
                  <el-select v-model="value" placeholder="请选择">
                    <el-option
                    v-for="item in options"
                    :key="item.value"
                    :label="item.label"
                    :value="item.value">
                  </el-option>
                </el-select>
                </el-form-item>
                <el-form-item label="问题描述">
                  <el-input
                  type="textarea"
                  :rows="4"
                  :autosize="{ minRows: 2, maxRows: 4}"
                  placeholder="请输入内容"
                  v-model="textarea">
                  </el-input>
                  <div class="textNum pull-right padding-r-10">
                    <span>0</span>/200字
                  </div>
                </el-form-item>
                <el-form-item label="图片信息">
                  <el-upload class="" action="https://jsonplaceholder.typicode.com/posts/" :on-preview="handlePreview" list-type="picture-card">
                    <el-button size="small" type="primary">上传图片</el-button>
                    <div slot="tip" class="el-upload__tip">最多可上传5张图片，每张图片大小不超过5M，支持jpg,png,jpeg格式文件</div>
                  </el-upload>
                </el-form-item>
              </div>
              <div class="border-1px">
                <div class="padding-10">
                    <h3 class="pull-left">确认信息</h3>
                    <span class="color-success padding-l-10" @click="edit()" style="height:25px;line-height:25px;cursor:pointer">修改</span>
                </div>
                <div class="hide info">
                  <!-- 退款方式 -->
                  <el-form-item label="退款方式">
                    <el-button size="small">原支付方式返回</el-button>
                    <span class="font-mini color-dark padding-l-10">请您在 <span class="color-danger padding-rl-6">退款说明</span>中查看退款时效</span>
                  </el-form-item>
                  <!-- end -->
                  <!-- 申请凭据 -->
                  <el-form-item label="申请凭据">
                    <el-checkbox-group>
                      <el-checkbox label="有发票"></el-checkbox>
                      <el-checkbox label="有检测报告"></el-checkbox>
                    </el-checkbox-group>
                  </el-form-item>
                  <el-form-item label="返回方式">
                    <el-button :plain="true" type="dange" size="small">快递至第三方卖家</el-button>
                    <el-button :plain="true" type="dange" size="small">快递至自提点</el-button>
                     <span class="color-danger padding-rl-6 font-mini">运费承担说明>></span>
                  </el-form-item>
                  <el-form-item label="收货地址" class="inputWhite">
                    <el-cascader :options="address">
                    </el-cascader>
                    <el-input class="margin-t-10"></el-input>
                  </el-form-item>
                  <div class="">
                    <!-- 选择颜色 -->
                    <el-form-item label="选择颜色">
                      <el-checkbox-group>
                        <el-checkbox label="红色"></el-checkbox>
                        <el-checkbox label="黑色"></el-checkbox>
                      </el-checkbox-group>
                    </el-form-item>
                    <!-- 选择尺码 -->
                    <el-form-item label="选择尺码">
                      <el-checkbox-group>
                        <el-checkbox label="36"></el-checkbox>
                        <el-checkbox label="38"></el-checkbox>
                      </el-checkbox-group>
                    </el-form-item>
                  </div>
                  <el-form-item label="客户姓名" class="inputWhite">
                    <el-input></el-input>
                  </el-form-item>
                  <el-form-item label="手机号码" class="inputWhite">
                    <el-input></el-input>
                  </el-form-item>
                  <!-- end -->
                  <el-form-item>
                    <el-button type="success" size="small" @click="onSubmit">立即提交</el-button>
                    <el-button size="small">取消</el-button>
                  </el-form-item>
                </div>
                <div class="repairList padding-10">
                  <el-form-item label="申请凭据:">
                    <span>有发票</span>
                  </el-form-item>
                  <el-form-item label="返回方式:">
                    <span>送货到自提点</span>
                    <span class="font-mini color-dark padding-l-6">仅城市自提点、移动自提车、校园营业厅接收返修退换货商品，其他类型自提点暂不支持  查询周边自提点</span>
                  </el-form-item>
                  <el-form-item label="收货地址:">
                    <span>广东深圳市龙华新区浪琴路9号影儿时尚集团商学院二楼</span>
                  </el-form-item>
                  <el-form-item label="顾客姓名:">
                    <span>007</span>
                  </el-form-item>
                  <el-form-item label="手机号码:">
                    <span>136****9837</span>
                    <span class="font-mini color-dark padding-l-6">提交服务单后，售后专员可能与您电话沟通，请保持手机畅通</span>
                  </el-form-item>
                  <el-form-item>
                    <el-button type="success" size="small" @click="onSubmit">确认提交</el-button>
                  </el-form-item>
                </div>
              </div>
            </el-form>
          </div>
          </div>
        </el-col>
      </el-row>
    </div>
  </div>
</template>

<script>
export default {
  data:function(){
    return{
      tableData:[{
        img:'//img10.360buyimg.com/N6/s60x60_jfs/t3085/150/7220278772/137822/ab0a02d3/58b52fdcN76aa4f6a.jpg',
        title:'爱国者（aigo）10000毫安 OL10400 双USB输出 通用便携迷你 移动电源/充电宝 黑色',
        text:'OL10400移动电源1micro充电线1，合格证综合卡（内含说明书保修卡物质证明）',
        giveText:'-',
        number:'1'
      }],
      num:1,
      options:[
        {
          value:'选项1',
          label:'质量问题'
        },
        {
        value:'选项2',
        label:'其他'
      }
    ],
    address: [{
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
                label: '罗湖3',
            }, ]
        }]
    }],
       value: '',
       textarea:''
    }
  },
  methods:{
    handleChange(value){
       console.log(value)
    },
    handlePreview(file){
      console.log(file)
    },
    onSubmit(){

    },
    edit(){
      $(".info").removeClass('hide')
      $(".repairList").addClass('hide')
    }
  },
  watch:{
    textarea:function(value){
      var textLength=value.length;
      var maxlength=2;
      console.log(textLength);
      $('.textNum').children('span').text(textLength);
      if(textLength>=5){
        console.log('值大于5');
      }
    }
  }
}
</script>

<style lang="css">
</style>
