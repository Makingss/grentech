<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/1/6
 * Time: 22:00
 */
namespace App\Admin\Controllers;

use App\Admin\Models\Brand;
use App\Admin\Models\Goods_port;
use App\Admin\Models\Spec_values;
use App\Http\Controllers\Controller;
use App\Admin\Models\Good;
use App\Admin\Models\Goods_cat;
use App\Admin\Models\Goods_type;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Form\NestedForm;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Table;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
	use ModelForm;

	public function index()
	{
		return Admin::content(function (Content $content) {
			$content->header(trans('admin::lang.goods.goods') . trans('admin::lang.headers.header'));
			$content->description(trans('admin::lang.goods.goods') . trans('admin::lang.headers.description'));
			$content->body($this->grid());
		});
	}

	public function grid()
	{
		return Admin::grid(Good::class, function (Grid $grid) {
			$grid->model()->orderBy('goods_id', 'desc');
			$goodObj = new Good();
			$getGoodColumns = $goodObj->getTableColumns('goods');
			$getPoductColumns = $goodObj->getTableColumns('products');
			$getElectricColumns = $goodObj->getTableColumns('electrics');
			$grid->goods_id('id')->sortable();
			//$grid->jooge_goods_id()->sortable();
			$grid->bn($getGoodColumns['bn']);
//			$grid->products('产品货号')->pluck('bn')->map(function ($bn) {
//				return $bn;
//			})->implode('</br>')->editable();
			$grid->goods_keywords(trans('admin::lang.products.keyword'))->pluck('keyword')->label();
			/**
			 * $grid->products($getPoductColumns['bn'])->product(function () use ($getPoductColumns) {
			 * $products = (array)$this->products;
			 * $headers = [
			 * $getPoductColumns['bn'],
			 * $getPoductColumns['price'],
			 * $getPoductColumns['cost'],
			 * $getPoductColumns['mktprice'],
			 * $getPoductColumns['unit'],
			 * $getPoductColumns['store'],
			 * $getPoductColumns['freez'],
			 * //                    $getPoductColumns['store_place']
			 * ];
			 * $product_data = [];
			 * foreach ($products as $product) {
			 * $product_data[] = array_only($product, ['bn', 'price', 'cost', 'mktprice', 'unit', 'store', 'freez', '']);
			 * }
			 * $res = new Table($headers, $product_data);
			 * return $res;
			 * }, $getPoductColumns['bn']);
			 */

			$grid->electrics('电性能')->electric(function () use ($getElectricColumns) {
				$electrics = (array)$this->electrics;
				$headers = [
					$getElectricColumns['workingband'],
					$getElectricColumns['x_beamwidth'],
					$getElectricColumns['y_beamwidth'],
					$getElectricColumns['beamgain'],
					$getElectricColumns['polarization'],
					$getElectricColumns['dipangle'],
					$getElectricColumns['xpd'],
					$getElectricColumns['ratio'],
					$getElectricColumns['inhibition'],
					$getElectricColumns['voltagebobbi'],

					$getElectricColumns['isolation'],
					$getElectricColumns['imd3'],
					$getElectricColumns['impedance'],
					$getElectricColumns['capacity'],
				];
				$electric_data = [];
				foreach ($electrics as $electric) {
					$electric_data[] = array_only($electric, [
						'workingband',
						'x_beamwidth',
						'y_beamwidth',
						'beamgain',
						'polarization',
						'dipangle',
						'xpd',
						'ratio',
						'inhibition',
						'voltagebobbi',
						'isolation',
						'imd3',
						'impedance',
						'capacity',

					]);
				}
				$ele = new Table($headers, $electric_data);
				return $ele;
			}, '电性能');
//			$grid->images()->pluck('url')->map(function ($url) {
//				return $_SERVER['HTTP_HOST'] . $url;
//			})->implode('</br>')->urlwrapper();
			$grid->name($getGoodColumns['name'])->limit(10)->ucfirst(1, 10);//->editable();
			$states = [
				'on' => ['value' => 1, 'text' => 'YES', 'color' => 'success'],
				'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
			];
			$grid->marketable($getGoodColumns['marketable'])->switch($states);
			$grid->type_id($getGoodColumns['type_id'])->value(function ($type_id) {
				return Goods_type::find($type_id)->name;
			});
			$grid->cat_id($getGoodColumns['cat_id'])->value(function ($cat_id) {
				return Goods_cat::find($cat_id)->cat_name;
			});

			$grid->actions(function ($actions) {
				// 当前行的数据数组
				//$actions->row;
				// 获取当前行主键值
				//$actions->getKey();
				$url = url('/datatables', $actions->getKey());
				$actions->prepend('<a href=' . $url . '>编辑货品 | ');
			});
			/*
			  $grid->created_at(trans('admin::lang.created_at'));
			  $grid->updated_at(trans('admin::lang.updated_at'));
			*/

		});
	}

	protected function edit($id)
	{
		return Admin::content(function (Content $content) use ($id) {
//            dd($content);
			$content->header(trans('admin::lang.goods.goods') . trans('admin::lang.headers.header'));
			$content->description(trans('admin::lang.goods.goods') . trans('admin::lang.headers.description'));
			$content->body($this->form()->edit($id));
		});

	}

	protected function form()
	{

		return Admin::form(Good::class, function (\Encore\Admin\Form $form) {
			$goodObj = new Good();
			$getGoodColumns = $goodObj->getTableColumns('goods');
			$getGoodswordColumns = $goodObj->getTableColumns('goods_keywords');
			$getPoductColumns = $goodObj->getTableColumns('products');
			$getElectricColumns = $goodObj->getTableColumns('electrics');
			$getStandardfitColumns = $goodObj->getTableColumns('standardfits');
			$getAssemblieColumns = $goodObj->getTableColumns('assemblies');
			$getGoodsprotColumns = $goodObj->getTableColumns('goods_ports');
			$getMechanicsColumns = $goodObj->getTableColumns('mechanics');
			$form->model()->electrics;
			$form->tab(trans('admin::lang.goods.basedate'), function ($form) use (
				$getGoodColumns,
				$getGoodswordColumns,
				$getStandardfitColumns,
				$getAssemblieColumns,
				$getGoodsprotColumns,
				$getMechanicsColumns
			) {
				$states = [
					'on' => ['value' => 1, 'text' => 'YES', 'color' => 'success'],
					'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
				];
//				$form->hidden('goods_id', $getGoodColumns['goods_id']);
				$form->hidden('jooge_goods_id', $getGoodColumns['jooge_goods_id'])->md5(uniqid());
				//[1 => 'foo', 2 => 'bar', 'val' => 'Option name']
				$form->select('type_id', $getGoodColumns['type_id'])->options(function () {
					$goods_types = Goods_type::all();
					foreach ($goods_types as $goods_type) {
						$new_arr[$goods_type->type_id] = $goods_type->name;
					}
					return @$new_arr;
				});
				$form->select('cat_id', $getGoodColumns['cat_id'])->options(function () {
					$goods_cats = Goods_cat::all();
					foreach ($goods_cats as $goods_catK => $goods_cat) {
						$new_arr[$goods_cat->cat_id] = $goods_cat->cat_name;
					}
					return $new_arr;
				});
				$form->text('bn', $getGoodColumns['bn'])->rules('required|min:3');
				$form->text('name', $getGoodColumns['name'])->rules('required|min:3');
				$form->select('brand_id', $getGoodColumns['brand_id'])->options(function () {
					$brands = Brand::all();
					foreach ($brands as $brandK => $brandV) {
						$new_arr[$brandV->brand_id] = $brandV->brand_name;
					}
					return $new_arr;
				});
				$form->switch('marketable', $getGoodColumns['marketable'])->states($states);
				$form->text('p_order', $getGoodColumns['p_order'])->default(30);

				$form->hasMany('goods_ports', '端口说明', function ($form) use ($getGoodsprotColumns) {
					$form->number('ports_1', $getGoodsprotColumns['ports_1']);
					$form->number('ports_2', $getGoodsprotColumns['ports_2']);
					$form->number('ports_3', $getGoodsprotColumns['ports_3']);
					$form->number('ports_4', $getGoodsprotColumns['ports_4']);
					$form->number('ports_5', $getGoodsprotColumns['ports_5']);
					$form->number('ports_6', $getGoodsprotColumns['ports_6']);
					$form->number('ports_7', $getGoodsprotColumns['ports_7']);
					$form->number('ports_8', $getGoodsprotColumns['ports_8']);
					$form->number('ports_9', $getGoodsprotColumns['ports_9']);
					$form->number('ports_10', $getGoodsprotColumns['ports_10']);
					$form->number('ports_11', $getGoodsprotColumns['ports_11']);
					$form->number('ports_12', $getGoodsprotColumns['ports_12']);
					$form->number('ports_13', $getGoodsprotColumns['ports_13']);
//					$form->number('ports_14', $getGoodsprotColumns['ports_14']);
					$form->number('ports_15', $getGoodsprotColumns['ports_15']);
					$form->number('ports_16', $getGoodsprotColumns['ports_16']);
					$form->number('ports_17', $getGoodsprotColumns['ports_17']);
					$form->number('ports_18', $getGoodsprotColumns['ports_18']);
					$form->number('ports_19', $getGoodsprotColumns['ports_19']);
					$form->number('ports_20', $getGoodsprotColumns['ports_20']);
					/**
					 * $form->checkbox('spec', '端口说明')->options(
					 * [
					 * 1 => '1* -45° 7/16DIN阴头',
					 * 2 => '1* +45° 7/16DIN阴头',
					 * 3 => '2* -45° 7/16DIN阴头',
					 * 4 => '2* +45° 7/16DIN阴头',
					 * 5 => '3* -45° 7/16DIN阴头',
					 * 6 => '3* +45° 7/16DIN阴头',
					 * 7 => '4* -45° 7/16DIN阴头',
					 * 8 => '4* +45° 7/16DIN阴头',
					 * 9 => '4芯 集束电缆',
					 * 10 => '5芯 集束电缆',
					 * 11 => '8* N型阴头',
					 * 12 => 'C',
					 * 13 => '1* 900 -45°',
					 * 14 => '1* 900 +45°',
					 * 15 => '2* 900 -45°',
					 * 16 => '2* 900 +45°',
					 * 17 => '1* 1800 -45°',
					 * 18 => '1* 1800 +45°',
					 * 19 => '2* 1800 -45°',
					 * 20 => '2* 1800 +45°',
					 * 21 => '1* D频段集束头',
					 * 22 => '2* D频段集束头',
					 * 23 => '1* FA频段集束头',
					 * 24 => '2* FA频段集束头'
					 * ]
					 * );
					 */
				});

				$form->hasMany('assemblies', '组件(可选)', function (NestedForm $form) use ($getAssemblieColumns) {
					$form->text('asse_version', $getAssemblieColumns['asse_version'])->rules('required');
					$form->text('asse_high', $getAssemblieColumns['asse_high'])->rules('required');
				});

				$form->hasMany('standardfits', '标准配件', function (NestedForm $form) use ($getStandardfitColumns) {
					$form->number('bracket', $getStandardfitColumns['bracket']);
					$form->number('expansionbolt', $getStandardfitColumns['expansionbolt']);
					$form->number('hexagonbolt', $getStandardfitColumns['hexagonbolt']);
					$form->number('lightning', $getStandardfitColumns['lightning']);
				});
				$form->hasMany('goods_keywords', trans('admin::lang.products.keyword'), function (NestedForm $form) use ($getGoodswordColumns) {
					$form->text('keyword', $getGoodswordColumns['keyword']);
				});

				$form->display('created_at', trans('admin::lang.created_at'));
				$form->display('updated_at', trans('admin::lang.updated_at'));
			});

			$form->tab('电性能指标', function ($form) use ($getElectricColumns) {
//				$getElectricColumns['view'] = 'electric';
//				$form->editordatetable($getElectricColumns);
				$form->hasMany('electrics', '电性能指标', function (NestedForm $form) use ($getElectricColumns) {

					$form->text('workingband', $getElectricColumns['workingband'])->rules('required');
					$form->text('x_beamwidth', $getElectricColumns['x_beamwidth'])->rules('required');
					$form->text('y_beamwidth', $getElectricColumns['y_beamwidth'])->rules('required');
					$form->text('beamgain', $getElectricColumns['beamgain'])->rules('required');
					$form->text('polarization', $getElectricColumns['polarization'])->rules('required');
					$form->text('dipangle', $getElectricColumns['dipangle'])->rules('required');
					$form->text('xpd', $getElectricColumns['xpd'])->rules('required');
					$form->text('ratio', $getElectricColumns['ratio'])->rules('required');
					$form->text('inhibition', $getElectricColumns['inhibition'])->rules('required');
					$form->text('voltagebobbi', $getElectricColumns['voltagebobbi'])->rules('required');
					$form->text('isolation', $getElectricColumns['isolation'])->rules('required');
					$form->text('imd3', $getElectricColumns['imd3'])->rules('required');
					$form->text('impedance', $getElectricColumns['impedance'])->rules('required');
					$form->text('capacity', $getElectricColumns['capacity'])->rules('required');
				});

			});
			$form->tab('机械性指标', function (Form $form) use ($getMechanicsColumns, $getGoodsprotColumns) {
//				$form->hasMany('mechanics','',function(NestedForm $form)use ($getMechanicsColumns,$getGoodsprotColumns){
				$form->select('mechanics.jointtype', $getMechanicsColumns['jointtype'])->options($getGoodsprotColumns);
				$form->text('mechanics.antennasize', $getMechanicsColumns['antennasize'])->help('φ315*H(H=1900)');
				$form->text('mechanics.antennanumber', $getMechanicsColumns['antennanumber'])->help('面');
				$form->text('mechanics.x_range', $getMechanicsColumns['x_range']);
				$form->number('mechanics.antennanweight', $getMechanicsColumns['antennanweight']);
				$form->text('mechanics.guardmode', $getMechanicsColumns['guardmode']);
				$form->text('mechanics.installmodel', $getMechanicsColumns['installmodel']);
				$form->text('mechanics.maintainmodel', $getMechanicsColumns['maintainmodel']);
				$form->text('mechanics.antennandata', $getMechanicsColumns['antennandata']);
				$form->text('mechanics.surfacing', $getMechanicsColumns['surfacing']);
				$form->text('mechanics.antennanageing', $getMechanicsColumns['antennanageing']);
				$form->slider('mechanics.temperature', $getMechanicsColumns['temperature'])->options(
					['type' => 'double', 'max' => 100, 'min' => -100, 'step' => 1, 'postfix' => '°']
				);
				$form->slider('mechanics.limittemperature', $getMechanicsColumns['limittemperature'])->options(
					['type' => 'double', 'max' => 100, 'min' => -100, 'step' => 1, 'postfix' => '°']
				);
				$form->slider('mechanics.relativehumidity', $getMechanicsColumns['relativehumidity'])->options(
					['type' => 'double', 'max' => 200, 'min' => 1, 'step' => 1, 'postfix' => '°']
				);
				$form->slider('mechanics.atmos', $getMechanicsColumns['atmos'])->options(
					['type' => 'double', 'max' => 500, 'min' => 1, 'step' => 1, 'postfix' => 'kpa']
				);
				$form->slider('mechanics.speed', $getMechanicsColumns['speed'])->options(
					['type' => 'double', 'max' => 500, 'min' => 1, 'step' => 1, 'postfix' => 'km/h']
				);
				$form->slider('mechanics.limitspeed', $getMechanicsColumns['limitspeed'])->options(
					['type' => 'double', 'max' => 500, 'min' => 1, 'step' => 1, 'postfix' => 'km/h']
				);
				$form->number('mechanics.thickness', $getMechanicsColumns['thickness'])->help('mm不被破坏');

				$form->text('mechanics.flameretardant', $getMechanicsColumns['flameretardant']);
				$form->text('mechanics.ultraviolet', $getMechanicsColumns['ultraviolet']);
				$form->text('mechanics.PH', $getMechanicsColumns['PH']);
				$form->text('mechanics.protect', $getMechanicsColumns['protect']);
				$form->text('mechanics.other', $getMechanicsColumns['other']);
				$form->text('mechanics.exposed', $getMechanicsColumns['exposed']);


			});
//				});


			$form->tab(trans('admin::lang.goods.images'), function ($form) {
				$form->fileinput('image_default_id', trans('admin::lang.goods.images'));
				$form->divide();
				$form->wangeditor('intro');//'详细介绍'
			});
			/**
			 * $form->tab(trans('admin::lang.products.keyword'), function ($form) use ($getGoodswordColumns) {
			 * $form->hasMany('goods_keywords', trans('admin::lang.products.keyword'), function (NestedForm $form) use ($getGoodswordColumns) {
			 * $form->text('keyword', $getGoodswordColumns['keyword']);
			 * });
			 * });
			 */
			/**
			 * has noe to many
			 */
			/**
			 * $form->tab(trans('admin::lang.products.details'), function ($form) use ($getPoductColumns) {
			 * $form->hasMany('products', trans('admin::lang.products.details'), function (NestedForm $form) use ($getPoductColumns) {
			 * $states = [
			 * 'on' => ['value' => 1, 'text' => 'YES', 'color' => 'success'],
			 * 'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
			 * ];
			 * $form->text('bn', $getPoductColumns['bn'])->rules('required');
			 * $form->text('store', $getPoductColumns['store'])->rules('required');
			 * $form->display('freez', $getPoductColumns['freez']);
			 * $form->text('price', $getPoductColumns['price'])->rules('required');
			 * $form->text('cost', $getPoductColumns['cost']);
			 * $form->text('mktprice', $getPoductColumns['mktprice']);
			 * $form->text('', '活动价');
			 * $form->text('unit', $getPoductColumns['unit']);
			 * $form->switch('marketable', $getPoductColumns['marketable'])->states($states);
			 * $form->switch('is_default', $getPoductColumns['is_default'])->states($states);
			 * });
			 * });
			 */
			/*
			$form->tab(trans('admin::lang.products.details'), function ($form) use ($getPoductColumns) {
				$form->divide();
				$getPoductColumns['view'] = 'editordatetable';
				$form->editordatetable($getPoductColumns);
			});
			*/
		});
	}

	public function create()
	{
		return Admin::content(function (Content $content) {
			$content->header(trans('admin::lang.goods.goods') . trans('admin::lang.headers.header'));
			$content->description(trans('admin::lang.goods.goods') . trans('admin::lang.headers.description'));
			$content->body($this->form());
		});
	}

	public function store(Request $request)
	{
		$goodsObj = new Good();

		$res = $goodsObj->save_goods($request, '', 'create');
//		return $this->form()->store($id);
//		if ($res)
//			return redirect('/admin/goods');
//		else
//			return '保存失败！';
	}

	public function update(Request $request, $id)
	{
		$goods = $request->all();
//		dd($goods);
		if ($goods['marketable'] == 'off')
			$goods['marketable'] = 0;
		else
			$goods['marketable'] = 1;
		$goods = new Good();
		/**
		 * $goodObj = Good::find($id);
		 *
		 * foreach ($goods['products'] as $product) {
		 * $goodObj->products()->create($product);
		 * }
		 * dd($goods);
		 * foreach ($goods['standardfits'] as $standardfit) {
		 * $goodObj->standardfits()->update($standardfit);
		 * }
		 *
		 * foreach ($goods['assemblies'] as $assemblie) {
		 *
		 * $goodObj->assemblies()->update($assemblie);
		 * }
		 *
		 * foreach ($goods['goods_keywords'] as $keyword) {
		 *
		 * $goodObj->goods_keywords()->update($keyword);
		 * }
		 */
		$res = $goods->save_goods($request, $id, 'update');
		return $this->form()->update($id);

	}


}
