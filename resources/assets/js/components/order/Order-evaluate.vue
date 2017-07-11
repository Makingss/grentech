<template lang="html">
  <div class="order-evaluate">
      <header-user></header-user>
      <div class="container block-center">
        <el-row>
          <el-col :span="3">
            <navbar-user></navbar-user>
          </el-col>
          <el-col :span="21">
            <div class="margin-tb-10">
              <h3 class="bg-gray padding-tb-10 padding-l-15">订单评价2</h3>
              <div class="margin-t-10">
                <el-row class="bg-light text-center padding-10">
                  <el-col :span="10">商品</el-col>
                  <el-col :span="11">评价</el-col>
                </el-row>
                <div class="margin-b-10 oe-list">
                  <div class="oe-listItem" v-for="item in 2">
                    <el-row class="padding-10">
                      <el-col :span="7">
                        <div class="text-center padding-10">
                          <img src="//img30.360buyimg.com/n4/jfs/t3085/150/7220278772/137822/ab0a02d3/58b52fdcN76aa4f6a.jpg" alt="">
                          <div class="line-ellispse-2 padding-tb-6">爱国者（aigo）10000毫安 OL10400 双USB输出 通用便携迷你 移动电源/充电宝 <span>黑色</span></div>
                          <div class="padding-tb-6">￥68.90</div>
                          <div class="padding-tb-6">
                            商务黑1000毫安
                          </div>
                        </div>
                      </el-col>
                      <el-col :span="17">
                        <div class="margin-l-20">
                          <div class="padding-tb-10">
                            <i class="iconfont color-danger icon-center">&#xe6cc;</i>
                            请至少填写一件商品的评价</div>
                          <div>
                            <el-row class="padding-tb-10">
                              <el-col :span="3">
                                商品满意度
                              </el-col>
                              <el-col :span="21">
                                <el-rate :max="5" show-text v-model="value1"></el-rate>
                              </el-col>
                            </el-row>
                          </div>
                          <div class="padding-tb-10">
                            <el-row>
                              <el-col :span="3">评价晒单</el-col>
                              <el-col :span="21">
                                <el-input type='textarea' placeholder="可以写下您用后的心得,是舒服还是很nice?"></el-input>
                              </el-col>
                            </el-row>
                          </div>
                          <div class="">
                            <el-row :gutter="20">
                              <el-col :span="15" :offset="3">
                                <el-upload
                                  action="https://jsonplaceholder.typicode.com/posts/"
                                  list-type="picture-card"
                                  :on-preview="handlePictureCardPreview"
                                  :on-remove="handleRemove">
                                  <i class="el-icon-plus"></i>
                                  </el-upload>
                              </el-col>
                              <el-col :span="5">
                                <div>共 <span class="color-danger">0</span>张,还能上传 <span class="color-danger
                                  ">5</span>张</div>
                              </el-col>
                            </el-row>
                            <div>
                            </div>
                          </div>
                          <div class="text-right">
                            <el-button type="success" size="small">提交</el-button>
                          </div>
                          </div>

                      </el-col>
                    </el-row>
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
            value1: ""
        }
    },
    created:{

    },
    computed:{

    },
    methods: {
        handlePictureCardPreview() {

        },
        handleRemove() {

        }
    }
}
</script>

<style lang="less">
.order-evaluate{
  .el-upload--picture-card{
    width: 40px;
    height: 40px;
    line-height: 40px;
  }
  .el-icon-plus{
    font-size:14px;
  }
  .el-upload-list--picture-card
  .el-upload-list__item{
    width: 60px;
    height: 60px;
  }
}
.oe-list{
  border-right:1px solid #eee;border-left:1px solid #eee;border-bottom:1px solid #eee;
}
.oe-listItem{
  border-bottom:2px dotted #eee;
  &:last-child{
    border-bottom:none;
  }
}

</style>
