<?php
namespace App\Http\Controllers\Apis\Members;

use App\Admin\Models\Members\Member_addr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/4/6
 * Time: 13:52
 */
class MemberaddrsController extends Controller
{
//	protected $redirectTo='/';

//	public function __construct($userId)
//	{
//	}

	public function index()
	{
		return Member_addr::where('member_id', Auth::user()->id)->get()->toArray();
	}

	public function show($id)
	{
		$memberaddrs = Member_addr::findOrFail($id);
		return view('members.addrs.show', compact('memberaddrs'));
	}

	public function store(Request $request)
	{
		//接收POST数据
		//保存到数据库
		//重定向
		if (!$this->addrsLimit()) {
			return [
				"status" => false,
				"code" => "1002",
				"msg" => "失败,最多只能保存10条地址信息",
				"data" => []
			];
		}
		$this->validate($request, ['area' => 'required|min:3', 'addr' => 'required', 'name' => 'required|min:3', 'mobile' => 'required|min:11']);

		$input = $request->all();
		$input['member_id'] = Auth::user()->id;

		return [
			"status" => true,
			"code" => "200",
			"msg" => "成功",
			"data" => Member_addr::create($input)];
	}

	public function create()
	{
		return view('members.addrs.create');
	}

	public function update(Request $request)
	{
		$this->validate($request, ['area' => 'required|min:3', 'addr' => 'required', 'name' => 'required|min:3', 'mobile' => 'required|min:11']);

		$memberAddr = Member_addr::findOrFail($request->get('addr_id'));
		$isUpdate=$memberAddr->update($request->all());
		if(!$isUpdate){
			return [
				"status" => $isUpdate,
				"code" => "1002",
				"msg" => "更新失败",
				"data" => []
			];
		}
		return [
			"status" => $isUpdate,
			"code" => "200",
			"msg" => "成功",
			"data" => []
		];

	}

	public function destroy(Request $request)
	{
		$isDestroy = Member_addr::destroy($request->get('addr_id'));
		if (!$isDestroy) {
			return [
				"status" => $isDestroy,
				"code" => "1002",
				"msg" => "失败",
				"data" => []
			];
		}
		return [
			"status" => $isDestroy,
			"code" => "200",
			"msg" => "成功",
			"data" => []
		];

	}

	public function edit($id)
	{
		$memberaddrs = Member_addr::findOrFail($id);
		return view('members.addrs.edit', compact('memberaddrs'));
	}

	public function addrsLimit()
	{
		$memberAddrs = Member_addr::where('member_id', Auth::user()->id)->get();
		if ($memberAddrs->count() > 10) {
			return false;
		}
		return true;
	}
}