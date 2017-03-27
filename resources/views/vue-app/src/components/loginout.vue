<template>
    <div class="loginout">
        <div class="login-logo block-center link-img margin-tb-20" style="margin-top:3rem;">
             <img src="/static/slice/logo_300.png" alt="" class="margin-tb-20">
        </div>
        <group>
            <cell class="font-normal" title="头像" v-if="false">
                <img :src="avatar" class="circle" alt="" style="width:2rem;height:2rem;">
            </cell>
            <cell class="font-normal" title="登录账号" :value="email"></cell>
            <cell class="font-normal" title="用户名" :value="name"></cell>
            <cell class="font-normal" title="创建" :value="created_at"></cell>
        </group>
        <div class="tab-80 block-center margin-tb-20"><x-button class="bg-gray" @click.native="loginout">退出登录</x-button></div>
    </div>
</template>
<script>
    import api from '../api'
    import {Group,Cell,XButton} from 'vux'
    export default {
        name:'loginout',
        data:function(){
            return {
                email:'',
                name:'',
                created_at:'',
                avatar:'/static/slice/user_logo.jpg'
            }
        },
        created:function(){
            this.check_locl_token();
            this.render_user_info();
        },
        methods:{
            render_user_info:function(){
                var user_info=this.get_sessionStorage_user_info();
                if(user_info){
                    this.loading_status=true;
                    this.name=user_info.name;
                    this.email=user_info.email;
                    this.avatar=user_info.avatar;
                }
            },
            check_locl_token:function(){
                var self=this;
                var result=this.check_token();
                console.log(result);
                if(result==1){
                    //未登录用户---不做任何操作
                }else if(result==2){
                    //token过期用户
                    self.refresh_token(function(){
                        console.log("回调执行");
                        self.fetch_user_info();
                    });
                }else if(result==3){
                    //正常状态
                    self.fetch_user_info();
                }
            },
            fetch_user_info:function(){
                //拉取用户信息
                console.log("拉取用户信息");
                var self=this;
                api.get_user_info({
                        headers:{
                            'Accept':'application/json',
                            'Authorization':"Bearer "+window.localStorage.access_token,
                        }
                    }).then(res=>{
                    console.log(res.data);
                    if(res.data.id){
                        self.loading_status=true;
                        self.name=res.data.name;
                        self.avatar=res.data.avatar;
                        self.email=res.data.email;
                        window.sessionStorage.user_info=JSON.stringify(res.data);
                    }
                    })
            },
            loginout:function(){
                window.localStorage.clear();
                window.sessionStorage.clear();
            }
        },
        components:{
            Group,
            Cell,
            XButton
        }
    }
</script>
<style lang="css" scoped>
    
</style>