<template>
    <div class="order_confirm bg-light content">
        <div class="content-box" style="padding-bottom:2.5rem;">
            <div class="border-box padding-l-6 bg-white">
                <flexbox :gutter="0" class="padding-tb-6">
                    <flexbox-item :span="11">
                    <flexbox>
                        <flexbox-item :span="2">
                        <div class="bg-gray circle address-header font-3x text-center">
                            {{ship_name.slice(0,1)}}
                        </div>
                        </flexbox-item>
                        <flexbox-item :span="10" class="padding-tb-6">
                        <p>联系人:{{ship_name}}</p>
                        <p>联系方式:{{ship_mobile}}</p>
                        <p>{{ship_area.join(" ")}}</p>
                        <p v-if="false">{{ship_addr}}</p>
                        </flexbox-item>
                    </flexbox>
                    </flexbox-item>
                    <flexbox-item :span="1" @click.native="edit_address">
                        <span class="iconfont">&#xe627;</span>
                    </flexbox-item>
                </flexbox>
            </div>
            <div class="margin-tb-4 bg-white">
                 <flexbox v-for="(item,index) in order_data" :gutter="0" wrap='nowrap' class="padding-tb-10" :class="{'border-1px-b':index<order_data.length-1}">
                    <flexbox-item :span="3/12" class="item-media link-img">
                        <img :src="item.s_url" alt="">
                    </flexbox-item>
                    <flexbox-item :span="9/12" class="border-box padding-l-6">
                        <div class="item-title color-primary line-ellispse-2">
                            {{item.name}}
                        </div>
                        <div class="item-subtitle color-dark line-ellispse-2">
                            {{item.spec_info}}
                        </div>
                        <div class="item-subtitle color-dark line-ellispse-2">
                            {{item.spec_info1}}
                        </div>
                        <div class="item-subtitle color-dark line-ellispse-2">
                            {{item.spec_info2}}
                        </div>
                        <div class="item-subtitle color-dark">
                            <span>单价:¥{{item.price}}</span><span class="pull-right padding-r-10">数量: ×{{item.ordernum}}</span>
                        </div>
                    </flexbox-item>
                </flexbox>
                 <div>
                     <span class="color-danger">总价:¥{{order_data[0].ttl_price}}</span>
                 </div>
            </div>
            <div class="margin-tb-4 bg-white padding-10" v-if="false">
               配送方式 <x-button mini plain type="warn">送货上门</x-button>
            </div>
            <div class="margin-tb-4 bg-white padding-tb-10">
                <div class="padding-b-4 padding-rl-10">备注留言</div>
                 <x-textarea :show-counter="true" placeholder="请输入备注/留言信息"></x-textarea> 
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
                <step v-model="step" class="padding-tb-10 font-mini" >
                    <step-item title="提交" description="提交需求"></step-item>
                    <step-item title="审核" description="需求审核"></step-item>
                    <step-item title="操作" description="生成订单"></step-item>
                </step>
             </div>
        </div>
       
         <tabbar class="bar-secondary bar order-confirm-bar">
                <tabbar-item style="background-color:transparent">
                    <div slot="label" class="color-dark">
                        合计: <span class="color-danger">¥ </span><span class="font-2x color-danger">2695.00</span>
                    </div>
                </tabbar-item>
                <tabbar-item class="bg-danger">
                    <div slot="label" class="color-white">提交订单</div>
                </tabbar-item>
        </tabbar>
        <popup v-model="popup_address" height="50%" :hide-on-blur="true">
            <div class="padding-rl-10"><span @click="edit_address" class="iconfont text-center circle pull-right popup-close-btn font-2x bg-danger color-white">&#xe606;</span></div>
            <group class="edit_address_content" title="修改地址">
            <x-input title="姓名" class="font-normal" :value="address_data.ship_name" placeholder="收件人姓名" :show-clear="false"></x-input>
            <x-input title="手机" class="font-normal" :value="address_data.ship_mobile" plaplaceholderce="收件人手机" :show-clear="false"></x-input>
            <x-input title="电话" class="font-normal" :value="address_data.ship_tel" placeholder="可选" :show-clear="false"></x-input>
            <x-input title="邮编" class="font-normal" :value="address_data.ship_zip" placeholder="可选" :show-clear="false"></x-input>
            <x-address title="区域" class="font-normal" placeholder="请选择地址" raw-value v-model="address_data.ship_area" :list="addressData"></x-address>
            <x-input title="详细地址" class="font-normal" :value="address_data.ship_addr" placeholder="详细地址" :show-clear="false"></x-input>
            <tabbar class="bar bar-secondary">
                <tabbar-item class="bg-danger">
                    <span slot="label" class="color-white">取消</span>
                </tabbar-item>
                 <tabbar-item class="bg-primary">
                    <span slot="label" class="color-white">保存</span>
                </tabbar-item>
            </tabbar>
        </group>
    </popup>
    </div>
</template>
<script>
    import {Flexbox,FlexboxItem,Group,Cell,XButton,XTextarea,Tabbar,TabbarItem,XAddress,ChinaAddressData,Popup,XInput,Step,StepItem} from 'vux'
    export default {
        name:"order_confirm",
        data:function() {
            return {
                step:0,
                popup_address:false,
                addressData:ChinaAddressData,
                ship_name:'张三',
                ship_mobile:'1850300XXXX',
                ship_addr:"测试街道XX",
                ship_area:["广东省","深圳市","福田区"],
                order_data:[
                    {
                        name:"街道站低增益超宽频双通道（小型化)",
                        spec_info:'频段:1710~1920/1920~2170/2200~2500/2500~2690',
                        spec_info1:'增益:11.5/11.5/12/13 dBi',
                        spec_info2:'电下倾:0/0/0 °',
                        s_url:'/static/grentech/201611071844501875.jpg',
                        ordernum:1
                    }
                ],
                address_data:{
                    ship_name:'',
                    ship_mobile:'',
                    zip:'',
                    ship_tel:'',
                    ship_area:['广东省', '深圳市', '南山区'],
                    ship_addr:'',
                },
                
            }
        },
        methods:{
            edit_address:function(){
                // console.log("click");
                this.popup_address=!this.popup_address;
            }
        },
        components:{
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
    #app .order_confirm .bar-secondary{
        bottom:1px;
    }
   
</style>