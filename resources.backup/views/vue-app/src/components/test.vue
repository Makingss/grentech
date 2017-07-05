<template lang="html">
  <div class="test">
     <img class="previewer-demo-img" v-for="(item, index) in list" :src="item.src" width="100" @click="show(index)">
     <previewer :list="list" ref="previewer" :options="options"></previewer>
         
  </div>
</template>

<script>

import { Previewer } from 'vux'
export default {
    data:function(){
        return {
            list: [{
             src: 'https://placekitten.com/800/400',
             w: 600,
             h: 400
            },{
                src: 'https://placekitten.com/1200/900',
                w: 1200,
                h: 900
            }],
            options: {
                getThumbBoundsFn (index) {
                // find thumbnail element
                let thumbnail = document.querySelectorAll('.previewer-demo-img')[index]
                // get window scroll Y
                let pageYScroll = window.pageYOffset || document.documentElement.scrollTop
                // optionally get horizontal scroll
                // get position of element relative to viewport
                let rect = thumbnail.getBoundingClientRect()
                // w = width
                return {x: rect.left, y: rect.top + pageYScroll, w: rect.width}
                // Good guide on how to get element coordinates:
                // http://javascript.info/tutorial/coordinates
                }
            }
        }
    },
    // 映射 vuex 上面的属性
    created() {
       
    },
    methods: {
        // 映射 vuex 对象上的方法
        show (index) {
         this.$refs.previewer.show(index)
        }
    },
    components:{
        Previewer
    }
};

</script>

<style lang="css">
</style>
