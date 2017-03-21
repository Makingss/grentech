<template lang="html">
  <div class="service content">
  <div class="content-box">
    <collapse v-for="(item,index) in list" :conf="item"></collapse>
  </div>
  </div>
</template>

<script>
import Collapse from './collapse.vue'
export default {
  name:'service',
  data:function(){
    return {
      list:[
        {
          title:'联系客服',
          content:'00000',
          html:'',
        },
        {
          title:'退货地址',
          content:'11111111',
          html:'',
        },
        {
          title:'关于售后',
          content:'22222',
          html:'',
        }
      ]
    }
  },
  components:{
    Collapse
  }
}
</script>

<style lang="css">

</style>
