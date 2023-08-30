<?php

namespace App\Http\Controllers\admin;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\updateArticleRequest;

class articleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // halaman home
    public function index()
    {
        if (request()->ajax()) {
            $article = Article::with('Category')
                ->latest()
                ->get();

            // untuk relasi dibagian server side
            //custom column
            return DataTables::of($article)
                ->addIndexColumn()
                ->addColumn('category_id', function ($article) {
                    //relasi article dengan category dan mengambil category namenya
                    return $article->Category->name;
                    //panggil custom column
                })
                ->addColumn('status', function ($article) {
                    if ($article->status == 0) {
                        return '<span class="badge bg-danger">Private</span>';
                    } else {
                        return '<span class="badge bg-success">Published</span>';
                    }
                })
                ->addColumn('button', function ($article) {
                    return '<div>
                                <a type="button" href="article/' .
                        $article->id .
                        '" class="btn btn-info" ><strong>Detail</strong></a>
                                <a type="button" href="article/' .
                        $article->id .
                        '/edit" class="btn btn-warning" ><strong>Edit</strong></a>
                                <a type="button" href="#" onclick="deleteArticle('.$article->id.')"  class="btn btn-danger" ><strong>Delete</strong></a>
                            </div>';
                })
                ->rawColumns(['category_id', 'status', 'button'])
                ->make();
        }
        // return view('admin.article',['articles'=>Article::with('Category')->latest()->get()]);
        return view('admin.article.article');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.article.addArticle', [
            'categories' => Category::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // membuat article baru
    public function store(ArticleRequest $request)
    {
        // menggunakkan validated karena kita menggunakkan validasi di request file tersendiri,
        // jadi di atas bukan request tapi file validate yang kita import
        $data = $request->validated();

        $file = $request->file('img'); // <- mengambil nilai value dari inpute file
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension(); //<- get original extention ini adalah mengambil bentuknya apakah jpg, png, atau yang lain
        // setelah itu nama(uniqid) di tambah . ditambah dengan bentuk ,,,, menjadi => fbafhaofvuiavf.jpg
        $file->storeAs('public/article/' . $fileName); // lalu di save as di public store

        //mengambil value untuk di simpan ke database
        $data['img'] = $fileName;
        $data['slug'] = Str::slug($data['title']); // convert title to slug

        //dugunakkan untuk create isi database atau menyimpan data
        Article::create($data);

        return redirect(url('admin/article'))->with('success', 'Data Article has been Created !!!');
    }

    /**
     * Display the specified resource.
     */
    // untuk menampilkan detaile article
    public function show(string $id)
    {
        return view('admin.article.detaile', [
            'article' => Article::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // digunakkan untuk memanggil halaman edit atau update
    public function edit(string $id)
    {
        return view('admin.article.editArticle', [
            'article' => Article::find($id),
            'categories' => Category::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // digunakkan untuk menyimpan updateanulu
    public function update(updateArticleRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/article/' . $fileName);

            //unllink or delete old img
            Storage::delete('public/article/' .basename($request->oldImg));

            $data['img'] = $fileName;
        } else {
            $data['img'] = $request->oldImg;
        }

        $data['slug'] = Str::slug($data['title']);

        Article::find($id)->update($data);

        return redirect(url('admin/article'))->with('success', 'Data Article has been Updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    // untuk delete article
    public function destroy(string $id)
    {
        $data = Article::find($id);
        Storage::delete('public/article/' .basename($data->img));

        $data->delete();
        return response()->json([
            'message'=>'Data article has been deleted'
        ]);
    }
}
