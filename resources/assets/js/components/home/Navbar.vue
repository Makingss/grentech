<template>
    <div class="container padding-tb-10 block-center nav-container">
       <ul class="font-1x font-bold color-dark navbar-box clear-float">
           <li v-for="(item,index) in navbar_list" class="pull-left padding-rl-15">{{item.title}}</li>
       </ul>
       <div class="nav-category">
            <ul class="category-list font-normal color-white">
                <li v-for="(item,index) in category_data" class="padding-rl-10 category-item-1 padding-tb-5">
                    <a href="#" class="color-white" v-for="(item1,index1) in item.titles">{{item1}}<span v-if="index1!=item.titles.length-1">/</span></a>
                </li>
            </ul>
            <div class="category-container pull-left bg-white padding-tb-10" v-show="false">
                <div class="category-container-left">
                     <dl class="category-item2 padding-tb-5 clear-float padding-rl-10" v-for="(item,index) in category_data[0].children">
                        <dt class="font-bold padding-rl-10 border-1px-r">{{item.titles[0]}} <span class="iconfont font-mini">&#xe8f1;</span></dt>
                        <dd class="padding-rl-10 border-1px-r" v-for="(item_,index_) in item.children">{{item_.title}}</dd>
                    </dl>
                </div>
                <div class="category-container-right">
                    <el-row>
                        <el-col :span="12" v-for="(item1,index1) in temp_data.data1" :key="index1" style="padding-right:1px;padding-bottom:1px;">
                            <a href="#" class="link-img">
                                 <img :src="item1.url" alt="">
                            </a>
                        </el-col>
                    </el-row>
                    <el-row>
                        <el-col :span="24" v-for="(item2,index2) in temp_data.data2" :key="index2">
                            <a href="#" class="link-img">
                                <img :src="item2.url" alt="">
                            </a>
                        </el-col>
                    </el-row>
                </div>
               
            </div>
       </div>
    </div>
