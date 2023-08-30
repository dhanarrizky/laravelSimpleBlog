<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;

class adminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard',[
            'total_articles'=>Article::count(),
            'article_private'=>Article::where('status', 0)->count(),
            'article_publish'=>Article::where('status', 1)->count(),
            'total_categories'=>Category::count(),
            'article_table'=>Article::with('category')->get()->all(),
            'category_table'=>Category::get(),
            'popular_article'=>Article::orderBy('views','desc')->get()
        ]);
    }
}
