<template lang="html">
  <div class="myqrcode content text-center">
    <div class="content-box">
      <div class="user-logo margin-tb-20">
        <img :src="config.imagePath" alt="" class="circle">
      </div>
      <vue-q-art :config="config" class="qrcode-content"></vue-q-art>
      <div>创建时间</div>
      <div>03.20.2017</div>
    </div>
  </div>
</template>

<script>
import VueQArt from 'vue-qart'
import QArt from 'qartjs'
export default {
  name:'qrcode',
  data:function(){
    return {
       config: {
          value: 'http://119.23.22.185/app',
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
.myqrcode button{
  display:none;
}
.qrcode-content{
  margin-top:10%;
}
.myqrcode .qrcode-content canvas{
  width:7rem;
  height:7rem;
}
.qrcode-content button{
  display:none;
}
</style>
