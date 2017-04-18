<template lang="html">
  <div class="template-content">
    <div class="content-box">
        <div class="search-icon text-center" @click="toggleType">
          <span class="iconfont font-3x color-success block" style="margin-top:8px;">&#xe62a;</span>
        </div>
        <search v-model="search_input" position="static" top="0" @on-submit="submit_search"  class="list-search border-box"></search>
        <div class="content list container" @scroll="handle_scroll($event)">
              <flexbox wrap="wrap" :gutter="0" class="scroll-content" v-if="type=='large'">
                <flexbox-item :data-currentpage="current_page" :data-lastpage="last_page"  :data-total="total"  :data-perpage="per_page" :data-i="index%2"
                v-for="(item,index) in goods_data" :span="1/2" class="link-img cell-list-2 padding-tb-6 border-box" :class="{'padding-r-2':index%2==0,'padding-l-2':index%2==1}" >
                  <router-link :to="{name:'goods',query:{goods_id:item.goods_id,item_index:index}}" class="block">
                    <div>
                      <img :src="item.images?item.images.url:'/static/grentech/default.jpg'" alt="">
                    </div>
                    <div class="padding-rl-10">
                      <div class="item-title line-ellispse-2">
                        {{item.name}}
                      </div>
                      <div class="item-title line-ellispse-2 font-bold" v-if="!!item.electrics">
                        频段: 
                        <span v-for="(_item,_index) in item.electrics" v-if="!!_item.workingband">
                        {{_item.workingband}}
                        <i v-if="(_index!=item.electrics.length-1)&&!!item.electrics[_index+1].workingband">/</i>
                        </span> 
                        <span v-if="item.electrics.length">M</span>
                      </div>
                      <div class="item-title line-ellispse-2 font-bold">
                        增益: <span v-for="(_item,_index) in item.electrics" v-if="!!_item.beamgain">{{_item.beamgain}}<i v-if="(_index!=item.electrics.length-1)&&!!item.electrics[_index+1].beamgain">/</i></span>
                        <span v-if="item.electrics.length">dBi</span>
                      </div>
                      <div class="item-title line-ellispse-2 font-bold">
                        电下倾: <span v-for="(_item,_index) in item.electrics" v-if="!!_item.dipangle">{{_item.dipangle}}<i v-if="(_index!=item.electrics.length-1)&&!!item.electrics[_index+1].dipangle">/</i></span>
                        <span v-if="item.electrics.length">°</span>
                      </div>
                      <div class="item-title line-ellispse-2 color-gray">
                        SAP: {{item.bn}}
                      </div>
                      <div class="item-subtitle padding-t-4">
                        <b class="color-danger">￥{{item.price}}</b>
                        <s class="padding-r-10 font-slim color-gray" v-if="item.mktprice">¥</s>
                        <s class="color-gray font-slim">{{item.mktprice||"暂无"}}</s>
                      </div>
                    </div>
                  </router-link>
                </flexbox-item>
              </flexbox>
              <card-list 
                v-for="(item,index) in goods_data" class="border-1px-b" :data-currentpage="current_page" :data-lastpage="last_page" :data-total="total" :data-perpage="per_page" v-if="type=='medium'">
                <router-link :to="{name:'goods',query:{goods_id:item.goods_id,item_index:index}}"  class="block" slot="card-media">
                  <img :src="item.images?item.images.url:'/static/grentech/default.jpg'" alt="">
                </router-link>
                <router-link :to="{name:'goods',query:{goods_id:item.goods_id,item_index:index}}"  slot="card-title">
                    <div class="item-title">{{item.name}}</div>
                      <div class="item-title line-ellispse-2 font-bold">
                        频段:  <span v-for="(_item,_index) in item.electrics" v-if="!!_item.workingband">{{_item.workingband}}<i v-if="(_index!=item.electrics.length-1)&&!!item.electrics[_index+1].workingband">/</i></span>
                        <span v-if="item.electrics.length">M</span>
                      </div>
                      <div class="item-title line-ellispse-2 font-bold">
                        增益: <span v-for="(_item,_index) in item.electrics" v-if="!!_item.beamgain">{{_item.beamgain}}<i v-if="(_index!=item.electrics.length-1)&&!!item.electrics[_index+1].beamgain">/</i></span>
                        <span v-if="item.electrics.length">dBi</span>
                      </div>
                      <div class="item-title line-ellispse-2 font-bold">
                        电下倾: <span v-for="(_item,_index) in item.electrics" v-if="!!_item.dipangle">{{_item.dipangle}}<i v-if="(_index!=item.electrics.length-1)&&!!item.electrics[_index+1].dipangle">/</i></span>
                        <span v-if="item.electrics.length">°</span>
                      </div>
                      <div class="item-title line-ellispse-2 color-gray">
                        SAP: {{item.bn}}
                      </div>
                </router-link>
                  <div class="item-subtitle color-danger padding-t-4" slot="card-subtitle">
                    <b>¥{{item.price}}</b>
                    <s class="padding-r-10 font-slim color-gray" v-if="item.mktprice">¥</s>
                    <s class="color-gray font-slim">{{item.mktprice||"暂无"}}</s>
                  </div>
              </card-list>
            <div class="load-more text-center" v-show="loading">
              <spinner type="circles"></spinner>
            </div>
            <div class="padding-tb-20 text-center" v-show="load_all" style="padding-bottom:3.3rem"><span class="iconfont">&#xe62b;</span>已加载完毕...</div>
        </div>
      </div>
  </div>
