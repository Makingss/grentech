<template>
    <div class="cart">
        <div class="cart-header container clear-float block-center">
            <div class="cart-logo link-img pull-left">
                <img src="/images/slice/logo.v2@2x.png" alt="">
            </div>
            <div class="cart-search pull-right search-box">
                <el-input>
                    <el-button slot="append" icon="search"></el-button>
                </el-input>
            </div>
        </div>
        <div class="cart-content container block-center" v-if="false">
            <div class="block-center cart-empty clear-float">
                <div class="cart-empty-icon pull-left">
                    <span class="iconfont font-5x">&#xe887;</span>
                </div>
                <div class="pull-left cart-empty-msg">
                    <p>购物车内没有商品,登陆后将显示您加入的商品</p>
                    <el-button>登陆</el-button>
                    <a href="#">去购物</a>
                </div>
            </div>
        </div>
        <div class="cart-content container block-center margin-b-20">
            <el-tabs v-model="activeName">
                <el-tab-pane label="全部商品" name="cart_all">
                    <el-row class="cart-edit-bar bg-gray padding-10">
                        <el-col :span="2">
                            <div class="cart-list-item padding-l-4">
                                <el-checkbox v-model="cart_choose_all">全选</el-checkbox>
                            </div>
                        </el-col>
                        <el-col :span="9" class="cart-list-item">
                            <div>商品</div>
                        </el-col>
                        <el-col :span="3" class="cart-list-item">
                            <div>单价</div>
                        </el-col>
                        <el-col :span="4" class="cart-list-item">
                            <div>数量</div>
                        </el-col>
                        <el-col :span="3" class="cart-list-item">
                            <div>小计</div>
                        </el-col>
                        <el-col :span="3" class="cart-list-item">
                            <div>操作</div>
                        </el-col>
                    </el-row>
                    <div class="border-1px-b">
                        <div class="cart-item-header padding-10 border-1px-b">
                            <el-checkbox class="padding-l-4" v-model="choose_shopitems">官方直营</el-checkbox>
                        </div>
                        <el-row v-for="(item,index) in 2" :key="index" class="padding-tb-10">
                            <el-col :span="1" class="cart-list-item text-center">
                                <el-checkbox v-model="cart_choose_all"></el-checkbox>
                            </el-col>
                            <el-col :span="10" class="clear-float item-desc">
                                <div class="cart-list-item-media link-img pull-left">
                                    <img src="//img10.360buyimg.com/cms/s80x80_jfs/t2722/311/4177087028/98292/a143ab51/57ad891bNefe554b3.jpg" alt="">
                                </div>
                                <div class="cart-list-item-content">
                                    <p class="padding-tb-5">
                                        【京东超市】王麻子 刀具套装 塑柄厨房套刀8件套DD08（刀把样式随机发送）
                                    </p>
                                </div>
                            </el-col>
                            <el-col :span="3" class="cart-list-item">
                                <div>¥99.00</div>
                            </el-col>
                            <el-col :span="4" class="cart-list-item">
                                <el-input-number size="small" v-model="num1" :min="1" :max="10"></el-input-number>
                            </el-col>
                            <el-col :span="3" class="cart-list-item">
                                <div>¥99.00</div>
                            </el-col>
                            <el-col :span="3" class="cart-list-item">
                                <div>删除</div>
                            </el-col>
                        </el-row>
                    </div>
                    <div class="border-1px-b">
                        <div class="cart-item-header padding-10 border-1px-b">
                            <el-checkbox class="padding-l-4" v-model="choose_shopitems">海信官方旗舰店</el-checkbox>
                        </div>
                        <el-row v-for="(item,index) in 2" :key="index" class="padding-tb-10">
                            <el-col :span="1" class="cart-list-item text-center">
                                <el-checkbox v-model="cart_choose_all"></el-checkbox>
                            </el-col>
                            <el-col :span="10" class="clear-float item-desc">
                                <div class="cart-list-item-media link-img pull-left">
                                    <img src="//img10.360buyimg.com/cms/s80x80_jfs/t3298/53/166852873/143086/13a3b389/57a940b5N89a88cda.jpg" alt="">
                                </div>
                                <div class="cart-list-item-content">
                                    <p class="padding-tb-5">海信（Hisense）LED55EC520UA 55英寸 VIDAA3 14核 炫彩4K智能电视(黑色)
                                    </p>
                                </div>
                            </el-col>
                            <el-col :span="3" class="cart-list-item">
                                <div>¥99.00</div>
                            </el-col>
                            <el-col :span="4" class="cart-list-item">
                                <el-input-number size="small" v-model="num1" :min="1" :max="10"></el-input-number>
                            </el-col>
                            <el-col :span="3" class="cart-list-item">
                                <div>¥99.00</div>
                            </el-col>
                            <el-col :span="3" class="cart-list-item">
                                <div>删除</div>
                            </el-col>
                        </el-row>
                    </div>
    
                </el-tab-pane>
    
                <el-tab-pane label="已失效" name="lose_efficacy">
                     <el-row class="cart-edit-bar bg-gray padding-10">
                        <el-col :span="2">
                            <div class="cart-list-item padding-l-4">
                                <el-checkbox v-model="cart_choose_all">全选</el-checkbox>
                            </div>
                        </el-col>
                        <el-col :span="9" class="cart-list-item">
                            <div>商品</div>
                        </el-col>
                        <el-col :span="3" class="cart-list-item">
                            <div>单价</div>
                        </el-col>
                        <el-col :span="4" class="cart-list-item">
                            <div>数量</div>
                        </el-col>
                        <el-col :span="3" class="cart-list-item">
                            <div>小计</div>
                        </el-col>
                        <el-col :span="3" class="cart-list-item">
                            <div>操作</div>
                        </el-col>
                    </el-row>
                    <div class="border-1px-b">
                        <div class="cart-item-header padding-10 border-1px-b">
                            <el-checkbox class="padding-l-4" v-model="choose_shopitems">海信官方旗舰店</el-checkbox>
                        </div>
                        <el-row v-for="(item,index) in 2" :key="index" class="padding-tb-10">
                            <el-col :span="1" class="cart-list-item text-center">
                                <el-checkbox v-model="cart_choose_all"></el-checkbox>
                            </el-col>
                            <el-col :span="10" class="clear-float item-desc">
                                <div class="cart-list-item-media link-img pull-left">
                                    <img src="//img10.360buyimg.com/cms/s80x80_jfs/t3298/53/166852873/143086/13a3b389/57a940b5N89a88cda.jpg" alt="">
                                </div>
                                <div class="cart-list-item-content">
                                    <p class="padding-tb-5">海信（Hisense）LED55EC520UA 55英寸 VIDAA3 14核 炫彩4K智能电视(黑色)
                                    </p>
                                </div>
                            </el-col>
                            <el-col :span="3" class="cart-list-item">
                                <div>¥99.00</div>
                            </el-col>
                            <el-col :span="4" class="cart-list-item">
                                <el-input-number size="small" v-model="num1" :min="1" :max="10"></el-input-number>
                            </el-col>
                            <el-col :span="3" class="cart-list-item">
                                <div>¥99.00</div>
                            </el-col>
                            <el-col :span="3" class="cart-list-item">
                                <div>删除</div>
                            </el-col>
                        </el-row>
                    </div>
                </el-tab-pane>
            </el-tabs>
        </div>
        <div class="suggest-products container block-center">
            <ul class="suggest-tabs clear-float font-normal">
                <li class="suggest-tabs-item pull-left padding-r-15">
                    猜你喜欢
                </li>
                <li class="suggest-tabs-item pull-left padding-r-15">
                    随手购
                </li>
                <li class="suggest-tabs-item pull-left padding-r-15">
                    我的关注
                </li>
                <li class="suggest-tabs-item pull-left padding-r-15">
                    最近浏览
                </li>
            </ul>
            <div class="suggest-cards-list text-center  margin-tb-10 border-box clear-float border-1px-t border-1px-b">
                <div class="suggest-card border-1px-r border-1px-l padding-rl-10 padding-tb-15 pull-left">
                    <a href="#" class="block">
                        <img src="//img14.360buyimg.com/n4/s160x160_jfs/t2791/238/1356885545/421820/87883761/573c0653N54ecb4c6.jpg" alt="">
                        <p class="suggest-card-title text-left">三只松鼠_碧根果210gx2袋零食坚果炒货山核桃长寿果干果奶油味</p>
                    </a>
                    <p>¥38.90</p>
                    <el-button>加入购物车</el-button>
                </div>
                <div class="suggest-card border-1px-r padding-rl-10 padding-tb-15 pull-left">
                    <a href="#" class="block">
                        <img src="//img14.360buyimg.com/n4/s160x160_jfs/t2791/238/1356885545/421820/87883761/573c0653N54ecb4c6.jpg" alt="">
                        <p class="suggest-card-title text-left">三只松鼠_碧根果210gx2袋零食坚果炒货山核桃长寿果干果奶油味</p>
                    </a>
                    <p>¥38.90</p>
                    <el-button>加入购物车</el-button>
                </div>
                <div class="suggest-card border-1px-r  padding-rl-10 padding-tb-15 pull-left">
                    <a href="#" class="block">
                        <img src="//img14.360buyimg.com/n4/s160x160_jfs/t2791/238/1356885545/421820/87883761/573c0653N54ecb4c6.jpg" alt="">
                        <p class="suggest-card-title text-left">三只松鼠_碧根果210gx2袋零食坚果炒货山核桃长寿果干果奶油味</p>
                    </a>
                    <p>¥38.90</p>
                    <el-button>加入购物车</el-button>
                </div>
                <div class="suggest-card padding-rl-10 border-1px-r padding-tb-15 pull-left">
                    <a href="#" class="block">
                        <img src="//img14.360buyimg.com/n4/s160x160_jfs/t2791/238/1356885545/421820/87883761/573c0653N54ecb4c6.jpg" alt="">
                        <p class="suggest-card-title text-left">三只松鼠_碧根果210gx2袋零食坚果炒货山核桃长寿果干果奶油味</p>
                    </a>
                    <p>¥38.90</p>
                    <el-button>加入购物车</el-button>
                </div>
            </div>
        </div>
        <footer-section></footer-section>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                activeName: "cart_all",
                cart_choose_all: false,
                num1: 1,
                choose_shopitems: false
            }
        }
    }
