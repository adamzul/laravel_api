<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    
    public function index()
    {
        $article = Article::all();
        return response()->json(compact('article'),201);
    }
 
    public function show($id)
    {
        $article = Article::find($id);
        return response()->json(compact('article'),201);

    }

    public function store(Request $request)
    {
        $article = Article::create($request->all());
        return response()->json(compact('article'),201);

    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return 204;
    }
}
