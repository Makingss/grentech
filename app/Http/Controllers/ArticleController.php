<?php
namespace App\Http\Controllers;

use App\Events\UserSignUp;
use App\Listeners\HandleUserSignUp;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Redirect;

class ArticleController extends Controller
{
    public function __construct()
    {
        //如果用户没有登录,重定向到login,成功登录后返回当前页面
        $this->middleware('auth');
    }

    public function index()
    {
        #$article = Article::latest()->where('published_at','<=',Carbon::now())->get();
        $article = Article::latest()->published()->get();
        return view('articles.index', compact('article'));
    }

    /**
     * show
     */
    public function show($id)
    {
        /**
         * find()
         * findOrFail()
         */
        $article = Article::findOrFail($id);
        #$article = $article->published_at->diffForHumans();
        return view('articles.show')->with('article', $article);
    }

    /**
     * update article
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['title' => 'required|min:3', 'content' => 'required', 'published_at' => 'required']);
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect('/articles');

    }

    /**
     * create article
     */
    public function create()
    {
        #$user = \App\User::find(1);
        #event(new UserSignUp($user));
        return view('articles.create');
    }

    public function store(Request $request)
    {
        //接收POST数据
        //保存到数据库
        //重定向
        $this->validate($request, ['title' => 'required|min:3', 'content' => 'required', 'published_at' => 'required']);
        $input = $request->all();
        Article::create($input);
        return redirect('/articles');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }
}
