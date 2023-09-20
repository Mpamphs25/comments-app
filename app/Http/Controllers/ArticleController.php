<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       $articles = Article::getArticles();
       return  response()->json($articles);
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

        $validated = $request->validate([
           //title,slug,images,description,category_id
            'title' => ['required','min:5','max:90','string','unique:articles'],
            'description' => ['required','min:5','max:255','string'],
            'category_id' => ['required'],
        ]);

        $slug = $validated['title'];

        $validated['slug'] = Str::slug($slug);
        //TODO image upload
        $validated['images'] = 'sdaadsdasdadasda';


        if(Article::create($validated))
        {
            return response()->json(['Success' => 'Article  inserted'],201);
        }

            return response()->json(['Error' => 'Something went wrong'],404);

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article= Article::getSingleArticle($article->id);
        return  response()->json($article);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $article= Article::getSingleArticle($article->id);
//        return  response()->json($article);
        return json_decode($article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article = Article::findOrFail($article->id);
        $article->delete();
        return response()->json(['Success', 'Article Deleted'],201);
    }
}
