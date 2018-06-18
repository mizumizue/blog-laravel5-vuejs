<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends ApiController
{
    /**
     * Display a listing of the resource.
    *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('tags')->orderBy('created_at', 'desc')->get();
        return response($articles);
    }
}
