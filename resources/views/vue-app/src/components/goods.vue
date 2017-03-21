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
          <p class="color-danger">¥{{goods_data_list.bn}}</p>
          <p class="color-danger">¥{{goods_data_list.price}}</p>
          <p class="color-gray">市场价:
            <s>{{goods_data_list.mktprice||'暂无'}}</s>
          </p>
        </flexbox-item>
        <flexbox-item :span="3" class="link-img padding-rl-6 border-box">
          <img src="/static/slice/code.jpg" alt="">
        </flexbox-item>
      </flexbox>
      <div class="padding-10 margin-tb-10 bg-white" v-if="false">
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
               <div @click="collapse(1)" class="collapse_title color-danger bg-sliver padding-rl-10 padding-tb-6">端口</div>
              <group class="margin-0" v-for="(item,index) in goods_data_list.goods_ports" v-show="collapse1">
                <cell v-for="(item1,index1) in item" class="font-normal" :title="parms_table.goods_ports[index1]||index1" :value="item1" v-if="item1&&item1!='0'&&index1!='created_at'&&index1!='updated_at'&&index1!='goods_id'&&index1!='id'">
                </cell>
              </group>
               <div @click="collapse(2)" class="collapse_title color-danger bg-sliver padding-rl-10 padding-tb-6">电信号</div>
               <group class="margin-0" v-for="(item,index) in goods_data_list.electrics" v-show="collapse2">
                <cell v-for="(item1,index1) in item" class="font-normal" :title="parms_table.electrics[index1]||index1" :value="item1" v-if="item1&&item1!='0'&&index1!='created_at'&&index1!='updated_at'&&index1!='goods_id'&&index1!='id'">
                </cell>
              </group>
               <div @click="collapse(3)" class="collapse_title color-danger bg-sliver padding-rl-10 padding-tb-6">组合</div>
              <group class="margin-0" v-for="(item,index) in goods_data_list.assemblies" v-show="collapse3">
                <cell v-for="(item1,index1) in item" class="font-normal" :title="parms_table.assemblies[index1]||index1" :value="item1" v-if="item1&&item1!='0'&&index1!='created_at'&&index1!='updated_at'&&index1!='goods_id'&&index1!='id'">
                </cell>
              </group>
               <div @click="collapse(4)" class="collapse_title color-danger bg-sliver padding-rl-10 padding-tb-6">标准</div>
              <group class="margin-0" v-for="(item,index) in goods_data_list.standardfits" v-show="collapse4">
                <cell v-for="(item1,index1) in item" class="font-normal" :title="parms_table.standardfits[index1]||index1" :value="item1" v-if="item1&&item1!='0'&&index1!='created_at'&&index1!='updated_at'&&index1!='goods_id'&&index1!='id'">
                </cell>
              </group>
                <div @click="collapse(5)" class="collapse_title color-danger bg-sliver padding-rl-10 padding-tb-6">机械性能</div>
               <group class="margin-0" v-show="collapse5">
                <cell v-for="(item,index) in goods_data_list.mechanics" class="font-normal" :title="parms_table.mechanics[index]||index" :value="item" v-if="item&&item!='0'&&index!='created_at'&&index!='updated_at'&&index!='goods_id'&&index!='id'">
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
        collapse1:true,
        collapse2:true,
        collapse3:true,
        collapse4:true,
        collapse5:true,
        parms_table:{
          assemblies:{},
          electrics:{},
          goods_ports:{},
          mechanics:{},
          standardfits:{}
        },
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
      collapse:function(index){
        this["collapse"+index]=!this["collapse"+index];
      },
      ...mapActions(['GETGOODSLIST']),
      init_goods_page: function (init_data) {
         var self=this;
          // this.GETGOODSLIST({relations: ["image_attach", "images"], parameters:{goods_id:39}});
          api.getGoodsData({relations: ["image_attach", "images","mechanics","goods_ports","assemblies","standardfits","electrics"], parameters:{goods_id:39}}).then((res)=>{
            self.goods_data_list=res.data.data[0];
          });
      },
      get_parms_data:function(){
        var self=this;
        api.get_trans_params_table({relations: ['mechanics','goods_ports','assemblies','standardfits','electrics',]}).then((res)=>{
          self.parms_table=res.data;
        });
      }
    },
    created: function () {
      var query = this.$route.query;
      this.goods_id = query.goods_id;
      this.item_index = query.item_index;
      this.init_goods_page(this.$store.state.goods);
      this.get_parms_data();
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
