<template lang="html">
  <div class="template-content">
   <div class="bar bar-header">
        <search v-model="search_input" :cancel-text="cancel_text" @on-submit="submit_search" position="absolute" top="0"  class="list-search"></search>
        <tab active-color='#FB4F5B' v-model="index">
          <tab-item>分类</tab-item>
          <tab-item>场景</tab-item>
          <tab-item>范围</tab-item>
        </tab>
    </div>
    <div class="category content">
      <div class="tab-item-content" v-if="index==0">
        <flexbox class="tree-box" wrap="nowrap" :gutter="0">
          <flexbox-item :span="3" class="tree-box-left">
            <div class="padding-tb-6 padding-rl-10" :class="{'node-active':index==node_index}" v-for="(item,index) in category_list" @click="handle_folder(index)">
              {{item.name}}
            </div>
          </flexbox-item>
          <flexbox-item :span="9" class="tree-box-right padding-l-6 border-box">
            <div class="node-box" v-if="node_index==0">
              <div class="node-title padding-tb-6 color-gray border-1px-b">
                {{choose_node.name}}
                <div class="pull-right color-danger" @click="clear_history">清除记录 <icon type="cancel"></icon></div>
              </div>
              <div class="node-content" v-for="child in choose_node.kwds">
                <x-button mini class="pull-left margin-rl-6 margin-tb-4">
                    {{child}}
                </x-button>
              </div>
            </div>
            <div class="node-box" v-if="node_index!=0" v-for="child in choose_node">
              <div class="node-title border-1px-b padding-b-10 padding-tb-10 color-primary">
                {{child.cat_name}}
              </div>
              <div class="node-content clear-float" v-if="false">
                <div class="margin-tb-4 margin-rl-6 pull-left" v-for="_item in child.children">
                  <x-button mini>{{_item.cat_name}}</x-button>
                </div>
              </div>
            </div>
          </flexbox-item>
        </flexbox>
      </div>
      <div class="tab-item-content" v-if="index==1">
        <ul class="category-scene">
          <li v-for="(item,index) in category_list">
          <router-link :to="{name:'list',query:{type_id:item.type_id}}" class="link-img">
            <img :src="item.img" alt="">
          </router-link>
          </li>
        </ul>
      </div>
      <div class="tab-item-content" v-if="index==2">
        <group class="range-content">
            <flexbox wrap="nowrap" :gutter="0">
              <flexbox-item :span="3" class="text-center font-normal">
                频段范围
                <p class="font-mini">(MHZ)</p>
              </flexbox-item>
              <flexbox-item :span="4">
                <x-input title="" type="text" keyboard="number" v-model="range_1" class="font-normal">
                </x-input>
              </flexbox-item>
              <flexbox-item :span="1" class="text-center">
                <span class="iconfont">&#xe64b;</span>
              </flexbox-item>
              <flexbox-item :span="4">
                <x-input title="" type="text" keyboard="number" v-model="range_2" class="font-normal">
                </x-input>
              </flexbox-item>
            </flexbox>
            <flexbox wrap="nowrap" class="border-1px-t" :gutter="0">
              <flexbox-item :span="3" class="text-center font-normal">
                覆盖范围
                <p class="font-mini">(㎡)</p>
              </flexbox-item>
              <flexbox-item :span="4">
                <x-input title="" type="text" keyboard="number" v-model="area1" class="font-normal">
                </x-input>
              </flexbox-item>
              <flexbox-item :span="1" class="text-center">
                <span class="iconfont">&#xe64b;</span>
              </flexbox-item>
              <flexbox-item :span="4">
                <x-input title="" type="text" keyboard="number" v-model="area2" class="font-normal">
                </x-input>
              </flexbox-item>
            </flexbox>
        </group>
        <div class="tab-80 block-center margin-tb-20">
          <x-button class="font-1x">
            搜索
          </x-button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import TreeList from './tree-list'
import api from '../api/index.js'
//import SidePanel from './side-panel'

