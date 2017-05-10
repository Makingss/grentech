<template lang="html">
  <div class="address">
    <header-user></header-user>
    <div class="margin-tb-20 container block-center">
      <el-row>
        <el-col :span="3">
          <navbar-user></navbar-user>
        </el-col>
        <el-col :span="21">
          <div class="padding-tb-10 padding-l-10">
            <div class="">
              <el-button type="text" @click="dialogFormVisible = true">新建收货地址</el-button>
              <span class="padding-l-10"> 您已创建1个收货地址，最多可创建20个</span>
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
              style="width: 100%">
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
    <el-button @click.native.prevent="deleteRow(scope.$index, tableData4)" type="success" size="small">
        默认地址
    </el-button>
    </template>
          </el-table-column>
          </el-table>
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
            tableData2: [{
                Consignee: "严海潮",
                address: "深圳哪条村",
                contactNumber: "13640339837",
            }],
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
            dialogFormVisible: false,
        }
    }
}
</script>

<style lang="css">
</style>
