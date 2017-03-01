<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/1/6
 * Time: 14:24
 * dbschema tables
 */
return [
    'databases' => [
        /**
         * 商品主表
         */
        'goods_tables' => 'goods',
        /**
         * 货品主表
         */
        'products_tables' => 'products',
        /**
         * 品牌表
         */
        'brand_tables' => 'brands',
        /**
         * 商品类型表
         */
        'goods_types_tables' => 'goods_types',
        /**
         * 类别属性表
         */
        'goods_cats_tables' => 'goods_cats',
        /**
         * 图片表
         */
        'images_tables' => 'images',
        /**
         * 库位表
         */
        'goods_tips_tables' => 'goods_tips',
        /**
         * 商品单位表
         */
        'goods_units_tables' => 'goods_units',
        /**
         * 商品会员等级价格
         */
        'goods_lv_prices_tables' => 'goods_lv_prices',
        /**
         *商品搜索关键字表
         */
        'goods_keywords_tables' => 'goods_keywords',
        /**
         *商品与商品促销规则
         */
        'goods_promotion_refs_tables' => 'goods_promotion_refs',
        /**
         * 商品规格表
         */
        'specifications_tables'=>'specifications',
        /**
         * 商品规格值表
         */
        'spec_values_tables'=>'spec_values',
        /**
         * 类型品牌关联表
         */
        'type_brands_tables'=>'type_brands',
        /**
         * 商品销售记录表
         */
        'goods_sales_logs_tables'=>'goods_sales_logs',
        /**
         *  售后服务表
         */
        'aftersales_return_products_tables'=>'aftersales_return_products',
    ],
];