import {Tab,TabItem,Search,Sticky,Swiper,SwiperItem,Group,Cell,XInput,Flexbox,FlexboxItem,XButton,Icon} from 'vux'
export default {
  name:"category",
  data:function(){
    return {
      search_input:'',
      index:0,
      node_index:0,
      cancel_text:'取消',
      choose_node:{
        name:'',
      },
      history_data:{
          name:"搜索记录",
          title:'history',
          kwds:['室内天线','手机','无线基站','室外设备','耗材',"50-100",'天线','手机','基站','无线设备','耗材'],
          children:[]
        },
      category_list:[
       
      ],
      // category_list:[
      //   {
      //     name:"搜索记录",
      //     title:'history',
      //     kwds:['室内天线','手机','无线基站','室外设备','耗材',"50-100",'天线','手机','基站','无线设备','耗材'],
      //     children:[]
      //   },
      //   {
      //     name:"子类1",
      //     children:[
      //       {
      //         name:"子类1-1",
      //         children:[
      //           {
      //             name:'子类1-1-1',
      //             children:[]
      //           },
      //           {
      //             name:'子类1-1-2',
      //             children:[]
      //           },
      //           {
      //             name:'子类1-1-3',
      //             children:[]
      //           }
      //         ]
      //       },{
      //         name:"子类1-2",
      //         children:[]
      //       },{
      //         name:"子类1-3",
      //         children:[]
      //       },{
      //         name:"子类1-4",
      //         children:[]
      //       },{
      //         name:"子类1-5",
      //         children:[]
      //       }
      //     ],
      //   },{
      //     name:"子类2",
      //     children:[
      //       {
      //         name:"子类2-1",
      //         children:[]
      //       },{
      //         name:"子类2-2",
      //         children:[]
      //       },{
      //         name:"子类2-3",
      //         children:[]
      //       },{
      //         name:"子类2-4",
      //         children:[]
      //       }
      //     ],
      //   },{
      //     name:"子类3",
      //     children:[
      //       {
      //         name:"子类3-1",
      //         children:[]
      //       },{
      //         name:"子类3-2",
      //         children:[]
      //       },{
      //         name:"子类3-3",
      //         children:[]
      //       }
      //     ],
      //   },{
      //     name:"子类4",
      //     children:[
      //       {
      //         name:"子类4-1",
      //         children:[]
      //       },{
      //         name:"子类4-2",
      //         children:[]
      //       },{
      //         name:"子类4-3",
      //         children:[]
      //       }
      //     ],
      //   },{
      //     name:"子类5",
      //     children:[
      //       {
      //         name:"子类5-1",
      //         children:[]
      //       },{
      //         name:"子类5-2",
      //         children:[]
      //       },{
      //         name:"子类5-3",
      //         children:[]
      //       }
      //     ],
      //   },{
      //     name:"子类6",
      //     children:[
      //       {
      //         name:"子类6-1",
      //         children:[]
      //       },{
      //         name:"子类6-2",
      //         children:[]
      //       },{
      //         name:"子类6-3",
      //         children:[]
      //       }
      //     ],
      //   },{
      //     name:"子类6",
      //     children:[
      //       {
      //         name:"子类6-1",
      //         children:[]
      //       },{
      //         name:"子类6-2",
      //         children:[]
      //       },{
      //         name:"子类6-3",
      //         children:[]
      //       }
      //     ],
      //   },{
      //     name:"子类7",
      //     children:[
      //       {
      //         name:"子类6-1",
      //         children:[]
      //       },{
      //         name:"子类6-2",
      //         children:[]
      //       },{
      //         name:"子类6-3",
      //         children:[]
      //       }
      //     ],
      //   },{
      //     name:"子类8",
      //     children:[
      //       {
      //         name:"子类6-1",
      //         children:[]
      //       },{
      //         name:"子类6-2",
      //         children:[]
      //       },{
      //         name:"子类6-3",
      //         children:[]
      //       }
      //     ],
      //   },{
      //     name:"子类9",
      //     children:[
      //       {
      //         name:"子类6-1",
      //         children:[]
      //       },{
      //         name:"子类6-2",
      //         children:[]
      //       },{
      //         name:"子类6-3",
      //         children:[]
      //       }
      //     ],
      //   },{
      //     name:"子类10",
      //     children:[
      //       {
      //         name:"子类6-1",
      //         children:[]
      //       },{
      //         name:"子类6-2",
      //         children:[]
      //       },{
      //         name:"子类6-3",
      //         children:[]
      //       }
      //     ],
      //   },{
      //     name:"子类11",
      //     children:[
      //       {
      //         name:"子类6-1",
      //         children:[]
      //       },{
      //         name:"子类6-2",
      //         children:[]
      //       },{
      //         name:"子类6-3",
      //         children:[]
      //       }
      //     ],
      //   }
      // ],
      range_min:0,
      range_max:100,
      area1:1,
      area2:100,
      range_1:25,
      range_2:75,
      scene_images:[
        {
          img:'/static/grentech/1.jpg',
        },{
          img:'/static/grentech/2.jpg',
        },{
          img:'/static/grentech/3.jpg',
        },{
          img:'/static/grentech/4.jpg',
        },{
          img:'/static/grentech/5.jpg',
        },{
          img:'/static/grentech/6.jpg',
        }
      ],
      scene:[
        {
          img:'/static/grentech/1.jpg',
          "cat_id": 1,
          "parent_id": null,
          "type_id": 2,
          "cat_name": "美化天线",
          "p_order": 1
        },{
          img:'/static/grentech/2.jpg',
          "cat_id": 1,
          "parent_id": null,
          "type_id": 2,
          "cat_name": "美化天线",
          "p_order": 1
        },{
          img:'/static/grentech/3.jpg',
          "cat_id": 1,
          "parent_id": null,
          "type_id": 2,
          "cat_name": "美化天线",
          "p_order": 1
        },{
          img:'/static/grentech/4.jpg',
          "cat_id": 1,
          "parent_id": null,
          "type_id": 2,
          "cat_name": "美化天线",
          "p_order": 1
        },{
          img:'/static/grentech/5.jpg',
          "cat_id": 1,
          "parent_id": null,
          "type_id": 2,
          "cat_name": "美化天线",
          "p_order": 1
        },
        {
          img:'/static/grentech/6.jpg',
          "cat_id": 1,
          "parent_id": null,
          "type_id": 2,
          "cat_name": "美化天线",
          "p_order": 1
        }
      ]
    }
  },
  created:function(){
    //初始化场景类别
    // this.init_scene_list();
    this.init_goods_category();
    
     
  },
  methods:{
    input_change:function(){
      console.log("change");
    },
    init_scene_list:function(){
      var self=this;
      api.get_cat_list().then(res=>{
        console.log(res);
        self.scene=res.data;
        for(var i=0;i<self.scene.length;i++){
          self.scene[i].img=self.scene_images[i].img;
        }
     });
    },
    init_goods_category:function(){
      var self=this;
      api.get_goods_type().then(res=>{
        var category_data=res.data;
        // category_data.children=category_data.goods_cats;
        for(var i=0;i<category_data.length;i++){
          category_data[i].children=category_data[i].goods_cats;
          category_data[i].goods_cats=null;//主动释放
          category_data[i].img=self.scene_images[i].img
          // self.scene[i].img=self.scene_images[i].img;
        }
        console.log(self.scene);
        category_data.unshift(self.history_data);
        self.category_list=category_data;
        self.choose_node=self.category_list[0];
        console.log(self.category_list);
      });
    },
    submit_search:function(){
      var self=this;
      self.$router.push({name:'list',query:{search:self.search_input}});
      
    },
    clear_history:function(){
      console.log("清除历史记录");
    },
    // fetch_goods_data:function(){
    //   console.log(api);
    //   api.getGoodsData().then((res)=>{
    //     console.log(res);
    //   })
    // },
    handle_folder:function(index){
      var self=this;
      var _children=this.category_list[index];
      if(!!_children.children&&_children.children.length>0&&index!=0){
        this.choose_node=_children.children;
        this.node_index=index;
        
      }else if(index==0){
        this.choose_node=this.category_list[0];
        this.node_index=0;
      }
    }
  },
  components:{
    Tab,
    TabItem,
    Search,
    TreeList,
    Sticky,
    Swiper,
    SwiperItem,
    Group,
    Cell,
    XInput,
    Flexbox,
    FlexboxItem,
    XButton,
    Icon,
  }
}
</script>

