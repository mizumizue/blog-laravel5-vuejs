<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->tag) {
            $tag = Tag::with('articles')->where('title', $request->tag)->firstOrFail();
            $articles = $tag->articles()
                            ->with('tags')
                            ->where('published', '=', true)
                            ->orderBy('created_at', 'desc')
                            ->get();
            return response($articles);
        }
        $articles = Article::with('tags')
                            ->orderBy('created_at', 'desc')
                            ->where('published', '=', true)
                            ->get();
        return response($articles);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $article = Article::with('tags')->where('code', '=', $code)->firstOrFail();
        return response($article);
    }
}
