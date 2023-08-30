<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use App\Models\Article;

class blogController extends Controller
{
    public function index()
    {
        $keyword =request()->keyword;

        // dd($keyword);
        if($keyword)
        {
            $articles = Article::with('category')
            ->whereStatus(1)
            ->where('title','like','%'.$keyword.'%')
            ->latest()
            ->paginate(3);
        } else
        {
            $articles = Article::where('status',1)->with('category')->paginate(3);
        }

        return view('blog.index',[
            // 'article'=>Article::where('status',1)->with('category')->get()->all(),
            'article'=> $articles,
            'latest_post'=>Article::where('status',1)->latest()->first()//latest di gunakkan untuk mengambil data terbaru
            // first di gunakkan untuk mengambil satu data saja
        ]);
    }

    public function cat(string $id)
    {
        return view('blog.index',[
            'article'=>Article::where([
                'status'=>1,
                'category_id'=> $id
            ])->with('category')->paginate(3),
            'latest_post'=>Article::where([
                'status'=>1,
                'category_id'=> $id
                ])->latest()->first()//latest di gunakkan untuk mengambil data terbaru
            // first di gunakkan untuk mengambil satu data saja
        ]);
    }
}
