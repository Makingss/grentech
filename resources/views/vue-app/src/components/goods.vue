<template lang="html">
  <div class="goods content">
    <div style="height:100%">
      <swiper style="width:100%;margin:0 auto;" :aspect-ratio="375/375" dots-position="center">
        <swiper-item v-for="(item,index) in goods_data_list.image_attach" class="link-img">
           <img :src="item.images.url" alt="">
        </swiper-item>
      </swiper>
      <flexbox :gutter="0" wrap="nowrap" class="bg-white">
        <flexbox-item class="padding-tb-6 padding-l-10 border-box" :span="9">
          <p class="line-ellispse-2">{{goods_data_list.name}}</p>
          <p class="color-gray">SAP:{{goods_data_list.bn}}</p>
          <p class="color-danger">¥{{goods_data_list.price}}</p>
          <p class="color-gray">市场价:
            <s>{{goods_data_list.mktprice||'暂无'}}</s>
          </p>
        </flexbox-item>
        <flexbox-item :span="3" class="link-img padding-rl-6 border-box">
          <vue-q-art v-if="false" :config="config" class="qrcode-content"></vue-q-art>
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
      <div class="margin-t-10 padding-rl-10 bg-white">
        <x-button v-if="false" mini plain type="warn">优惠</x-button>
      </div>
      <div class="goods-desc" style="height:100%;padding-bottom:3rem;box-sizing:border-box">
        <tab v-model="index" active-color="#FB4F5B">
          <tab-item>商品详情</tab-item>
          <tab-item>主要参数</tab-item>
          <tab-item v-if="false">服务信息</tab-item>
        </tab>
        <div v-if="index==0" class="padding-tb-6 padding-rl-4">
            <div v-html="goods_data_list.content"></div>
        </div>
        <div v-if="index==1" class="params-cell">
              <div @click="collapse(1)"  :class="{'border-1px-b':!collapse1}" class="collapse_title color-danger bg-sliver padding-rl-10 padding-tb-6">
                电性能
                <span class="iconfont padding-rl-10" v-if="!collapse1">&#xe772;</span>
                <span class="iconfont padding-rl-10" v-else>&#xe76e;</span>
               </div>
               <group class="margin-0" v-for="(item,index) in goods_data_list.new_electrics" v-show="collapse1">
                <cell class="font-normal" :title="parms_table.electrics[index]||index" :value="item" v-if="index!='created_at'&&index!='updated_at'&&index!='goods_id'&&index!='id'">
                </cell>
              </group>
               <div @click="collapse(2)" v-if="goods_data_list.mechanics.constructor!=Array" :class="{'border-1px-b':!collapse2}" class="collapse_title color-danger bg-sliver padding-rl-10 padding-tb-6">
                  机械性能
                  <span class="iconfont padding-rl-10" v-if="!collapse2">&#xe772;</span>
                  <span class="iconfont padding-rl-10" v-else>&#xe76e;</span>
                </div>
               <group class="margin-0" v-show="collapse2">
                <cell v-for="(item,index) in goods_data_list.mechanics" class="font-normal" :title="parms_table.mechanics[index]||index" :value="item" v-if="index!='created_at'&&index!='updated_at'&&index!='goods_id'&&index!='id'">
                </cell>
              </group>
              <div @click="collapse(3)"  :class="{'border-1px-b':!collapse3}" class="collapse_title color-danger bg-sliver padding-rl-10 padding-tb-6">
                标准配件
                <span class="iconfont padding-rl-10" v-if="!collapse3">&#xe772;</span>
                <span class="iconfont padding-rl-10" v-else>&#xe76e;</span>
               </div>
              <group class="margin-0" v-for="(item,index) in goods_data_list.new_standardfits" v-show="collapse3">
                <cell class="font-normal" :title="parms_table.standardfits[index]||index" :value="item" v-if="index!='created_at'&&index!='updated_at'&&index!='goods_id'&&index!='id'">
                </cell>
              </group>
               <div @click="collapse(4)"  :class="{'border-1px-b':!collapse4}" class="collapse_title color-danger bg-sliver padding-rl-10 padding-tb-6">
                可选组件
                <span class="iconfont padding-rl-10" v-if="!collapse4">&#xe772;</span>
                <span class="iconfont padding-rl-10" v-else>&#xe76e;</span>
               </div>
              <group class="margin-0" v-for="(item,index) in goods_data_list.new_assemblies" v-show="collapse4">
                <cell class="font-normal" :title="parms_table.assemblies[index]||index" :value="item" v-if="index!='created_at'&&index!='updated_at'&&index!='goods_id'&&index!='id'">
                </cell>
              </group>
        </div>
        <div v-if="index==2" class="padding-10">
          服务信息内容
        </div>
      </div>
      <x-button class="previewer-demo-img" @click.native="show(0)">打开测试</x-button>
    </div>
     <previewer  :list="previewer_list" ref="previewer" :options="options"></previewer>
  </div>
