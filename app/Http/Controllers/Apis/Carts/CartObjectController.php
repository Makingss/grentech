<?php

namespace App\Http\Controllers\Apis\Carts;

use App\Admin\Models\Goods\Good;
use App\Admin\Models\Images\Image_attach;
use App\Http\Controllers\GoodsController;
use App\Models\Carts\CartObject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Bridge\User;

class CartObjectController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response;
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function isUserId()
	{
		if (!Auth::user()->id) {
			return [
				"status" => false,
				"code" => "401",
				"msg" => "失败",
				"data" => []
			];
		}
	}

	public function index()
	{
		if (Auth::user()->id) {
			$cartObject = CartObject::where('member_id', Auth::user()->id)->get();
			if (Empty($cartObject->toArray())) {
				return [
					"status" => true,
					"code" => "200",
					"msg" => "成功",
					"data" => []
				];
			}
			$goods = Good::with('cartObjects', 'image_attach', 'images', 'mechanics', 'goods_ports',
				'assemblies', 'standardfits', 'electrics', 'aspect_pics', 'mechanics_inte', 'electrics_inte'
			)->whereIn('goods_id', $cartObject->pluck('goods_id'))->get();//->toArray();
			foreach ($goods as $dataK => $data) {
				foreach ($data['image_attach'] as $itemK => $item) {
					$image_attach = Image_attach::with('images')->where('image_id', $item['image_id'])->get()->toArray();
					$collects = collect($image_attach);
					$collapse = $collects->collapse();
					$goods[$dataK]['image_attach'][$itemK] = $collapse->toArray();
					$goods['total_amount'] = $goods->sum('mktprice');
				}
			}
			return [
				"status" => true,
				"code" => "200",
				"msg" => "成功",
				"data" => $goods
			];
		}
//		return [
//			"status" => false,
//			"code" => "401",
//			"msg" => "失败",
//			"data" => []
//		];
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
//		$this->validate($request,['']);
		if ($request->get('fastbuy') == "true") {
			return '我要快速购买,请实现我！';
		}
		$input = $request->all();
		$input['obj_ident'] = '';
		$input['member_ident'] = '';
		$input['store_id'] = '-1';
		$input['obj_type'] = '';
//		$input['goods_id'] = 2;
		$input['product_id'] = 0;
//		$input['quantity'] = 1;
		$input['time'] = time();
		$input['params'] = ['goods_id' => $request->get('goods_id'), 'product_id' => $input['product_id']];
		$input['member_id'] = Auth::user()->id;
		return [
			"status" => true,
			"code" => "200",
			"msg" => "成功",
			'data' => CartObject::create($input)
		];
//		return redirect('/');
	}

	/**
	 * Display the specified resource.
	 * http://grentech.app/cart/1
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(CartObject $cartObject)
	{
		return view('', compact('cartObject'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * http://grentech.app/cart/1/edit
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$cartObject = CartObject::findOrFail($id);
		return view('', compact('cartObject'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request)
	{
		$cartObject = CartObject::findOrFail($request->get('id'));
		$datas['quantity'] = $request->get('quantity');
		$responses = $cartObject->update($datas);
		if (!$responses) {
			return response()->json([
				"status" => $responses,
				"code" => "400",
				"msg" => "更新失败"
			]);
		}
		return response()->json([
			'quantity' => $datas['quantity'],
			"status" => $responses,
			"code" => "200",
			"msg" => "成功",
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request)
	{
		$responses = CartObject::destroy($request->get('id'));
		if (!$responses) {
			return response()->json([
				"status" => false,
				"code" => "400",
				"msg" => "删除失败"
			]);
		}
		return response()->json([
			"status" => true,
			"code" => "200",
			"msg" => "成功",
		]);
	}
}
