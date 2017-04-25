<template lang="html">
  <div class="mall_user">
    <header-section></header-section>
    <div class="container block-center" style="width:85%">
      <div class="" style="margin-top:80px">
        <el-row>
          <el-col :span="3">
            <div class="margin-t-10">
              <ul>
                <li v-for="item in navLeftBox" class="margin-b-10">
                  <dl>
                    <dt class="font-bold padding-b-4 border-1px-b-x font-1x">
                    <a href="#" v-text="item.title"></a></dt>
                    <dd v-for="item2  in item.children" class="padding-tb-6"><a href="#" :to="item2.path" v-text="item2.text"></a></dd>
                  </dl>
                </li>
              </ul>
            </div>
          </el-col>
          <el-col :span="21">
            <div class="margin-l-20">
              <user-info></user-info>
              <el-row class="margin-t-20">
                <el-col :span="18">
                <myorder></myorder>
                <banner-carousel></banner-carousel>
                <circle-friends></circle-friends>
                </el-col>
                <el-col :span="6">
                  <div class="padding-l-10">
                    <plug-in></plug-in>
                  </div>
                </el-col>
              </el-row>
            </div>
          </el-col>
        </el-row>
      </div>
    </div>
    <slogen></slogen>
    <footer-section></footer-section>
  </div>
</template>

<script>
export default {
    data: function() {
        return {
            navLeftBox: [{
                title: '订单中心',
                children: [{
                    text: "我的订单",
                    path: '/Myorder',
                }, {
                    text: "团购订单",
                    path: '/tuanOrder'
                }, {
                    text: '本地生活订单',
                    path: '#'
                }]
            }, {
                title: '关注中心',
                children: [{
                    text: "关注商品",
                    path: '#',
                }, {
                    text: "关注店铺",
                    path: '#',
                }, ]
            }, {
                title: '资产中心',
                children: [{
                    text: "小金库",
                    path: '#'
                }, {
                    text: "小白条",
                    path: ""
                }]
            },{
                title: '特色业务',
                children: [{
                    text: "我的营业厅",
                    path: '#'
                }, {
                    text: "定期送",
                    path: ""
                }]
            },{
                title: '客服中心',
                children: [{
                    text: "返修退换货",
                    path: '#'
                }, {
                    text: "意见建议",
                    path: "#"
                },{
                  text:"我的问答",
                  path:"#"
                }]
            },{
              title:"设置",
              children:[{
                text:"个人信息",
                path:"#"
              },{
                text:"收货地址",
                path:"#"
              }
            ]
            }
          ]
        }
    }
}
</script>

<style lang="less" scoped>
.margin-l-20{
  margin-left:20px;
}
</style>