<style lang="less">
.tab-item-content{
  height: 100%;
  overflow-y: scroll;
}
.node-active{
  // background-color:#FB4F5B;
  color: #FB4F5B;
}
.tree-box{
  align-items: flex-start;
  height: 100.1%;
  padding-bottom: 2rem;
  box-sizing: border-box;
  //overflow-y: hidden;
  // margin-bottom: 5rem;
}
.tree-box-left,.tree-box-right{
  height: 100%;
  overflow-y: scroll;
  // padding-bottom: 7rem;
}
.tree-box-left{
  box-shadow:0 0 5px #aaa;
}
.range-content .weui_cell_primary{
  background-color: #ccc;
  width: 4rem;
}
.page-list .content{
  padding-top:4.4rem;
}
.template-content{
  height:100%;
}
.category{
  width: 100%;
  height: 100%;
  padding-bottom: 4.7rem;
  box-sizing: border-box;
  // margin-top:0px;
}
.list-search{
  position:static!important;
}
.category>.tree-list{
  position: absolute;
  width:100%;
  top:5rem;
  left: 0;
}

.bar.bar-header{
  position: relative;
}
.page-list .bar-header .vux-search-box{
  position: absolute!important;
  z-index:10;
  top:0;
  left: 0;
}
.page-list .vux-tab{
  position: absolute;
  top:2.3rem;
  left: 0;
  width: 100%;
  z-index:10;
}
.list>.goods-list{
  position: absolute;
  top:2.2rem;
  left: 0;
}
.category-content{
  height: 100%;
  width: 100%;
  // position: absolute;
  // top:5rem;
  .vux-slider{
    position: inherit;

  }
}
.category-scene{
  padding-bottom: 2.5rem;
}
.node-title:active{
  color:#1ABC9C;
}
</style>
