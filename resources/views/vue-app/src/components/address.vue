<template lang="html">
  <div class="address content">
    <div class="content-box">
      <swipeout v-if="address_list.length">
        <swipeout-item v-for="(item,index) in address_list" transition-mode="follow" :right-menu-width="80" class="padding-rl-10 bg-white border-1px-b">
          <div slot="right-menu">
            <swipeout-button type="warn" @click.native="del_addr(index)">
              删除
            </swipeout-button>
          </div>
          <div slot="content">
            <flexbox>
              <flexbox-item :span="11">
                <flexbox>
                  <flexbox-item :span="2">
                    <div class="bg-gray circle address-header font-3x text-center">
                      {{item.name.slice(0,1)}}
                    </div>
                  </flexbox-item>
                  <flexbox-item :span="10" class="padding-tb-6">
                    <p>{{item.name}}</p>
                    <p>{{item.mobile}}</p>
                    <p>{{item.area}}</p>
                    <p v-if="false">{{item.area}}</p>
                    <p v-if="false">{{item.addr}}</p>
                  </flexbox-item>
                </flexbox>
              </flexbox-item>
              <flexbox-item :span="1" @click.native="edit_address(index)">
                <span class="iconfont">&#xe627;</span>
              </flexbox-item>
            </flexbox>
          </div>
        </swipeout-item>
      </swipeout>
      <div class="addr_empty text-center" v-if="!address_list.length">
        <span class="iconfont color-gray" style="font-size:50px;">&#xe620;</span>
      </div>
      <div class="margin-tb-20 padding-rl-10 tab-80 block-center">
        <x-button plain @click.native="add_addr">添加地址</x-button>
      </div>
    </div>
    <popup v-model="popup_address" height="55%" :hide-on-blur="true">
      <div class="padding-rl-10"><span @click="edit_address" class="iconfont text-center circle pull-right popup-close-btn font-2x bg-danger color-white">&#xe606;</span></div>
      <group class="edit_address_content" title="修改地址">
        <x-input title="姓名" class="font-normal" v-model="address_data.name" placeholder="收件人姓名" :show-clear="false"></x-input>
        <x-input title="手机" class="font-normal" v-model="address_data.mobile" plaplaceholderce="收件人手机" :show-clear="false"></x-input>
        <x-input title="电话" v-if="false" class="font-normal" v-model="address_data.tel" placeholder="可选" :show-clear="false"></x-input>
        <x-input title="邮编" v-if="false" class="font-normal" v-model="address_data.zip" placeholder="可选" :show-clear="false"></x-input>
        <x-address title="区域" class="font-normal" placeholder="请选择地址" v-model="address_data.code" :list="addressData"></x-address>
        <x-input title="详细地址" v-if="false" class="font-normal" v-model="address_data.addr" placeholder="详细地址" :show-clear="false"></x-input>
      </group>
      <tabbar class="bar bar-secondary">
        <tabbar-item class="bg-danger" @click.native="cancel_address_edit">
          <span slot="label" class="color-white">取消</span>
        </tabbar-item>
        <tabbar-item class="bg-primary" @click.native="save_address_data">
          <span slot="label" class="color-white">保存</span>
        </tabbar-item>
      </tabbar>
    </popup>
  </div>
</template>

