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
                    <div class="item-subtitle color-danger">
                      ￥{{item.price}}
                    </div>
                  </div>
                </router-link>
              </flexbox-item>
            </flexbox>
            <!-- :to="item.url" -->
            <card-list 
            v-for="(item,index) in goods_data" :data-currentpage="current_page" :data-lastpage="last_page" :data-total="total" :data-perpage="per_page" v-if="type=='medium'">
              <router-link :to="{name:'goods',query:{goods_id:item.goods_id,item_index:index}}"  class="block" slot="card-media">
                <img :src="item.images?item.images.url:'/static/grentech/default.jpg'" alt="">
              </router-link>
              <router-link :to="{name:'goods',query:{goods_id:item.goods_id,item_index:index}}"  slot="card-title">
                <div class="item-title">{{item.name}}</div>
              </router-link>
                <div class="item-subtitle color-danger" slot="card-subtitle">¥{{item.price}}</div>
            </card-list>
            
       <div class="load-more text-center" v-show="loading">
        <spinner type="circles"></spinner>
       </div>    
      </div>
    </div>
  </div>
</template>
  
<script>
    // <scroller 
    //       lock-x 
    //       scrollbar-y
    //       use-pullup 
    //       height="100%"
    //       ref="listScroll"
    //       @on-pullup-loading="load"
    //       :pullup-config="pullupConfig"
    //       class="x-scroller-container">
    //     </scroller>
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
  watch:{
    '$route':function(to,from){
      console.log("切换");
      this.handler_query();
    }
  },
  created: function() {
    this.handler_query();
  },
  
  methods: {
    handle_scroll:function(el){
      // console.log(el);
      el=$(el.target);
      var self=this;
      let height=parseFloat(el.height());
      let scrollTop=parseFloat(el.scrollTop());
      //console.log(height,scrollTop);
      var view_height=height+scrollTop;
      var scrollHeight=el[0].scrollHeight;

      // console.log(view_height,el[0].scrollHeight);
      if(scrollHeight-view_height<40){
        // console.log(scrollHeight-view_height);
        //调用加载功能
        console.log("上拉加载");
        this.loadMore();
        return false;
      }
    },
    // ...mapActions(['GETGOODSLIST']),
    toggleType: function() {
      //console.log("切换");
      this.type = this.type == 'medium' ? 'large' : 'medium';
    },
    submit_search:function(){
      console.log("搜索测试");
      var self=this;
      this.$router.push({name:'list',query:{search:self.search_input}});
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
        api.get_page_data(self.next_page_url,{relations: ["images","image_attach"],per_page: 10 }).then(res=>{
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
        if(query["search"]){
           api.get_search_result({relations: ["images","image_attach"],parameters:query,per_page:10}).then(res=>{
               console.log(res);
               self.commit_resdata(res.data,params);
           })
        }else if(query["keyword"]){
          api.get_similar_by_kwd({relations: ["images","image_attach"],id:query.keyword,per_page:10}).then(res=>{
            console.log("查询关键字商品");
            console.log(res);
            self.commit_resdata(res.data,params);
          })
        }else{
          api.getGoodsData({relations: ["images","image_attach"], parameters:query,per_page:10}).then(res=>{
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
                }
    }
  }

}
</script>

<style scoped>
.page-list .content-box{
  height:100%;
  overflow-y:scroll;
}
.list.content {
  overflow-y: scroll;
  height: 100%;
  padding-top: 0;
  padding-bottom:3rem;
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
  top: 0;
  left: 0;
  z-index: 199;
}

.list-search {
  padding-left: 2.2rem;
  background-color: #EFEFF4;
}
</style>
