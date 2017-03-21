<template lang="html">
  <div class="address content">
  <div class="content-box">
  <swipeout>
      <swipeout-item v-for="(item,index) in address_list" transition-mode="follow" :right-menu-width="80" class="padding-rl-10 padding-tb-6 border-1px-b">
        <div slot="right-menu">
          <swipeout-button type="warn">
            删除
          </swipeout-button>
        </div>
        <div slot="content">
          <flexbox>
            <flexbox-item :span="11">
              <flexbox>
                <flexbox-item :span="2">
                  <div class="bg-gray circle address-header font-3x text-center">
                    {{item.ship_name.slice(0,1)}}
                  </div>
                </flexbox-item>
                <flexbox-item :span="10">
                  <p>{{item.ship_name}}</p>
                  <p>{{item.ship_mobile}}</p>
                  <p>{{item.ship_area}}</p>
                  <p>{{item.ship_addr}}</p>
                </flexbox-item>
              </flexbox>
            </flexbox-item>
            <flexbox-item :span="1" @click.native="edit_address">
              <span class="iconfont">&#xe627;</span>
            </flexbox-item>
          </flexbox>
        </div>
      </swipeout-item>
    </swipeout>
    <div class="margin-tb-20 padding-rl-10 tab-80 block-center">
      <x-button plain>添加地址</x-button>
    </div>
  </div>
    
    <popup v-model="popup_address" height="70%" :hide-on-blur="true">
      <div class="padding-rl-10"><span @click="edit_address" class="iconfont text-center circle pull-right popup-close-btn font-2x bg-danger color-white">&#xe606;</span></div>
        <group class="edit_address_content" title="修改地址">
          <x-input title="姓名" class="font-normal" :value="address_data.name" placeholder="收件人姓名" :show-clear="false"></x-input>
          <x-input title="手机" class="font-normal" :value="address_data.ship_mobile" plaplaceholderce="收件人手机" :show-clear="false"></x-input>
          <x-input title="电话" class="font-normal" :value="address_data.ship_tel" placeholder="可选" :show-clear="false"></x-input>
          <x-input title="邮编" class="font-normal" :value="address_data.ship_zip" placeholder="可选" :show-clear="false"></x-input>
          <x-input title="地址" class="font-normal" :value="address_data.ship_area" placeholder="地址" :show-clear="false"></x-input>
        </group>
    </popup>
  </div>
</template>

<script>
import {Swipeout,Flexbox,FlexboxItem,SwipeoutItem,SwipeoutButton,XButton,Popup,Group,Cell,XInput} from 'vux'
export default {
  name:'address',
  data:function(){
    return {
      popup_address:false,
      address_data:{
        name:'王小明',
        ship_mobile:'18503009595',
        ship_tel:'',
        ship_zip:'',
        ship_addr:'大浪街道',
        ship_area:'广东省/深圳市/龙华新区'
      },
      address_list:[
        {
          ship_name:'吴燕平',
          ship_area:'湖南省 衡阳市 蒸湘区',
          ship_addr:'天丰路113号',
          ship_mobile:'15817464830',
          zip:'233609',
        },{
          ship_name:'王小明',
          ship_area:'湖南省 衡阳市 蒸湘区',
          ship_addr:'天丰路113号',
          ship_mobile:'15817464830',
          zip:'233609',
        },{
          ship_name:'彭勃',
          ship_area:'湖南省 衡阳市 蒸湘区',
          ship_addr:'天丰路113号',
          ship_mobile:'15817464830',
          zip:'233609',
        }
      ]
    }
  },
  methods:{
    edit_address:function(){
      console.log("edit_address");
      this.popup_address=!this.popup_address;
    }
  },
  components:{
    Swipeout,
    SwipeoutItem,
    Flexbox,
    FlexboxItem,
    SwipeoutButton,
    XButton,
    Popup,
    Group,
    Cell,
    XInput
  }
}
</script>

<style lang="css">
.address-header{
  width:2.6rem;
  height:2.6rem;
  line-height: 2.6rem;
  color:#aaa;
}
.popup-close-btn{
  width:2rem;
  line-height:2rem;
  height:2rem;
  transform:translateY(-1rem);
  box-shadow:0 0 10px #E53935;
}
.edit_address_content{
  width:100%;
}
.edit_address_content .weui-cells{
  width:100%;
}
</style>
