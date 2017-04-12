<template lang="html">
  <div class="goods content">
    <div style="height:100%">
      <swiper style="width:100%;margin:0 auto;" :aspect-ratio="375/375" dots-position="center">
        <swiper-item v-for="(item,index) in goods_data_list.image_attach" class="link-img">
           <img :src="item.images.url" alt="">
        </swiper-item>
      </swiper>
      <flexbox :gutter="0" wrap="nowrap" class="bg-white">
        <flexbox-item class="padding-tb-6 padding-l-10 border-box" :span="12">
          <p class="line-ellispse-2">{{goods_data_list.name}}</p>
           <div class="item-title line-ellispse-2 font-bold">
            频段:  <span v-for="(_item,_index) in goods_data_list.electrics" v-if="!!_item.workingband">{{_item.workingband}}<i v-if="(_index!=goods_data_list.electrics.length-1)&&!!goods_data_list.electrics[_index+1].workingband">/</i></span> M
           </div>
           <div class="item-title line-ellispse-2 font-bold">
             增益: <span v-for="(_item,_index) in goods_data_list.electrics" v-if="!!_item.beamgain">{{_item.beamgain}}<i v-if="(_index!=goods_data_list.electrics.length-1)&&!!goods_data_list.electrics[_index+1].beamgain">/</i></span> dBi
           </div>
           <div class="item-title line-ellispse-2 font-bold">
            电下倾: <span v-for="(_item,_index) in goods_data_list.electrics" v-if="!!_item.dipangle">{{_item.dipangle}}<i v-if="(_index!=goods_data_list.electrics.length-1)&&!!goods_data_list.electrics[_index+1].dipangle">/</i></span> °
           </div>
          <p class="color-gray">SAP:{{goods_data_list.bn}}</p>
          <p class="color-danger">¥{{goods_data_list.price}}</p>
          <p class="color-gray" v-if="false">市场价:
            <s>{{goods_data_list.mktprice||'暂无'}}</s>
          </p>
        </flexbox-item>
        <flexbox-item :span="3" class="link-img padding-rl-6 border-box" v-if="false">
          <vue-q-art v-if="false" :config="config" class="qrcode-content"></vue-q-art>
        </flexbox-item>
      </flexbox>
      
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
              <div @click="collapse(1)" :class="{'border-1px-b':!collapse1}" class="collapse_title color-danger bg-sliver padding-rl-10 padding-tb-6">
                电性能
                <span class="iconfont padding-rl-10" v-if="!collapse1">&#xe772;</span>
                <span class="iconfont padding-rl-10" v-else>&#xe76e;</span>
               </div>
               <group class="margin-0" v-for="(item,index) in goods_data_list.new_electrics" v-show="collapse1">
                <cell class="font-mini" :title="parms_table.electrics[index]||index" v-if="index!='created_at'&&index!='updated_at'&&index!='goods_id'&&index!='id'&&index!='type'">
                  <flexbox :gutter="0" slot="value" class="text-center">
                    <flexbox-item v-for="(_item,_index) in item">
                     {{_item}}
                    </flexbox-item>
                  </flexbox>
                </cell>
              </group>
              <div @click="collapse(6)" :class="{'border-1px-b':!collapse6}" class="collapse_title color-danger bg-sliver padding-rl-10 padding-tb-6">
                电性能指标（智能）
                <span class="iconfont padding-rl-10" v-if="!collapse6">&#xe772;</span>
                <span class="iconfont padding-rl-10" v-else>&#xe76e;</span>
               </div>
               <group class="margin-0" v-for="(item,index) in goods_data_list.new_electrics_inte" v-show="collapse6">
                <cell class="font-mini" :title="parms_table.electrics[index]||index" v-if="index!='created_at'&&index!='updated_at'&&index!='goods_id'&&index!='id'&&index!='type'">
                  <flexbox :gutter="0" slot="value" class="text-center">
                    <flexbox-item v-for="(_item,_index) in item">
                     {{_item}}
                    </flexbox-item>
                  </flexbox>
                </cell>
              </group>
              <div @click="collapse(7)" :class="{'border-1px-b':!collapse7}" class="collapse_title color-danger bg-sliver padding-rl-10 padding-tb-6">
                机械性能(基站/室分天线)
                <span class="iconfont padding-rl-10" v-if="!collapse7">&#xe772;</span>
                <span class="iconfont padding-rl-10" v-else>&#xe76e;</span>
               </div>
               <group class="margin-0" v-for="(item,index) in goods_data_list.new_mechanics_inte" v-show="collapse7">
                <cell class="font-mini" :title="parms_table.electrics[index]||index" v-if="index!='created_at'&&index!='updated_at'&&index!='goods_id'&&index!='id'&&index!='type'">
                  <flexbox :gutter="0" slot="value" class="text-center">
                    <flexbox-item v-for="(_item,_index) in item">
                     {{_item}}
                    </flexbox-item>
                  </flexbox>
                </cell>
              </group>
              <div @click="collapse(5)" :class="{'border-1px-b':!collapse5}" class="collapse_title color-danger bg-sliver padding-rl-10 padding-tb-6">
                方向图
                <span class="iconfont padding-rl-10" v-if="!collapse5">&#xe772;</span>
                <span class="iconfont padding-rl-10" v-else>&#xe76e;</span>
               </div>
               <group class="margin-0" v-show="collapse5">
                  <flexbox :gutter="0" class="text-center">
                    <flexbox-item v-for="(item,index) in goods_data_list.aspect_pics" :span="1/2">
                      <div class="font-mini padding-tb-6">{{item.title}}</div>
                      <div class="link-img">
                        <img :src="'/uploads/'+item.pic_url" alt="">
                      </div>
                    </flexbox-item>
                  </flexbox>
              </group>
               <div @click="collapse(2)" :class="{'border-1px-b':!collapse2}" class="collapse_title color-danger bg-sliver padding-rl-10 padding-tb-6">
                  机械性能
                  <span class="iconfont padding-rl-10" v-if="!collapse2">&#xe772;</span>
                  <span class="iconfont padding-rl-10" v-else>&#xe76e;</span>
                </div>
               <group class="margin-0" v-show="collapse2" v-for="(item,index) in goods_data_list.new_mechanics">
                 <cell class="font-mini" :title="parms_table.mechanics[index]||index" v-if="index!='created_at'&&index!='updated_at'&&index!='goods_id'&&index!='id'&&index!='type'">
                  <flexbox :gutter="0" slot="value" class="text-center">
                    <flexbox-item v-for="(_item,_index) in item">
                     {{_item}}
                    </flexbox-item>
                  </flexbox>
                </cell>
              </group>
              <div @click="collapse(3)"  :class="{'border-1px-b':!collapse3}" class="collapse_title color-danger bg-sliver padding-rl-10 padding-tb-6">
                标准配件
                <span class="iconfont padding-rl-10" v-if="!collapse3">&#xe772;</span>
                <span class="iconfont padding-rl-10" v-else>&#xe76e;</span>
               </div>
              <group class="margin-0" v-for="(item,index) in goods_data_list.new_standardfits" v-show="collapse3">
                <cell class="font-mini" :title="parms_table.standardfits[index]||index" :value="item" v-if="index!='created_at'&&index!='updated_at'&&index!='goods_id'&&index!='id'">
                </cell>
              </group>
               <div @click="collapse(4)"  :class="{'border-1px-b':!collapse4}" class="collapse_title color-danger bg-sliver padding-rl-10 padding-tb-6">
                可选组件
                <span class="iconfont padding-rl-10" v-if="!collapse4">&#xe772;</span>
                <span class="iconfont padding-rl-10" v-else>&#xe76e;</span>
               </div>
              <group class="margin-0" v-for="(item,index) in goods_data_list.new_assemblies" v-show="collapse4">
                <cell class="font-mini" :title="parms_table.assemblies[index]||index" :value="item" v-if="index!='created_at'&&index!='updated_at'&&index!='goods_id'&&index!='id'">
                </cell>
              </group>
        </div>
        <div v-if="index==2" class="padding-10">
          服务信息内容
        </div>
      </div>
     <img class="previewer-demo-img" v-if="false" v-for="(item, index) in list" :src="item.src" width="100" @click="show(index)">
       <previewer :list="list" ref="previewer" :options="options"></previewer>
    </div>
  </div>
