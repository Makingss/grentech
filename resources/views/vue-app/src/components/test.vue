<template lang="html">
  <div class="test">
    <!-- {{commend}} -->
    11111
  </div>
</template>

<script>
import {mapState,mapActions} from 'vuex'
export default{
  computed:mapState({
    recommend:state=>state.news.recommend
  }),
  created:function(){
    this.GETRECOMMEND();
  },
  methods:{
    ...mapActions(['GETRECOMMEND'])
  }
}

</script>

<style lang="css">
</style>
