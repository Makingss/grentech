<template lang="html">
  <div class="app-link">
    <div class="container block-center">
      <div class="opertaion margin-t-10" style="border:1px solid #eee">
        <el-row>
          <el-col :span="7">
            <dl class="order-tab">
              <dd class="pull-left" v-for="(tab,index) in tabs">{{tab.text}}
                <i class="iconfont color-danger icon-middle font-mini" v-if="tab.tab_vlaue">&#xe63f;</i>
              </dd>
            </dl>
          </el-col>
          <el-col :span="4">
            <div class="" style="height:36px;line-height:38px;left:0">
              <input type="text" name="startPrice" value="" placeholder="￥" style="width:50px">
              <i>--</i>
              <input type="text" name="endPrice" value="" placeholder="￥" style="width:50px">
              <input type="button" name="" value="确定" style="width:50px">
            </div>
          </el-col>
          <el-col :span="6">
            <div class="block text-center block-center">
              <el-row>
                <el-col :span="5" style="line-height:36px"><span>收货地址</span></el-col>
                <el-col :span="10">
                  <div class="" style="width:180px !important;height:20px !important">
                    <el-cascader :options="options" v-model="selectedOptions" @change="handleChange">
                    </el-cascader>
                  </div>
                </el-col>
              </el-row>
            </div>
          </el-col>
          <el-col :span="5" style="line-height:36px">
            <el-checkbox-group v-model="checkList">
              <el-checkbox label="自营商品"></el-checkbox>
              <el-checkbox label="有货商品"></el-checkbox>
            </el-checkbox-group>
          </el-col>
          <el-col :span="2">
            <div class="Pagination" style="line-height:36px">
              <input type="text" name="text" class="pag-text" value="1/846">
              <input type="button" name="prve" class="pag-Btn" value="<">
              <input type="button" name="next" class="pag-Btn" value=">">
            </div>
          </el-col>
        </el-row>
      </div>
    </div>
    <div class="content clear-float padding-b-4">
      <div class="container block-center">
        <ul class="goods">
          <li class="goods-li" v-for="item in 12">
            <div class="">
              <a href="#">
                <div class="goods-img">
                  <a href="#">
                    <img class="img-big padding-15" src="http://pop.nosdn.127.net/820a68ce-3f50-47d9-a23b-aee1235dda18?imageView&thumbnail=262x262&quality=90" id="" alt="PRADA 普拉达GALLERIA 女士压纹牛皮手拎包">
                  </a>
                  <img class="img-tab" src="//haitao.nos.netease.com/j1c4h4tk82_72_48.png?klsize=72x48" alt="">
                  <span class="storageMsg bg-blue">
                        <i class="iconfont "></i>
                      <span class="msg">仅剩1件</span>
                  </span>
                </div>
              </a>
              <div class="m-goodsImgs">
                <div class="clearfix">
                  <ul class="small-imgBox">
                    <li title="大红" v-for="item in 4" id="" proid="" class="link-img">
                      <img id="" src="//pop.nosdn.127.net/3590b5ea-f5ab-4c2b-9867-e24a4984a955?imageView&thumbnail=30x30&quality=90" alt="">
                    </li>
                  </ul>
                </div>
              </div>
              <div class="details">
                <p class="price padding-l-4">
                  <span class="color-danger font-1x font-bold"><i>￥</i>5000</span>
                  <b class="comLabel">7.2折</b>
                  <b class="comLabel">包邮</b>
                  <span class="box-right">
                        <del class="color-dark">￥15300</del>
                      </span>
                </p>
                <div class="titlewrap padding-rl-4">
                  <a href="#" class="title">
                    <h2 class="line-ellispse-1 font-mini">PRADA 普拉达GALLERIA 女士压纹牛皮手拎包</h2>
                  </a>
                </div>
                <p class="saelsinfo padding-l-4">
                  <span class="decline">直降</span> 立省901元
                </p>
                <p class="chatinfo padding-l-4">
                  <a href="#">
                    <i class="iconfont font-1x color-gray">&#xe8bc;</i> 0
                  </a>
                  <span class="box-right color-gray">意大利</span>
                </p>
                <p class="storeinfo padding-l-4">
                  <i class="iconfont font-1x " style="vertical-align:middle">&#xe610;</i>
                  <a href="#" class="color-gray">
                    <img src="">奢殿专营店
                  </a>
                </p>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="block-center text-center">
      <el-pagination layout="prev, pager, next" :total="1000">
      </el-pagination>
    </div>
    <div id="guessGoods">
      <div class="container block-center">
        <h4><span class="font-2x">猜你喜欢</span>
          <b class="color-dark padding-l-6">根据你的浏览记录推荐的商品</b>
        </h4>
        <div class="margin-tb-20 clear-float">
          <div class="newListWrap pull-left" v-for="item in 5">
            <a href="#" class="link-img">
              <img src="//haitao.nos.netease.com/izy2851p12_800_800.jpg?imageView&thumbnail=430x430" alt="">
            </a>
            <p class="itemTitle line-ellispse-1 padding-rl-4">
              <a href="#" target="_blank" title="MICHAEL KORS 迈克高仕 Jet Set Saffiano女士大号单肩斜挎包">MICHAEL KORS 迈克高仕 Jet Set Saffiano女士大号单肩斜挎包</a></p>
            <p class="padding-rl-4"><span class="color-danger">今日特卖，限时购买省0元</span></p>
            <div class="itemInfo padding-rl-6">
              <div class="price">
                <span class="symbol color-danger font-1x">￥<strong>945</strong></span>
                <span class="marprice font-mini color-dark"><del>￥2300</del></span>
              </div>
              <a href="#" class="padding-rl-4" target="_blank">505人已评价</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="recomGoods">
      <div class="container block-center">
        <h4><span class="font-2x">大家都在买</span>
          <b class="color-dark padding-l-6">全网最热门的商品推荐</b>
        </h4>
        <div class="margin-tb-20 clear-float">
          <div class="newListWrap pull-left" v-for="item in 5">
            <a href="#" class="link-img">
              <img src="//pop.nosdn.127.net/f949697f-981c-468f-a663-db4ac1e5713c?imageView&thumbnail=430x430" alt="">
            </a>
            <p class="itemTitle padding-rl-4">
              <a href="#" target="_blank" title="landou 兰多 韩版休闲条纹印花女孩手提包亚麻妈咪手提包">landou 兰多 韩版休闲条纹印花女孩手提包亚麻妈咪手提包</a></p>
            <p class="padding-rl-4"><span class="color-danger">今日特卖，限时购买省0元</span></p>
            <div class="itemInfo padding-rl-4">
              <div class="price">
                <span class="symbol color-danger font-1x">￥<strong>945</strong></span>
                <span class="marprice font-mini color-dark"><del>￥2300</del></span>
              </div>
              <a href="#" class="padding-rl-4" target="_blank">505人已评价</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="latelyGoodsBrowse">
      <div class="container block-center">
        <h4><span class="font-2x">最近浏览</span>
          <b class="color-dark padding-l-6">你最近一段时间浏览的商品</b>
        </h4>
        <div class="margin-tb-20 clear-float">
          <div class="newListWrap pull-left" v-for="item in 5">
            <a href="#" class="link-img">
              <img src="//pop.nosdn.127.net/cdf18f16-2d17-4aa2-8dae-fb8e74d35309?imageView&thumbnail=430x430" alt="">
            </a>
            <p class="itemTitle padding-rl-4">
              <a href="#" target="_blank" title="GUCCI 古驰女士牛皮手提包过季款清仓亏本价">GUCCI 古驰女士牛皮手提包过季款清仓亏本价</a></p>
            <p class="padding-rl-4"><span class="color-danger">今日特卖，限时购买省0元</span></p>
            <div class="itemInfo padding-rl-4">
              <div class="price">
                <span class="symbol color-danger font-1x">￥<strong>945</strong></span>
                <span class="marprice font-mini color-dark"><del>￥2300</del></span>
              </div>
              <a href="#" class="padding-rl-4" target="_blank">505人已评价</a>
            </div>
          </div>
        </div>
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
        tabs: [{
          text: "综合",
          tab_vlaue: false
        }, {
          text: "销量",
          tab_vlaue: true
        }, {
          text: "新品",
          tab_vlaue: false
        }, {
          text: "价格",
          tab_vlaue: true
        }],
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
        selectedOptions: ["shenzhe", "longhua", "dalan2"],
        checkList: ["自营商品"]
      }
    },
    create: {},
    methods: {
      handleChange: function() {

      }
    }

  }
