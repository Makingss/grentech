<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/2/18
 * Time: 9:29
 */

namespace App\Admin\Extensions;


use Encore\Admin\Admin;
use Encore\Admin\Form\Field;

class WangEditor extends Field
{
//    protected $view = 'admin.form.wangeditor';

      protected static $js=[
          '/vendor/wangEditor/dist/js/wangEditor.min.js',
//          '/packages/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js',
      ];
    protected static $css=[
        '/vendor/wangEditor/dist/css/wangEditor.min.css'
    ];
    public function render()
    {
        $content=$this->form->model()->content;
        return view('admin.form.wangeditor',compact('content'));
//        return parent::render();
    }
}