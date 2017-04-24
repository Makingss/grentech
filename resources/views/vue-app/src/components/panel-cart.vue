<template lang="html">
  <flexbox class="panel-cart padding-tb-6">
    <flexbox-item class="item-media text-center link-img" :span="3/12">
      <img :src="item.images.url" alt="">
    </flexbox-item>
    <flexbox-item class="item-content" :spam="9/12">
      <div class="item-title padding-l-10">
        {{item.name}}
      </div>
      <div class="item-title font-mini padding-l-10 line-ellispse-2" v-if="!!item.electrics&&item.electrics.length">
        频段:
        <span v-for="(_item,_index) in item.electrics" v-if="!!_item.workingband">{{_item.workingband}}<i v-if="(_index!=item.electrics.length-1)&&!!item.electrics[_index+1].workingband">/</i></span>
      </div>
      <div class="item-title font-mini padding-l-10 line-ellispse-2" v-if="!!item.electrics&&item.electrics.length">
        增益: <span v-for="(_item,_index) in item.electrics" v-if="!!_item.beamgain">{{_item.beamgain}}<i v-if="(_index!=item.electrics.length-1)&&!!item.electrics[_index+1].beamgain">/</i></span>
        <span v-if="item.electrics.length">dBi</span>
      </div>
      <div class="item-title  font-mini line-ellispse-2 padding-l-10" v-if="!!item.electrics&&item.electrics.length">
        电下倾: <span v-for="(_item,_index) in item.electrics" v-if="!!_item.dipangle">{{_item.dipangle}}<i v-if="(_index!=item.electrics.length-1)&&!!item.electrics[_index+1].dipangle">/</i></span>
        <span v-if="item.electrics.length">°</span>
      </div>
      <div class="item-subtitle color-gray padding-l-10 font-mini">
        SAP:{{item.bn}}
      </div>
      <div class="item-subtitle padding-l-10">
        <p v-if="false">产品描述:{{item.product_desc}}</p>
        <p>市场价: <span class="color-danger font-bold">¥{{item.mktprice}}</span></p>
      </div>
      <div class="item-subtitle">
        <x-number :title="quantity" :min="1" :max="99" :value="item.cart_objects.quantity" @on-change="update_cart" class="padding-rl-10 padding-tb-6 font-normal" width="40px">
        </x-number>
      </div>
    </flexbox-item>
  </flexbox>
</template>

<script>
  import api from '../api'
  import {
    Flexbox,
    FlexboxItem,
    XNumber
  } from 'vux'
  export default {
    name: 'panel-cart',
    data: function() {
      return {
        quantity: '数量',
        init:true,
      }
    },
    props: {
      item: Object,
      index:Number
    },
    created: function() {
      console.log(this.item);
    },
    methods:{
      update_cart:function(val){
        var self=this;
        console.log(val);
        console.log("}}}}}}}}}}");
        if(self.item.cart_objects.quantity==val) return;
        if(val==0) return;
       
        api.update_cart({
          quantity:val,
          goods_id:self.item.cart_objects.goods_id,
          id:self.item.cart_objects.id
        }).then(res=>{
          console.log(res);
          if(res.ok){
            if(res.status){
              //什么也不做
            }else{
              self.$vux.toast.show({
                text:'<span class="font-normal">'+res.data.msg+'</span>',
                type:'warn'
              })
            }
          } else{
            self.$vux.toast.show({
                text:'<span class="font-normal">'+res.statusText+'</span>',
                type:'warn'
            })
          }
        })
      }
    },
    components: {
      Flexbox,
      FlexboxItem,
      XNumber
    }
  }
</script>

<style lang="css">
  
</style>
