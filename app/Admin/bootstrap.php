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
\Encore\Admin\Admin::js('/packages/clipboard/dist/clipboard.min.js');
Form::extend('editor', \App\Admin\Extensions\UEditor::class);
Form::extend('fileinput',\App\Admin\Extensions\Fileinput::class);
Form::extend('wangeditor',\App\Admin\Extensions\WangEditor::class);
Form::extend('datetable',\App\Admin\Extensions\Datetable::class);
Form::extend('editordatetable',\App\Admin\Extensions\EditorDatetable::class);
Column::extend('expand',\App\Admin\Extensions\Column\ExpandRow::class);
Column::extend('urlwrapper',\App\Admin\Extensions\Column\UrlWrapper::class);
app('translator')->addNamespace('admin', resource_path('lang/admin'));
app('view')->prependNamespace('admin', resource_path('views/admin'));