</script>

<style lang="less" scoped>
    .cart {
        .cart-header {
            height: 140px;
        }
        .cart-logo {
            width: 140px;
            height: 140px;
        }
        .cart-search {
            width: 340px;
            margin-top: 51px;
        }
        .cart-list-item {
            position: relative;
            height: 24px;
            line-height: 24px;
            font-weight:bold;
            .el-checkbox {
                height: 24px;
                line-height: 24px;
               
            }
        }
        .cart-list-item-media {
            width: 80px;
            height: 80px;
        }
        .cart-list-item-content {
            padding-left: 90px;
        }
        .item-desc {
            // width:410px;
        }
        .cart-empty {
            width: 330px;
            padding: 80px 0 140px;
        }
        .cart-empty-icon .iconfont {
            font-size: 70px;
            color: #fec8c9;
        }
        .cart-empty-msg {
            margin-top: 28px;
            padding-left: 15px;
            // vertical-align:middle;
        }
        .suggest-tabs-item {
            height: 24px;
            line-height: 24px;
        }
        .suggest-tabs-item:hover {
            cursor: pointer;
            color: #e4393c;
            font-weight: bold;
        }
        .suggest-card {
            width: 25%;
            box-sizing: border-box;
            img {
                height: 160px;
                width: 160px;
            }
        }
        .cart-item-header{
            .el-checkbox{
                 color:#FB4F5B;
            }
        }
    }
</style>