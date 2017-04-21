<?php
namespace App\Http\Controllers\Orders;

use App\Admin\Models\Orders\Order;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class OrderController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('订单');
//            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Order::class, function (Grid $grid) {
            $order = new Order();
            $getOrderColumns = $order->getTableColumns('orders');
            $getMemberColumns=$order->getTableColumns('users');
            $grid->column('order_id', $getOrderColumns['order_id']);
            $grid->column('itemnum', $getOrderColumns['itemnum']);
            $grid->column('getMember.name', $getMemberColumns['name']);
            $grid->column('ship_mobile', $getOrderColumns['ship_mobile']);

            $grid->column('shipAddress', $getOrderColumns['ship_addr'])->display(function () {
                return $this->ship_area . $this->ship_addr;
            })->limit(9);
            $grid->column('shipping', $getOrderColumns['shipping']);
            $grid->column('ship_name', $getOrderColumns['ship_name']);
            $grid->column('pay_status', $getOrderColumns['pay_status'])->display(function ($pay_status) {
                return payStatus($pay_status);
            })->badge('danger');
            $grid->column('ship_status', $getOrderColumns['ship_status'])->display(function ($ship_status) {
                return shipStatus($ship_status);
            })->badge('danger');
            $grid->column('total_amount', $getOrderColumns['total_amount'])->display(function ($price) {
                return "￥$price";
            })->badge('green');
            $grid->column('memo', $getOrderColumns['memo']);
            $grid->column('ip', $getOrderColumns['ip']);
            #$grid->column('created_at', $getOrderColumns['created_at']);

            $grid->disableCreation();
            $grid->disableActions();
            $grid->disableFilter();
            $grid->disableExport();
            $grid->disableRowSelector();
            $grid->paginate(10);
			$grid->perPages([10]);
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Order::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
