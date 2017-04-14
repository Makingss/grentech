<template>
    <div class="slogen bg-sliver">
        <div class="container block-center padding-tb-10 border-1px-b">
         <el-row>
            <el-col :span="6" class="footer-service-item">
               <span class="iconfont font-5x">&#xe606;</span>
               <span class="iconfont font-2x">正品保证,精致服务</span>
            </el-col>
            <el-col :span="6" class="footer-service-item">
                <span class="iconfont font-5x">&#xe611;</span>
                <span class="iconfont font-2x">天天低价,畅选无忧</span>
            </el-col>
            <el-col :span="6" class="footer-service-item">
                <span class="iconfont font-5x">&#xe609;</span>
                <span class="iconfont font-2x">30天无忧退货</span>
            </el-col>
            <el-col :span="6" class="footer-service-item">
                <span class="iconfont font-5x">&#xe60b;</span>
                <span class="iconfont font-2x">满88包邮,低价保障</span>
            </el-col>
        </el-row>
        </div>
    </div>
</template>
<script>
    export default {
        data:function(){
            return {
                
            }
        }
    }
</script>
<style lang="less" scoped>
    .slogen{
        height:74px;
        .footer-link-cell{
            width:20%;
            float:left;
        }
        .footer-link-title{
            padding:7px 0;
        }
    }
    .footer-service-item{
        height:54px;
        line-height:54px;
        span{
            display:inline-block;
            vertical-align:middle;
            height:54px;
            line-height:54px;
        }
       
    }
</style>