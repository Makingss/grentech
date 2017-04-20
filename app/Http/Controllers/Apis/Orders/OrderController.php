<?php
namespace App\Http\Controllers\Apis\Orders;

use App\Admin\Models\Goods\Good;
use App\Admin\Models\Members\Member_addr;
use App\Admin\Models\Orders\Order;
use App\Admin\Models\Orders\Order_itme;
use App\Http\Controllers\Controller;
use App\Models\Carts\CartObject;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/4/13
 * Time: 11:05
 */
class OrderController extends Controller
{
//	public function __construct()
//	{
//		$this->middleware('auth');
//	}

	public function index()
	{
		if (\Auth::user()->id) {
			$orders = Order::with('member_addrs', 'order_items')->where('member_id', \Auth::user()->id)->get()->toArray();
			return [
				"status" => true,
				"code" => "200",
				"msg" => "成功",
				"data" => $orders
			];
		}
		return [
			"status" => true,
			"code" => "401",
			"msg" => "成功",
			"data" => []
		];

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
//		$carts = ['cart_id' => ['8,9']];
//		dd(json_encode($carts));
		$cartId = json_decode($request->get('cart_id'));
		$orders = new Order();
		$goods = new Good();
		//创建 订单主数据
		$input['order_id'] = $this->generateOrderId();
		$input['member_id'] = \Auth::user()->id;
		$input['addr_id'] = $request->get('addr_id');
		$input['ship_area'] = $request->get('ship_area');
		$input['ship_addr'] = $request->get('ship_addr');
		$input['ship_mobile'] = $request->get('ship_mobile');
		$input['ship_name'] = $request->get('ship_name');
		$input['shipping_id'] = '1';
		$input['shipping'] = '快递';
		$input['ip'] = $_SERVER['REMOTE_ADDR'];
		$input['itemnum'] = (int)$orders->getSumQuantity($cartId)->map(function ($sumQuantity) {
			return $sumQuantity->quantity;
		})->sum();
		$input['total_amount'] = $orders->getTotalAmounts($cartId);
		$input['final_amount'] = $input['total_amount'];
		$input['memo'] = $request->get('memo');
		$order = Order::create($input);
		//创建 订单明细数据
		$orderItems = $orders->getOrderItems($cartId);
		$order_items = $orderItems->map(function ($orderItem) use ($order) {
			return $order->order_items()->create($orderItem);
		});
		$goodsData = $goods->getGoods($order_items->pluck('goods_id')->toArray());
		$orderDate = $order->with('order_items')->where('order_id',$input['order_id'])->get()->toArray();
		$orderDate[0]['goods'] = $goodsData->toArray();
		return $orderDate;
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

	public function generateOrderId()
	{
		return date('ymdhis') . str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);
	}

	/**
	 * 计算子订单数量
	 */
	protected function number_plus(Collection $collection)
	{
		return $collection->pluck('itemnum')->sum('itemnum');

	}
}