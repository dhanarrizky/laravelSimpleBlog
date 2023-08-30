<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArticleApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Article::latest()->paginate(5);
        return new ArticleResource(true, 'Data list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'title' => 'required',
            'slug' => 'nullable',
            'desc' => 'required',
            'img' => 'required|image|file|mimes:png,jpg,jpeg,webp|max:2024',
            'status' => 'required',
            'publish_date' => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $img = $request->file('img');
        $img->storeAs('public/posts', $img->hashName());

        //create post
        $result = Article::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug'=> Str::slug($request->title),
            'desc' => $request->desc,
            'img' => $img->hashName(),
            'status' => $request->status,
            'publish_date' => $request->publish_date,
        ]);

        return new ArticleResource(true, 'Data Article has been Created !!!', $result);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Article::find($id);

        return new ArticleResource(true, 'Detaile Data !', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'title' => 'required',
            'slug' => 'nullable',
            'desc' => 'required',
            'img' => 'required|image|file|mimes:png,jpg,jpeg,webp|max:2024',
            'status' => 'required',
            'publish_date' => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        

        if ($request->hasFile('image')) {

            //upload image
        $img = $request->file('img');
        $img->storeAs('public/posts', $img->hashName());


        Storage::delete('public/posts/'.basename(Article::find($id)->img));
        //create post
        $result = Article::find($id)->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug'=> Str::slug($request->title),
            'desc' => $request->desc,
            'img' => $img->hashName(),
            'status' => $request->status,
            'publish_date' => $request->publish_date,
        ]);

        } else {

            $result = Article::find($id)->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'slug'=> Str::slug($request->title),
                'desc' => $request->desc,
                'status' => $request->status,
                'publish_date' => $request->publish_date,
            ]);
        }


        return new ArticleResource(true, 'Data Article has been Updated !!!', $result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Article::find($id);

        //delete image
        Storage::delete('public/article/'.basename($data->img));

        //delete data
        $data->delete();

        //return response
        return new ArticleResource(true, 'deleted successfully', null);
    }
}
