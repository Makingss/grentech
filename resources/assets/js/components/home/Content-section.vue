<template>
    <div class="container block-center">
        <div class="promotion-section margin-t-10 padding-t-10">
            <div class="promotion-section-header bg-danger padding-rl-15">
                <div class="clear-float">
                     <h2 class="color-white pull-left promotion-section-title">
                      京东秒杀
                    </h2>
                     <div class="color-white font-normal pull-left padding-rl-15 promotion-section-subtitle font-slim">总有意想不到的低价</div>
                </div>
            </div>
            <div class="promotion-swiper">
                <el-carousel :interval="20000" height="230px">
                    <el-carousel-item v-for="(item,index) in 2" :key="index">
                        <div v-for="(item1,index1)  in promotion_data" class="promotion-swiper-card border-box padding-rl-15 pull-left">
                            <a href="#" class="link-img text-center">
                                <img :src="item1.img" alt="" class="promotion-swiper-card-item block-center">
                            </a>
                            <a href="#" class="padding-rl-10 line-ellispse-2">{{item1.name}}</a>
                            <div class="padding-rl-10">
                              <p class="font-bold color-danger"><span>¥</span><span class="font-1x">{{item1.price}}</span> <s class="color-gray font-slim padding-l-10">¥{{item1.mkt_price}}</s></p>
                            </div>
                        </div>
                    </el-carousel-item>
                </el-carousel>
            </div>
        </div>
        <div class="cat-section card-title-1 clear-float">
            <div class="cat-section-header  bg-danger padding-rl-15">
                <h2 class="color-white">服饰鞋包</h2>
            </div>
            <div class="cat-section-content border-1px-b">
                <div class="cat-left pull-left" style="background:url(//haitao.nosdn2.127.net/iqt7vrje24_246_440.jpg?imageView&thumbnail=246x0&quality=95);overflow:hidden;">
                 <el-row justify="center" type="flex" class="text-center padding-t-10">
                     <el-col :span="8" class="circle bg-gray cat-left-item">
                        大牌女包
                     </el-col>
                     <el-col :span="8" class="circle bg-gray cat-left-item">
                        品质男包
                     </el-col>
                     <el-col :span="8" class="circle bg-gray cat-left-item">
                        精致手链
                     </el-col>
                 </el-row>
                 <el-row justify="center" type="flex" class="text-center">
                    <el-col :span="8" class="circle bg-gray cat-left-item">
                        珠宝饰品
                     </el-col>
                     <el-col :span="8" class="circle bg-gray cat-left-item">
                        臻品腰带
                     </el-col>
                     <el-col :span="8" class="circle bg-gray cat-left-item">
                        时尚墨镜
                     </el-col>
                 </el-row>
                </div>
                <div class="cat-center pull-left">
                    <el-row justify="center" class="text-center block cat-center-container">
                        <el-col :span="12" class="border-1px-b cat-center-item">
                            <h3 class="padding-tb-10">时尚博主教你"型1"</h3>
                            <p>亚历山大.王5.0折起</p>
                            <img src="//haitao.nosdn5.127.net/iqro4cgu50_180_144.jpg?imageView&thumbnail=180x0&quality=95" alt="">
                        </el-col>
                         <el-col :span="12" class="border-1px-b border-1px-l cat-center-item">
                            <h3 class="padding-tb-10">时尚博主教你"型2"</h3>
                            <p>亚历山大.王5.0折起</p>
                            <img src="//haitao.nosdn5.127.net/iqro4cgu50_180_144.jpg?imageView&thumbnail=180x0&quality=95" alt="">
                        </el-col>
                         <el-col :span="12" class="cat-center-item">
                            <h3 class="padding-tb-10">时尚博主教你"型3"</h3>
                            <p>亚历山大.王5.0折起</p>
                            <img src="//haitao.nosdn5.127.net/iqro4cgu50_180_144.jpg?imageView&thumbnail=180x0&quality=95" alt="">
                        </el-col>
                         <el-col :span="12" class="cat-center-item border-1px-l">
                            <h3 class="padding-tb-10">时尚博主教你"型"4</h3>
                            <p>亚历山大.王5.0折起</p>
                            <img src="//haitao.nosdn5.127.net/iqro4cgu50_180_144.jpg?imageView&thumbnail=180x0&quality=95" alt="">
                        </el-col>
                    </el-row>
                </div>
                <div class="cat-right pull-left border-1px-r border-1px-l">
                    <h2 class="padding-rl-10 margin-tb-10">最近热卖</h2>
                    <ul class="padding-rl-10">
                        <li class="clear-float padding-tb-5">
                            <div class="cat-right-media pull-left">
                                <img src="//haitao.nos.netease.com/ivd758wn35_800_800.jpg?imageView&thumbnail=75x0&quality=95" alt="">
                            </div>
                            <div class="cat-right-content pull-left">
                                <div class="catr-right-title line-ellispse-2">MICHAEL KORS 迈克高仕 Selma 女士中号十字纹牛皮铆钉装饰手提单肩包</div>
                                <div class="catr-right-title"><b class="color-danger">¥1799</b> <s class="color-gray">¥4400</s></div>
                            </div>
                        </li>
                        <li class="clear-float padding-tb-5">
                            <div class="cat-right-media pull-left">
                                <img src="//haitao.nos.netease.com/ivd758wn35_800_800.jpg?imageView&thumbnail=75x0&quality=95" alt="">
                            </div>
                            <div class="cat-right-content pull-left">
                                <div class="catr-right-title line-ellispse-2">MICHAEL KORS 迈克高仕 Selma 女士中号十字纹牛皮铆钉装饰手提单肩包</div>
                                <div class="catr-right-title"><b class="color-danger">¥1799</b> <s class="color-gray">¥4400</s></div>
                            </div>
                        </li>
                        <li class="clear-float padding-tb-5">
                            <div class="cat-right-media pull-left">
                                <img src="//haitao.nos.netease.com/ivd758wn35_800_800.jpg?imageView&thumbnail=75x0&quality=95" alt="">
                            </div>
                            <div class="cat-right-content pull-left">
                                <div class="catr-right-title line-ellispse-2">MICHAEL KORS 迈克高仕 Selma 女士中号十字纹牛皮铆钉装饰手提单肩包</div>
                                <div class="catr-right-title"><b class="color-danger">¥1799</b> <s class="color-gray">¥4400</s></div>
                            </div>
                        </li>
                    </ul>
                </div>
                
            </div>
        </div>
         <div class="cat-section card-title-1 clear-float">
            <div class="cat-section-header  bg-danger padding-rl-15">
                <h2 class="color-white">服饰鞋包</h2>
            </div>
            <div class="cat-section-content border-1px-b">
                <div class="cat-left pull-left" style="background:url(//haitao.nosdn2.127.net/iqt7vrje24_246_440.jpg?imageView&thumbnail=246x0&quality=95);overflow:hidden;">
                 <el-row justify="center" type="flex" class="text-center padding-t-10">
                     <el-col :span="8" class="circle bg-gray cat-left-item">
                        大牌女包
                     </el-col>
                     <el-col :span="8" class="circle bg-gray cat-left-item">
                        品质男包
                     </el-col>
                     <el-col :span="8" class="circle bg-gray cat-left-item">
                        精致手链
                     </el-col>
                 </el-row>
                 <el-row justify="center" type="flex" class="text-center">
                    <el-col :span="8" class="circle bg-gray cat-left-item">
                        珠宝饰品
                     </el-col>
                     <el-col :span="8" class="circle bg-gray cat-left-item">
                        臻品腰带
                     </el-col>
                     <el-col :span="8" class="circle bg-gray cat-left-item">
                        时尚墨镜
                     </el-col>
                 </el-row>
                </div>
                <div class="cat-center pull-left">
                    <el-row justify="center" class="text-center block cat-center-container">
                        <el-col :span="12" class="border-1px-b cat-center-item">
                            <h3 class="padding-tb-10">时尚博主教你"型1"</h3>
                            <p>亚历山大.王5.0折起</p>
                            <img src="//haitao.nosdn5.127.net/iqro4cgu50_180_144.jpg?imageView&thumbnail=180x0&quality=95" alt="">
                        </el-col>
                         <el-col :span="12" class="border-1px-b border-1px-l cat-center-item">
                            <h3 class="padding-tb-10">时尚博主教你"型2"</h3>
                            <p>亚历山大.王5.0折起</p>
                            <img src="//haitao.nosdn5.127.net/iqro4cgu50_180_144.jpg?imageView&thumbnail=180x0&quality=95" alt="">
                        </el-col>
                         <el-col :span="12" class="cat-center-item">
                            <h3 class="padding-tb-10">时尚博主教你"型3"</h3>
                            <p>亚历山大.王5.0折起</p>
                            <img src="//haitao.nosdn5.127.net/iqro4cgu50_180_144.jpg?imageView&thumbnail=180x0&quality=95" alt="">
                        </el-col>
                         <el-col :span="12" class="cat-center-item border-1px-l">
                            <h3 class="padding-tb-10">时尚博主教你"型"4</h3>
                            <p>亚历山大.王5.0折起</p>
                            <img src="//haitao.nosdn5.127.net/iqro4cgu50_180_144.jpg?imageView&thumbnail=180x0&quality=95" alt="">
                        </el-col>
                    </el-row>
                </div>
                <div class="cat-right pull-left border-1px-r border-1px-l">
                    <h2 class="padding-rl-10 margin-tb-10">最近热卖</h2>
                    <ul class="padding-rl-10">
                        <li class="clear-float padding-tb-5">
                            <div class="cat-right-media pull-left">
                                <img src="//haitao.nos.netease.com/ivd758wn35_800_800.jpg?imageView&thumbnail=75x0&quality=95" alt="">
                            </div>
                            <div class="cat-right-content pull-left">
                                <div class="catr-right-title line-ellispse-2">MICHAEL KORS 迈克高仕 Selma 女士中号十字纹牛皮铆钉装饰手提单肩包</div>
                                <div class="catr-right-title"><b class="color-danger">¥1799</b> <s class="color-gray">¥4400</s></div>
                            </div>
                        </li>
                        <li class="clear-float padding-tb-5">
                            <div class="cat-right-media pull-left">
                                <img src="//haitao.nos.netease.com/ivd758wn35_800_800.jpg?imageView&thumbnail=75x0&quality=95" alt="">
                            </div>
                            <div class="cat-right-content pull-left">
                                <div class="catr-right-title line-ellispse-2">MICHAEL KORS 迈克高仕 Selma 女士中号十字纹牛皮铆钉装饰手提单肩包</div>
                                <div class="catr-right-title"><b class="color-danger">¥1799</b> <s class="color-gray">¥4400</s></div>
                            </div>
                        </li>
                        <li class="clear-float padding-tb-5">
                            <div class="cat-right-media pull-left">
                                <img src="//haitao.nos.netease.com/ivd758wn35_800_800.jpg?imageView&thumbnail=75x0&quality=95" alt="">
                            </div>
                            <div class="cat-right-content pull-left">
                                <div class="catr-right-title line-ellispse-2">MICHAEL KORS 迈克高仕 Selma 女士中号十字纹牛皮铆钉装饰手提单肩包</div>
                                <div class="catr-right-title"><b class="color-danger">¥1799</b> <s class="color-gray">¥4400</s></div>
                            </div>
                        </li>
                    </ul>
                </div>
                
            </div>
        </div>
         <div class="cat-section card-title-1 clear-float">
            <div class="cat-section-header  bg-danger padding-rl-15">
                <h2 class="color-white">服饰鞋包</h2>
            </div>
            <div class="cat-section-content border-1px-b">
                <div class="cat-left pull-left" style="background:url(//haitao.nosdn2.127.net/iqt7vrje24_246_440.jpg?imageView&thumbnail=246x0&quality=95);overflow:hidden;">
                 <el-row justify="center" type="flex" class="text-center padding-t-10">
                     <el-col :span="8" class="circle bg-gray cat-left-item">
                        大牌女包
                     </el-col>
                     <el-col :span="8" class="circle bg-gray cat-left-item">
                        品质男包
                     </el-col>
                     <el-col :span="8" class="circle bg-gray cat-left-item">
                        精致手链
                     </el-col>
                 </el-row>
                 <el-row justify="center" type="flex" class="text-center">
                    <el-col :span="8" class="circle bg-gray cat-left-item">
                        珠宝饰品
                     </el-col>
                     <el-col :span="8" class="circle bg-gray cat-left-item">
                        臻品腰带
                     </el-col>
                     <el-col :span="8" class="circle bg-gray cat-left-item">
                        时尚墨镜
                     </el-col>
                 </el-row>
                </div>
                <div class="cat-center pull-left">
                    <el-row justify="center" class="text-center block cat-center-container">
                        <el-col :span="12" class="border-1px-b cat-center-item">
                            <h3 class="padding-tb-10">时尚博主教你"型1"</h3>
                            <p>亚历山大.王5.0折起</p>
                            <img src="//haitao.nosdn5.127.net/iqro4cgu50_180_144.jpg?imageView&thumbnail=180x0&quality=95" alt="">
                        </el-col>
                         <el-col :span="12" class="border-1px-b border-1px-l cat-center-item">
                            <h3 class="padding-tb-10">时尚博主教你"型2"</h3>
                            <p>亚历山大.王5.0折起</p>
                            <img src="//haitao.nosdn5.127.net/iqro4cgu50_180_144.jpg?imageView&thumbnail=180x0&quality=95" alt="">
                        </el-col>
                         <el-col :span="12" class="cat-center-item">
                            <h3 class="padding-tb-10">时尚博主教你"型3"</h3>
                            <p>亚历山大.王5.0折起</p>
                            <img src="//haitao.nosdn5.127.net/iqro4cgu50_180_144.jpg?imageView&thumbnail=180x0&quality=95" alt="">
                        </el-col>
                         <el-col :span="12" class="cat-center-item border-1px-l">
                            <h3 class="padding-tb-10">时尚博主教你"型"4</h3>
                            <p>亚历山大.王5.0折起</p>
                            <img src="//haitao.nosdn5.127.net/iqro4cgu50_180_144.jpg?imageView&thumbnail=180x0&quality=95" alt="">
                        </el-col>
                    </el-row>
                </div>
                <div class="cat-right pull-left border-1px-r border-1px-l">
                    <h2 class="padding-rl-10 margin-tb-10">最近热卖</h2>
                    <ul class="padding-rl-10">
                        <li class="clear-float padding-tb-5">
                            <div class="cat-right-media pull-left">
                                <img src="//haitao.nos.netease.com/ivd758wn35_800_800.jpg?imageView&thumbnail=75x0&quality=95" alt="">
                            </div>
                            <div class="cat-right-content pull-left">
                                <div class="catr-right-title line-ellispse-2">MICHAEL KORS 迈克高仕 Selma 女士中号十字纹牛皮铆钉装饰手提单肩包</div>
                                <div class="catr-right-title"><b class="color-danger">¥1799</b> <s class="color-gray">¥4400</s></div>
                            </div>
                        </li>
                        <li class="clear-float padding-tb-5">
                            <div class="cat-right-media pull-left">
                                <img src="//haitao.nos.netease.com/ivd758wn35_800_800.jpg?imageView&thumbnail=75x0&quality=95" alt="">
                            </div>
                            <div class="cat-right-content pull-left">
                                <div class="catr-right-title line-ellispse-2">MICHAEL KORS 迈克高仕 Selma 女士中号十字纹牛皮铆钉装饰手提单肩包</div>
                                <div class="catr-right-title"><b class="color-danger">¥1799</b> <s class="color-gray">¥4400</s></div>
                            </div>
                        </li>
                        <li class="clear-float padding-tb-5">
                            <div class="cat-right-media pull-left">
                                <img src="//haitao.nos.netease.com/ivd758wn35_800_800.jpg?imageView&thumbnail=75x0&quality=95" alt="">
                            </div>
                            <div class="cat-right-content pull-left">
                                <div class="catr-right-title line-ellispse-2">MICHAEL KORS 迈克高仕 Selma 女士中号十字纹牛皮铆钉装饰手提单肩包</div>
                                <div class="catr-right-title"><b class="color-danger">¥1799</b> <s class="color-gray">¥4400</s></div>
                            </div>
                        </li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data:function(){
            return {
                promotion_data:[
                    {
                        name:'【京东超市】好奇 Huggies 铂金装 婴儿纸尿裤 电商箱装大号尿不湿L104片【10-14kg】',
                        img:'//img12.360buyimg.com/n4/s260x260_jfs/t4186/238/546893929/80028/caf85fb7/58b64bbfN60d409eb.jpg',
                        price:'179.00',
                        mkt_price:'269.00',
                    },{
                        name:'美的（Midea)电饭煲WFZ5099IH IH电磁加热 1250W大火力 钛金釜5L电饭锅',
                        img:'//img13.360buyimg.com/n4/s260x260_jfs/t4087/55/239301385/160019/c70b95f3/5844dac3Nd0ab3277.jpg',
                        price:'499.00',
                        mkt_price:'999.00',
                    },{
                        name:'Apple iPad 平板电脑 9.7英寸（128G WLAN版/A9 芯片/Retina显示屏/Touch ID技术 MPGW2CH/A）金色',
                        img:'//img12.360buyimg.com/n4/s260x260_jfs/t3214/177/9256496777/621169/2a1735b5/58d16208N55e7302b.jpg',
                        price:'179.00',
                        mkt_price:'269.00',
                    },{
                        name:'华硕(ASUS)顽石畅玩版R540 15.6英寸笔记本电脑( i5-7200U 4GB 500GB 2G独显 HD 巧克力黑)',
                        img:'//img13.360buyimg.com/n4/s260x260_jfs/t4105/242/1670884689/133272/1eb1584/58840daeN1d752db1.jpg',
                        price:'179.00',
                        mkt_price:'269.00',
                    },{
                        name:'华为（HUAWEI）华为10000mAh移动电源/充电宝 快充版',
                        img:"//img14.360buyimg.com/n4/s260x260_jfs/t3853/23/1610195980/1249164/5e565da7/588771b8N3b839de8.jpg",
                        price:'179.00',
                        mkt_price:'269.00',
                    },{
                        name:'华硕(ASUS)顽石畅玩版R540 15.6英寸笔记本电脑( i5-7200U 4GB 500GB 2G独显 HD 巧克力黑)',
                        img:'//img13.360buyimg.com/n4/s260x260_jfs/t4105/242/1670884689/133272/1eb1584/58840daeN1d752db1.jpg',
                        price:'179.00',
                        mkt_price:'269.00',
                    },{
                        name:'华为（HUAWEI）华为10000mAh移动电源/充电宝 快充版',
                        img:"//img14.360buyimg.com/n4/s260x260_jfs/t3853/23/1610195980/1249164/5e565da7/588771b8N3b839de8.jpg",
                        price:'179.00',
                        mkt_price:'269.00',
                    },{
                        name:'华硕(ASUS)顽石畅玩版R540 15.6英寸笔记本电脑( i5-7200U 4GB 500GB 2G独显 HD 巧克力黑)',
                        img:'//img13.360buyimg.com/n4/s260x260_jfs/t4105/242/1670884689/133272/1eb1584/58840daeN1d752db1.jpg',
                        price:'179.00',
                        mkt_price:'269.00',
                    },{
                        name:'华为（HUAWEI）华为10000mAh移动电源/充电宝 快充版',
                        img:"//img14.360buyimg.com/n4/s260x260_jfs/t3853/23/1610195980/1249164/5e565da7/588771b8N3b839de8.jpg",
                        price:'179.00',
                        mkt_price:'269.00',
                    }
                ]
            }
        }

    }
</script>
<style lang="less" scoped>
    .promotion-section-header{
        height:55px;
        .promotion-section-title{
            line-height:55px;
            height:55px;
        }
        .promotion-section-subtitle{
            margin-top:18px;
        }
       
    }
    
    .promotion-swiper-card{
        height:230px;
        overflow:hidden;
        .promotion-swiper-card-item {
            width:130px;
            height:130px;
            margin:17px 0;
            display:inline-block;
        }
    }
     .promotion-section .promotion-swiper-card{
         width:20%;
    }
    .cat-section-header{
        height:55px;
        h2{
            height:55px;
            line-height:55px;
        }
    }
    .cat-section-content{
        height:440px;
        .cat-left{
            width:250px;
        }
        .cat-right{
            width:250px;
        }
        .cat-center{
            width:590px;
        }
        .cat-left,.cat-center,.cat-right{
            height:440px;
        }
        .cat-center-container{
             height:440px;
        }
        .cat-left-item{
            height:58px;
            width:58px;
            line-height:58px;
            margin:0 10px 10px 0;
        }
        .cat-center-item{
            height:220px;
        }
        .cat-right-media{
            width:30%;
        }
        .cat-right-content{
            width:70%;
        }
    }
</style>