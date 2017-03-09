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
