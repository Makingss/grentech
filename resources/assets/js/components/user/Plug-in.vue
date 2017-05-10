<template lang="html">
  <div class="plug-in">
    <div class="member-tuijian">
      <div class="model-main clear-float margin-b-10">
        <h2 class="padding-l-10">会员推荐</h2>
        <div class="text-center margin-tb-10">
          <el-button>京东会员</el-button>
          <el-button>金融会员</el-button>
        </div>
        <div class="text-center">
          <ul class="m-list clear-float">
            <li class="m-item" v-for="item in 4">
              <a href="#">
                <p class="padding-b-4">拼颜值不如拼信用</p>
                <p class="padding-b-4">立即开启享特权</p>
                <div class="link-img" style="padding:5px;">
                    <img src="//img10.360buyimg.com/da/jfs/t3031/354/491540733/3975/52649df0/57a2a822Nafbe4d56.png" alt="">
                </div>
            </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="">
      <div class="model-main">
          <h2 class="padding-l-10">便民服务</h2>
          <div class="padding-l-10">
            暂未开发,敬请期待
          </div>
      </div>
    </div>
    <div class="">
      <div class="model-main">
          <h2 class="padding-l-10">我的足迹</h2>
          <div class="padding-l-10">
            暂未开发,敬请期待
          </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {}
</script>

<style lang="less" scoped>
.m-list {
    margin: 0 4px;
    .m-item {
        width: 110px;
        float: left;
        background: #f5f5f5;
        margin: 5px;
    }
}
</style>
