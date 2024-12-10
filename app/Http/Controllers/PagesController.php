<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\View\View;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function home(): View {
        $articles = Article::orderBy("id", "DESC")->take(6)->get();
        $comments = Comment::count();
        $tags = Tag::count();

        return view('home', get_defined_vars());
    }

    public function articles(): View {
        $articles = Article::with(['tags', 'comments'])->orderBy("id", "DESC")->paginate(10);
        #$articles = Article::orderBy("id", "DESC")->get();
        $tags = Tag::orderBy("id", "DESC")->get();

        return view('articles', get_defined_vars());
    }

    public function article($id): View {
        $article = Article::with(['tags', 'comments'])->where('id', '=', $id)->first();

        return view('article', get_defined_vars());
    }
}
