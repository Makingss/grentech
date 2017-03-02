<template lang="html">
  <div class="side-panel">
    <slot name="content"></slot>
  </div>
</template>

<script>
export default {
  name:'side-panel',
  data:function(){
    return {

    }
  },
  props:{
    bgColor:String,

  },
  components:{

  },
  methods:{

  }
}
</script>

<style lang="css">
.side-panel{
  position: absolute;
  width: 80%;
  top:0;
  left: 0;
  height:100%;
  z-index: 999;
  overflow-x: hidden;
  //background-color: rgba(0,0,0,.6);
  background-color: rgba(255,255,255,.9);
}
</style>
