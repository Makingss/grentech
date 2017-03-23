<template>
    <div class="jump content" style="padding-top:60%;box-sizing:border-box;">
        <div class="content-box text-center">
            恭喜您! 邮箱验证已通过!

            <div style="margin-top:20px;">
                 <router-link to="/app" class="color-success">立即跳转</router-link>
            </div>
        </div>
    </div>
</template>
<script>
    import {XButton} from 'vux'
    export default {
        name:'jump',
        data:function(){
            return {

            }
        },
        created:function(){
            
        }
    }
</script>
<style lang="css" scoped>
    
</style>