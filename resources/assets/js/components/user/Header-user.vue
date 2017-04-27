<template lang="html">
  <div class="header-user">
    <div class="container block-center" style="position:relative">
      <div class="" >
            <a href="#" style="background:url(//misc.360buyimg.com/user/myjd-2015/widget/common/i/logo.png) no-repeat;display:block;height:80px"></a>
      </div>
      <div class="" style="position:absolute;top:15px;left:180px">
        <a class="font-2x color-white">我的京东</a>
        <div class="border-radius-3 padding-tb-5 text-center color-white">返回京东首页</div>
      </div>
      <div class="color-white" style="position:absolute;top:30px;left:280px;width:260px">
        <el-row>
          <el-col :span="4">
            <div class="">
              <a href="#">
                <span class="color-white" style="font-size:14px">首页</span>
              </a>
            </div>
          </el-col>
          <el-col :span="8">
            <el-dropdown>
              <span class="color-white">
                账户设置<i class="el-icon-caret-bottom el-icon--right"></i>
              </span>
              <el-dropdown-menu slot="dropdown">
                <el-dropdown-item>个人设置</el-dropdown-item>
              </el-dropdown-menu>
            </el-dropdown>
          </el-col>
          <el-col :span="8">
            <el-dropdown>
              <span class="color-white">
                社区<i class="el-icon-caret-bottom el-icon--right"></i>
              </span>
              <el-dropdown-menu slot="dropdown" >
                <el-dropdown-item>个人主页</el-dropdown-item>
              </el-dropdown-menu>
            </el-dropdown>
          </el-col>
          <el-col :span="4">
            <div class="" style="position:relative">
              <a href="#">
                <span class="color-white" style="font-size:14px">消息</span>
                <el-badge class="mark" :value="12" />
              </a>
            </div>
          </el-col>
        </el-row>
      </div>
      <div class="search-box">
          <el-input  placeholder="请输入内容">
              <el-button slot="append" icon="search"></el-button>
          </el-input>
      </div>
      <div class="mycart-box bg-white text-center border-1px padding-rl-10 border-radius-5">
          <span class="iconfont">&#xe887;</span>
          <a href="/shopcart">我的购物车</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
}
</script>

<style lang="less" scoped>
.nav-list{
  >li{
    float:left;
    margin-left: 30px;
  }
}
.header-user{
  background-color:#e45050;
  width:100%;
}
.search-box{
  width: 200px;
  position:absolute;
  top:20px;
  right:120px
}
.mycart-box{
    position:absolute;
    top:19px;
    right:0px;
    height:36px;
    line-height:36px;
    cursor:pointer;
}
.mark{
  position: absolute;
  top:-13px;
  left:15px;
}
</style>