</template>
  
<script>
import api from '../api'
import * as config from '../config/config.js'
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
    loading:false,
     goods_data:[],
     current_page: 0,
     last_page: 0,
     total: 0,
     from:0,
     to:0,
     load_all:false,
     per_page:0,
     toast_msg:false,
      demo4Value: {
        pullupStatus: 'default'
      },
      // loading: false,
      type: config.app_config.list_cell_type,
      search_input: '',
      pullupConfig: {
        content: '上拉加载更多',
        downContent: '松开进行加载',
        upContent: '上拉加载更多',
        loadingContent: '加载中...'
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
    this.handler_query();
    console.log("创建111111111");
  },
  
  methods: {
    handle_scroll:function(el){
      el=$(el.target);
      var self=this;
      let height=parseFloat(el.height());
      let scrollTop=parseFloat(el.scrollTop());
      var view_height=height+scrollTop;
      var scrollHeight=el[0].scrollHeight;

      if(scrollHeight-view_height<40){
        //调用加载功能
        console.log("上拉加载");
        this.loadMore();
        return false;
      }
    },
    toggleType: function() {
      this.type = this.type == 'medium' ? 'large' : 'medium';
    },
    submit_search:function(){
      console.log("搜索测试");
      var self=this;
      this.$router.push({name:'list',query:{search:self.search_input}});
      self.goods_data=[];//清空记录
      self.next_page_url=null;
      this.handler_query({loading:true});
    },
    loadMore:function(){
      var self=this;
      if(this.loading){
        return
      }
      console.log("触发加载");
      this.loading=true;
      let scroller=$(".container");
      console.log(self.next_page_url);
      if(!!self.next_page_url){
        api.get_page_data(self.next_page_url,{relations: ["images","image_attach","mechanics","goods_ports","assemblies","standardfits","electrics"],per_page: 10 }).then(res=>{
          console.log(res);
          self.loading=false;
           if(res.data.data&&res.data.data.length>0){
              self.commit_resdata(res.data)
              // self.
            }
        }); 
      }else{
         self.loading=false;
      }
    },
    handler_query:function(params){
       var self=this;
       var query=this.$route.query;
        if(!!params&&params.search){
          query={search:self.search_input};
        }
        console.log(query);
        query.relations=["images","image_attach"];
        var loading=false;
        console.log(query);
        console.log("---------------------");
        if(query["search"]&&!loading){
          loading=true;
           api.get_search_result({relations: ["images","image_attach","mechanics","goods_ports","assemblies","standardfits","electrics"],search:query.search,per_page:10}).then(res=>{
               console.log(res);
               loading=false;
               self.commit_resdata(res.data,params);
           })
        }else if(query["keyword"]){
          api.get_similar_by_kwd({relations: ["images","image_attach","mechanics","goods_ports","assemblies","standardfits","electrics"],id:query.keyword,per_page:10}).then(res=>{
            console.log("查询关键字商品");
            console.log(res);
            self.commit_resdata(res.data,params);
          })
        }else{
          api.getGoodsData({relations: ["images","image_attach","mechanics","goods_ports","assemblies","standardfits","electrics"], parameters:query,per_page:10}).then(res=>{
              console.log(res);
               self.commit_resdata(res.data);
           })
        }
    },
    commit_resdata:function(res_data,params){
                var self=this;
                console.log(params);
                // self.$store.state.goods.goods_list=res_data;
                // self.goods_data=self.goods_data.concat(res_data.data);
                self.goods_data=self.goods_data.concat(res_data.data);
                console.log(self.goods_data);
                self.current_page=res_data.current_page;
                self.next_page_url=res_data.next_page_url;
                self.last_page=res_data.last_page;
                self.total=res_data.total;
                self.from=res_data.from;
                self.to=res_data.to;
                self.per_page=res_data.per_page;
                if(!self.next_page_url){
                  self.$vux.toast.show({
                    type:'text',
                    text:'<span class="font-normal">已加载完毕...</span>',
                    position:'middle'
                  });
                  self.load_all=true;
                }
    }
  }

}
</script>

<style scoped>
.template-content{
  position:absolute;
  height:100%;
  width:100%;
  padding-top:2.2rem;
  bottom:2.3rem;
  box-sizing:border-box;
}
.page-list .content-box{
  height:100%;
  overflow-y:scroll;
}
#app .list.content {
  overflow-y: scroll;
  height: 100%;
  margin-top: 2.2rem;

}

.list-search {
  position: static!important;
}

.list.content .scroll-content {
  padding-bottom: 0;
}

.search-icon {
  width: 2.2rem;
  height: 2.2rem;
  position: absolute;
  top: 2.2rem;
  left: 0;
  z-index: 199;
  background-color: #EFEFF4;
}

.list-search {
  padding-left: 2.2rem;
  background-color: #EFEFF4;
}
</style>
