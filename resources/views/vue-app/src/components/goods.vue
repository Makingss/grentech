<template lang="html">
  <div class="goods content">
    <div style="height:100%">
      <swiper>
        <swiper-item v-for="(item,index) in goods_data_list.image_attach">
           <img :src="item.images.url" alt="">
        </swiper-item>
      </swiper>
      <flexbox :gutter="0" wrap="nowrap" class="bg-white">
        <flexbox-item class="padding-tb-6 padding-l-10 border-box" :span="9">
          <p class="line-ellispse-2">{{goods_data_list.name}}</p>
          <p class="color-danger">¥{{goods_data_list.price}}</p>
          <p class="color-gray">市场价:
            <s>{{goods_data_list.mktprice}}</s>
          </p>
        </flexbox-item>
        <flexbox-item :span="3" class="link-img padding-rl-6 border-box">
          <img src="/static/slice/code.jpg" alt="">
        </flexbox-item>
      </flexbox>
      <div class="padding-10 margin-tb-10 bg-white">
        <flexbox :gutter="0" wrap="nowrap">
          <flexbox-item :span="11">
            <p>颜色: <span>红色</span><span>藏蓝</span><span>黑色</span><span>粉红</span></p>
            <p>尺码: <span>38</span><span>39</span><span>40</span><span>42</span></p>
          </flexbox-item>
          <flexbox-item :span="1">
            <span class="iconfont">&#xe65f;</span>
          </flexbox-item>
        </flexbox>
      </div>
      <div class="margin-tb-10 padding-tb-6 padding-rl-10 bg-white">
        <x-button mini plain type="warn">优惠</x-button>
      </div>
      <div class="goods-desc" style="height:100%;padding-bottom:3rem;box-sizing:border-box">
        <tab v-model="index" active-color="#FB4F5B">
          <tab-item>商品详情</tab-item>
          <tab-item>主要参数</tab-item>
          <tab-item>服务信息</tab-item>
        </tab>
        <swiper v-model="index" :show-dots="false" class="goods-content-swiper">
          <swiper-item class="padding-10">
            <div v-html="goods_data_list.content"></div>
          </swiper-item>
          <swiper-item >
              <group title="端口" v-for="(item,index) in goods_data_list.goods_ports">
                <cell v-for="(item1,index1) in item" class="font-normal" :title="index1" :value="item1" v-if="!!item1">
                </cell>
              </group>
               <group title="电信号" v-for="(item,index) in goods_data_list.electrics">
                <cell v-for="(item1,index1) in item" class="font-normal" :title="index1" :value="item1" v-if="!!item1">
                </cell>
              </group>
              <group title="组合" v-for="(item,index) in goods_data_list.assemblies">
                <cell v-for="(item1,index1) in item" class="font-normal" :title="index1" :value="item1" v-if="!!item1">
                </cell>
              </group>
              <group title="标准" v-for="(item,index) in goods_data_list.standardfits">
                <cell v-for="(item1,index1) in item" class="font-normal" :title="index1" :value="item1" v-if="!!item1">
                </cell>
              </group>
               <group title="机械性能">
                <cell v-for="(item,index) in goods_data_list.mechanics" class="font-normal" :title="index" :value="item" v-if="!!item">
                </cell>
              </group>
          </swiper-item>
          <swiper-item class="padding-10">
            服务信息内容
          </swiper-item>
        </swiper>
      </div>
    </div>

  </div>
</template>

<script>
import api from '../api/index.js'
import {mapState,mapActions} from 'vuex'
  import {
    Swiper,
    Flexbox,
    FlexboxItem,
    XButton,
    Tab,
    TabItem,
    SwiperItem,
    Group,
    Cell
  } from 'vux'
  export default {
    name: 'goods',
    data: function () {
      return {
        index: 0,
        goods_id: 0,
        item_index: 0,
        page_goods_data: {},
        current_page: 0,
        temp_data:{},
        goods_data_list: {
          name: '',
          content: '',
          price: '',
          mktprice: '',
          image_attach:[],
        },
        from: 0,
        last_page: 0,
        per_page: 0,
        to: 0,
        total: 0,
      }
    },
    computed: mapState({
      goods_data_list:state => state.goods.goods_list.data[0]
    }),
    methods: {
      ...mapActions(['GETGOODSLIST']),
      init_goods_page: function (init_data) {
        // console.log()
        if (!!init_data.goods_list.data && init_data.goods_list.data.length) {
          var page_goods_data = init_data.goods_list;
          this.current_page = page_goods_data.current_page;
          this.goods_data_list = page_goods_data.data[this.item_index];
          this.from = page_goods_data.from;
          this.last_page = page_goods_data.last_page;
          this.per_page = page_goods_data.per_page;
          this.to = page_goods_data.to;
          this.total = page_goods_data.total;
        }else{
          var self=this;
          // this.GETGOODSLIST({relations: ["image_attach", "images"], parameters:{goods_id:39}});
          api.getGoodsData({relations: ["image_attach", "images","mechanics","goods_ports","assemblies","standardfits","electrics"], parameters:{goods_id:39}}).then((res)=>{
            console.log(res);
            self.goods_data_list=res.data.data[0];
          });
          
          // console.log("********");
          // console.log(this.$store.state.goods);
          // this.temp_data=this.$store.state.goods;
          // this.goods_data_list=this.$store.state.goods.goods_list.data[0];
          // console.log(this.goods_data_list);
          // // console.log(this.$store.state.goods["goods_list"]);
          // // console.log(this.$store.state.goods["goods_list"].data);
          // console.log(this.temp_data);
        }
      }
    },
    created: function () {
      var query = this.$route.query;
      this.goods_id = query.goods_id;
      this.item_index = query.item_index;
      this.init_goods_page(this.$store.state.goods);
    },
    components: {
      Swiper,
      Flexbox,
      FlexboxItem,
      XButton,
      Tab,
      TabItem,
      SwiperItem,
      Group,
      Cell
    }
  }

</script>

<style lang="css">
  .page-goods .content {
    background-color: #f7f7f7;
  }
  
  .goods-content-swiper {
    height: 100%;
    padding-bottom: 2rem;
    box-sizing: border-box;
  }
  
  .goods-content-swiper>.vux-swiper {
    height: 100%!important;
    overflow-y: scroll;
    box-sizing: border-box;
  }
  .goods-content-swiper>.vux-swiper .vux-swiper-item{
    box-sizing:border-box;
  }
</style>
