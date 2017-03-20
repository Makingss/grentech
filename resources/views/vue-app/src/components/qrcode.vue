<template lang="html">
  <div class="myqrcode content">
     <vue-q-art :config="config"></vue-q-art>
  </div>
</template>

<script>
import VueQArt from 'vue-qart'
import QArt from 'qartjs'
// import { Qrcode } from 'vux'
export default {
  name:'qrcode',
  data:function(){
    return {
       config: {
          value: 'https://www.baidu.com',
          imagePath: '/static/slice/girl_avatar.jpg',
          filter: 'color'
        },
    }
  },
  created:function(){

  },
  components:{
    VueQArt
  },
  methods:{

  }
}
</script>

<style lang="css">
</style>
