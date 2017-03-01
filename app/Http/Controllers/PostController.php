<?php

namespace App\Http\Controllers;

use App\Model\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::with('comments')->where('id', '=', 2)->get();
        return $post;
    }

    public function showComments()
    {

    }
}
