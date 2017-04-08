<?php

namespace App\Http\Controllers\Carts;

use App\Models\Carts\CartObject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartObjectController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
//	public function __construct()
//	{
//		$this->middleware('auth');
//	}

	public function index()
	{
		$cartObject = CartObject::where('member_id', Auth::id());

		return view('carts.index', compact('cartObject'));
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
		//$this->validate($request,['']);
		$input = $request->all();
		$input['member_id'] = Auth::id();
		CartObject::create($input);
		return redirect();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$cartObject = CartObject::findOrFail($id);
		return view('', compact('cartObject'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
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
	public function update(Request $request, $id)
	{
		$cartObject = CartObject::findOrFail($id);
		$cartObject->update($request->all());
		return redirect();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		CartObject::destroy($id);
	}
}
