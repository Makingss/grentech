<template lang="html">
  <div class="address content">
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
            <flexbox-item :span="1">
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
</template>

<script>
import {Swipeout,Flexbox,FlexboxItem,SwipeoutItem,SwipeoutButton,XButton} from 'vux'
export default {
  name:'address',
  data:function(){
    return {
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

  },
  components:{
    Swipeout,
    SwipeoutItem,
    Flexbox,
    FlexboxItem,
    SwipeoutButton,
    XButton
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
</style>
