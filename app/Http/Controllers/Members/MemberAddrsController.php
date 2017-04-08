<?php
namespace App\Http\Controllers\Members;

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
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$memberaddrs = Member_addr::where('member_id', Auth::id())->get();
		return view('members.addrs.index', compact('memberaddrs'));
	}

	public function show($id)
	{
		$memberaddrs=Member_addr::findOrFail($id);
		return view('members.addrs.show',compact('memberaddrs'));
	}

	public function store(Request $request)
	{
		//接收POST数据
		//保存到数据库
		//重定向
		$this->validate($request, ['area' => 'required|min:3', 'addr' => 'required']);
		$input = $request->all();
		$input['member_id'] = Auth::id();
		Member_addr::create($input);
		return redirect('/addr');
	}

	public function create()
	{
	   return view('members.addrs.create');
	}

	public function update(Request $request,$id)
	{
		$this->validate($request, ['area' => 'required|min:3', 'addr' => 'required']);
		$article = Member_addr::findOrFail($id);
		$article->update($request->all());
		return redirect('/addr');

	}

	public function destroy()
	{

	}

	public function edit($id)
	{
		$memberaddrs=Member_addr::findOrFail($id);
		return view('members.addrs.edit',compact('memberaddrs'));
	}
}