<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/1/6
 * Time: 22:00
 */
namespace App\Admin\Controllers;

use App\Admin\Models\Brand;
use App\Http\Controllers\Controller;
use App\Admin\Models\Good;
use App\Admin\Models\Goods_cat;
use App\Admin\Models\Goods_type;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form\NestedForm;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Form;
use Encore\Admin\Widgets\Table;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
	use ModelForm;

	public function index()
	{
		return Admin::content(function (Content $content) {
			$content->header('商品信息');
			$content->description('商品信息列表');
			$content->body($this->grid());
		});
	}

	public function grid()
	{
		return Admin::grid(Good::class, function (Grid $grid) {
			$grid->goods_id('id')->sortable();
			//$grid->jooge_goods_id()->sortable();
			$grid->bn('编码');//->editable();
			$grid->products('产品货号')->pluck('bn')->map(function ($bn) {
				return $bn;
			})->implode('</br>')->editable();
			$grid->goods_keywords('关键字')->pluck('keyword')->label();
			$grid->column('测试列')->expand(function () {
//				$profile = (array)$this->profile;
//			$profile = array_only($profile, ['homepage', 'gender', 'birthday', 'address', 'last_login_at', 'last_login_ip', 'lat', 'lng']);
				$profile=new Table([], ['id'=>'11111','name'=>'making']);
			return $profile;

		}, '货品');
			$grid->image()->pluck('url')->map(function($url){
//				dd($_SERVER['HTTP_HOST'].$url);
//				dd($image_id);
				return $_SERVER['HTTP_HOST'].$url;
			})->implode('</br>')->urlwrapper();
		$grid->name('名称');//->editable();
		$states = [
			'on' => ['value' => 1, 'text' => 'YES', 'color' => 'success'],
			'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
		];
		$grid->marketable('上架')->switch($states);
		$grid->type_id('类型名称')->value(function ($type_id) {
			return Goods_type::find($type_id)->name;
		});
		$grid->cat_id('分类名称')->value(function ($cat_id) {
			return Goods_cat::find($cat_id)->cat_name;
		});

		$grid->actions(function ($actions) {
			// 当前行的数据数组
			$actions->row;
			// 获取当前行主键值
			$actions->getKey();
			$url = url('/admin/product?goods_id=' . $actions->getKey());
//                dd($url);
			$actions->prepend('<a href=' . $url . '>编辑货品 | ');
		});
//            $grid->created_at();
//            $grid->updated_at();
	});
}

protected
function edit($id)
{
	return Admin::content(function (Content $content) use ($id) {
//            dd($content);
		$content->header('商品信息');
		$content->description('商品信息列表');
		$content->body($this->form()->edit($id));
	});

}

protected
function form()
{

	return Admin::form(Good::class, function (\Encore\Admin\Form $form) {

		$form->tab('商品数据', function ($form) {
			$states = [
				'on' => ['value' => 1, 'text' => 'YES', 'color' => 'success'],
				'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
			];
			$form->hidden('goods_id', 'id');
			$form->hidden('jooge_goods_id', '商品ID')->md5(uniqid());
			//[1 => 'foo', 2 => 'bar', 'val' => 'Option name']
			$form->select('type_id', "类型")->options(function () {
				$goods_types = Goods_type::all();
				foreach ($goods_types as $goods_type) {
					$new_arr[$goods_type->type_id] = $goods_type->name;
				}
				return @$new_arr;
			});
			$form->select('cat_id', '分类')->options(function () {
				$goods_cats = Goods_cat::all();
				foreach ($goods_cats as $goods_catK => $goods_cat) {
					$new_arr[$goods_cat->cat_id] = $goods_cat->cat_name;
				}
				return $new_arr;
			});
			$form->text('bn', '商品编码')->rules('required|min:3');
			$form->text('name', '商品名称')->rules('required|min:3');
//                $form->multipleSelect('商品关键字')->options();
			$form->select('brand_id', '品牌')->options(function () {
				$brands = Brand::all();
				foreach ($brands as $brandK => $brandV) {
					$new_arr[$brandV->brand_id] = $brandV->brand_name;
				}
				return $new_arr;
			});
			$form->switch('marketable', '是否上架')->states($states);
			$form->text('p_order', '排序')->default(30);
			$form->display('created_at', '创建时间');
			$form->display('updated_at', '最后更新时间');
		});


		$form->tab('商品图片', function ($form) {
			$form->fileinput('image_default_id', '商品相册');
			$form->divide();
			$form->wangeditor('intro', '详细介绍');
		});
		$form->tab('产品关键字', function ($form) {
			$form->hasMany('goods_keywords', '产品关键字', function (NestedForm $form) {
				$form->text('keyword', '商品关键字');
			});
		});

		/**
		 * has noe to many
		 */
		$form->tab('产品明细', function ($form) {
			$form->hasMany('products', '产品明细', function (NestedForm $form) {
//                    $form->datetable();
				$states = [
					'on' => ['value' => 1, 'text' => 'YES', 'color' => 'success'],
					'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
				];
				$form->text('bn', '货号')->rules('required');
				$form->text('store', '库存')->rules('required');
				$form->display('freez', '冻结库存');
				$form->text('price', '售销价')->rules('required');
				$form->text('cost', '成本价');
				$form->text('mktprice', '市场价');
				$form->text('', '活动价');
				$form->text('unit', '计量单位');
				$form->switch('marketable', '上架')->states($states);
				$form->switch('is_default', '默认货品')->states($states);
			});
		});
	});
}

public
function create()
{
	return Admin::content(function (Content $content) {
		$content->header('新建商品');
		$content->description('新建货品列表');
		$content->body($this->form());
	});
}

public
function store(Request $request)
{
	$this->validate($request, ['bn' => 'required|min:3', 'name' => 'required|min:1']);
	$goodsObj = new Good();
	$res = $goodsObj->save_goods($request, '', 'create');
	if ($res)
		return redirect('/admin/goods');
	else
		return '保存失败！';
}

public
function update(Request $request, $id)
{
//        return $this->form()->update($id);
//        $this->validate($request, ['bn' => 'required|min:3', 'name' => 'required|min:1']);
	$goods = $request->all();
//        dd($goods['products']);
	if ($goods['marketable'] == 'off')
		$goods['marketable'] = 0;
	else
		$goods['marketable'] = 1;
	$goods = new Good();
	$goodObj = Good::find($id);
	foreach ($goods['products'] as $product) {
		$goodObj->products()->create($product);
	}
	$res = $goods->save_goods($request, $id, 'update');
	return $this->form()->update($id);

//        if ($res) {
//            dd('dfdfdf');
//            return redirect('/admin/goods');
//        } else {
//            return "更新失败！";
//        }
}
}
