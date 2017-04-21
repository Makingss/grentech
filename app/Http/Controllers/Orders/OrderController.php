<?php
namespace App\Http\Controllers\Orders;

use App\Admin\Models\Orders\Order;
use App\Admin\Models\Orders\Order_itme;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/4/13
 * Time: 11:05
 */
class OrderController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$orders = Order::with('member_addrs', 'order_items')->where('member_id', \Auth::id())->get()->toArray();
		return view('admin.order.index', compact('orders'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$input = $request->all();
		//创建 订单主数据
		$input['order_id'] = static::generateOrderId();
		$order = Order::create($input);
		//创建 订单明细数据
		$order_items['order_id'] = $order->order_id;
		$order_items=Order_itme::create($order_items);
		return view('/order',compact('order_items'));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$order = Order::findOrFail($id);
		return view('admin.order.show', compact('order'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$order = Order::findOrFail($id);
		return view('admin.order.edit', compact('order'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$order = Order::findOrFail($id);
		$input = $request->all();
		$input['member_id'] = \Auth::id();
		$order->update($input);
		return view('/order');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		Order::destroy($id);
		return view('/order');
	}

	public static function generateOrderId()
	{
		return date('ymdhis') . str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);
	}
}