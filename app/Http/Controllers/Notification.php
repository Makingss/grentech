<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserSubScribe;
use Illuminate\Support\Facades\Redirect;

class Notification extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showNotitfcation()
    {
        /*
        //如果用户没有登录,重定向到login,成功登录后返回当前页面
        if(Auth::check() == false){
            return Redirect::guest('login');
        }
        */
        #foreach (Auth::user()->notifications as $notification)
        #$user = \App\User::find(1)->notifications;
        $notifications = Auth::user()->notifications;
        return view('notifications.main', compact('notifications'));
    }

    public function generate()
    {
        Auth::user()->notify(new UserSubScribe());
    }

    public function is_read($id)
    {
        #$notifications = Auth::user()->notifications;
        #foreach ($notifications as $notification) {
        #if ($notification->id == $id) {
//        DB::table('notifications')
//            ->where('id', $id)
//            ->update(array('read_at' => Carbon::now()));
        Auth::user()->unreadNotifications()->where('id',$id)->update(['read_at' => Carbon::now()]);
        #}
        #}
        //Auth::user()->unreadNotifications->markAsRead();
    }
}
