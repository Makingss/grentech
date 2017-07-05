<template lang="html">
  <div class="setting content">
  <div class="content-box">
   <group>
      <cell :title="user_data.avatar.title" class="font-normal">
        <img :src="user_data.avatar.value" class="circle" alt="" style="width:2rem;height:2rem;">
      </cell>
      <cell class="font-normal" :title="item.title" :is-link="item.is_link" :value="item.value" v-for="(item,index) in user_data" link="/home" v-if="index!='avatar'"></cell>
    </group>
  </div>
  </div>
</template>

<script>
import {Group,Cell} from 'vux'
export default {
  name:'setting',
  data:function(){
    return {
      user_data:{
        avatar:{
          title:"头像",
          value:'/static/slice/user_logo.jpg',
          is_link:true
        },
        login_account:{
          value:'18503009595',
          title:'登录账号',
          is_link:true
        },
        nick_name:{
          value:'吴燕平',
          title:'昵称',
          is_link:true
        },
        sex:{
          value:'男',
          title:'性别',
          is_link:true
        },
        birthday:{
          value:'1988-10-29',
          title:'生日',
          is_link:true
        },
        area:{
          title:'地区',
          value:'',
          is_link:true
        },
        find_pwd:{
          title:"找回密码",
          value:'',
          is_link:true,
        }
      }
    }
  },
  methods:{

  },
  components:{
    Group,
    Cell
  }
}
</script>

<style lang="css">
</style>
