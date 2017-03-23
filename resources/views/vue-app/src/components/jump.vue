<template>
    <div class="jump content" style="padding-top:55%;box-sizing:border-box;">
        <div class="content-box text-center">
            <icon type="waiting-circle" v-if="res==1"></icon>
            <icon type="success" v-if="res==2"></icon>
            <icon type="warn" v-if="res==3"></icon>
            <div class="margin-tb-20">{{res_msg}}</div>
            <div v-if="res!=1">
                 <div class="margin-tb-20">
                  <router-link to="/" class="color-success">立即跳转</router-link>
                 </div>
                 <div class="color-danger">{{jump_time}}s 后跳转</div>
            </div>
           
        </div>
    </div>
</template>
<script>
    import {XButton,Icon} from 'vux'
    import api from '../api'
    export default {
        name:'jump',
        data:function(){
            return {
                jump_time:5,
                res:1, //1-- 等待; 2--- 成功; 3-- 失败
                res_msg:'正在验证,请稍后....',
                success_msg:'恭喜您! 邮箱验证已通过!',
                error_msg:'注册验证失败! 请检查'
            }
        },
        created:function(){
            this.get_access_token();
        },
        methods:{
            get_access_token:function(){
                var self=this;
                var query=this.$route.query;
                console.log(query);
                api.get_token(query).then(res=>{
                    console.log(res);
                    var res_data=res.data;
                    if(res_data.res){
                        self.res_msg=self.success_msg;
                        self.res=2;
                        self.jump_to_home();
                        window.location.access_token=res_data.data.access_token;
                        window.location.expires_in=res_data.data.expires_in;
                        window.location.refresh_token=res_data.data.refresh_token;
                        window.location.token_type=res_data.data.token_type;
                        window.location.service_time=res_data.service_time;
                    }else{
                        self.res_msg=self.error_msg;
                        self.res=3;
                        self.jump_to_home();
                    }
                })
            },
            jump_to_home:function(){
                var self=this;
                self.jump_time=5;
                setInterval(function(){
                    self.jump_time--;
                    if(self.jump_time<=0){
                        self.$router.push("/");
                    }
                },1000)
            }
        },
        components:{
            XButton,
            Icon
        }
    }
</script>
<style lang="css" scoped>
    
</style>