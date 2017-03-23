<template>
    <div class="jump content" style="padding-top:55%;box-sizing:border-box;">
        <div class="content-box text-center">
            <icon type="success"></icon>
            <div class="margin-tb-20">恭喜您! 邮箱验证已通过!</div>
            <div class="margin-tb-20">
                 <router-link to="/" class="color-success">立即跳转</router-link>
            </div>
            <div class="color-danger">{{jump_time}}s 后跳转</div>
        </div>
    </div>
</template>
<script>
    import {XButton,Icon} from 'vux'
    export default {
        name:'jump',
        data:function(){
            return {
                jump_time:5,
            }
        },
        created:function(){
            var self=this;
            // self.jump_time=5;
            // setInterval(function(){
            //     self.jump_time--;
            //     if(self.jump_time<=0){
            //         self.$router.push("/");
            //     }
            // },1000)
        },
        components:{
            XButton,
            Icon
        }
    }
</script>
<style lang="css" scoped>
    
</style>