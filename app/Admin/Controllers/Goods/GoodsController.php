<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/1/6
 * Time: 22:00
 */
namespace App\Admin\Controllers\Goods;

use App\Admin\Models\Ectools\Keyword;
use App\Admin\Models\Goods\Assemblie_high;
use App\Admin\Models\Goods\Assemblie_version;
use App\Admin\Models\Goods\Brand;
use App\Admin\Models\Goods\Goods_keyword;
use App\Admin\Models\Goods\Goods_port;
use App\Admin\Models\Products\Spec_value;
use App\Http\Controllers\Controller;
use App\Admin\Models\Goods\Good;
use App\Admin\Models\Goods\Goods_cat;
use App\Admin\Models\Goods\Goods_type;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Form\NestedForm;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Tab;
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
//			$content = new Content();

			$content->row(function (Row $row) {
				$row->column(6, function (Column $column) {
					$form = new \Encore\Admin\Widgets\Form();
					$form->text();
					$box = new Box('dsdggggfffffffffffffffffff', $form);
					$box->style('danger');
					$box->solid();
					return $column->append($box);
				});
			});

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
			$grid->filter(function ($filter) {
//				$filter->useModal();
				$filter->like('bn', 'SAP');
				$filter->is('marketable', '上下架')->select(['1' => '已上架', '0' => '下架']);
				$filter->disableIdFilter();
			});
//			$grid->products('产品货号')->pluck('bn')->map(function ($bn) {
//				return $bn;
//			})->implode('</br>')->editable();

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



//			$grid->electrics('电性能')->electric(function () use ($getElectricColumns) {
//				$form = new \Encore\Admin\Widgets\Form();
//				$tab=new Tab();
//				$form->date('date');
//				$form->text();
//				$box = new Box('第二个容器', '<p>Lorem ipsum dolor sit amet</p><p>consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>');
//				$tab->add('我的地址', $box);
//				$ele=$tab->add('我的简介',$form);
//
//				return $ele;
//			}, '电性能');
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
			$grid->keywords(trans('admin::lang.products.keyword'))->pluck('keyname')->label();
//			$grid->actions(function ($actions) {
			// 当前行的数据数组
			//$actions->row;
			// 获取当前行主键值
			//$actions->getKey();