</template>
<script>
import VueQArt from 'vue-qart'
import QArt from 'qartjs'
// v-if="!!goods_data_list.new_assemblies.goods_id"
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
    Cell,
    Previewer
  } from 'vux'
  export default {
    name: 'goods',
    data: function () {
      return {
        config: {
          value: window.location.href,
          imagePath: '/static/slice/girl_avatar.jpg',
          filter: 'color'
        },
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
        previewer_list:[
          {
            src:'/uploads/content/20170330/58dca48b737e0_11o.jpg',
            width:650,
            height:1100
          }
        ],
        options: {
          getThumbBoundsFn (index) {
            // find thumbnail element
            let thumbnail = document.querySelectorAll('.previewer-demo-img')[index];
            console.log(thumbnail);
            // get window scroll Y
            let pageYScroll = window.pageYOffset || document.documentElement.scrollTop
            // optionally get horizontal scroll
            // get position of element relative to viewport
            let rect = thumbnail.getBoundingClientRect();
            // w = width
            return {x: rect.left, y: rect.top + pageYScroll, w: rect.width}
            // Good guide on how to get element coordinates:
            // http://javascript.info/tutorial/coordinates
          }
        },
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
          new_assemblies:{},
          new_electrics:{},
          new_goods_ports:{},
          new_standardfits:{},
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
      show:function(){
        this.$refs.previewer.show(0);
      },
      collapse:function(index){
        this["collapse"+index]=!this["collapse"+index];
      },
      // ...mapActions(['GETGOODSLIST']),
      init_goods_page: function (query) {
         var self=this;
          // this.GETGOODSLIST({relations: ["image_attach", "images"], parameters:{goods_id:39}});
          api.getGoodsData({relations: ["image_attach", "images","mechanics","goods_ports","assemblies","standardfits","electrics"], parameters:query}).then((res)=>{
            // self.goods_data_list=res.data.data[0];
            self.handle_goods_data(res.data.data[0]);
            console.log(res);
          });
      },
      handle_goods_data:function(data){
        console.log(data);
        var self=this;
        for(var key in data){
          if(key=="electrics"||key=="assemblies"||key=="goods_ports"||key=="standardfits"){
            var new_obj={};
            for(var i=0;i<data[key].length;i++){
              //遍历 key 值,相同做数据合并
              for(var k in data[key][i]){
                if(k=="created_at"||k=="id"||k=="updated_at"){
                  continue;
                }
                if(!!data[key][i][k]){
                  if(!!new_obj[k]){
                    if(new_obj[k]==data[key][i][k]){
                      continue;
                    }
                    new_obj[k]=new_obj[k]+'  '+data[key][i][k];
                  }else{
                    new_obj[k]=data[key][i][k];
                  } 
                }
              }
            }
            console.log(new_obj);
            data['new_'+key]=new_obj;
            console.log(".............");
            self.goods_data_list=data;
          }
        }
        // console.log(data);
        console.log(self.goods_data_list);
        setTimeout(function(){
          self.show_previewer();
        },2000)  
      },  
      get_parms_data:function(){
        var self=this;
        api.get_trans_params_table({relations: ['mechanics','goods_ports','assemblies','standardfits','electrics',]}).then((res)=>{
          self.parms_table=res.data;
        });
      },
      show_previewer:function(){
        var self=this;
        console.log("________________________");
        console.log($(".goods-desc img"));
        $.each($(".goods-desc img"),function(i,n){
          var obj={
            src:$(this).attr("src"),
            width:650,
            height:1100
          };
          self.previewer_list=[];
          self.previewer_list.push(obj);
        })
        console.log(self.previewer_list);
       
      }
    },
    created: function () {
      var query = this.$route.query;
      console.log("create good page");
      this.goods_id = query.goods_id;
      this.item_index = query.item_index;
      this.init_goods_page(query);
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
      Cell,
      VueQArt,
      Previewer
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
.goods .qrcode-content canvas{
  width:4rem;
  height:4rem;
}
.params-cell .vux-cell-primary{
  flex:0.5
}
.params-cell .weui-cell__ft{
  flex:1.2;
  text-align:center;
}
</style>
