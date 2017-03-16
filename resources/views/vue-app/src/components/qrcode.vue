<template lang="html">
  <div class="myqrcode content">
    <qrcode value="111"></qrcode>
    二维码
  </div>
</template>

<script>
import { Qrcode } from 'vux'
export default {
  name:'qrcode',
  data:function(){
    return {

    }
  },
  created:function(){

  },
  components:{
    Qrcode
  },
  methods:{

  }
}
</script>

<style lang="css">
</style>
