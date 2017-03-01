<?php

namespace App\Http\Controllers;

use App\Model\Comment;
use App\Model\Post;
use App\Model\Video;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($id = 9)
    {
        $comment = Comment::with('commentable')->where('id', '=', $id)->get();
        return $comment;
    }

    public function createPost(Request $request, $id = 9)
    {
        $post = Post::find($id);
        $comment = $post->comments()->create(['body' => 'post Comment Createdfdfsaaaaaaaaa']);
        return $comment;
    }

    public function createVideo(Request $request, $id = 9)
    {
        $video = Video::find($id);
        $comment = $video->comments()->create(['body' => 'video Comment Create bbbbbbbbbbbbbb']);
        return $comment;
    }
}