//				$url = url('/datatables', $actions->getKey());
//				$actions->prepend('<a href=' . $url . '>编辑货品 | ');
//			});
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
			$getAspect_picColumns = $goodObj->getTableColumns('aspect_pics');
			$electrics = $form->model()->electrics;
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
				$form->text('product_model', $getGoodColumns['product_model']);
				$form->text('product_desc', $getGoodColumns['product_desc']);
				$form->currency('mktprice',$getGoodColumns['mktprice'])->symbol('￥');
				$form->select('brand_id', $getGoodColumns['brand_id'])->options(function () {
					$brands = Brand::all();
					foreach ($brands as $brandK => $brandV) {
						$new_arr[$brandV->brand_id] = $brandV->brand_name;
					}
					return $new_arr;
				});
				$form->switch('marketable', $getGoodColumns['marketable'])->states($states);
				$form->text('p_order', $getGoodColumns['p_order'])->default(30);
				/*
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
				$form->number('ports_14', $getGoodsprotColumns['ports_14']);
				$form->number('ports_15', $getGoodsprotColumns['ports_15']);
				$form->number('ports_16', $getGoodsprotColumns['ports_16']);
				$form->number('ports_17', $getGoodsprotColumns['ports_17']);
				$form->number('ports_18', $getGoodsprotColumns['ports_18']);
				$form->number('ports_19', $getGoodsprotColumns['ports_19']);
				$form->number('ports_20', $getGoodsprotColumns['ports_20']);
			});



				$form->hasMany('assemblies', '组件(可选)', function (NestedForm $form) use ($getAssemblieColumns) {

					$form->text('asse_version', $getAssemblieColumns['asse_version'])->rules('required');
					$form->text('asse_high', $getAssemblieColumns['asse_high'])->rules('required');
				});


				$form->hasMany('goods_keywords', trans('admin::lang.products.keyword'), function (NestedForm $form) use ($getGoodswordColumns) {
					$form->text('keyword', $getGoodswordColumns['keyword']);
				});


				$form->multipleSelect('goodsKeywords')->options(Goods_keyword::all()->pluck('keyword', 'id'));
				*/
				$form->multipleSelect('keywords', '产品关键字')->options(Keyword::all()->pluck('keyname', 'id'));
				$form->display('created_at', trans('admin::lang.created_at'));
				$form->display('updated_at', trans('admin::lang.updated_at'));
			});
			$form->tab('电性能指标', function ($form) use ($getElectricColumns, $getAspect_picColumns) {

				$form->hasMany('electrics', '电性能指标(常规)', function (NestedForm $form) use ($getElectricColumns) {
					$form->hidden('type')->default(1);
					$form->text('workingband', $getElectricColumns['workingband']);
					$form->text('polarization', $getElectricColumns['polarization']);
					$form->text('x_beamwidth', $getElectricColumns['x_beamwidth']);
					$form->text('y_beamwidth', $getElectricColumns['y_beamwidth']);
					$form->text('beamgain', $getElectricColumns['beamgain']);

					$form->text('dipangle', $getElectricColumns['dipangle']);
					$form->text('xpd', $getElectricColumns['xpd']);
					$form->text('ratio', $getElectricColumns['ratio']);
					$form->text('inhibition', $getElectricColumns['inhibition']);
					$form->text('voltagebobbi', $getElectricColumns['voltagebobbi']);
					$form->text('isolation', $getElectricColumns['isolation']);
					$form->text('imd3', $getElectricColumns['imd3']);
					$form->text('impedance', $getElectricColumns['impedance']);
					$form->text('capacity', $getElectricColumns['capacity']);

				});

				$form->hasMany('electrics_inte', '电性能指标(智能)', function (NestedForm $form) use ($getElectricColumns) {
					$form->hidden('type')->default(2);
					$form->html('', '<h4>通用参数</h4>');
					$form->divider();
					$form->text('workingband', $getElectricColumns['workingband']);
					$form->text('dipangle', $getElectricColumns['dipangle']);
					$form->text('dipangleaccuracy', $getElectricColumns['dipangleaccuracy']);
					$form->divider();
					$form->html('', '<h4>校准与电气参数</h4>');
					$form->divider();
					$form->text('calibration_1', $getElectricColumns['calibration_1']);
					$form->text('calibration_2', $getElectricColumns['calibration_2']);
					$form->text('calibration_3', $getElectricColumns['calibration_3']);

					$form->text('calibration_4', $getElectricColumns['calibration_4']);
					$form->divider();
					$form->html('', '<h4>同极化辐射端口间的隔离度(dB)</h4>');
					$form->divider();
					$form->text('withcalibration_1', $getElectricColumns['withcalibration_1']);
					$form->text('withcalibration_2', $getElectricColumns['withcalibration_2']);
					$form->text('withcalibration_3', $getElectricColumns['withcalibration_3']);
					$form->divider();
					$form->html('', '<h4>异极化辐射端口间的隔离度(dB)</h4>');
					$form->divider();
					$form->text('differentcalibration_1', $getElectricColumns['differentcalibration_1']);
					$form->text('differentcalibration_2', $getElectricColumns['differentcalibration_2']);
					$form->text('differentcalibration_3', $getElectricColumns['differentcalibration_3']);
					$form->divider();
					$form->html('', '<h4>单元波束</h4>');
					$form->divider();
					$form->text('cellbeam_1', $getElectricColumns['cellbeam_1']);
					$form->text('cellbeam_2', $getElectricColumns['cellbeam_2']);
					$form->text('cellbeam_3', $getElectricColumns['cellbeam_3']);
					$form->text('cellbeam_4', $getElectricColumns['cellbeam_4']);
					$form->text('cellbeam_5', $getElectricColumns['cellbeam_5']);
					$form->text('cellbeam_6', $getElectricColumns['cellbeam_6']);
					$form->text('cellbeam_7', $getElectricColumns['cellbeam_7']);
					$form->text('cellbeam_8', $getElectricColumns['cellbeam_8']);
					$form->divider();
					$form->html('', '<h4>广播波束</h4>');
					$form->divider();
					$form->text('radiobeam_1', $getElectricColumns['radiobeam_1']);
					$form->text('radiobeam_2', $getElectricColumns['radiobeam_2']);
					$form->text('radiobeam_3', $getElectricColumns['radiobeam_3']);
					$form->text('radiobeam_4', $getElectricColumns['radiobeam_4']);
					$form->text('radiobeam_5', $getElectricColumns['radiobeam_5']);
					$form->text('radiobeam_6', $getElectricColumns['radiobeam_6']);
					$form->text('radiobeam_7', $getElectricColumns['radiobeam_7']);
					$form->text('radiobeam_8', $getElectricColumns['radiobeam_8']);
					$form->text('radiobeam_9', $getElectricColumns['radiobeam_9']);
					$form->text('radiobeam_10', $getElectricColumns['radiobeam_10']);
					$form->divider();
					$form->html('', '<h4>业务波束</h4>');
					$form->divider();
					$form->text('businessbeam_1', $getElectricColumns['businessbeam_1']);
					$form->text('businessbeam_2', $getElectricColumns['businessbeam_2']);
					$form->text('businessbeam_3', $getElectricColumns['businessbeam_3']);
					$form->text('businessbeam_4', $getElectricColumns['businessbeam_4']);
					$form->text('businessbeam_5', $getElectricColumns['businessbeam_5']);
					$form->text('businessbeam_6', $getElectricColumns['businessbeam_6']);
					$form->text('businessbeam_7', $getElectricColumns['businessbeam_7']);

					$form->text('impedance', $getElectricColumns['impedance']);
					$form->text('unitport', $getElectricColumns['unitport']);
					$form->text('calibrationport', $getElectricColumns['calibrationport']);


					/*
					$form->text('workingband', $getElectricColumns['workingband']);
					$form->text('polarization', $getElectricColumns['polarization']);
					$form->text('x_beamwidth', $getElectricColumns['x_beamwidth']);
					$form->text('y_beamwidth', $getElectricColumns['y_beamwidth']);
					$form->text('beamgain', $getElectricColumns['beamgain']);

					$form->text('dipangle', $getElectricColumns['dipangle']);
					$form->text('xpd', $getElectricColumns['xpd']);
					$form->text('ratio', $getElectricColumns['ratio']);
					$form->text('inhibition', $getElectricColumns['inhibition']);
					$form->text('voltagebobbi', $getElectricColumns['voltagebobbi']);
					$form->text('isolation', $getElectricColumns['isolation']);
					$form->text('imd3', $getElectricColumns['imd3']);
					$form->text('impedance', $getElectricColumns['impedance']);
					$form->text('capacity', $getElectricColumns['capacity']);
					*/
				});
				$form->hasMany('aspect_pics', '方向图', function (NestedForm $form) use ($getAspect_picColumns) {
					$form->text('title', $getAspect_picColumns['title']);
					$form->image('pic_url', $getAspect_picColumns['pic_url']);
				});
			});
			$form->tab('机械性能指标', function ($form) use ($getAssemblieColumns, $getMechanicsColumns, $getGoodsprotColumns, $getStandardfitColumns) {
//				$form->hasMany('mechanics','',function(NestedForm $form)use ($getMechanicsColumns,$getGoodsprotColumns){
				//$form->select('mechanics.jointtype', $getMechanicsColumns['jointtype'])->options($getGoodsprotColumns);

				$form->hasMany('mechanics', '美化天线', function (NestedForm $form) use ($getMechanicsColumns) {

					$form->hidden('type', $getMechanicsColumns['type'])->default('1');
					$form->text('jointtype', $getMechanicsColumns['jointtype']);
					$form->text('antennasize', $getMechanicsColumns['antennasize'])->help('φ315*H(H=1900)');
					$form->text('antennanumber', $getMechanicsColumns['antennanumber'])->help('面');
					$form->text('x_range', $getMechanicsColumns['x_range']);
					$form->number('antennanweight', $getMechanicsColumns['antennanweight']);
					$form->text('guardmode', $getMechanicsColumns['guardmode']);
					$form->text('installmodel', $getMechanicsColumns['installmodel']);
					$form->text('maintainmodel', $getMechanicsColumns['maintainmodel']);
					$form->text('antennandata', $getMechanicsColumns['antennandata']);
					$form->text('surfacing', $getMechanicsColumns['surfacing']);
					$form->text('antennanageing', $getMechanicsColumns['antennanageing']);
					$form->text('temperature', $getMechanicsColumns['temperature'])->default('0-0');
					$form->text('limittemperature', $getMechanicsColumns['limittemperature'])->default('0-0');
					$form->text('relativehumidity', $getMechanicsColumns['relativehumidity'])->default('0-0');
					$form->text('atmos', $getMechanicsColumns['atmos'])->default('0-0');
					$form->text('speed', $getMechanicsColumns['speed'])->default('0-0');
					$form->text('limitspeed', $getMechanicsColumns['limitspeed'])->default('0-0');
					$form->number('thickness', $getMechanicsColumns['thickness'])->help('mm不被破坏');
					$form->text('flameretardant', $getMechanicsColumns['flameretardant']);
					$form->text('ultraviolet', $getMechanicsColumns['ultraviolet']);
					$form->text('PH', $getMechanicsColumns['PH']);
					$form->text('protect', $getMechanicsColumns['protect']);
					$form->text('other', $getMechanicsColumns['other']);
					$form->text('exposed', $getMechanicsColumns['exposed']);
				});
				$form->hasMany('mechanics_inte', '基站/室分天线', function (NestedForm $form) use ($getMechanicsColumns) {
					$form->hidden('type', $getMechanicsColumns['type'])->default('2');
					$form->text('jointtype', $getMechanicsColumns['jointtype']);
					$form->text('antennasize', $getMechanicsColumns['antennasize'])->help('φ315*H(H=1900)');
					$form->number('antennanweight', $getMechanicsColumns['antennanweight']);

					$form->text('adjustmentrange', $getMechanicsColumns['adjustmentrange']);

					$form->text('speed', $getMechanicsColumns['speed'])->default('0-0');
					$form->text('limitspeed', $getMechanicsColumns['limitspeed'])->default('0-0');
					$form->text('antennandata', $getMechanicsColumns['antennandata']);

					$form->text('workingtemperature', $getMechanicsColumns['workingtemperature'])->default('0-0');
					$form->text('gripdiameter', $getMechanicsColumns['gripdiameter'])->default('0-0');
				});

				/*
				$form->text('mechanics.jointtype', $getMechanicsColumns['jointtype']);
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

				$form->text('mechanics.temperature', $getMechanicsColumns['temperature'])->default('0-0');
				$form->text('mechanics.limittemperature', $getMechanicsColumns['limittemperature'])->default('0-0');
				$form->text('mechanics.relativehumidity', $getMechanicsColumns['relativehumidity'])->default('0-0');
				$form->text('mechanics.atmos', $getMechanicsColumns['atmos'])->default('0-0');
				$form->text('mechanics.speed', $getMechanicsColumns['speed'])->default('0-0');
				$form->text('mechanics.limitspeed', $getMechanicsColumns['limitspeed'])->default('0-0');
				$form->number('mechanics.thickness', $getMechanicsColumns['thickness'])->help('mm不被破坏');

				$form->text('mechanics.flameretardant', $getMechanicsColumns['flameretardant']);
				$form->text('mechanics.ultraviolet', $getMechanicsColumns['ultraviolet']);
				$form->text('mechanics.PH', $getMechanicsColumns['PH']);
				$form->text('mechanics.protect', $getMechanicsColumns['protect']);
				$form->text('mechanics.other', $getMechanicsColumns['other']);
				$form->text('mechanics.exposed', $getMechanicsColumns['exposed']);
				*/
				$form->hasMany('standardfits', '标准配件', function (NestedForm $form) use ($getStandardfitColumns) {
					$form->number('bracket', $getStandardfitColumns['bracket']);
					$form->number('expansionbolt', $getStandardfitColumns['expansionbolt']);
					$form->number('hexagonbolt', $getStandardfitColumns['hexagonbolt']);
					$form->number('lightning', $getStandardfitColumns['lightning']);
				});
				$form->html('', '<h4>可选配件</h4>');
				$form->divide();
//				$form->text('mechanics.partsdesc',$getMechanicsColumns['partsdesc']);
				$form->multipleSelect('assemblie_versions', $getAssemblieColumns['asse_version'])->options(Assemblie_version::all()->pluck('asse_version', 'id'));
				$form->multipleSelect('assemblie_highs', $getAssemblieColumns['asse_high'])->options(Assemblie_high::all()->pluck('asse_high', 'id'));


			});
