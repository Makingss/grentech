<template lang="html">
  <div class="template-content">
    <div class="search-icon text-center" @click="toggleType">
      <span class="iconfont font-3x color-success">&#xe62a;</span>
    </div>
    <search v-model="search_input" position="static" top="0"  class="list-search border-box"></search>
    <div class="content list">

      <scroller lock-x use-pullup height="100%"
        ref="listScroll"
        :pullup-config="pullupConfig"
      class="x-scroller-container">
        <div class="">
          <flexbox wrap="wrap" :gutter="0" class="scroll-content" v-if="type=='large'">
            <flexbox-item :data-currentpage="goods_list.current_page" :data-lastpage="goods_list.last_page"  :data-total="goods_list.total"  :data-perpage="goods_list.per_page" :data-i="index%2"
             v-for="(item,index) in goods_list.data" :span="1/2" class="link-img padding-tb-6 border-box" :class="{'padding-r-2':index%2==0,'padding-l-2':index%2==1}" >
              <router-link to="/goods" class="block">
                <!-- <div>
                  <img :src="item.img" alt="">
                </div> -->
                <div class="padding-rl-10">
                  <div class="item-title line-ellispse-2">
                    {{item.name}}
                  </div>
                  <div class="item-subtitle color-danger">
                    ￥{{item.price}}
                  </div>
                </div>
              </router-link>
            </flexbox-item>
          </flexbox>
          <!-- <card-list class="2"
           v-for="(item,index) in goods_data"
           :data-currentpage="current_page"
           :data-lastpage="last_page"
           :data-total="total"
           :data-perpage="per_page"
           v-if="type=='medium'">
            <router-link :to="item.url" class="block" slot="card-media">
              <img :src="item.img" alt="">
            </router-link>
            <router-link :to="item.url" slot="card-title">
              <div class="item-title">{{item.name}}</div>
            </router-link>
              <div class="item-subtitle color-danger" slot="card-subtitle">¥{{item.price}}</div>
          </card-list> -->
          <div class="spinner text-center" slot="pull-up" v-if="true">
            <spinner type="circles"></spinner>
          </div>
        </div>
      </scroller>
    </div>
  </div>
</template>
  <!-- @on-pullup-loading="load" -->
