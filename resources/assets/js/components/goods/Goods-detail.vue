<template>
<div class="goods-detail">
    <div class="container block-center">
        <div id="urlAdd" class="crumbs padding-tb-20 border-1px-b-x">
          <a href="#">网易考拉海购</a>
          > &nbsp;&nbsp;landou 兰多纯色大容量百搭双肩手提妈咪包
        </div>
        <div id="goodsInfo" class="InfoWrap margin-tb-20 clear-float">
            <el-row>
                <el-col :span="9">
                    <div class="border-1px showImgBox" id="showImgBox">
                        <img src="//pop.nosdn.127.net/e8f8dd83-8b75-4362-86a3-4bbd3aa2cdda?imageView&thumbnail=400x0&quality=85" alt="">
                        <span class="iconfont magnifiter font-2x color-dark">&#xe621;</span>
                    </div>
                    <div class="Carousel clear-float margin-t-10">
                      <div class="scrollBtn leftClick" @click="leftClick()">
                          <i class="iconfont">&#xe8ef;</i>
                      </div>
                      <div class="litimg_box">
                        <ul>
                          <li class="pull-left border-1px" v-on:mouseover="showBorder()" v-for="item in 4">
                            <a href="#">
                            <img class="link-img" src="//pop.nosdn.127.net/e0b96563-ec69-4942-b41c-efd3a52de5c6?imageView&thumbnail=64x0&quality=85" alt="">
                            </a>
                          </li>
                        </ul>
                      </div>
                      <div class="scrollBtn rightClick" @click="rightClick()">
                          <i class="iconfont">&#xe8f1;</i>
                      </div>
                    </div>
                </el-col>
                <el-col :span="15">
                  <div class="">
                    <dl class="GInfo padding-l-15">
                      <dt class="country color-dark">
                      <img src="//haitao.nos.netease.com/iczukrul93.JPG?imageView&thumbnail=48x0&quality=85" alt="">
                      <span>中国</span>
                      <span>|</span>
                      <span>landou兰多</span>
                      </dt>
                      <dt class="product-title padding-tb-10">
                        <span class="font-bold font-1x">landou 兰多纯色大容量百搭双肩手提妈咪包</span>
                      </dt>
                      <dt>
                        <span class="font-mini">
                          时尚轻便妈咪包 多功能大容量 可双肩手提 背面设安全防盗拉链设计 让妈妈们用着舒心也放心</span>
                      </dt>
                      <dd class="">
                        <div class="priceBox clear-float" style="">
                          <span class="font-mini pull-left margin-10 text-left" style="width:75px;height:26px;line-height:26px">售价</span>
                          <div class="" style="margin:8px 0">
                            <span class="color-danger font-3x font-bold" style="vertical-align:1px">￥109.00</span>
                            <span class="SLabel">3.3折</span>
                            <span class="SLabel">包邮</span>
                            <span class="marketPrice color-dark padding-l-6">参考价 ￥335.00</span>
                          </div>
                        </div>
                      </dd>
                      <dd class="margin-tb-10">
                        <span class="line-title">活动</span>
                        <div>
                          <span class="bg-danger padding-rl-6 padding-tb-4 color-white">直降</span>
                          <span>考拉优惠</span>
                        </div>
                      </dd>
                      <dd class="margin-tb-10">
                      <span class="line-title">税费</span>
                      <div class="color-dark">
                        <span class="color-danger">[本商品包税]</span>&nbsp;无需额外交税
                      </div>
                      </dd>
                      <dd>
                        <span class="line-title">运费</span>
                        <div class="">

                              <span class="address ">福州</span>
                              <span class="padding-rl-6">至</span>
                              <div class="" style="display:inline-block;vertical-align:middle;width:180px !important;">
                                <el-cascader :options="options" size="small">
                                </el-cascader>
                              </div>
                              <span class="color-dark">免运费</span>
                        </div>
                      </dd>
                      <dd class="margin-tb-10">
                        <span class="line-title">服务</span>
                        <span>
                          本商品由 &nbsp;landou 兰多品牌方
                        </span>
                      </dd>
                    <dd class="margin-tb-10">
                      <span class="line-title">规格</span>
                      <span class="border-1px padding-rl-10 padding-tb-4">1个装</span>
                    </dd>
                    <dd class="clear-float">
                      <span class="line-title margin-tb-20">颜色</span>
                      <div>
                        <ul>
                          <li class="pull-left padding-l-4" v-for="item in 4"><a href="#"><img src="//pop.nosdn.127.net/531be3dd-ffad-46e5-b9a2-d224ef50f8e4?imageView&thumbnail=50x0&quality=85"  class="border-1px-d" style='width:50px;height:50px' alt=""></a></li>
                        </ul>
                      </div>
                    </dd>
                    <dd class="margin-tb-10">
                      <span class="line-title">图案</span>
                      <span class='border-1px padding-rl-10  padding-tb-4'>纯色</span>
                    </dd>
                    <dd class="margin-tb-10">
                      <span class="line-title">款式</span>
                      <span class='border-1px padding-rl-10 padding-tb-4'>双肩包</span>
                    </dd>
                    <dd>
                      <form class="" action="index.html" method="post">
                        <span class="line-title padding-t-6">数量</span>
                        <span>
                        <el-input-number size="small" :min="1" v-model="num6"></el-input-number>
                        </span>
                        <span>库存充足</span>
                        <div class="margin-tb-10">
                          <span class="line-title">说明</span>
                          <span><i class="iconfont font-mini">&#xe8e5;</i>支持7天无忧退货</span>
                        </div>
                        <div class="buyBtn margin-tb-10">
                            <el-button>立即购买</el-button>
                            <el-button type="danger">
                              <span class="iconfont font-mini">&#xe653;</span>
                              加入购物
                            </el-button>
                            <span class="padding-l-15">
                              <i class="iconfont">&#xe639;</i>
                              收藏
                            </span>
                        </div>
                      </form>
                    </dd>
                    <dd>
                      <div class="pull-left">
                        <el-rate
                        v-model="value5"
                        disabled
                        show-text
                        text-color="#F7BA2A"
                        text-template="{value}">
                      </el-rate>
                      </div>
                      <span class="assess margin-rl-6">2864人评价</span>
                      <span>386晒单</span>
                    </dd>
                    <dd class='border-1px-t-d margin-tb-10 padding-tb-10 color-dark' style="position:relative">
                      <p class="padding-tb-5 font-1x">小猪<span class="dataTime padding-l-6">04.18</span></p>
                      <p class="detail line-ellispse-2 tab-80">很不错的包包很不错的包包很不错的包包很不错的包包很不错的包包,很不错的包包很不错的包包很不错的包包很不错的包包很不错的包包,</p>
                      <div class="tg" style="position:absolute;right:0;bottom:10px">
                        <div class="iconfont font-mini">
                        &#xe8f7;
                        </div>
                        <div class="iconfont font-mini">
                        &#xe637;
                        </div>
                      </div>
                    </dd>
                    </dl>
                  </div>
                </el-col>
            </el-row>
        </div>
        <div class="">
          <div class="container block-center">
            <h4><span class="font-2x">相关推荐</span>
              <b class="color-dark padding-l-6">购买了该商品的人还买了这些</b>
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
        <div id="goodsDetail" class="margin-tb-10 clear-float">
          <el-row>
            <el-col :span="4">
              <div class="aside">
                  <div class="popBox clear-float margin-tb-20 margin-rl-6 padding-10">
                      <div class="imgbar text-center">
                        <a class="imgwrap" target="_blank" title="兰多旗舰店" href="http://mall.kaola.com/12269">
                          <img src="//pop.nosdn.127.net/de862484-5295-4d88-b2ef-d2a9b532312f?imageView&amp;thumbnail=90x0&amp;quality=85"></a>
                      </div>
                      <div class="namebar text-center">
                        <a target="_blank" title="兰多旗舰店" href="http://mall.kaola.com/12269">兰多旗舰店</a>
                      </div>
                      <div class="slogo text-center">
                        <img src="//pop.nosdn.127.net/91797300-7353-4884-bd18-ac889b86b11e?imageView&thumbnail=16x0&quality=85" data-title="考拉精选商家" alt="">
                        <img src="//pop.nosdn.127.net/58c408de-d6d1-40f2-a54d-23b49baa5768?imageView&thumbnail=16x0&quality=85" alt="">
                        <p class="goshop">
                        <a href="#">进店看看</a>
                        </p>
                      </div>
                  </div>
              </div>
            </el-col>
            <el-col :span="20">
              <div class="margin-t-20">
                <el-tabs v-model="activeName2"  type="border-card" @tab-click="handleClick">
                  <el-tab-pane label="商品详情" name="first">
                    <div>
                      <div id="goodsInfoBox">
                        <div class="clear-float">
                          <ul class="goods_parameter" v-for="item in goodsInfo">
                            <li class="pull-left padding-l-15 padding-tb-5">{{item.title}}</li>
                          </ul>
                        </div>
                        <div class="padding-rl-10">
                          <a href="#" class="color-primary">
                            收起 <i class="iconfont font-mini">&#xe8f7;</i>
                          </a>
                        </div>
                        <div class="tips border-1px-t border-1px-b padding-tb-4">
                          <div class="iconfont color-danger font-3x padding-rl-15 padding-tb-6 pull-left">
                            &#xe606;
                          </div>
                          <div class="cont">
                            <p class="cont-title font-2x color-dark">假1陪10</p>
                            <p class="cont-info">网易考拉海购每一件商品都通过严苛的品质把关，保障正品，保障品质。特推出 “假一赔十” 的正品保障政策，杜绝一切假货，让您无忧购物。</p>
                          </div>
                        </div>
                        <div class="ImgInfoBox">
                          <div class="text-center">
                            <img class="clear-float margin-t-20" v-for="item in Imagers" :src="item.src" alt="">
                          </div>
                        </div>
                      </div>
                      <div id="playVideo" class="packdate text-center">
                        <img v-for="item in packdate" :src="item.src"  alt="">
                        <p>
                          <img src="//haitao.nos.netease.com/2883cf83481c46db82b588a4a6cfc5d5.jpg?v=201704191837" alt="">
                          <video style="width:710px;margin-left:-3px" controls="true" loop="loop" src="//flv.bn.netease.com/videolib3/1703/16/dnwLS2333/SD/dnwLS2333-mobile.mp4" poster="//haitao.nos.netease.com/dfe4f237d48c4a0c997896af90d3031f.png">
                          </video>
                        </p>
                      </div>
                      <div class="priceintro margin-tb-20 border-1px">
                        <div class="container block-center IntroText padding-tb-10">
                          <h4>价格说明:</h4>
                          <ol class="color-dark">
                            <li class="padding-tb-4" v-for="item in priceintro">{{item.text}}</li>
                          </ol>
                        </div>
                      </div>
                      <div id="userRating" class="rating border-1px ">
                        <div class="commentinfo clear-float padding-10 block-center tab-90">
                          <div class="comminfo pull-left margin-t-20">
                            <el-rate v-model="rate" disabled  text-color="#ff9900" show-text text-template="{value}"></el-rate>
                          </div>
                          <div class="beanintro pull-right border-1px-l padding-l-10">
                            <p class="">评价送豆豆</p>
                            <p>精华评价可获得40拉豆</p>
                            <div class="">
                              <span><a href="#">发表评价</a></span>
                              <span>|</span>
                              <span><a href="#">豆豆使用说明</a></span>
                            </div>
                          </div>
                        </div>
                        <div class="bg-gray padding-tb-15">
                          <div class="tab-90 block-center clear-float">
                            <ul class="rateNav">
                              <li class="pull-left padding-rl-6"><el-radio class="radio" size="small" v-model="radio" label="1">全部 <span>2492</span></el-radio></li>
                              <li class="pull-left padding-rl-6"><el-radio class="radio" size="small" v-model="radio" label="2">晒图 <span>242</span></el-radio></li>
                              <li class="pull-left padding-rl-6"><el-radio class="radio" size="small" v-model="radio" label="3">追评 <span>100</span></el-radio></li>
                              <li class="pull-right">
                                <el-checkbox v-model="checkbox">有内容的评价</el-checkbox>
                                <span><a href="#">查看所有的评价</a></span>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="margin-t-10">
                          <ul>
                            <li v-for="item in 2" class="border-1px-b-x margin-tb-10">
                              <div class="tab-90 comwrap block-center ">
                                <el-row>
                                  <el-col :span="2">
                                    <img class="comwrapIcon" src="//haitao.nos.netease.com/2016111708490877cac1c4b5c54ecd881191808736f43f.jpeg?imageView&thumbnail=40z40" alt=""></el-col>
                                  <el-col :span="18">
                                    <div class="clear-float">
                                      <ul>
                                        <li>
                                          <div class="">
                                            <i class="el-icon-star-on color-danger" v-for="item in 5"></i>
                                            <span class="padding-l-4">图案：纯色 款式：双肩包 规格：1个装 颜色：蓝色</span>
                                          </div>

                                        </li>
                                        <li>
                                            <p class="margin-tb-10">
                                            <span class="SLabel">精华评论</span>
                                            质量很好，自重有点重，貌似红蓝款和米色不同料子，应该防水，内部五个分格，其中一个保温的，可以放奶瓶或者焖烧杯，个人觉得分格不是太合理，除了保温隔其他都比较小，放放纸巾口水巾小湿巾还行，至少应该再有一到2个大隔袋会更好，可以放放尿不湿隔尿垫大包湿巾等。。
                                            </p>
                                        </li>
                                        <li>
                                          <div class="">
                                            <a href="#" title="点击预览" class="">
                                              <img src="//haitao.nos.netease.com/20161126142432e29e86ef19524548bdd3e26248f41204.jpeg?imageView&thumbnail=75x75&quality=85" alt="">
                                            </a>
                                          </div>

                                        </li>
                                      </ul>
                                    </div>
                                  </el-col>
                                  <el-col :span="4">
                                    <div class="text-center margin-tb-20 color-dark">
                                      <div class="padding-tb-4">
                                        <el-button  icon="upload" size="mini">点赞</el-button>
                                      </div>
                                      <div class="padding-tb-20">
                                        来自iOS手机版
                                      </div>
                                      <div>
                                        04.20
                                      </div>
                                    </div>
                                  </el-col>
                                </el-row>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div id="Pagination" class="text-right margin-t-10">
                        <el-pagination layout="prev, pager, next" :total="1000"></el-pagination>
                      </div>
                      <div id="CollapseBox">
                        <h2 class="padding-l-15 padding-tb-15">考拉答疑</h2>
                        <div>
                            <el-collapse>
                            <el-collapse-item title="1. 缓解孕吐小技巧 " name="1">
                              <dl class="">
                                <dt>1、饮食方面</dt>
                                <dd>（1）避开令您觉得恶心的食物；</dd>
                              </dl>
                            </el-collapse-item>
                            <el-collapse-item title="2.生活小常识 " name="2">
                              <dl class="">
                                <dt>1、饮食方面</dt>
                                <dd>（1）避开令您觉得恶心的食物；</dd>
                              </dl>
                            </el-collapse-item>
                          </el-collapse>
                        </div>
                      </div>
                      <div class="priceintro bg-gray">
                        <div class="container block-center IntroText padding-tb-10">
                          <h4>购买须知:</h4>
                          <ol class="color-dark">
                            <li class="padding-tb-4" v-for="item in priceintro">{{item.text}}</li>
                          </ol>
                        </div>
                      </div>
                    </div>
                  </el-tab-pane>
                  <el-tab-pane label="用户评价" name="second">用户评价</el-tab-pane>
                  <el-tab-pane label="客服答疑" name="third">角色管理</el-tab-pane>
                </el-tabs>
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
          num6:1,
          value5:3.7,
          item:"1",
          activeName2: 'first',
          goodsInfo:[
            {title:"商品品牌：landou 兰多"},
            {title:"品牌国：中国"},
            {title:"包袋大小：大"},
            {title:"款式：双肩包"},
            {title:"产品材质：牛津纺"},
            {title:"风格：日系　休闲风　简约　学院"},
            {title:"产地：中国"},
            {title:"内部结构：其他"},
            {title:'规格：1个装'},
            {title:"颜色：米色　红色　墨绿　蓝色"},
            {title:"图案：纯色"},
            {title:"款式：双肩包"}
          ],
          Imagers:[
            {src:"//pop.nosdn.127.net/4565f279-c43b-4af6-a5b0-26ae93935841?imageView&thumbnail=710x0&quality=85"},
            {src:"//pop.nosdn.127.net/05290707-7d53-47d4-bee0-2018c9bf0d15?imageView&thumbnail=710x0&quality=85"},
            {src:"//pop.nosdn.127.net/7ed3bd83-c5fd-4199-bf71-7fc0b02ceca1?imageView&thumbnail=710x0&quality=85"},
            {src:"//pop.nosdn.127.net/e7232406-2296-43e3-90d1-d593d4a7fe37?imageView&thumbnail=710x0&quality=85"},
          ],
          packdate:[
            {src:'//mm.bst.126.net/images/product/packdate.png?v=201704191837'},
            {src:'//mm.bst.126.net/images/product/notice.png?v=201704191837'},
          ],
          priceintro:[
            {text:"划线价、参考价：商品展示的划线价或参考价可能是品牌专柜价、商品吊牌价或由品牌供应商提供的正品零售价（如厂商指导价、建议零售价等）或该商品在考拉上曾经展示过的销售价；由于地区、时间的差异性和市场行情波动，品牌专柜标价、商品吊牌价等可能会与您购物时展示的不一致，该价格仅供您参考。"},
            {
              text:"促销价：如无特殊说明，促销价是销售商在参考价基础上给予的优惠价格。如有疑问，您可以在购买前与客服联系。"
            },
            {
              text:"价格异常：因可能存在系统缓存、页面更新延迟等不确定性情况，导致价格显示异常，商品具体售价请以订单结算页价格为准。如您发现异常情况出现，请立即联系我们补正，以便您能顺利购物。"
            }
          ],
          rate:3.7,
          radio: '1',
          checkbox:true,
          liveInfo:[
            {title:'生活常识'}
          ]
        }
    },
    methods:{
      handleClick(tab,event){
         console.log(tab, event);
      },
      leftClick(){
        alert("left")
      },
      rightClick(){
        alert("right")
      },
      showBorder:function(){
        var vm=this;
      }
    }
}
</script>
<style media="less" scoped>
a:hover{
    text-decoration: underline;
}
.border-1px-t-d{
  border-top:1px dotted #ddd;
}
.border-1px-b-d{
  border-bottom: 1px dotted #ddd;
}
.showImgBox{
  position:relative;
  width: 400px;
  height: 400px;
}
.Carousel{
  position: relative;
}
.litimg_box{
    float:left;
}
.litimg_box li{
  height: 68px;
  overflow: hidden;
  margin:0 7px;
}
.scrollBtn{
  border:1px solid #ddd;
  padding:10px 6px;
  width: 26px;
  height: 48px;
  text-align: center;
  line-height: 48px;
}
.scrollBtn:hover{
  border:1px solid #f00;
  color:#f00;
}

.leftClick{
  float:left;
}
.rightClick{
  float:right;
  right: 0;
  top:0;
}
.magnifiter {
  position:absolute;
  bottom: 0;
  right: 10px;
}
.country>img{
 width: 24px;
 height: 24px;
 vertical-align: middle;
}
.line-title{
  width: 75px;
  height: 18px;
  float:left;
  padding-left: 10px;
}
.priceBox{
  border-top:1px dotted #ddd;
  border-bottom:1px dotted #ddd;
  background-color:#f9f9f9;
}
.SLabel{
  background-color: #F68587;
  width: 26px;
  padding:2px;
  margin-left: 5px;
  vertical-align:5px;
  color:#fff;
}

.marketPrice{
  vertical-align: 5px;
}
.newListWrap {
  width: 206px;
  height: 306px;
  border: 1px solid #eee;
  margin: 0 0 10px 10px;
}

.popBox{
  border:1px solid #eaeaea;
}
.goods_parameter{
  width: 100%;
}
.goods_parameter li{
  float: left;
  width: 30%;
}
.IntroText{
  width: 90%;
}
.tab-90{
  width: 90%;
}
.comwrapIcon{
  border-radius: 50%;
}


</style>
