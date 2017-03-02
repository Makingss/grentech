<template lang="html">
  <li class="tree tree-item color-dark color-white">
    <div @click="toggle($event)" :class="{isactive:open||node.title=='history','border-1px-b-x':isLast}" :data-last="isLast" class="padding-tb-6 padding-rl-10 border-1px-t border-box tree-leaf border-1px-r" >{{node.name}}</div>
    <ul class="node-item hide" v-if="node.children.length&&node.titile!='history'">
      <tree v-for="(item,index) in node.children" :node="item" :class="{'border-1px-b':index==(node.children.length-1),'border-1px-l':!!nodeIndex&&(nodeIndex.index+node.children.length>nodeIndex.len)}">
      </tree>
    </ul>
    <ul class="node-item search-box" v-if="node.title=='history'">
      <li class="padding-tb-6 color-danger padding-rl-10 text-right search-history border-1px-b" @click="clear_history">清除记录 <icon type="cancel"></icon></li>
      <li class="search-box-item">
        <router-link to="/home" v-for="item in node.kwds" class="padding-rl-6 bg-gray margin-rl-6 margin-tb-4 padding-tb-4 color-dark inline-block btn-small border-radius-3">
          {{item}}
        </router-link>
      </li>
    </ul>
  </li>
</template>

<script>
import {Icon} from 'vux'
export default {
  name:'tree',
  data:function(){
    return {
      open:false,
      //styles:{}
    }
  },
  created:function(){
    //console.log(this.nodeIndex)
    //console.log($(".node-item"));
  },
  computed:{
    isFolder:function(){
      return (this.node.children&&this.node.children.length)||(this.node.title=="history");
    },

  },
  components:{
    Icon
  },
  methods:{
    toggle:function($el){
      var _el=$el.target;
      //console.log(this.isFolder);
      if(this.isFolder){
        if($(_el).siblings("ul").hasClass("hide")){
          $(_el).addClass("isactive").siblings("ul").removeClass("hide");
          $(_el).parent("li").siblings("li").children("div").removeClass("isactive");
          $(_el).parent("li").siblings("li").children("ul").addClass("hide");
        }else{
          $(_el).removeClass("isactive");
          $(_el).siblings("ul").addClass("hide");
        }
      }else{
        if($(_el).hasClass("isactive")){
          $(_el).removeClass("isactive");
        }else{
          $(_el).addClass("isactive");
          $(_el).parent("li").siblings("li").children("div").removeClass("isactive");
          $(_el).parent("li").siblings("li").children("ul").addClass("hide");
        }
      }
    },
    clear_history:function(){
      console.log("clear_history");
    }
  },
  props:{
    node:Object,
    isLast:Boolean,
    nodeIndex:Object
  }
}
</script>

<style lang="less">
.tree {
  position: relative;
}
.isactive{
  background-color: #e4393c;
  color:#fff;

}
.node-item{
  position: absolute;
  // top:4px;
  top:0;
  left:5rem;
  z-index:99;
}
.tree-leaf{
  width:5rem;
}
li.tree-item{
  width: 5rem;
}
li.tree-root{
  width:100%;
}
.search-box,.search-box-item{
  box-sizing: border-box;
}
</style>
