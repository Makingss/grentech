<?php

namespace App\Admin\Models\Goods;

use App\Admin\Controllers\Ectools\ToolsbaseController;
use App\Admin\Controllers\Goods\GoodsController;
use App\Admin\Models\Ectools\Keyword;
use App\Admin\Models\Images\Image_attach;
use App\Admin\Models\Images\Image;
use App\Admin\Models\Members\Member_good;
use App\Admin\Models\Products\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Nicolaslopezj\Searchable\SearchableTrait;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class Good extends Model
{
	use SearchableTrait;
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
	protected $hidden = ['p_1', 'p_2', 'p_3', 'p_4', 'p_5', 'p_6', 'p_7', 'p_8', 'p_9', 'p_10',
		'p_11', 'p_12', 'p_13', 'p_14', 'p_15', 'p_16', 'p_17', 'p_18', 'p_19', 'p_20', 'p_21', 'p_22', 'p_23', 'p_24', 'p_25', 'p_26', 'p_27',
		'p_28', 'p_29', 'p_30', 'p_31', 'p_32', 'p_33', 'p_34', 'p_35', 'p_36', 'p_37', 'p_38', 'p_39', 'p_40', 'p_41', 'p_42', 'p_43', 'p_44',
		'p_45', 'p_46', 'p_47', 'p_48', 'p_49', 'p_50'
	];
	protected $primaryKey = 'goods_id';

	/**
	 * @var array
	 * Searchable
	 */
	protected $searchable = [
		/**
		 * Columns and their priority in search results.
		 * Columns with higher values are more important.
		 * Columns with equal values have equal importance.
		 *
		 * @var array
		 */
		'columns' => [
			'goods.bn' => 10,
			'goods.name' => 10,
			'goods.content' => 2,
		],
		'joins' => [
			'goods_keywords' => ['goods.goods_id', 'goods_keywords.goods_id'],
			'goods_types' => ['goods.type_id', 'goods_types.type_id'],
			'mechanics' => ['goods.goods_id', 'mechanics.goods_id'],
			'goods_ports' => ['goods.goods_id', 'goods_ports.goods_id'],
			'assemblies' => ['goods.goods_id', 'assemblies.goods_id'],
			'standardfits' => ['goods.goods_id', 'standardfits.goods_id'],
			'electrics' => ['goods.goods_id', 'electrics.goods_id'],
			'brands' => ['goods.brand_id', 'brands.brand_id'],
			'member_goods' => ['goods.goods_id', 'member_goods.goods_id'],
//			'image_attach' => ['goods.goods_id' => 'image_attach.target_id'],
			'image' => ['goods.image_default_id', 'image.image_id'],
			'goods_cats' => ['goods.cat_id', 'goods_cats.cat_id']
		],
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function Goods_types()
	{
		return $this->belongsTo(Goods_type::class, 'type_id');
	}

	public function goods_cats()
	{
		return $this->belongsTo(Goods_cat::class, 'cat_id');
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
		 $hasMany=$this->hasMany(Electric::class, 'goods_id')->where('electrics.type',1);
		return $hasMany;
	}

	public function electrics_inte()
	{
		return $this->hasMany(Electric::class, 'goods_id')->where('electrics.type',2);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function goods_keywords()
	{
		return $this->hasMany(Goods_keyword::class, 'goods_id');
	}

	public function goodsKeywords()
	{
		return $this->hasMany(Goods_keyword::class, 'goods_id');
	}

	public function keywords()
	{
		return $this->belongsToMany(Keyword::class, 'good_keyword', 'good_id', 'keyword_id')->withTimestamps();
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
		return $this->hasOne(Image::class, 'image_id', 'image_default_id');
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
			$goodsObj = Good::findOrFail($id);
			if ($imagePaths)
				$this->save_attach($imagePaths, $id);
//            $goods = array_add($goods, 'image_default_id', $image_default_id);
			if (!is_null($imagePaths['image_id'])) {
				$goods['image_default_id'] = $imagePaths['image_id'];
			}
			return $goodsObj->update($goods);
		} else if ($method == 'create') {
			$id = DB::table('goods')->insertGetId([
//				'jooge_goods_id' => $goods['jooge_goods_id'],
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
			$goodsObj = Good::findOrFail($id);
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
			if (array_key_exists('goodsKeywords', $goods)) {
				foreach ($goods['goodsKeywords'] as $keyword) {
					$keyword['goods_id'] = $id;
					$goodsObj->goods_keywords()->create($keyword);
				}
			}
			if (array_key_exists('keywords', $goods)) {
//				foreach ($goods['keywords'] as $keyword) {
					$keyword['goods_id'] = $id;
					$controller = new GoodsController();
					$keywords=$controller->normailzeKeywords($goods['keywords']);
					$goodsObj->keywords()->attach($keywords);
//				}
			}
			if (array_key_exists('goods_ports', $goods)) {
				foreach ($goods['goods_ports'] as $goods_port) {
					$goodsObj->goods_ports()->create($goods_port);
				}
			}
			if (array_key_exists('mechanics', $goods)) {
//				dd($goods);
//				foreach ($goods['mechanics'] as $mechanic)
				$goodsObj->mechanics()->create($goods['mechanics']);
			}
			if (array_key_exists('assemblies', $goods)) {
				foreach ($goods['assemblies'] as $assemblie) {
					$goodsObj->assemblies()->create($assemblie);
				}
			}
			if (array_key_exists('standardfits', $goods))
				foreach ($goods['standardfits'] as $standardfit) {
					$goodsObj->standardfits()->create($standardfit);
				}
			if (array_key_exists('electrics', $goods))
				foreach ($goods['electrics'] as $electric) {
					$goodsObj->electrics()->create($electric);
				}
			if ($id && $imagePaths) {
				return $this->save_attach($imagePaths, $id);
			}
			return $id;
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
