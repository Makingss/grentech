<?php

namespace App\Http\Controllers;

use App\Model\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $video = Video::with('comments')->where('id', '=', 10)->get();
        return $video;
    }
}
