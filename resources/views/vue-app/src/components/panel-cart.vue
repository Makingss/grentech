<template lang="html">
  <flexbox class="panel-cart padding-tb-6">
    <flexbox-item class="item-media text-center link-img" :span="3/12">
      <img :src="item.images.url" alt="">
    </flexbox-item>
    <flexbox-item class="item-content" :spam="9/12">
      <div class="item-title padding-l-10">
        {{item.name}}
      </div>
      <div class="item-title padding-l-10 line-ellispse-2" v-if="!!item.electrics">
        频段:
        <span v-for="(_item,_index) in item.electrics" v-if="!!_item.workingband">
            {{_item.workingband}}
           <i v-if="(_index!=item.electrics.length-1)&&!!item.electrics[_index+1].workingband">/</i>
           </span>
        <span v-if="item.electrics.length">M</span>
      </div>
      <div class="item-title padding-l-10 line-ellispse-2">
        增益: <span v-for="(_item,_index) in item.electrics" v-if="!!_item.beamgain">{{_item.beamgain}}<i v-if="(_index!=item.electrics.length-1)&&!!item.electrics[_index+1].beamgain">/</i></span>
        <span v-if="item.electrics.length">dBi</span>
      </div>
      <div class="item-title line-ellispse-2 padding-l-10">
        电下倾: <span v-for="(_item,_index) in item.electrics" v-if="!!_item.dipangle">{{_item.dipangle}}<i v-if="(_index!=item.electrics.length-1)&&!!item.electrics[_index+1].dipangle">/</i></span>
        <span v-if="item.electrics.length">°</span>
      </div>
      <div class="item-subtitle padding-l-10">
        SAP:{{item.bn}}
      </div>
      <div class="item-subtitle padding-l-10">
        <p v-if="false">产品描述:{{item.product_desc}}</p>
        <p>市场价: <span class="color-danger font-bold">¥{{item.price}}</span></p>
        <s class="color-gray" v-if="item.mktprice">¥{{item.mktprice}}</s>
      </div>
      <div class="item-subtitle">
        <x-number :title="quantity" :min="1" :value="item.quantity" class="padding-rl-10 padding-tb-6 font-normal" width="40px">
        </x-number>
      </div>
    </flexbox-item>
  </flexbox>
</template>

<script>
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
        value: 2,
        min: 1,
        max: 10,
      }
    },
    props: {
      item: Object
    },
    created: function() {
      console.log(this.item);
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