</script>

<style lang="less" scoped>
  a:hover {
    text-decoration: underline;
  }

  .order-tab {
    >dd {
      height: 36px;
      line-height: 36px;
      padding: 0 20px;
      border-right: 1px solid #eee;
      margin: -1px;
      cursor: pointer;
    }
  }

  .icon-middle {
    vertical-align: middle
  }

  .Pagination {
    .pag-Btn {
      background-color: transparent;
      border: none;
      width: 15px;
      height: 36px;
      font-size: 14px;
      font-weight: bold;
    }
    .pag-Btn:hover {
      color: #f00;
    }
    .pag-text {
      width: 40px;
      padding: 5px;
      border: none;
    }
  }

  h2 {
    font-weight: normal;
  }

  .goods {
    width: 100%;
    overflow: hidden;
    display: block;
    .goods-li {
      width: 262px;
      height: 428px;
      float: left;
      box-shadow: 0px 0px 2px #888;
      margin: 5px;
    }
    .goods-img {
      position: relative;
      .img-tab {
        position: absolute;
        top: 0;
        left: 0;
        width: 72px;
        height: 48px;
        padding: 15px 10px 10px 15px;
      }
      .storageMsg {
        width: 100%;
        position: absolute;
        left: 0;
        bottom: 0;
        >span {
          width: 100%;
          height: 64px;
          color: white;
          padding-left: 5px;
        }
      }
    }
    .m-goodsImgs {
      display: inline-block;
      .small-imgBox {
        width: 100%;
        >li {
          float: left;
          border: 1px solid #bbb;
          margin: 5px 2px 5px 5px;
        }
      }
    }
    .comLabel {
      position: relative;
      top: -4px;
      display: inline-block;
      padding: 0 4px;
      border: 1px dotted #f00;
      color: #f00;
      font-weight: bold;
    }
    .price,
    .chatinfo {
      position: relative;
      height: 25px;
      line-height: 25px;
    }
    .box-right {
      position: absolute;
      right: 10px;
    }
    .saelsinfo {
      color: #f00;
      .decline {
        color: #fff;
        font-weight: blod;
        padding: 2px 4px;
        background-color: #f00;
      }
    }
  }

  .newListWrap {
    width: 206px;
    height: 306px;
    border: 1px solid #eee;
    margin: 0 0 10px 10px;
  }
</style>