//				});


			$form->tab(trans('admin::lang.goods.images'), function ($form) {
				$form->fileinput('image_default_id', trans('admin::lang.goods.images'));
				$form->divide();
				$form->html('', $label = '商品详细介绍');
				$form->wangeditor('intro');    //'详细介绍'
			});
			$form->tab('服务信息', function ($form) {
				$form->textarea('serviceword', '文本说明')->rows(10);
				$form->multipleImage('servicepic', '图片');
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
//		dd($request->all());
		$goodsObj = new Good();
		$res = $goodsObj->save_goods($request, '', 'create');
//		 $this->form()->store();
		if ($res)
			return redirect('/admin/goods');
		else
			return '保存失败！';
	}

	public function update(Request $request, $id)
	{
		$goods = $request->all();

//		dd($goods);
//		$keywords = $this->normailzeKeywords($request->get('keywords'));
		if (array_key_exists('marketable', $goods)) {
			if ($goods['marketable'] == 'off')
				$goods['marketable'] = 0;
			else
				$goods['marketable'] = 1;
		}
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


//		$goods->keywords()->attach($keywords);
//		$re=$this->form()->update($id);
//		dd($re);
		return $this->form()->update($id);

	}

	public function normailzeKeywords(array $keywords)
	{
		foreach ($keywords as $k => $v) {
			if (!$v)
				unset($keywords[$k]);
		}
		return collect($keywords)->map(function ($keyword) {
			if (is_numeric($keyword)) {
				return (int)$keyword;
			} elseif (!empty($keyword)) {
				$newKeyword = Keyword::create(['keyname' => trim($keyword)]);
				return $newKeyword->id;
			}
		})->toArray();
	}


}
