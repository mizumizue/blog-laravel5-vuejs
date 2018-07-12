<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class AdminArticleController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::with('tags')
                        ->orderBy('created_at', 'desc')
                        ->get();
        return response($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|max:191',
            'title' => 'required|max:191',
            'description' => 'required|max:191',
        ]);
        $input = $request->all();
        $article = new Article;
        $result = $article->fill($input)->save();
        if ($result) {
            return response('success', 200);
        }
        return response('error', 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::with('tags')
                            ->where('id', '=', $id)
                            ->firstOrFail();
        return response($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|max:191',
            'title' => 'required|max:191',
            'description' => 'required|max:191',
            'published' => 'required',
        ]);
        $inputArticle = $request->all();
        unset($inputArticle['tags']);
        $article = Article::where('id', $id)->with('tags')->firstOrFail();
        $currentTags = collect($article->tags)->pluck('id');
        $tags = [];
        $article->tags()->detach($currentTags->toArray());
        foreach ($request->tags as $tagId) {
            $tags[] = [
                'id' => Uuid::uuid4()->toString(),
                'article_id' => $id,
                'tag_id' => $tagId
            ];
        }
        $article->tags()->attach($tags);
        $article->fill($inputArticle)->update();
        return response('success', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
