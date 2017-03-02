<template lang="html">
  <div class="favgoods content">
    <swipeout>
      <swipeout-item class="border-1px-b" v-for="(item,index) in favgoods_data">
        <div slot="right-menu" transition-mode="follow">
          <swipeout-button type="warn">
            删除
          </swipeout-button>
        </div>
        <div slot="content" class="padding-tb-6">
          <router-link :to="item.url">
            <flexbox>
              <flexbox-item class="link-img padding-l-6" :span="3">
                <img :src="item.img" alt="">
              </flexbox-item>
              <flexbox-item :span="9" class="padding-r-10 border-box">
                <p class="line-ellispse-2">{{item.name}}</p>
                <p>收藏日期:{{item.createtime}}</p>
              </flexbox-item>
            </flexbox>
          </router-link>

        </div>
      </swipeout-item>
    </swipeout>
  </div>
</template>

<script>
import {Swipeout,SwipeoutItem,SwipeoutButton,Flexbox,FlexboxItem} from 'vux'
export default {
  name:'favgoods',
  data:function(){
    return {
      favgoods_data:[
        {
          img:'http://mall.yingerfashion.com/public/images/aa/07/eb/0e8312e96e944b17dd28b7365bafaaaff7cec765.jpg',
          url:'/goods',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          price:'1290.00',
          createtime:'2017-02-02',
        },{
          img:'http://mall.yingerfashion.com/public/images/aa/07/eb/0e8312e96e944b17dd28b7365bafaaaff7cec765.jpg',
          url:'/goods',
          name:'YINER音儿2016秋款/时尚绵羊真皮修身机车皮衣外套86319660',
          price:'1290.00',
          createtime:'2017-02-03',
        },{
          img:'http://mall.yingerfashion.com/public/images/aa/07/eb/0e8312e96e944b17dd28b7365bafaaaff7cec765.jpg',
          url:'/goods',
          name:'测试商品',
          price:'1290.00',
          createtime:'2017-02-04',
        }
      ]
    }
  },
  components:{
    Swipeout,
    SwipeoutItem,
    SwipeoutButton,
    Flexbox,
    FlexboxItem
  },
  methods:{

  }
}
</script>

<style lang="css">
</style>
