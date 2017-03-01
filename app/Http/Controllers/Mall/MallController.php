<?php

namespace App\Http\Controllers\Mall;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MallController extends Controller
{
    public function index()
    {
        #dd(Carbon::now());
        return view('mall.index');
    }
}
