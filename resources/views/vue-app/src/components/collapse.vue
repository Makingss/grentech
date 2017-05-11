<template lang="html">
  <div class="collapse">
    <div class="collapse-header padding-rl-10 padding-tb-6 border-1px-b bg-light" @click="collapse">
        {{conf.title}}
        <span class="iconfont" v-if="is_show">&#xe772;</span>
        <span class="iconfont" v-else>&#xe76e;</span>
    </div>
    <div class="collapse-header padding-10" v-show="is_show">
        {{conf.content}}
    </div>
  </div>
</template>

<script>
export default {
  name:'collpase',
  data:function(){
    return {
      is_show:false
    }
  },
  props:{
    conf:Object
  },
  methods:{
    collapse:function(){
      //console.log('col');
      this.is_show=!this.is_show;
    }
  }
}
</script>

<style lang="css">
</style>