<script>
  import {
    Swipeout,
    Flexbox,
    FlexboxItem,
    SwipeoutItem,
    SwipeoutButton,
    XButton,
    Popup,
    Group,
    Cell,
    XInput,
    XAddress,
    ChinaAddressData,
    Tabbar,
    TabbarItem,
    Value2nameFilter as value2name
  } from 'vux'
  import api from '../api'
  export default {
    name: 'address',
    data: function() {
      return {
        popup_address: false,
        edit_status: false,
        edit_index: null,
        address_value: [],
        temp_area:'',
        addressData: ChinaAddressData,
        address_data: {
          name: '',
          mobile: '',
          zip: '',
          tel: '',
          area: [],
          addr: '',
          addr_id: null,
          area_name:'',
        },
        address_list: []
      }
    },
    created: function() {
      this.fetch_addrs();
    },
    methods: {
      getName:function(value){
       return value2name(value, ChinaAddressData)
      },
      edit_address: function($index) {
        var self = this;
        //console.log(this.popup_address);
        if (!this.popup_address) {
          //关闭状态-->打开
          this.edit_status = true;
          
          this.address_data = this.address_list[$index];
        } else {
          //打开状态->关闭
          this.edit_status = false;
          this.fix_origin_data();
        }
        //切换
        // console.log
        this.popup_address = !this.popup_address;
      },
      fetch_addrs: function() {
        var self = this;
        api.get_addrs().then(res => {
          //console.log(res);
          if (res.ok) {
            if (res.data.constructor == Array) {
              this.address_list = res.data;
              for (var i = 0; i < res.data.length; i++) {
                // this.address_list[i].area = res.data[i].area.split("/");
                this.address_list[i].code = res.data[i].code.split("/");
              }
            }
          } else {
            self.$vux.toast.show({
              text: '<span class="font-normal">' + res.statusText + '</span>'
            })
          }
        })
      },
      add_addr: function() {
        this.popup_address = true;
      },
      cancel_address_edit: function() {
        this.popup_address = false;
      },
      save_address_data: function() {
        var self = this;
        this.popup_address = false;
        //判断当前处于更新状态还是新增状态
        var area = self.getName(self.address_data.code);
        //console.log(area);
        if (area!='') area = area.split(" ").join("/");
        
        //校验数据完整程度
        if (self.address_data.mobile == "") {
          self.$vux.toast.show({
            text: '<span class="font-normal">手机号不能为空</span>',
            type: 'warn'
          })
          return;
        }
        if (self.address_data.name == "") {
          self.$vux.toast.show({
            text: '<span class="font-normal">联系人不能为空</span>',
            type: 'warn'
          })
          return;
        }
        if (!self.address_data.code.length) {
          self.$vux.toast.show({
            text: '<span class="font-normal">区域不能为空</span>',
            type: 'warn'
          })
          return;
        }
        if (area == "") {
          self.$vux.toast.show({
            text: '<span class="font-normal">区域不能为空</span>',
            type: 'warn'
          })
          return;
        }
  
        // if(addr==""){
        //   self.$vux.toast.show({
        //     text:'<span class="font-normal>详细地址不能为空</span>'
        //   })
        //   return;
        // }
        if (this.edit_status) {
          //update 方法
          self.edit_status=false;
          api.update_addr({
            area: area,
            addr: '*暂无*',
            name: self.address_data.name,
            mobile: self.address_data.mobile,
            addr_id: self.address_data.id,
            code:self.address_data.code.join("/"),
          }).then(res => {
           // console.log(res);
            
            if(res.ok){
              if(res.data.status){
                self.$vux.toast.show({
                  text: '<span class="font-normal">更新成功</span>',
                  type:"success"
                })
                self.fetch_addrs();
              }else{
                self.$vux.toast.show({
                  text: '<span class="font-normal">'+res.data.msg+'</span>',
                  type:"warn"
                })
                self.addredd_data.area=self.temp_area;
              }
            }else{
              self.$vux.toast.show({
                  text: '<span class="font-normal">'+res.statusText+'</span>',
                  type:"warn"
              })
              self.addredd_data.area=self.temp_area
            }
          })
        } else {
          //add 方法
          api.add_addr({
            area: area,
            addr: '*暂无*',
            name: self.address_data.name,
            mobile: self.address_data.mobile,
            code:self.address_data.code.join("/")
          }).then(res => {
            //console.log(res);
            if (res.ok) {
              if (res.data.status) {
                self.$vux.toast.show({
                  text: '<span class="font-normal">保存成功</span>',
                  type: 'success'
                })
                //重新拉取数据
                self.fetch_addrs();
              } else {
                self.$vux.toast.show({
                  text: '<span class="font-normal">' + res.data.msg + '</span>',
                  type: 'warn'
                })
              }
            } else {
              self.$vux.toast.show({
                text: '<span class="font-normal">' + res.statusText + '</span>',
                type: 'warn'
              })
            }
          })
        }
  
      },
      update_addr: function() {
        var self = this;
      },
      del_addr: function(index) {
        var self = this;
        //console.log(index);
        //弹窗确认
        self.$vux.confirm.show({
          title:'确定删除改地址',
          onCancel: function() {
  
          },
          onConfirm: function() {
            api.del_addr({
              addr_id: self.address_list[index].id,
            }).then(res => {
              //console.log(res);
              if (res.ok) {
                if (res.data.code == "200") {
                  self.$vux.toast.show({
                    text: '<span class="font-normal">删除成功</span>',
                    type: 'success'
                  })
                  self.fetch_addrs();
                } else {
                  self.$vux.toast.show({
                    text: '<span class="font-normal">' + res.data.msg + '</span>',
                    type: 'warn'
                  })
                }
              } else {
                self.$vux.toast.show({
                  text: '<span class="font-normal">' + res.statusText + '</span>',
                  type: 'warn'
                })
              }
            })
          }
        })
  
      },
      fix_origin_data:function(){
        $(".vux-popup-mask").removeClass(".vux-popup-show").addClass(".vux-popup-show");
      }
    },
    components: {
      Swipeout,
      SwipeoutItem,
      Flexbox,
      FlexboxItem,
      SwipeoutButton,
      XButton,
      Popup,
      Group,
      Cell,
      XInput,
      XAddress,
      ChinaAddressData,
      Tabbar,
      TabbarItem
    }
  }
</script>

<style lang="css">
  .address-header {
    width: 2.6rem;
    height: 2.6rem;
    line-height: 2.6rem;
    color: #aaa;
  }
  
  .popup-close-btn {
    width: 2rem;
    line-height: 2rem;
    height: 2rem;
    transform: translateY(-1rem);
    box-shadow: 0 0 10px #E53935;
  }
  
  .edit_address_content {
    width: 100%;
  }
  
  .edit_address_content .weui-cells {
    width: 100%;
  }
  
  .addr_empty {
    margin-top: 40%;
    margin-bottom: 35%
  }
  
  #app .bar-secondary {
    bottom: 0;
  }
</style>
