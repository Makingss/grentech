<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/2/28
 * Time: 15:27
 */

namespace App\Admin\Extensions;


use Encore\Admin\Form\Field;

class EditorDatetable extends Field
{

    public function render()
    {
            return view('admin.form.table');
    }
}