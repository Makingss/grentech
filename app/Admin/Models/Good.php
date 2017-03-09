<?php

namespace App\Admin\Models;

use App\Admin\Controllers\ToolsbaseController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Good extends Model
{
//    public $incrementing =false;
	protected $table = 'goods';
	protected $fillable = ['goods_id', 'jooge_goods_id', 'bn', 'name', 'type_id', 'cat_id', 'brand_id', 'marketable', 'store', 'fav',
		'notify_num', 'uptime', 'downtime', 'p_order', 'p_vstore', 'd_order', 'd_vstore', 'score', 'cost_price', 'mkt_price',
		'price', 'member_price', 'activity_price', 'weight', 'g_weight', 'unit', 'brief', 'goods_type', 'image_default_id',
		'udfimg', 'thumbnail_pic', 'small_pic', 'big_pic', 'pic_id', 'content', 'store_place', 'min_buy', 'package_scale', 'package_unit',
		'package_use', 'store_prompt', 'nostore_sell', 'goods_setting', 'spec_desc', 'params', 'visit_count', 'comments_count',
		'view_w_count', 'view_count', 'count_stat', 'buy_count', 'buy_w_count', 'barcode', 'is_line', 'fx_1_price', 'fx_2_price',
		'fx_3_price', 'goods_status', 'modify_status', 'price_modify', 'good_form', 'buy_limit', 'taxrate', 'tip_id', 'pmt_tag',
		'pmt_id', 'goods_profit_ratio', 'is_pkg', 'pkg_info'
	];
	protected $primaryKey = 'goods_id';

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function Goods_types()
	{
		return $this->belongsTo(Goods_type::class, 'type_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function mechanics()
	{
		return $this->hasOne(Mechanic::class, 'goods_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function goods_ports()
	{
		return $this->hasMany(Goods_port::class, 'goods_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function assemblies()
	{
		return $this->hasMany(Assemblie::class, 'goods_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function standardfits()
	{
		return $this->hasMany(Standardfit::class, 'goods_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function electrics()
	{
		return $this->hasMany(Electric::class, 'goods_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function goods_keywords()
	{
		return $this->hasMany(Goods_keyword::class, 'goods_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function products()
	{
		return $this->hasMany(Product::class, 'goods_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 *
	 */
	public function brands()
	{
		return $this->belongsTo(Brand::class, 'brand_id');
	}

	/**
	 * One To Many
	 * Goods To Goods_lv_price
	 * Goods.goods_id To Goods_lv_price.goods_id
	 */
	public function goods_lv_price()
	{
		return $this->hasMany(Goods_lv_price::class, 'goods_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 * One To Many
	 *Good.goods_id To Member_goods.goods_id
	 */
	public function member_goods()
	{
		return $this->hasMany(Member_good::class, 'goods_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 * One To Many
	 * Goods.goods_id To Image_attach.
	 */
	public function image_attach()
	{
		return $this->hasMany(Image_attach::class, 'target_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function images()
	{
		return $this->hasMany(Image::class, 'image_id', 'image_default_id');
	}


	public function getTableColumns($table = null)
	{
		$table = $table ?: $this->table;
		$getTableArrbs = [];
		$getTables = DB::select('show full columns from ' . $table);
		foreach ($getTables as $key => $getTable) {
			if (is_object($getTable)) {
				$getTable = (array)$getTable;
				$getTableArrbs[$getTable['Field']] = $getTable['Comment'];
			} else {
				$getTableArrbs[] = $getTable;
			}
		}
		return $getTableArrbs;
	}

	/**
	 * @param $request
	 * @param $id
	 * @return mixed
	 */
	public function save_goods($request, $id = null, $method = '')
	{
		$goods = $request->all();
		if ($goods['marketable'] == 'off')
			$goods['marketable'] = 0;
		else
			$goods['marketable'] = 1;
		$fileupload = new ToolsbaseController();
		$imagePaths = json_decode($fileupload->fileUpload($request), true);
		/**
		 * create&&update return info
		 */
		if ($method == 'update' && $id) {
			if ($imagePaths)
				$this->save_attach($imagePaths, $id);
			$goodsObj = Good::findOrFail($id);
//            $goods = array_add($goods, 'image_default_id', $image_default_id);
			return $goodsObj->update($goods);
		} else if ($method == 'create') {
			$id = DB::table('goods')->insertGetId([
				'jooge_goods_id' => $goods['jooge_goods_id'],
				'type_id' => $goods['type_id'],
				'cat_id' => $goods['cat_id'],
				'bn' => $goods['bn'],
				'name' => $goods['name'],
				'brand_id' => $goods['brand_id'],
				'marketable' => $goods['marketable'],
				'p_order' => $goods['p_order'],
				'content' => $goods['content'],
				'image_default_id' => $imagePaths['image_id']
			]);
//			foreach (@$goods['products'] as $product) {
//				$goodsObj = Good::find($id);
//				if ($product['marketable'] == 'off')
//					$product['marketable'] = 0;
//				else
//					$product['marketable'] = 1;
//
//				if ($product['is_default'] == 'off')
//					$product['is_default'] = 0;
//				else
//					$product['is_default'] = 1;
//				$goodsObj->products()->create($product);
//			}
			foreach ($goods['goods_keywords'] as $keyword) {
				$goodsObj->goods_keywords()->create($keyword);
			}
			if ($id && $imagePaths)
				return $this->save_attach($imagePaths, $id);
		}
	}

	public function save_attach($imagePaths, $id)
	{
		foreach (@$imagePaths['path'] as $imagePath) {
			$save_status = Image_attach::create([
				'target_id' => $id,
				'target_type' => 'goods',
				'image_id' => $imagePath['image_id'],
				'last_modified' => time()
			])->toArray();
		}
		return $save_status;

	}


	public function setOptionsAttribute($options)
	{
		if (is_array($options)) {
			$this->attributes['goods_prot'] = join(',', $options);
		}
	}

	public function getOptionsAttribute($options)
	{
		if (is_string($options)) {
			return explode(',', $options);
		}

		return $options;
	}
}