</template>
<script>
import VueQArt from 'vue-qart'
import QArt from 'qartjs'
// v-if="!!goods_data_list.new_assemblies.goods_id"
import api from '../api/index.js'
// import {mapState,mapActions} from 'vuex'

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
        collapse6:true,
        collapse7:true,
        list: [],
        options: {
          getThumbBoundsFn (index) {
            // find thumbnail element
            let thumbnail = document.querySelectorAll('.previewer-demo-img')[index]
            // get window scroll Y
            let pageYScroll = window.pageYOffset || document.documentElement.scrollTop
            // optionally get horizontal scroll
            // get position of element relative to viewport
            let rect = thumbnail.getBoundingClientRect()
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
   
    methods: {
      show:function(index){
        console.log("展示");
        console.log(this.list);
        this.$refs.previewer.show(index);
      },
      collapse:function(index){
        this["collapse"+index]=!this["collapse"+index];
      },
      // ...mapActions(['GETGOODSLIST']),
      init_goods_page: function (query) {
         var self=this;
          // this.GETGOODSLIST({relations: ["image_attach", "images"], parameters:{goods_id:39}});
          api.getGoodsData({relations: ["image_attach", "images","mechanics","goods_ports","assemblies","standardfits","electrics","aspect_pics","mechanics_inte","electrics_inte"], parameters:query}).then((res)=>{
            // self.goods_data_list=res.data.data[0];
            self.handle_goods_data(res.data.data[0]);
            console.log(res);
          });
      },
      handle_goods_data:function(data){
        console.log(data);
        var self=this;
        for(var key in data){
          if(key=="electrics"||key=="assemblies"||key=="goods_ports"||key=="standardfits"||key=="mechanics"||key=="mechanics_inte"||key=="electrics_inte"){
            var new_obj={};
            for(var i=0;i<data[key].length;i++){
              //遍历 key 值,相同做数据合并
              for(var k in data[key][i]){
                if(k=="created_at"||k=="id"||k=="updated_at"||k=="type"){
                  continue;
                }
                if(!!data[key][i][k]){
                  // if(!!new_obj[k]){
                  //   if(new_obj[k]==data[key][i][k]){
                  //     continue;
                  //   }
                  //   new_obj[k]=new_obj[k]+'  '+data[key][i][k];
                  // }else{
                  //   new_obj[k]=data[key][i][k];
                  // } 
                  if(!new_obj[k]){
                    new_obj[k]=[];
                  } 
                   new_obj[k].push(data[key][i][k]);
                  // new_obj[i]=data[key][i][k];
                }
              }
            }
            data['new_'+key]=new_obj;
           
            self.goods_data_list=data;
          }
        }
        // console.log(data);
        console.log(".............");
        console.log(self.goods_data_list);
        setTimeout(function(){
          self.show_previewer();
        },2000)
      },  
      get_parms_data:function(){
        var self=this;
        api.get_trans_params_table({relations: ['mechanics','goods_ports','assemblies','standardfits','electrics']}).then((res)=>{
          self.parms_table=res.data;
        });
      },
      show_previewer:function(){
        var self=this;
        console.log("________________________");
        console.log($(".goods-desc img"));
        self.list=[];
        $(".goods-desc img").addClass("previewer-demo-img");
        $.each($(".goods-desc img"),function(i,n){
          var obj={
            src:$(this).attr("src"),
            w:($(this).width()+8)*2,
            h:$(this).height()*2
             
          };
          self.list.push(obj);
          // $(this).addClass("previewer-demo-img");
          $(this).on("click",function(){
            console.log(i);
            self.show(i);
          })
        })
        console.log(self.list);
       
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
.params-cell .weui-cell{
  padding:10px 5px;
}
.params-cell .vux-cell-primary{
  flex:0.5
}
.params-cell .weui-cell__ft{
  flex:1.4;
  text-align:center;
}
</style>