</template>
<script>
    export default {
        data:function(){
            return {
                temp_data:{
                    data1:[
                        {
                         url:'/images/demo/product_banner_001.jpg',
                        }, {
                            url:'/images/demo/product_banner_002.jpg',
                        }, {
                            url:'/images/demo/product_banner_003.jpg',
                        }, {
                            url:'/images/demo/product_banner_004.jpg',
                        }, {
                            url:'/images/demo/product_banner_007.jpg',
                        },{
                            url:'/images/demo/product_banner_008.jpg',
                        }
                    ],
                    data2:[
                        {
                         url:'/images/demo/product_banner_005.jpg',
                        }, 
                        {
                            url:'/images/demo/product_banner_006.jpg',
                        }
                    ]
                },
                navbar_list:[
                    {
                        title:'首页',
                        url:'',
                    },{
                        title:'限时购',
                        url:'',
                    },{
                        title:'上新',
                        url:'',
                    },{
                        title:'品牌区',
                        url:'',
                    },{
                        title:'热卖',
                        url:'',
                    }
                ],
                category_data:[
                    {
                        titles:["家用电器"],
                        children:[
                            {
                                titles:["电视"],
                                children:[
                                    {
                                        title:'合资品牌',
                                        url:'#',
                                    }, {
                                        title:'国产品牌',
                                        url:'#',
                                    }, {
                                        title:'互联网品牌',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["空调"],
                                children:[
                                    {
                                        title:'壁挂式',
                                        url:'#',
                                    }, {
                                        title:'柜式',
                                        url:'#',
                                    }, {
                                        title:'中央空调',
                                        url:'#',
                                    }, {
                                        title:'空调配件',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["洗衣机"],
                                children:[
                                    {
                                        title:'滚筒洗衣机',
                                        url:'#',
                                    }, {
                                        title:'洗烘一体机',
                                        url:'#',
                                    }, {
                                        title:'波轮洗衣机',
                                        url:'#',
                                    },{
                                        title:'迷你洗衣机',
                                        url:'#',
                                    },{
                                        title:'洗衣机配件',
                                        url:'#',
                                    }
                                ]
                            }
                        ],
                    },{
                        titles:["手机","运营商","数码"],
                        children:[
                            {
                                titles:["电视"],
                                children:[
                                    {
                                        title:'合资品牌',
                                        url:'#',
                                    }, {
                                        title:'国产品牌',
                                        url:'#',
                                    }, {
                                        title:'互联网品牌',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["空调"],
                                children:[
                                    {
                                        title:'壁挂式',
                                        url:'#',
                                    }, {
                                        title:'柜式',
                                        url:'#',
                                    }, {
                                        title:'中央空调',
                                        url:'#',
                                    }, {
                                        title:'空调配件',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["洗衣机"],
                                children:[
                                    {
                                        title:'滚筒洗衣机',
                                        url:'#',
                                    }, {
                                        title:'洗烘一体机',
                                        url:'#',
                                    }, {
                                        title:'波轮洗衣机',
                                        url:'#',
                                    },{
                                        title:'迷你洗衣机',
                                        url:'#',
                                    },{
                                        title:'洗衣机配件',
                                        url:'#',
                                    }
                                ]
                            }
                        ],
                    },{
                        titles:["电脑","办公"],
                        children:[
                            {
                                titles:["电视"],
                                children:[
                                    {
                                        title:'合资品牌',
                                        url:'#',
                                    }, {
                                        title:'国产品牌',
                                        url:'#',
                                    }, {
                                        title:'互联网品牌',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["空调"],
                                children:[
                                    {
                                        title:'壁挂式',
                                        url:'#',
                                    }, {
                                        title:'柜式',
                                        url:'#',
                                    }, {
                                        title:'中央空调',
                                        url:'#',
                                    }, {
                                        title:'空调配件',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["洗衣机"],
                                children:[
                                    {
                                        title:'滚筒洗衣机',
                                        url:'#',
                                    }, {
                                        title:'洗烘一体机',
                                        url:'#',
                                    }, {
                                        title:'波轮洗衣机',
                                        url:'#',
                                    },{
                                        title:'迷你洗衣机',
                                        url:'#',
                                    },{
                                        title:'洗衣机配件',
                                        url:'#',
                                    }
                                ]
                            }
                        ],
                    },{
                        titles:["家居","家具","家装"],
                        children:[
                            {
                                titles:["电视"],
                                children:[
                                    {
                                        title:'合资品牌',
                                        url:'#',
                                    }, {
                                        title:'国产品牌',
                                        url:'#',
                                    }, {
                                        title:'互联网品牌',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["空调"],
                                children:[
                                    {
                                        title:'壁挂式',
                                        url:'#',
                                    }, {
                                        title:'柜式',
                                        url:'#',
                                    }, {
                                        title:'中央空调',
                                        url:'#',
                                    }, {
                                        title:'空调配件',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["洗衣机"],
                                children:[
                                    {
                                        title:'滚筒洗衣机',
                                        url:'#',
                                    }, {
                                        title:'洗烘一体机',
                                        url:'#',
                                    }, {
                                        title:'波轮洗衣机',
                                        url:'#',
                                    },{
                                        title:'迷你洗衣机',
                                        url:'#',
                                    },{
                                        title:'洗衣机配件',
                                        url:'#',
                                    }
                                ]
                            }
                        ],
                    },{
                        titles:["男装","女装","童装"],
                        children:[
                            {
                                titles:["电视"],
                                children:[
                                    {
                                        title:'合资品牌',
                                        url:'#',
                                    }, {
                                        title:'国产品牌',
                                        url:'#',
                                    }, {
                                        title:'互联网品牌',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["空调"],
                                children:[
                                    {
                                        title:'壁挂式',
                                        url:'#',
                                    }, {
                                        title:'柜式',
                                        url:'#',
                                    }, {
                                        title:'中央空调',
                                        url:'#',
                                    }, {
                                        title:'空调配件',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["洗衣机"],
                                children:[
                                    {
                                        title:'滚筒洗衣机',
                                        url:'#',
                                    }, {
                                        title:'洗烘一体机',
                                        url:'#',
                                    }, {
                                        title:'波轮洗衣机',
                                        url:'#',
                                    },{
                                        title:'迷你洗衣机',
                                        url:'#',
                                    },{
                                        title:'洗衣机配件',
                                        url:'#',
                                    }
                                ]
                            }
                        ],
                    },{
                        titles:["美妆个护","宠物"],
                        children:[
                            {
                                titles:["电视"],
                                children:[
                                    {
                                        title:'合资品牌',
                                        url:'#',
                                    }, {
                                        title:'国产品牌',
                                        url:'#',
                                    }, {
                                        title:'互联网品牌',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["空调"],
                                children:[
                                    {
                                        title:'壁挂式',
                                        url:'#',
                                    }, {
                                        title:'柜式',
                                        url:'#',
                                    }, {
                                        title:'中央空调',
                                        url:'#',
                                    }, {
                                        title:'空调配件',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["洗衣机"],
                                children:[
                                    {
                                        title:'滚筒洗衣机',
                                        url:'#',
                                    }, {
                                        title:'洗烘一体机',
                                        url:'#',
                                    }, {
                                        title:'波轮洗衣机',
                                        url:'#',
                                    },{
                                        title:'迷你洗衣机',
                                        url:'#',
                                    },{
                                        title:'洗衣机配件',
                                        url:'#',
                                    }
                                ]
                            }
                        ],
                    },{
                        titles:["女鞋","箱包","钟表"],
                        children:[
                            {
                                titles:["电视"],
                                children:[
                                    {
                                        title:'合资品牌',
                                        url:'#',
                                    }, {
                                        title:'国产品牌',
                                        url:'#',
                                    }, {
                                        title:'互联网品牌',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["空调"],
                                children:[
                                    {
                                        title:'壁挂式',
                                        url:'#',
                                    }, {
                                        title:'柜式',
                                        url:'#',
                                    }, {
                                        title:'中央空调',
                                        url:'#',
                                    }, {
                                        title:'空调配件',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["洗衣机"],
                                children:[
                                    {
                                        title:'滚筒洗衣机',
                                        url:'#',
                                    }, {
                                        title:'洗烘一体机',
                                        url:'#',
                                    }, {
                                        title:'波轮洗衣机',
                                        url:'#',
                                    },{
                                        title:'迷你洗衣机',
                                        url:'#',
                                    },{
                                        title:'洗衣机配件',
                                        url:'#',
                                    }
                                ]
                            }
                        ],
                    },{
                        titles:["男鞋","运动","户外"],
                        children:[
                            {
                                titles:["电视"],
                                children:[
                                    {
                                        title:'合资品牌',
                                        url:'#',
                                    }, {
                                        title:'国产品牌',
                                        url:'#',
                                    }, {
                                        title:'互联网品牌',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["空调"],
                                children:[
                                    {
                                        title:'壁挂式',
                                        url:'#',
                                    }, {
                                        title:'柜式',
                                        url:'#',
                                    }, {
                                        title:'中央空调',
                                        url:'#',
                                    }, {
                                        title:'空调配件',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["洗衣机"],
                                children:[
                                    {
                                        title:'滚筒洗衣机',
                                        url:'#',
                                    }, {
                                        title:'洗烘一体机',
                                        url:'#',
                                    }, {
                                        title:'波轮洗衣机',
                                        url:'#',
                                    },{
                                        title:'迷你洗衣机',
                                        url:'#',
                                    },{
                                        title:'洗衣机配件',
                                        url:'#',
                                    }
                                ]
                            }
                        ],
                    },{
                        titles:["汽车","汽车用品"],
                        children:[
                            {
                                titles:["电视"],
                                children:[
                                    {
                                        title:'合资品牌',
                                        url:'#',
                                    }, {
                                        title:'国产品牌',
                                        url:'#',
                                    }, {
                                        title:'互联网品牌',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["空调"],
                                children:[
                                    {
                                        title:'壁挂式',
                                        url:'#',
                                    }, {
                                        title:'柜式',
                                        url:'#',
                                    }, {
                                        title:'中央空调',
                                        url:'#',
                                    }, {
                                        title:'空调配件',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["洗衣机"],
                                children:[
                                    {
                                        title:'滚筒洗衣机',
                                        url:'#',
                                    }, {
                                        title:'洗烘一体机',
                                        url:'#',
                                    }, {
                                        title:'波轮洗衣机',
                                        url:'#',
                                    },{
                                        title:'迷你洗衣机',
                                        url:'#',
                                    },{
                                        title:'洗衣机配件',
                                        url:'#',
                                    }
                                ]
                            }
                        ],
                    },{
                        titles:["母婴","玩具"],
                        children:[
                            {
                                titles:["电视"],
                                children:[
                                    {
                                        title:'合资品牌',
                                        url:'#',
                                    }, {
                                        title:'国产品牌',
                                        url:'#',
                                    }, {
                                        title:'互联网品牌',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["空调"],
                                children:[
                                    {
                                        title:'壁挂式',
                                        url:'#',
                                    }, {
                                        title:'柜式',
                                        url:'#',
                                    }, {
                                        title:'中央空调',
                                        url:'#',
                                    }, {
                                        title:'空调配件',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["洗衣机"],
                                children:[
                                    {
                                        title:'滚筒洗衣机',
                                        url:'#',
                                    }, {
                                        title:'洗烘一体机',
                                        url:'#',
                                    }, {
                                        title:'波轮洗衣机',
                                        url:'#',
                                    },{
                                        title:'迷你洗衣机',
                                        url:'#',
                                    },{
                                        title:'洗衣机配件',
                                        url:'#',
                                    }
                                ]
                            }
                        ],
                    },{
                        titles:["食品","酒类","生鲜","特产"],
                        children:[
                            {
                                titles:["电视"],
                                children:[
                                    {
                                        title:'合资品牌',
                                        url:'#',
                                    }, {
                                        title:'国产品牌',
                                        url:'#',
                                    }, {
                                        title:'互联网品牌',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["空调"],
                                children:[
                                    {
                                        title:'壁挂式',
                                        url:'#',
                                    }, {
                                        title:'柜式',
                                        url:'#',
                                    }, {
                                        title:'中央空调',
                                        url:'#',
                                    }, {
                                        title:'空调配件',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["洗衣机"],
                                children:[
                                    {
                                        title:'滚筒洗衣机',
                                        url:'#',
                                    }, {
                                        title:'洗烘一体机',
                                        url:'#',
                                    }, {
                                        title:'波轮洗衣机',
                                        url:'#',
                                    },{
                                        title:'迷你洗衣机',
                                        url:'#',
                                    },{
                                        title:'洗衣机配件',
                                        url:'#',
                                    }
                                ]
                            }
                        ],
                    },{
                        titles:["医药保健"],
                        children:[
                            {
                                titles:["电视"],
                                children:[
                                    {
                                        title:'合资品牌',
                                        url:'#',
                                    }, {
                                        title:'国产品牌',
                                        url:'#',
                                    }, {
                                        title:'互联网品牌',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["空调"],
                                children:[
                                    {
                                        title:'壁挂式',
                                        url:'#',
                                    }, {
                                        title:'柜式',
                                        url:'#',
                                    }, {
                                        title:'中央空调',
                                        url:'#',
                                    }, {
                                        title:'空调配件',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["洗衣机"],
                                children:[
                                    {
                                        title:'滚筒洗衣机',
                                        url:'#',
                                    }, {
                                        title:'洗烘一体机',
                                        url:'#',
                                    }, {
                                        title:'波轮洗衣机',
                                        url:'#',
                                    },{
                                        title:'迷你洗衣机',
                                        url:'#',
                                    },{
                                        title:'洗衣机配件',
                                        url:'#',
                                    }
                                ]
                            }
                        ],
                    },{
                        titles:["图书","音像"],
                        children:[
                            {
                                titles:["电视"],
                                children:[
                                    {
                                        title:'合资品牌',
                                        url:'#',
                                    }, {
                                        title:'国产品牌',
                                        url:'#',
                                    }, {
                                        title:'互联网品牌',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["空调"],
                                children:[
                                    {
                                        title:'壁挂式',
                                        url:'#',
                                    }, {
                                        title:'柜式',
                                        url:'#',
                                    }, {
                                        title:'中央空调',
                                        url:'#',
                                    }, {
                                        title:'空调配件',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["洗衣机"],
                                children:[
                                    {
                                        title:'滚筒洗衣机',
                                        url:'#',
                                    }, {
                                        title:'洗烘一体机',
                                        url:'#',
                                    }, {
                                        title:'波轮洗衣机',
                                        url:'#',
                                    },{
                                        title:'迷你洗衣机',
                                        url:'#',
                                    },{
                                        title:'洗衣机配件',
                                        url:'#',
                                    }
                                ]
                            }
                        ],
                    },{
                        titles:["机票","酒店","旅游"],
                        children:[
                            {
                                titles:["电视"],
                                children:[
                                    {
                                        title:'合资品牌',
                                        url:'#',
                                    }, {
                                        title:'国产品牌',
                                        url:'#',
                                    }, {
                                        title:'互联网品牌',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["空调"],
                                children:[
                                    {
                                        title:'壁挂式',
                                        url:'#',
                                    }, {
                                        title:'柜式',
                                        url:'#',
                                    }, {
                                        title:'中央空调',
                                        url:'#',
                                    }, {
                                        title:'空调配件',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["洗衣机"],
                                children:[
                                    {
                                        title:'滚筒洗衣机',
                                        url:'#',
                                    }, {
                                        title:'洗烘一体机',
                                        url:'#',
                                    }, {
                                        title:'波轮洗衣机',
                                        url:'#',
                                    },{
                                        title:'迷你洗衣机',
                                        url:'#',
                                    },{
                                        title:'洗衣机配件',
                                        url:'#',
                                    }
                                ]
                            }
                        ],
                    },{
                        titles:["理财","众筹","白条"],
                        children:[
                            {
                                titles:["电视"],
                                children:[
                                    {
                                        title:'合资品牌',
                                        url:'#',
                                    }, {
                                        title:'国产品牌',
                                        url:'#',
                                    }, {
                                        title:'互联网品牌',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["空调"],
                                children:[
                                    {
                                        title:'壁挂式',
                                        url:'#',
                                    }, {
                                        title:'柜式',
                                        url:'#',
                                    }, {
                                        title:'中央空调',
                                        url:'#',
                                    }, {
                                        title:'空调配件',
                                        url:'#',
                                    }
                                ]
                            },{
                                titles:["洗衣机"],
                                children:[
                                    {
                                        title:'滚筒洗衣机',
                                        url:'#',
                                    }, {
                                        title:'洗烘一体机',
                                        url:'#',
                                    }, {
                                        title:'波轮洗衣机',
                                        url:'#',
                                    },{
                                        title:'迷你洗衣机',
                                        url:'#',
                                    },{
                                        title:'洗衣机配件',
                                        url:'#',
                                    }
                                ]
                            }
                        ],
                    }
                ]
            }
        }
    }
</script>
<style lang="less" scoped>
    .navbar-box{
        padding-left:200px;
    }
    .nav-container{
        position:relative;
        .nav-category{
            // width:190px;
            height:400px;
            overflow:hidden;
            position:absolute;
            top:44px;
            left:0;
            z-index:2000;
            .category-item-1{
                cursor:pointer;
                background-color:#6e6568;
            }
            .category-item-1:hover{
                background-color:#999395;
            }
        }
        .category-list{
            width:190px;
        }
        .category-container{
            position:absolute;
            top:0;
            left:190px;
            width:900px;
            height:400px;
            box-shadow:0 1px 7px #666;
             .category-container-left{
                padding-right:200px;
            }
            .category-container-right{
                position:absolute;
                right:10px;
                top:15px;
                width:180px;
            }
        }
        .category-item2{
            position:relative;
            dt{
                width:70px;
                text-align:right;
            }
            dt,dd{
                float:left;
            }
        }
    }
    
</style>