<?php
use \Encore\Admin\Form;
use \Encore\Admin\Grid\Column;

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */
//\Encore\Admin\Admin::css('https://unpkg.com/element-ui/lib/theme-default/index.css');
//\Encore\Admin\Admin::js('https://unpkg.com/element-ui/lib/index.js');
//\Encore\Admin\Admin::css('//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css');
//\Encore\Admin\Admin::css('//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css');
//\Encore\Admin\Admin::css('https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css');
//\Encore\Admin\Admin::js('//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js');
//\Encore\Admin\Admin::js('//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js');
\Encore\Admin\Admin::css('/packages/admin/AdminLTE/plugins/ionslider/ion.rangeSlider.css');
\Encore\Admin\Admin::css('/packages/admin/AdminLTE/plugins/ionslider/ion.rangeSlider.skinNice.css');
\Encore\Admin\Admin::css('//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css');
\Encore\Admin\Admin::css('https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css');
\Encore\Admin\Admin::css('https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css');
\Encore\Admin\Admin::css('/packages/datatable/css/editor.dataTables.min.css');
\Encore\Admin\Admin::js('/packages/admin/AdminLTE/plugins/ionslider/ion.rangeSlider.min.js');
\Encore\Admin\Admin::js('https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js');
\Encore\Admin\Admin::js('https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js');
\Encore\Admin\Admin::js('https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js');
\Encore\Admin\Admin::js('/packages/datatable/js/dataTables.editor.min.js');
\Encore\Admin\Admin::js('/packages/clipboard/dist/clipboard.min.js');
Form::extend('editor', \App\Admin\Extensions\UEditor::class);
Form::extend('fileinput', \App\Admin\Extensions\Fileinput::class);
Form::extend('wangeditor', \App\Admin\Extensions\WangEditor::class);
Form::extend('slider',\App\Admin\Extensions\SliderRange::class);
//Form::extend('datetable', \App\Admin\Extensions\Datetable::class);
//Form::extend('editordatetable', \App\Admin\Extensions\EditorDatetable::class);
Column::extend('electric', \App\Admin\Extensions\Column\ExpandRow::class);
//Column::extend('product', \App\Admin\Extensions\Column\ProductRow::class);
Column::extend('urlwrapper', \App\Admin\Extensions\Column\UrlWrapper::class);
app('translator')->addNamespace('admin', resource_path('lang/admin'));
app('view')->prependNamespace('admin', resource_path('views/admin'));



