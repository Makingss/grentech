<template lang="html">
  <div class="after-orderlist">
    <header-user></header-user>
    <div class="container block-center">
      <el-row>
        <el-col :span="3">
          <navbar-user></navbar-user>
        </el-col>
        <el-col :span="21">
          <div class="">
            <el-tabs v-model="activeName" @tab-click="handleClick">
              <div class="">
                <el-input placeholder="请输入需搜索的订单号">
                  <el-button slot="append" icon="search"></el-button>
                </el-input>
              </div>
              <div class="margin-tb-10">
                <el-tab-pane label="申请退换/返修" name="first">
                  <el-table
                  :data="tableData"
                  border
                  style="width: 100%;">
                    <el-table-column
                    prop="orderID"
                    label="订单编号"
                    width="180">
                  </el-table-column>
                  <el-table-column
                  label="订单详情"
                  >
                  <template scope="scope">
                    <div class="pull-left">
                      <img :src="scope.row.orderlist.img" alt="">
                    </div>
                    <div class="font-mini">
                      <span>{{scope.row.orderlist.text}}</span>
                    </div>
                  </template>
                </el-table-column>
                <el-table-column
                width="120"
                label="操作"
                >
                <template scope="scope">
                  <el-button  size="mini"><a href="/after_apply">申请</a></el-button>
                </template>
                </el-table-column>
                <el-table-column
                prop="tag"
                width="120"
                label="下单时间"
                :filters="[{ text: '三个月内订单', value: '三个月内订单' }, { text: '三个月之前订单', value: '三个月之前订单' }]"
                :filter-method="filterTag"
                filter-placement="bottom-end"
                >
                <template scope="scope">
                  <el-tag
                  :type="scope.row.tag === '三个月内订单' ? 'primary' : 'success'"
                  close-transition>{{scope.row.tag}}</el-tag>
                </template>
              </el-table-column>
              </el-table>
              </el-tab-pane>
              </div>
              <el-tab-pane label="退换/返修记录" name="second">退换/返修记录</el-tab-pane>
              <el-tab-pane label="退款明细" name="third">退款明细</el-tab-pane>
              <el-tab-pane label="维修费明细" name="fourth">维修费明细</el-tab-pane>
            </el-tabs>
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
      activeName: 'first',
      tableData: [{
            orderID: '4409220315',
            orderlist:{
              img:'//img10.360buyimg.com/N6/s60x60_jfs/t3085/150/7220278772/137822/ab0a02d3/58b52fdcN76aa4f6a.jpg',
              text:'爱国者（aigo）10000毫安 OL10400 双USB输出 通用便携迷你 移动电源/充电宝 黑色'
            },
            tag:'2017-04-05'
          },{
                orderID: '4409220315',
                orderlist:{
                  img:'//img10.360buyimg.com/N6/s60x60_jfs/t3085/150/7220278772/137822/ab0a02d3/58b52fdcN76aa4f6a.jpg',
                  text:'爱国者（aigo）10000毫安 OL10400 双USB输出 通用便携迷你 移动电源/充电宝 黑色'
                },
                tag:'2017-04-05'
            },
        ]
    }
  },
  methods:{
    handleClick(tab, event){
      console.log(tab,event)
    },
    filterTag(value,row){
      return row.tag === value;
    }
  }
}
</script>

<style lang="css">
</style>
