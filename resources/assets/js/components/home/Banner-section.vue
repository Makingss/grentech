<template>
    <div class="block-center">
        <div class="banner-box border-1px">
            <div class="banner-carousel">
                 <el-carousel :interval="5000" height="400px">
                    <el-carousel-item class="bg-gray carousel-item" v-for="(item,index) in banner_list" :key="index">
                       <a href="#" class="link-img text-center">
                        <img :src="item.url" alt="">
                       </a>
                    </el-carousel-item>
                </el-carousel>
            </div>
           
        </div>
    </div>
</template>
<script>
    export default {
        data:function(){
            return {
                banner_list:[
                    {
                        url:'//haitao.nos.netease.com/j17twqop9_1920_400.jpg?imageView&thumbnail=1920x0&quality=90',
                    },{
                        url:'//haitao.nos.netease.com/j17tb8xw92_1920_400.jpg?imageView&thumbnail=1920x0&quality=90',
                    },{
                        url:'//haitao.nos.netease.com/j17xbvbc78_1920_400.jpg?imageView&thumbnail=1920x0&quality=90',
                    },{
                        url:'//haitao.nos.netease.com/j17tvmoc85_1920_400.jpg?imageView&thumbnail=1920x0&quality=90',
                    }
                ]
            }
        }
    }
</script>
<style lang="less" scoped>
    .banner-box{
        // margin-left:200px;
        height:400px;
        position:relative;
        
    }
    .banner-carousel{
        overflow:hidden;
        .carousel-item img{
            width:1920px;
            height:400px;
            transform:translateX(-300px);
        }
    }
    .banner-right{
        position:absolute;
        width:190px;
        top:0;
        right:0;
    }
    
</style>