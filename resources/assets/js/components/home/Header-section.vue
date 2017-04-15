<template>
     <div class="header-section container block-center">
        <div class="logo-brand header-section-logo link-img">
            <a href="/cart" class="link-img">
              <img src="/images/slice/logo.v2@2x.png" alt="">
            </a>
        </div>
        <div class="search-box block-center">
            <el-input v-model="input" placeholder="请输入内容">
                <el-button slot="append" icon="search"></el-button>
            </el-input>
            <div class="padding-tb-10 color-gray">
                <span class="padding-r-10" v-for="(item,index) in intro_list">{{item}}</span>
            </div>
        </div>
        <div class="mycart-box bg-white text-center border-1px padding-rl-10 border-radius-5">
            <span class="iconfont">&#xe887;</span>
            <a href="/shopcart">我的购物车</a>
        </div>
    </div>
</template>
<script>
    export default {
        data:function(){
            return {
                input:'',
                intro_list:["办公","除湿机","男鞋","T恤","生鲜","秒杀","雨伞"]
            }
        }

    }
</script>
<style lang="less" scoped>
    .header-section{
        height:100px;
        position:relative;
        .search-box{
            width:500px;
            padding-top:32px;
        }
        .logo-brand{
            width:190px;
            height:190px;
        }
        .mycart-box{
            position:absolute;
            top:32px;
            right:140px;
            height:36px;
            line-height:36px;
            cursor:pointer;
        }
    }
    .header-section-logo {
        position:absolute;
        top:0;
        left:0;
    }
    
</style>