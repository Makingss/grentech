<template>
  <div class="home content">
    <swiper :list="swiper_list" dots-position="center"></swiper>
    <router-link to="/test" class="color-danger" v-if="false">test 测试</router-link>
    <div class="cat-goods">
      <divider class="padding-10">产品分类</divider>
      <div class="cat-cover link-img" v-if="false">
        <img :src="category.cover.img" alt="">
      </div>
      <flexbox :gutter="0" wrap="wrap">
        <flexbox-item :span="1/3" style="padding:5px 2px 10px 2px;" v-for="(item,index) in scroller_data.data" :data-i="index>=5&&index<12" v-if="index>=6&&index<12" class="padding-tb-6 border-box cell-list-3">
          <router-link :to="{name:'goods',query:{goods_id:item.goods_id,item_index:index}}" class="link-img">
            <div>
              <img :src="item.images?item.images.url:'/static/grentech/default.jpg'" alt="">
            </div>
            <div class="text-center">
              <div class="item-title color-success line-ellispse-2">
                {{item.name}}
              </div>
              <div class="item-subtitle color-gray" v-if="false">
                <span>{{item.desc||"暂无描述"}}</span>
              </div>
            </div>
          </router-link>
        </flexbox-item>
      </flexbox>
    </div>
    <div class="hot-sales">
      <divider class="padding-rl-10">热销产品</divider>
      <div class="cat-cover link-img" v-if="false">
        <img :src="hot_sales.cover.img" alt="">
      </div>
      <flexbox :gutter="0" wrap="wrap">
        <flexbox-item style="padding:5px 2px 10px 2px;" :span="1/3" v-for="(item,index) in scroller_data.data" :data-i="index<5" v-if="index<5" class="padding-tb-6 border-box cell-list-3">
          <router-link :to="{name:'goods',query:{goods_id:item.goods_id,item_index:index}}" class="link-img">
            <div>
              <img :src="item.images?item.images.url:'/static/grentech/default.jpg'" alt="">
            </div>
            <div class="text-center">
              <div class="item-title color-success line-ellispse-2">
                {{item.name}}
              </div>
              <div class="item-subtitle color-gray" v-if="false">
                <span>{{item.desc||"暂无描述"}}</span>
              </div>
            </div>
          </router-link>
        </flexbox-item>
      </flexbox>
    </div>
    <div>
      <divider class="padding-10">推荐商品</divider>
      <div class="link-img">
        <img :src="scroller_data.cover.img" alt="">
      </div>
    </div>
    <div class="scroll-content infinite-scroll container padding-b-20">
  
      <card-list v-for="(item,index) in scroller_data.data" class="border-1px-b">
        <router-link :to="{name:'goods',query:{goods_id:item.goods_id,item_index:index}}" class="block" slot="card-media">
          <img :src="item.images?item.images.url:'/static/grentech/default.jpg'" alt="">
        </router-link>
        <router-link :to="{name:'goods',query:{goods_id:item.goods_id,item_index:index}}" slot="card-title">
          <div class="item-title">{{item.name}}</div>
          <div v-if="!!item.new_electrics&&item.new_electrics.has_item">
            <div class="item-title line-ellispse-2 font-bold" v-if="item.new_electrics.workingband.length">
              频段: <span>{{item.new_electrics.workingband.join("/")}}/</span> M
            </div>
            <div class="item-title line-ellispse-2 font-bold" v-if="item.new_electrics.beamgain.length">
              增益: <span>{{item.new_electrics.beamgain.join("/")}}/</span> dBi
            </div>
            <div class="item-title line-ellispse-2 font-bold" v-if="item.new_electrics.dipangle.length">
              电下倾: <span>{{item.new_electrics.dipangle.join("/")}}/</span> °
            </div>
          </div>
          <div v-if="!!item.new_electrics_inte&&item.new_electrics_inte.has_item">
            <div class="item-title line-ellispse-2 font-bold" v-if="item.new_electrics_inte.workingband.length">
              频段: <span>{{item.new_electrics_inte.workingband.join("/")}}/</span> M
            </div>
            <div class="item-title line-ellispse-2 font-bold" v-if="item.new_electrics_inte.beamgain.length">
              增益: <span>{{item.new_electrics_inte.beamgain.join("/")}}/</span> dBi
            </div>
            <div class="item-title line-ellispse-2 font-bold" v-if="item.new_electrics_inte.dipangle.length">
              电下倾: <span>{{item.new_electrics_inte.dipangle.join("/")}}/</span> °
            </div>
          </div>
  
        </router-link>
        <div class="item-title line-ellispse-2 color-gray">
          SAP: {{item.bn}}
        </div>
        <div class="item-subtitle color-danger padding-t-4" slot="card-subtitle">¥{{item.mktprice||'暂无'}}</div>
      </card-list>
      <div class="load-more text-center" v-show="loading">
        <spinner type="circles"></spinner>
      </div>
      <div class="padding-tb-20 text-center" v-show="load_all"><span class="iconfont">&#xe62b;</span>已加载完毕...</div>
  
    </div>
  
  </div>
</template>

