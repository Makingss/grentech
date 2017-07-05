<template>
    <div class="order_confirm bg-light content">
        <div class="content-box">
            <div class="border-box padding-l-6 bg-white">
                <flexbox :gutter="0" class="padding-tb-6" v-for="(item,index) in address_list">
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
            <div class="margin-tb-4 bg-white">
                <flexbox class="padding-tb-10" :gutter="0" wrap='nowrap' v-for="(item,index) in cart_data" :class="{'border-1px-b':index<cart_data.length-1}">
                    <flexbox-item class="item-media text-center link-img" :span="3/12">
                        <img :src="item.images.url" alt="">
                    </flexbox-item>
                    <flexbox-item class="item-content" :spam="9/12">
                        <div class="item-title padding-l-10">
                            {{item.name}}
                        </div>
                        <div class="item-title font-mini padding-l-10 line-ellispse-2" v-if="!!item.electrics&&item.electrics.length">
                            频段:
                            <span v-for="(_item,_index) in item.electrics" v-if="!!_item.workingband">{{_item.workingband}}<i v-if="(_index!=item.electrics.length-1)&&!!item.electrics[_index+1].workingband">/</i></span>
                        </div>
                        <div class="item-title font-mini padding-l-10 line-ellispse-2" v-if="!!item.electrics&&item.electrics.length">
                            增益: <span v-for="(_item,_index) in item.electrics" v-if="!!_item.beamgain">{{_item.beamgain}}<i v-if="(_index!=item.electrics.length-1)&&!!item.electrics[_index+1].beamgain">/</i></span>
                            <span v-if="item.electrics.length">dBi</span>
                        </div>
                        <div class="item-title  font-mini line-ellispse-2 padding-l-10" v-if="!!item.electrics&&item.electrics.length">
                            电下倾: <span v-for="(_item,_index) in item.electrics" v-if="!!_item.dipangle">{{_item.dipangle}}<i v-if="(_index!=item.electrics.length-1)&&!!item.electrics[_index+1].dipangle">/</i></span>
                            <span v-if="item.electrics.length">°</span>
                        </div>
                        <div class="item-subtitle color-gray padding-l-10 font-mini">
                            SAP:{{item.bn}}
                        </div>
                        <div class="item-subtitle padding-l-10">
                            <p v-if="false">产品描述:{{item.product_desc}}</p>
                            <p>市场价: <span class="color-danger font-bold">¥{{item.mktprice}}</span> <span class="font-dark pull-right">×{{item.cart_objects.quantity}}</span></p>
                        </div>
                    </flexbox-item>
                </flexbox>
                <div class="padding-10" v-if="false">
                    <span class="color-danger">总价:¥{{order_data[0].ttl_price}}</span>
                </div>
            </div>
            <div class="margin-tb-4 bg-white padding-10" v-if="false">
                配送方式
                <x-button mini plain type="warn">送货上门</x-button>
            </div>
            <div class="margin-tb-4 bg-white padding-tb-10">
                <div class="padding-b-4 padding-rl-10">备注留言</div>
                <x-textarea v-model="memo" :show-counter="true" placeholder="请输入备注/留言信息"></x-textarea>
            </div>
            <div class="margin-tb-4 bg-white padding-tb-10 clear-float" v-if="false">
                <flexbox :gutter="0">
                    <flexbox-item class="text-right color-gray" :span="3">运费</flexbox-item>
                    <flexbox-item class="text-left padding-l-10" :span="9">¥ 0.00</flexbox-item>
                </flexbox>
                <flexbox :gutter="0">
                    <flexbox-item class="text-right color-gray" :span="3">支付方式</flexbox-item>
                    <flexbox-item class="text-left padding-l-10" :span="9">微信支付/支付宝/银联支付</flexbox-item>
                </flexbox>
            </div>
            <div class="margin-tb-4 bg-white padding-10 clear-float">
                <p>流程说明:</p>
                <step v-model="step" class="padding-tb-10 font-mini">
                    <step-item title="提交" description="提交需求"></step-item>
                    <step-item title="审核" description="需求审核"></step-item>
                    <step-item title="操作" description="生成订单"></step-item>
                </step>
            </div>
        </div>
    
        <tabbar class="bar-secondary bar order-confirm-bar">
            <tabbar-item style="background-color:transparent">
                <div slot="label" class="color-dark">
                    合计: <span class="color-danger">¥ </span><span class="font-2x color-danger">{{cart_data[0].total_amount}}</span>
                </div>
            </tabbar-item>
            <tabbar-item class="bg-danger" @click.native="submit_order_data">
                <div slot="label" class="color-white">提交订单</div>
            </tabbar-item>
        </tabbar>
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
    import api from '../api'
    import {
        Flexbox,
        FlexboxItem,
        Group,
        Cell,
        XButton,
        XTextarea,
        Tabbar,
        TabbarItem,
        XAddress,
        ChinaAddressData,
        Popup,
        XInput,
        Step,
        StepItem,
        Value2nameFilter as value2name
    } from 'vux'
    export default {
        name: "order_confirm",
        data: function() {
            return {
                step: 0,
                popup_address: false,
                addressData: ChinaAddressData,
                ship_name: '张三',
                ship_mobile: '1850300XXXX',
                ship_addr: "测试街道XX",
                ship_area: ["广东省", "深圳市", "福田区"], //缓存选中地区
                order_data: [],
                cart_data: [{
                    total_amount: 0,
                    images: {
                        url: '',
                    },
                    cart_objects:{
                        quantity:1
                    }
                },{
                    total_amount: 0,
                    images: {
                        url: '',
                    },
                    cart_objects:{
                        quantity:1
                    }
                }],
                memo: '',
                popup_address: false,
                edit_status: false,
                edit_index: null,
                address_data: {
                    name: '',
                    mobile: '',
                    zip: '',
                    tel: '',
                    area: [],
                    addr: '',
                    addr_id: null,
                    area_name: '',
                },
                address_list: []
            }
        },
        created: function() {
            //拉取购物车数据
            this.fetch_cart_data();
            //拉取地址信息
            this.fetch_addrs();
        },
        methods: {
            edit_address: function() {
                // console.log("click");
                this.popup_address = !this.popup_address;
            },
            fetch_cart_data: function() {
                var self = this;
                api.get_cart_data().then(res => {
                    //console.log(res);
                    if (res.ok) {
                        if (res.data.data.length) {
                            self.cart_data = res.data.data;
                        } else {
                            self.cart_data = res.data.data;
                            self.$vux.toast.show({
                                text: '<span class="font-normal">购物车为空</span>',
                                type: 'text'
                            });
                        }
                    } else {
    
                    }
                })
            },
    
            submit_order_data: function() {
                var self = this;
                //console.log(this.cart_data);
                //console.log(this.memo);
    
                var cart_id = [];
                for (var i = 0; i < this.cart_data.length; i++) {
                    cart_id.push(this.cart_data[i].cart_objects.id);
                }
                //console.log(cart_id);
                //检查数据完整程度
    
                if (this.ship_area == "") {
                    this.$vux.toast.show({
                        text: '<span class="font-normal">区域不能为空</span>',
                        type: 'warn'
                    })
                    return;
                }
                if (this.ship_name == "") {
                    this.$vux.toast.show({
                        text: '<span class="font-normal">姓名不能为空</span>',
                        type: 'warn'
                    })
                    return;
                }
                if (this.ship_mobile == "") {
                    this.$vux.toast.show({
                        text: '<span class="font-normal">手机号不能为空</span>',
                        type: 'warn'
                    })
                    return;
                }
                var order_data = {
                    ship_area: self.ship_area.join("/"),
                    ship_addr: self.address_data.ship_addr,
                    ship_name: self.address_data.ship_name,
                    ship_mobile: self.address_data.ship_mobile,
                    addr_id: 0,
                    memo: self.memo,
                    //addr_id:self.address_data.ship_area,//暂时不传
                    cart_id: JSON.stringify({
                        cart_id: cart_id
                    })
                }
                //console.log(order_data);
    
                api.add_order(order_data).then(res => {
                    if (res.ok) {
                        if (res.data.length) {
                            this.$vux.toast.show({
                                text: '<span class="font-normal">需求已提交,请等待审核</span>',
                                type: 'success'
                            })
                            setTimeout(function() {
                                self.$router.push("user");
                            }, 2000)
    
                        } else {
                            this.$vux.toast.show({
                                text: '<span class="font-normal">' + res.data.req + '</span>',
                                type: 'warn'
                            })
                        }
                    }
                    //console.log(res);
                })
            },
            getName: function(value) {
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
                if (area != '') area = area.split(" ").join("/");
    
                //校验数据完整程度
                if (self.address_data.mobile == "") {
                    self.$vux.toast.show({
                        text: '<span class="font-normal>手机号不能为空</span>',
                        type: 'warn'
                    })
                    return;
                }
                if (self.address_data.name == "") {
                    self.$vux.toast.show({
                        text: '<span class="font-normal>联系人不能为空</span>',
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
                    self.edit_status = false;
                    api.update_addr({
                        area: area,
                        addr: '*暂无*',
                        name: self.address_data.name,
                        mobile: self.address_data.mobile,
                        addr_id: self.address_data.id,
                        code: self.address_data.code.join("/"),
                    }).then(res => {
                        //console.log(res);
    
                        if (res.ok) {
                            if (res.data.status) {
                                self.$vux.toast.show({
                                    text: '<span class="font-normal">更新成功</span>',
                                    type: "success"
                                })
                                self.fetch_addrs();
                            } else {
                                self.$vux.toast.show({
                                    text: '<span class="font-normal">' + res.data.msg + '</span>',
                                    type: "warn"
                                })
                                self.addredd_data.area = self.temp_area;
                            }
                        } else {
                            self.$vux.toast.show({
                                text: '<span class="font-normal">' + res.statusText + '</span>',
                                type: "warn"
                            })
                            self.addredd_data.area = self.temp_area
                        }
                    })
                } else {
                    //add 方法
                    api.add_addr({
                        area: area,
                        addr: '*暂无*',
                        name: self.address_data.name,
                        mobile: self.address_data.mobile,
                        code: self.address_data.code.join("/")
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
                    title: '确定删除改地址',
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
            fix_origin_data: function() {
                $(".vux-popup-mask").removeClass(".vux-popup-show").addClass(".vux-popup-show");
            }
        },
        components: {
            Flexbox,
            FlexboxItem,
            Group,
            Cell,
            XButton,
            XTextarea,
            Tabbar,
            TabbarItem,
            XAddress,
            ChinaAddressData,
            Popup,
            XInput,
            Step,
            StepItem
        }
    }
</script>

<style lang="less">
    #app .order_confirm .bar-secondary {
        bottom: 1px;
    }
    
    .edit-address-icon {
        display: block;
        height: 52px;
        line-height: 52px;
    }
</style>