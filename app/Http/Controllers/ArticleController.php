<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use League\CommonMark\CommonMarkConverter;
class ArticleController extends Controller
{
    public function home():View
    {
        $categories = Category::get();
        $user = User::all();
        $latestArticles = Article::limit(3)->get();
        return view('home', compact('categories', 'user', 'latestArticles'));
    }

    public function article():View
    {
        $articles = Article::with('category')->with('user')->orderBy('id','desc')->paginate(6);
        $newArticles = Article::with('category')->with('user')->orderBy('id','desc')->limit(3)->get();
        return view('pages.articles', compact('articles', 'newArticles'));
    }

    public function detail(Article $article):View
    {
        
        $newArticles = Article::with('category')->with('user')->orderBy('id','desc')->limit(3)->get();
        return view('pages.articlesdetail', compact('article', 'newArticles'));
    }
}
