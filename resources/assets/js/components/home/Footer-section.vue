<template>
    <div class="footer bg-sliver padding-t-10">
        <div class="footer-link clear-float container block-center">
            <div>
                <div class="footer-link-cell">
                    <h3 class="footer-link-title">购物指南</h3>
                    <ul class="footer-link-item">
                        <li>购物流程</li>
                        <li>会员介绍</li>
                        <li>常见问题</li>
                        <li>联系客服</li>
                    </ul>
                </div>
                <div class="footer-link-cell">
                    <h3 class="footer-link-title">配送方式</h3>
                    <ul class="footer-link-item">
                        <li>上门自提</li>
                        <li>211限时达</li>
                        <li>运费标准</li>
                        <li>物流跟踪</li>
                    </ul>
                </div>
                <div class="footer-link-cell">
                    <h3 class="footer-link-title">支付方式</h3>
                    <ul class="footer-link-item">
                        <li>货到付款</li>
                        <li>在线支付</li>
                        <li>分期付款</li>
                        <li>公司转账</li>
                    </ul>
                </div>
                <div class="footer-link-cell">
                    <h3 class="footer-link-title">售后服务</h3>
                    <ul class="footer-link-item">
                        <li>配送方式</li>
                        <li>配送服务</li>
                        <li>运费标准</li>
                        <li>物流跟踪</li>
                    </ul>
                </div>
                <div class="footer-link-cell">
                    <h3 class="footer-link-title">关于我们</h3>
                    <ul class="footer-link-item">
                        <li>联系我们</li>
                        <li>招商合作</li>
                        <li>销售联盟</li>
                        
                    </ul>
                </div>
            </div>        
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
    .footer{
        height:150px;
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