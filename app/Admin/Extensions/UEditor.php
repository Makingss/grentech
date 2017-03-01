<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/2/19
 * Time: 11:05
 */

namespace App\Admin\Extensions;

use Encore\Admin\Form\Field;

class UEditor extends Field
{
    protected $view = 'admin.form.editor';

    public function render()
    {
        $intro = $this->form->model()->intro;

        $this->script = <<<EOT
    var ue = UE.getEditor('container');
    ue.ready(function() {
    ue.setContent('{$intro}');
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
    });

EOT;
        return parent::render();
    }
}