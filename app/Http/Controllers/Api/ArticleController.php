<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class ArticleController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = null;
        $tagName = $request->tag ?? null;
        if ($tagName) {
            $tag = Tag::with('articles')
                ->where('title', $tagName)
                ->where('published', '=', true)
                ->firstOrFail();
            $articles = $tag->articles()
                ->with('tags')
                ->orderBy('created_at', 'desc')
                ->get();
        }
        $articles = $articles ?? Article::with('tags')
                                    ->orderBy('created_at', 'desc')
                                    ->where('published', '=', true)
                                    ->get();
        return response($articles);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::with('tags')->where('id', '=', $id)->firstOrFail();
        return response($article);
    }
}
