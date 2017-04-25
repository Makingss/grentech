<template lang="html">
  <div class="banner-carousel" style="box-shadow:0px 1px 15px #ddd">
    <div class="margin-tb-10 bc-header">
      <h2 class="padding-rl-10 bc-name">我关注的商品</h2>
        <ul class="padding-rl-10 bc-tag" v-if="">
          <li class="pull-left bc-tabItem margin-rl-6" v-for="item in tag"><a :href="item.url">{{item.text}}</a></li>
        </ul>
      <div class="padding-r-15 bc-move"><a :href="move.url"></a>{{move.text}}</div>
    </div>
    <div>
      <el-carousel trigger="click" height="260px" indicator-position="none" arrow="always">
        <el-carousel-item>
          <div class="model-1 default" v-if="toggleValue">
            <div class="pull-left padding-rl-4" style="width:120px; height:100px;" v-for="item in 5">
              <a href="#" class='link-img'>
                  <img  src="//storage.jd.com/i.imageUpload/31333634303333393833375f7031343932383433353033333236_big.jpg" alt="">
              </a>
              <div class="price margin-b-10 text-center">
                $1780.00
              </div>
            </div>
          </div>
          <div class="model-2" v-else>
            <ul  class="clear-float">
              <li class="bc-goodsBox border-1px pull-left" v-for="item in 2">
                <div class="clear-float">
                  <h2 class="bc-title color-gray padding-l-6">超级白菜日:19块9</h2>
                  <div class="bc-info">
                    <div class="bc-creator color-dark padding-l-6">
                      <i class="iconfont font-mini">&#xe8ca;</i>
                      潮流技术控
                    </div>
                    <div class="bc-operate">
                      <a href="#">
                        <div class="border-1px border-radius-3 mini-btn">
                          <i class="iconfont font-mini">&#xe8db;</i>
                          69
                        </div>
                      </a>
                      <a href="#">
                        <div class="border-1px border-radius-3 mini-btn">
                          <i class="iconfont font-mini">&#xe615;</i>
                          <span>81</span>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="bc-goods">
                      <div class="bc-goods-coves pull-left border-1px">
                        <a href="#" class="link-img">
                          <img src="//img11.360buyimg.com/n1/s250x250_jfs/t3151/114/8248417009/211084/5b76652e/58c264deN74b04f1c.jpg" alt="">
                        </a>
                      </div>
                      <div class="bc-goods-list pull-left">
                        <dl class="bc-goods-ul">
                          <dd class="bc-goods-item border-1px" v-for="item in 4">
                          <a href="#" class="link-img">
                            <img src="//img12.360buyimg.com/n1/s76x76_jfs/t2083/137/1280141948/37781/9b871616/56526d68Nbb48195a.jpg" alt="">
                          </a>
                          </dd>
                        </dl>
                      </div>
                    </div>
                  </div>
              </li>
            </ul>
          </div>
        </el-carousel-item>
      </el-carousel>
    </div>
  </div>
</template>

<script>
export default {
    data: function() {
        return {
          name:"",
          tag:[
            {
              text:"降价通知",
              url:"#"
            },{
              text:"打折通知"
            }
          ],
          move:
            {
              text:"查看更多",
              url:"#"
            },
          modelHeight:"263px",
          value:"",
          carouselSet:[{

          }]
        }
    },
    props: ["value"],
    creader:{},
    method:{
      toggleValue:function(){
        switch(this.value){
          case false:
            this.modelHeight="150px";
            break;
          case true:
            this.modelHeight="200px";
            break;
        }
      }
    }
}
</script>

<style lang="less" scoped>
.mini-btn {
    padding: 0 4px;
    font-size: 12px;
    display: inline-block;
    text-align: center;
    text-align: center;
}
.small-btn {
    text-align: center;
    font-size: 12px;
    padding: 5px;
    display: inline-block;
}
.large-btn {
    display: inline-block;
    text-align: center;
    padding: 6px;
    font-size: 12px;
}
.bc-header{
  position:relative;
  height:40px;
  line-height:40px;
  .bc-name{}
  .bc-tag{
    position:absolute;
    top:0;
    left:120px;
  }
  .bc-move{
    position:absolute;
    top:0;
    right:0;
  }
}

.bc-info {
    position: relative;
    margin: 5px 0;
    .bc-creator {
        height: 20px;
        line-height: 20px;
    }
    .bc-operate {
        position: absolute;
        top: 0;
        right: 0;
    }
}
.bc-goodsBox {
    padding:4px;
    width: 305px;
    margin:10px;
}

.bc-goods {
    width: 100%;
    height: 162px;
    overflow: hidden;
    .bc-goods-coves {
        width: 140px;
        height: 140px;
        padding-bottom: 2px;
        margin-left:10px;
        margin-right:5px;
    }
    .bc-goods-list {
        width: 148px;
        height: 148px;
    }
    .bc-goods-ul {
        width: 100%;
        display: block;
        .bc-goods-item {
            width: 69px;
            float: left;
            margin:0 2px 2px 0;
            box-sizing: border-box;
            box-sizing: inherit;
        }
    }
}
</style>