<script>
import {
  mapState,
  mapActions
} from 'vuex'
import CardList from './card-list'
import {
  Flexbox,
  FlexboxItem,
  Search,
  Scroller,
  Spinner
} from 'vux'
const list_type = ['small', 'medium', 'large'] //small--小图, medium--横向  large --并排
export default {
  name: 'list',
  data: function() {
    return {
      demo4Value: {
        pullupStatus: 'default'
      },
      loading: false,
      type: 'medium',
      search_input: '',
      pullupConfig: {
        content: '上拉加载更多',
        downContent: '松开进行加载',
        upContent: '上拉加载更多',
        loadingContent: '加载中...'
      },
      goods_list:{
        "total": 4,
        "per_page": 15,
        "current_page": 1,
        "last_page": 1,
        "next_page_url": null,
        "prev_page_url": null,
        "from": 1,
        "to": 4,
        "data": [{
            "goods_id": 2,
            "jooge_goods_id": "",
            "bn": "30190600488",
            "name": "测试商品",
            "price": "200.00",
            "type_id": 1,
            "cat_id": 1,
            "brand_id": 1,
            "marketable": 1,
            "store": 20,
            "fav": 0,
            "notify_num": 0,
            "uptime": null,
            "downtime": null,
            "last_modify": null,
            "p_order": 2,
            "sortnum": 999999999,
            "d_order": 30,
            "score": null,
            "cost": "0.00",
            "mktprice": null,
            "weight": null,
            "g_weight": null,
            "unit": null,
            "brief": null,
            "goods_type": "normal",
            "image_default_id": null,
            "udfimg": "false",
            "thumbnail_pic": null,
            "small_pic": null,
            "big_pic": null,
            "content": "<p><img src=\"http://grentech.app/uploads/image/20170224/e2bec7e22676605d033aeb9990b59d8c.jpg\" style=\"\" title=\"/uploads/image/20170224/e2bec7e22676605d033aeb9990b59d8c.jpg\"></p>\r\n<p><img src=\"http://grentech.app/uploads/image/20170224/58065c0fee7b2a50a593e75ea04468d0.jpg\" style=\"\" title=\"/uploads/image/20170224/58065c0fee7b2a50a593e75ea04468d0.jpg\"></p>\r\n<p><img src=\"http://grentech.app/uploads/image/20170224/209c6aa45c6145b53a17cf76bae98076.jpg\" style=\"\" title=\"/uploads/image/20170224/209c6aa45c6145b53a17cf76bae98076.jpg\"></p>\r\n<p><br></p>\r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n ",
            "store_place": null,
            "min_buy": null,
            "package_scale": null,
            "package_unit": null,
            "package_use": null,
            "score_setting": "number",
            "store_prompt": null,
            "nostore_sell": "0",
            "goods_setting": null,
            "spec_desc": null,
            "params": null,
            "disabled": "false",
            "rank_count": 0,
            "comments_count": 0,
            "view_w_count": 0,
            "view_count": 0,
            "count_stat": null,
            "buy_count": 0,
            "buy_w_count": 0,
            "barcode": "0",
            "wx_image_id": null,
            "ipad_image_id": null,
            "is_line": "0",
            "fx_1_price": "0",
            "fx_2_price": "0",
            "fx_3_price": "0",
            "p_21": null,
            "goods_status": "0",
            "modify_status": "0",
            "price_modify": null,
            "good_form": null,
            "buy_limit": 0,
            "taxrate": null,
            "tip_id": 0,
            "pmt_text": "",
            "pmt_color": null,
            "goods_profit_ratio": 0,
            "is_pkg": "0",
            "pkg_info": null,
            "from_time": null,
            "to_time": null,
            "is_starbuy": "0",
            "rule_id": 0,
            "created_at": "2017-02-24 21:32:59",
            "updated_at": "2017-03-12 18:02:52",
            "goods_prot": null
          },
          {
            "goods_id": 10,
            "jooge_goods_id": "",
            "bn": "30190600520",
            "name": "XXpol820~960/1710~2170 65°12/15dBi T2~16/2~12",
            "price": "0.00",
            "type_id": 1,
            "cat_id": 1,
            "brand_id": 1,
            "marketable": 1,
            "store": 0,
            "fav": 0,
            "notify_num": 0,
            "uptime": null,
            "downtime": null,
            "last_modify": null,
            "p_order": 30,
            "sortnum": 999999999,
            "d_order": 30,
            "score": null,
            "cost": "0.00",
            "mktprice": null,
            "weight": null,
            "g_weight": null,
            "unit": null,
            "brief": null,
            "goods_type": "normal",
            "image_default_id": null,
            "udfimg": "false",
            "thumbnail_pic": null,
            "small_pic": null,
            "big_pic": null,
            "content": "<pre style=\"background-color:#272822;color:#f8f8f2;font-family:'Consolas';font-size:10.5pt;\"><span style=\"color:#0f9cff;\">$request</span></pre>\r\n<p><img src=\"/uploads/image/20170302/58b791b79bbf8_59o.jpg\" alt=\"d5e35d9a1f50753ea2028f1f5e812ac65ecc3bae\" style=\"max-width:100%;\"><img src=\"/uploads/image/20170302/58b791b7aaa44_59o.jpg\" alt=\"1111111\" style=\"max-width: 100%;\"><img src=\"/uploads/image/20170302/58b791b7d137d_59o.jpg\" alt=\"Chrysanthemum\" style=\"max-width: 100%;\"><br></p>\r\n<p><br></p>\r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n ",
            "store_place": null,
            "min_buy": null,
            "package_scale": null,
            "package_unit": null,
            "package_use": null,
            "score_setting": "number",
            "store_prompt": null,
            "nostore_sell": "0",
            "goods_setting": null,
            "spec_desc": null,
            "params": null,
            "disabled": "false",
            "rank_count": 0,
            "comments_count": 0,
            "view_w_count": 0,
            "view_count": 0,
            "count_stat": null,
            "buy_count": 0,
            "buy_w_count": 0,
            "barcode": "0",
            "wx_image_id": null,
            "ipad_image_id": null,
            "is_line": "0",
            "fx_1_price": "0",
            "fx_2_price": "0",
            "fx_3_price": "0",
            "p_21": null,
            "goods_status": "0",
            "modify_status": "0",
            "price_modify": null,
            "good_form": null,
            "buy_limit": 0,
            "taxrate": null,
            "tip_id": 0,
            "pmt_text": "",
            "pmt_color": null,
            "goods_profit_ratio": 0,
            "is_pkg": "0",
            "pkg_info": null,
            "from_time": null,
            "to_time": null,
            "is_starbuy": "0",
            "rule_id": 0,
            "created_at": null,
            "updated_at": "2017-03-11 00:25:21",
            "goods_prot": null
          },
          {
            "goods_id": 38,
            "jooge_goods_id": "",
            "bn": "301906000114",
            "name": "Xpol820-960 65°15dBI T2~16",
            "price": "0.00",
            "type_id": 1,
            "cat_id": 1,
            "brand_id": 1,
            "marketable": 1,
            "store": 0,
            "fav": 0,
            "notify_num": 0,
            "uptime": null,
            "downtime": null,
            "last_modify": null,
            "p_order": 30,
            "sortnum": 999999999,
            "d_order": 30,
            "score": null,
            "cost": "0.00",
            "mktprice": null,
            "weight": null,
            "g_weight": null,
            "unit": null,
            "brief": null,
            "goods_type": "normal",
            "image_default_id": null,
            "udfimg": "false",
            "thumbnail_pic": null,
            "small_pic": null,
            "big_pic": null,
            "content": "<p><img src=\"/uploads/content/20170311/58c369272e6a5_07o.jpg\" alt=\"1111111\" style=\"max-width:100%;\"><br></p><p><br></p>",
            "store_place": null,
            "min_buy": null,
            "package_scale": null,
            "package_unit": null,
            "package_use": null,
            "score_setting": "number",
            "store_prompt": null,
            "nostore_sell": "0",
            "goods_setting": null,
            "spec_desc": null,
            "params": null,
            "disabled": "false",
            "rank_count": 0,
            "comments_count": 0,
            "view_w_count": 0,
            "view_count": 0,
            "count_stat": null,
            "buy_count": 0,
            "buy_w_count": 0,
            "barcode": "0",
            "wx_image_id": null,
            "ipad_image_id": null,
            "is_line": "0",
            "fx_1_price": "0",
            "fx_2_price": "0",
            "fx_3_price": "0",
            "p_21": null,
            "goods_status": "0",
            "modify_status": "0",
            "price_modify": null,
            "good_form": null,
            "buy_limit": 0,
            "taxrate": null,
            "tip_id": 0,
            "pmt_text": "",
            "pmt_color": null,
            "goods_profit_ratio": 0,
            "is_pkg": "0",
            "pkg_info": null,
            "from_time": null,
            "to_time": null,
            "is_starbuy": "0",
            "rule_id": 0,
            "created_at": null,
            "updated_at": "2017-03-11 11:04:10",
            "goods_prot": null
          },
          {
            "goods_id": 39,
            "jooge_goods_id": "",
            "bn": "301906000582",
            "name": "xpol17010~2690 65°17dBi T2~12",
            "price": "0.00",
            "type_id": 1,
            "cat_id": 1,
            "brand_id": 1,
            "marketable": 1,
            "store": 0,
            "fav": 0,
            "notify_num": 0,
            "uptime": null,
            "downtime": null,
            "last_modify": null,
            "p_order": 30,
            "sortnum": 999999999,
            "d_order": 30,
            "score": null,
            "cost": "0.00",
            "mktprice": null,
            "weight": null,
            "g_weight": null,
            "unit": null,
            "brief": null,
            "goods_type": "normal",
            "image_default_id": "3df0f58572516b6b9824d1301afbe8cf",
            "udfimg": "false",
            "thumbnail_pic": null,
            "small_pic": null,
            "big_pic": null,
            "content": "<p><img src=\"/uploads/content/20170311/58c2d09d348d1_17o.jpeg\" alt=\"\" style=\"max-width:100%;\"><img src=\"/uploads/content/20170311/58c2d09fa31e8_19o.jpeg\" alt=\"\" style=\"line-height: 1; max-width: 100%;\"><br></p>\r\n<p><br></p>\r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\n ",
            "store_place": null,
            "min_buy": null,
            "package_scale": null,
            "package_unit": null,
            "package_use": null,
            "score_setting": "number",
            "store_prompt": null,
            "nostore_sell": "0",
            "goods_setting": null,
            "spec_desc": null,
            "params": null,
            "disabled": "false",
            "rank_count": 0,
            "comments_count": 0,
            "view_w_count": 0,
            "view_count": 0,
            "count_stat": null,
            "buy_count": 0,
            "buy_w_count": 0,
            "barcode": "0",
            "wx_image_id": null,
            "ipad_image_id": null,
            "is_line": "0",
            "fx_1_price": "0",
            "fx_2_price": "0",
            "fx_3_price": "0",
            "p_21": null,
            "goods_status": "0",
            "modify_status": "0",
            "price_modify": null,
            "good_form": null,
            "buy_limit": 0,
            "taxrate": null,
            "tip_id": 0,
            "pmt_text": "",
            "pmt_color": null,
            "goods_profit_ratio": 0,
            "is_pkg": "0",
            "pkg_info": null,
            "from_time": null,
            "to_time": null,
            "is_starbuy": "0",
            "rule_id": 0,
            "created_at": null,
            "updated_at": "2017-03-15 10:48:06",
            "goods_prot": null
          }
        ]
      }
    }
  },
  components: {
    Flexbox,
    FlexboxItem,
    Search,
    CardList,
    Scroller,
    Spinner
  },
  created: function() {
    //console.log($(".page-list .weui_search_bar:before"));
    // this.GETGOODSLIST();
  },
  computed: mapState({
    goods_data: state => state.goods.goods_list.data,
    current_page: state => state.goods.goods_list.current_page,
    last_page: state => state.goods.goods_list.last_page,
    total: state => state.goods.goods_list.total,
    from: state => state.goods.goods_list.from,
    to: state => state.goods.goods_list.to,
    per_page: state => state.goods.goods_list.per_page
  }),
  methods: {
    ...mapActions(['GETGOODSLIST']),

    toggleType: function() {
      //console.log("切换");
      this.type = this.type == 'medium' ? 'large' : 'medium';
    },
    load: function() {
      console.log("上拉加载");
      setTimeout(() => {
        this.list_data.push({
          url: '/goods',
          name: 'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          img: 'http://mall.yingerfashion.com/public/images/cd/6a/4b/1a799542c9d0a4919d14dba60da2e2246d799cbe.jpg',
          title: '',
          price: '276.00',
          mktprice: '1380.00'
        }, {
          url: '/goods',
          name: 'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          img: 'http://mall.yingerfashion.com/public/images/cd/6a/4b/1a799542c9d0a4919d14dba60da2e2246d799cbe.jpg',
          title: '',
          price: '276.00',
          mktprice: '1380.00'
        })
        setTimeout(() => {
          this.$refs.listScroll.donePullup();
        }, 100)

      }, 2000)
    }
  }

}
</script>

<style scoped>
.list.content {
  overflow-y: scroll;
  height: 100%;
  padding-top: 0;
}

.list-search {
  position: static!important;
}

.list.content .scroll-content {
  padding-bottom: 0;
}

.search-icon {
  width: 38px;
  height: 44px;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 199;
}

.list-search {
  padding-left: 2.2rem;
  background-color: #EFEFF4;
}
</style>
