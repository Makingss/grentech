<template lang="html">
  <div class="myqrcode content">
    <div class="content-box">
      <div class="card-qrcode bg-white border-radius-5">
        <div class="color-white text-center card-qrcode-header">
          <p class="padding-tb-20 font-2x">
           <span class="padding-rl-4" v-for="(item,index) in name">{{item}}</span>
          </p>
          <div class="user-logo link-img circle block-center">
             <img :src="config.avatar" alt="">
          </div>
          <div class="padding-10">
            <p>职位</p>
            <p>{{position}}</p>
          </div>
          <div class="padding-10">
            <p>联系方式</p>
            <p>{{tel}}</p>
          </div>
        </div>
         <div class="text-center">
           <vue-q-art :config="config" class="qrcode-content"></vue-q-art>
         </div>
         <div class="text-center brand-footer">
          <p>&copy;{{brand}}</p>
         </div>
      </div>
    </div>
  </div>
</template>

<script>
import VueQArt from 'vue-qart'
import QArt from 'qartjs'
import {Flexbox,FlexboxItem} from 'vux'
export default {
  name:'qrcode',
  data:function(){
    return {
       name:'张三',
       brand:'国人天线',
       position:"XXX",
       tel:'1850300XXXX',
       config: {
          value: 'http://119.23.22.185/app',
          avatar: '/static/slice/girl_avatar.jpg',
          imagePath: '/static/icons/bg-white.jpg',
          filter: 'color'
        },
    }
  },
  created:function(){

  },
  components:{
    VueQArt,
    Flexbox,
    FlexboxItem
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
.myqrcode{
   background: #e55d67; /* Old browsers */
  background: -moz-linear-gradient(45deg,  #e55d67 0%, #e55774 55%, #e6517e 100%); /* FF3.6-15 */
  background: -webkit-linear-gradient(45deg,  #e55d67 0%,#e55774 55%,#e6517e 100%); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(45deg,  #e55d67 0%,#e55774 55%,#e6517e 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e55d67', endColorstr='#e6517e',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */

}
.myqrcode .content-box{
  height:100%;
}
.myqrcode .qrcode-content canvas{
  width:7rem;
  height:7rem;
}

.myqrcode .card-qrcode{
  height:90%;
  position:absolute;
  top:5%;
  width:90%;
  left:5%;
  overflow:hidden;
  box-shadow:3px 3px 10px #444;
}
.myqrcode .card-qrcode-header{
  // padding:20px 0;
  height:57%;
  /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#f75154+0,f0a66d+100 */
  background: #f75154; /* Old browsers */
  background: -moz-linear-gradient(45deg,  #f75154 0%, #f0a66d 100%); /* FF3.6-15 */
  background: -webkit-linear-gradient(45deg,  #f75154 0%,#f0a66d 100%); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(45deg,  #f75154 0%,#f0a66d 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f75154', endColorstr='#f0a66d',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */

}
.myqrcode .brand-footer{
  position:absolute;
  bottom:1rem;
  width:100%;
}
.myqrcode  .user-logo{
  width:4rem;
  height:4rem;
  box-shadow:0 0  10px #f0a66d;
}
</style>
