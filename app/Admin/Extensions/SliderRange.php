<?php
namespace App\Admin\Extensions;

use App\Admin\Models\Goods\Mechanic;
use Encore\Admin\Form\Field;

class SliderRange extends Field
{
	public function __construct($column, array $arguments)
	{
		$this->column = $column;

		parent::__construct($column, $arguments);
	}

	protected $view = 'admin.form.slider';

	protected static $css = [
		'/packages/admin/AdminLTE/plugins/ionslider/ion.rangeSlider.css',
		'/packages/admin/AdminLTE/plugins/ionslider/ion.rangeSlider.skinNice.css',
	];

	protected static $js = [
		'/packages/admin/AdminLTE/plugins/ionslider/ion.rangeSlider.min.js',
	];


	protected $options = [
		'type' => 'single',
		'prettify' => false,
		'hasGrid' => true,
		'grid' => true
	];

	public function render()
	{
		$columns = collect(explode('.', $this->column));
		$model = $this->form->model();
		$collects = collect($model['relations']);
		$param_datas = [];
		if ($collects->get($columns->first())) {

			$collections = $collects->get($columns->first())->get()->toArray();
			foreach ($collections as $collection) {
				foreach (array_keys($collection) as $item) {
					if ($item == $columns->last()) {
						$mechanics=Mechanic::where('goods_id',$model->getKey())->firstOrFail();
						$param=$columns->last();
						$param_datas = $mechanics->$param;
					}
				}
			}
			$datas = collect(explode(';', $param_datas));
			$this->options['from'] = (int)$datas->first();
			$this->options['to'] = (int)$datas->last();

			$option = json_encode($this->options);
			$this->script = "$('{$this->getElementClassSelector()}').ionRangeSlider($option)";

			return parent::render();
		}
	}
}
///**
// * Created by PhpStorm.
// * User: Making
// * Date: 2017/3/8
// * Time: 14:16
// */
//
//namespace App\Admin\Extensions;
//
//
//use Encore\Admin\Admin;
//use Encore\Admin\Form\Field;
//
//class SliderRange extends Field
//{
//	public function __construct($column, array $arguments)
//	{
//		$this->column = $column;
//
//		parent::__construct($column, $arguments);
//	}
//
//	protected $view = 'admin.form.slider';
////	protected static $css = [
////		'/packages/admin/AdminLTE/plugins/ionslider/ion.rangeSlider.css',
////		'/packages/admin/AdminLTE/plugins/ionslider/ion.rangeSlider.skinNice.css',
////	];
////
////	protected static $js = [
////		'/packages/admin/AdminLTE/plugins/ionslider/ion.rangeSlider.min.js',
////	];
//
//	protected $options = [
//		'type' => 'single',
//		'prettify' => false,
//		'hasGrid' => true,
//		'grid' => true
//	];
//
//	public function render()
//	{
//		$columns = collect(explode('.', $this->column));
//		$model = $this->form->model();
//		$collects = collect($model['relations']);
////		$collections = $this->form->model()->get()->toArray();
////		foreach ($collections as $collection) {
////			if ($collection[$this->column]) {
////				$param_datas=$collection[$this->column];
////				$datas = collect(explode(';', $param_datas));
////			}
////		}
////		dd($collects);
//		$param_datas = [];
//		if ($collects->get($columns->first())) {
//
//			$collections = $collects->get($columns->first())->get()->toArray();
//			foreach ($collections as $collection) {
//				foreach (array_keys($collection) as $item) {
//					if ($item == $columns->last()) {
//						$param_datas = $collection[$columns->last()];
//					}
//				}
//			}
//			$datas = collect(explode(';', $param_datas));
//			$this->options['from'] = (int)$datas->first();
//			$this->options['to'] = (int)$datas->last();
//		}
//		$option = json_encode($this->options);
//		$this->script = "$('{$this->getElementClassSelector()}').ionRangeSlider($option)";
//		return parent::render();
//	}
//}