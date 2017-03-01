<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitesController extends Controller
{
    //index
    public function index()
    {
        return view('welcome');
    }
    //about
    public function about(){
        #控制器往blade模版传递变量
        //方法一
       
        #$last='master';
        #return view('sites.about')->with('name',$name);
        //方法二s
        #return  view('sites.about')->with(['fisrt'=>$name,
        #              'last'=>$last]);
        //方法三
        #$data=[];
        #$data['fisrt']='我是making';
        #$data['last']='我是master';
        #return view('sites.about',$data);
        //方法四
        $fisrt = 'this is making';
        $last = 'i.am master';
        return  view('sites.about',compact('fisrt','last'));
    }
    public function content(){
        $name='<span style="color:red"> Making</span>';
        $fisrt = ['making','master','wuyanping'];
        $last = 'master';
        return view('sites.content',compact('fisrt','last','name'));
    }
}
