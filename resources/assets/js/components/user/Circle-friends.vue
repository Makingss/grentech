<template lang="html">
  <div class="circle-friends">
    <div class="model-main margin-tb-10">
    <el-tabs>
    <el-tab-pane label="微信推荐">
      <div class="">
        <div class="clear-float">
          <h4 class="pull-left padding-l-10 color-gray">以下内容来自微信购物圈</h4>
          <div  class="pull-right padding-r-10">
              <el-button size="small" type="danger">去微信晒单</el-button>
          </div>
        </div>
        <ul class="clear-float">
          <li v-for="item in 4" class="pull-left margin-10">
            <div class="recomInfo border-1px" v-for="(item,index) in webChat">
                <div class="clear-float">
                  <div class="pull-left"><img :src="item.headerImg" class="headerImg" alt=""></div>
                  <div class="padding-10" style="text-indent:12px">
                    <h4>{{item.name}}</h4>
                    <div class="color-gray">{{item.defInfo}}</div>
                  </div>
                </div>
                <div class="text">
                {{item.content}}
                </div>
              <div class="">
                <el-carousel trigger="click" height="260px">
                  <el-carousel-item v-for="item2 in item.carousel">
                    <img :src="item2.img" alt="">
                  </el-carousel-item>
                </el-carousel>
              </div>
              <div class="clear-float margin-t-4" v-for="item3 in item.goodsImg">
                <div class="pull-left" style="width:60px;height:60px">
                  <a :href="item3.url" class="link-img">
                    <img :src="item3.simg" alt="">
                  </a>
                </div>
                <div class="">
                  <div>{{item3.name}}</div>
                  <div class="color-gray">￥{{item3.prict}}</div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </el-tab-pane>
    <el-tab-pane label="京东推荐">
      <div class="">
        <div class="clear-float">
          <h2 class="pull-left padding-l-10">晒单推荐</h2>
          <div class="pull-right padding-r-10">
              <el-button size="small" type="success">我也要晒单</el-button>
          </div>
        </div>
        <div style="width:200px;padding:10px; margin:5px;"class="border-1px">
          <a href="#" class="link-img">
              <img src="//img14.360buyimg.com/shaidan/s220x800_jfs/t4978/351/1904095478/25283/37743ed5/58f5e392Nf01af23d.jpg" alt="">
          </a>
          <a href="#" class="line-ellispse-1 padding-tb-5">
          小蚁（YI）智能夜视版摄像头 智能摄像机家用无线网络WiFi高清1080p手机远程视频监控 小方摄像头夜视</a>
          <div class="bg-gray padding-10">
            <div class="padding-b-4">
              jd_150690tmw
            </div>
            <div class="padding-b-4">
              小巧玲珑，清晰度不错，可以购买。这个只适合放在桌上，没法往墙上固定，总体上来说还是不错
            </div>
            <div class="text-right">
              <el-button size="small">评论0</el-button>
            </div>
          </div>
        </div>
      </div>
    </el-tab-pane>
    </el-tabs>
    </div>
  </div>
</template>

<script>
export default {
    data:function(){
    return{
      webChat:[
        {
          headerImg:"//storage.jd.com/i.imageUpload/31333634303333393833375f7031343932383433353033333236_mid.jpg",
          name:"小栋",
          defInfo:"来自微信推荐",
          content:"二入乐高深深深过海，为何说二入，因为乐高永远不会让你只剁一次手。我发现最不难挑的礼物就是送给小朋友的，乐高系列众多，什么城市款，什么公主城堡款的，不同年龄段都有适合的，色彩鲜艳，做工细致，让小朋友们在一堆小零件中创造出属于自己的大大世界！",
          carousel:[{
            img:'//img10.360buyimg.com/shaidan/s220x800_jfs/t5353/280/330842728/174466/d8f9e9e6/58fd5cd5Nd595a931.jpg'
          }],
          goodsImg:[{
            url:"",
            simg:"//img10.360buyimg.com/n2/jfs/t4540/222/2215014706/24143/ce703620/58ec867aN5bbe0096.jpg",
            name:"生命周期",
            prict:"243"
          }]
        }
      ]
    }
  }
}
</script>

<style lang="css" scoped>
.el-tabs__nav-scroll .el-tabs__nav{
left:40%;
}
.el-tabs__active-bar{
  background: #f00;
}
.el-tabs__item.is-active{
  color: #f00;
}
.recomInfo{
  width:200px;padding:10px; margin:5px;
}
.headerImg{
  width:52px;
  height:52px;
  border-radius:50%;
}

</style>