<script>
  //import {loader} from '../util/util.js'
  import api from '../api'
  import CardList from './card-list'
  import {
    Swiper,
    Flexbox,
    FlexboxItem,
    Scroller,
    Spinner,
    Divider
  } from 'vux'
  export default {
    name: 'home',
    data() {
      return {
        loading: false,
        scrollTop: 0,
        load_all: false,
        swiper_list: [{
          url: '/list?type_id=3',
          img: 'https://static.vux.li/demo/1.jpg',
          title: '测试轮播标题1'
        }, {
          url: '/list?type_id=3',
          img: 'https://static.vux.li/demo/2.jpg',
          title: '测试轮播标题2'
        }, {
          url: '/list?type_id=3',
          img: 'https://static.vux.li/demo/3.jpg',
          title: '测试轮播标题3'
        }, ],
        uuid: '',
        category: {
          cover: {
            url: '',
            img: '/static/grentech/20161118174329771.jpg',
          },
          data: [
  
          ]
        },
        hot_sales: {
          cover: {
            url: '/goods?goods_id=62&item_index=0',
            img: '/static/grentech/20170116185915616-(1).jpg',
          },
          data: [
  
          ]
        },
        scroller_data: {
          cover: {
            url: '',
            img: '/static/grentech/201612070950019218.jpg'
          },
          current_page: 0,
          from: 0,
          last_page: 0,
          per_page: 0,
          to: 0,
          total: 0,
          data: [
  
          ]
        }
      }
    },
    computed: {
      length: function() {
        return this.scroller_data.data.length;
      }
    },
    mounted: function() {
      var self = this;
      $(".content").on('scroll', function() {
        //计算位置关系
        //console.log(this);
        self.handle_scroll($(this));
      })
    },
    created: function() {
      this.get_home_list({});
  
    },
    methods: {
      handle_scroll: function(el) {
        //console.log(el);
        var self = this;
        let height = parseFloat(el.height());
        let scrollTop = parseFloat(el.scrollTop());
        //console.log(height,scrollTop);
        var view_height = height + scrollTop;
        var scrollHeight = el[0].scrollHeight;
  
        // console.log(view_height,el[0].scrollHeight);
        if (scrollHeight - view_height < 40) {
          // console.log(scrollHeight-view_height);
          //调用加载功能
          self.loadMore();
          return;
        }
      },
      get_home_list: function(query, callback) {
        var self = this;
        api.getGoodsData({
          relations: ["images", "image_attach", "mechanics", "goods_ports", "assemblies", "standardfits", "electrics", "electrics_inte"],
          parameters: query,
          per_page: 10
        }).then(res => {
          if (res.data.data && res.data.data.length > 0) {
            self.handle_res_data(res.data)
            // self.
          }
          // callback();
        })
      },
      handle_res_data: function(res_data) {
        var self = this;
        var new_arr = [];
        // console.log
        for (var n = 0; n < res_data.data.length; n++) {
          var new_obj = {};
          for (var key in res_data.data[n]) {
            if (key == "electrics" || key == "electrics_inte") {
              new_obj['new_' + key] = {};
              for (var i = 0; i < res_data.data[n][key].length; i++) {
                //遍历 key 值,相同做数据合并
                for (var k in res_data.data[n][key][i]) {
                  if (k == "created_at" || k == "id" || k == "updated_at" || k == "type" || k == "goods_id") {
                    continue;
                  }
  
                  if (!!res_data.data[n][key][i][k]) {
                    new_obj['new_' + key]["has_item"] = true;
                    if (!new_obj['new_' + key][k]) {
                      new_obj['new_' + key][k] = [];
                    }
                    new_obj['new_' + key][k].push(res_data.data[n][key][i][k]);
                  }
                }
              }
            } else {
              new_obj[key] = res_data.data[n][key];
            }
          }
          new_arr.push(new_obj);
        }
        console.log("+++++++++++++++");
        console.log(new_arr);
        
        // self.scroller_data.data = self.scroller_data.data.concat(res_data.data);
        self.scroller_data.data = self.scroller_data.data.concat(new_arr);
        self.scroller_data.current_page = res_data.current_page;
        self.scroller_data.from = res_data.from;
        self.scroller_data.last_page = res_data.last_page;
        self.scroller_data.per_page = res_data.per_page;
        self.scroller_data.next_page_url = res_data.next_page_url;
        self.scroller_data.to = res_data.to;
        self.scroller_data.total = res_data.total;
        if (!res_data.next_page_url) {
          self.$vux.toast.show({
            type: 'text',
            text: '已加载完毕...'
          });
          self.load_all = true;
        }
      },
      loadMore: function() {
        var self = this;
        if (this.loading) {
          return
        }
        console.log("触发加载");
        this.loading = true;
        let scroller = $(".container");
        if (!!self.scroller_data.next_page_url) {
          api.get_page_data(self.scroller_data.next_page_url, {
            relations: ["images", "image_attach", "mechanics", "goods_ports", "assemblies", "standardfits", "electrics", "electrics_inte"],
            per_page: 10
          }).then(res => {
            console.log(res);
            self.loading = false;
            if (res.data.data && res.data.data.length > 0) {
              self.handle_res_data(res.data)
              // self.
            }
          });
        } else {
          self.loading = false;
        }
      }
    },
    components: {
      Swiper,
      Flexbox,
      FlexboxItem,
      Scroller,
      Spinner,
      Divider,
      CardList
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .scroll-content {
    width: 100%;
    overflow: hidden;
  }
</style>
