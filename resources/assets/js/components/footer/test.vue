<template lang="html">
<div class="" style="overflow:hidden">
  <div :class="{transitionAni:ani}" :style="{height:height,transform:translateX}">
    <div class="" v-for="item in itemlist" :style="{left:item.x +'px'}">
      <img src="item.url" alt="" :style="{width:width,top:top}">
    </div>
    <div class="prev">
      <i class="iconfont">&#xe8ef;</i>
    </div>
    <div class="next">
      <i class="iconfont">&#xe8f1;</i>
    </div>
    <div class="" v-for="">
      <div class="circle">
      </div>
    </div>
  </div>
</div>
</template>

<script>
var SCREEN_WIDTH=document.body.clientWidth;
var SCREEN_HEIGHT=document.body.scrollHeight;
var left ,center,right;
var SelectIndex=0;

export default {
  data:function(){
    return{
      itemlist:[
        {
        url:'/imagers/qr.png',
        x:'',
      },
       {
        url:'/imagers/qr.png',
        x:'',
      }]
    }
  },
  mounted:{

  },
  methods:{
    playAuto:function(){

    },
    prev:function(){

    },
    netx:function(){}
  }
}
</script>

<style lang="css">
</style>
