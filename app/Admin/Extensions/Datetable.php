<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/2/26
 * Time: 17:15
 */

namespace App\Admin\Extensions;

use App\Admin\Models\Product;
use Encore\Admin\Admin;
use Encore\Admin\Form\Field;

class Datetable extends Field
{
//    protected $view = 'admin::form.datetable';
    protected static $js = [
//        'http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js',
//        '/packages/admin/AdminLTE/bootstrap/js/bootstrap.min.js',
        'https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js'
    ];

    protected static $css = [
        'https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css'
    ];

    public function render()
    {
        $goods_id = $this->form->model()->goods_id;
        $product = Product::where('goods_id', $goods_id)->get();
//        $this->script = <<<EOT
//        $(document).ready(function () {
//        var t = $('#datetable').DataTable();
//        var counter = 1;
//        $('#addRow').on('click', function () {
//            t.row.add([
//                '<td>Tiger</td>',
//                '<td><input type="text" id="row-1-age" name="row-1-age" value=""></td>',
//                '<td></td>',
//                '<td><input type="text" id="store" name="store" value=""></td>',
//                '<td></td>',
//                '<td><input id="price" name="price" type="text" value=""></td>',
//                '<td><input id="cost" name="cost" type="text" value=""</td>',
//                '<td><input id="mktprice" name="mktprice" type="text" value=""></td>',
//                '<td></td>',
//                '<td></td>',
//                '<td></td>'
//            ]).draw(false);
//        });
//        $('#addRow').click();
//    });
//    $(document).ready(function () {
//        var table = $('#datetable').DataTable();
//        $('button').click(function () {
//            var data = table.$('input, select').serialize();
//            return false;
//        });
//    });
//EOT;
        return view('admin.form.datetable', compact('product'));
    }

}