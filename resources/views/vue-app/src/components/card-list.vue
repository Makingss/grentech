<template lang="html">
  <flexbox wrap="nowrap" :gutter="0" class="padding-tb-6">
    <flexbox-item :span="3" class="link-img padding-l-4 border-box">
      <!-- aaa -->
      <slot name="card-media"></slot>
      <!-- <img :src="item.img" alt=""> -->
    </flexbox-item>
    <flexbox-item :span="9" class="border-box padding-l-6">
      <slot name="card-title"></slot>
      <slot name="card-subtitle"></slot>
    </flexbox-item>
  </flexbox>
</template>

<script>
import {Flexbox,FlexboxItem} from 'vux'
export default {
  name:"card-list",
  data:function(){
    return{}
  },
  components:{
    Flexbox,
    FlexboxItem
  },
  props:{
    list:Array
  }
}
</script>

<style lang="css">
</style>
