<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
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
        $articles = Article::with('tags')->orderBy('created_at', 'desc')->get();
        return response($articles);
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
            'published' => 'required|boolean',
            'code' => "required|unique:articles,code|max:191",
            'title' => 'required|max:191',
            'description' => 'required|max:191',
            'content' => 'required'
        ]);
        $article = new Article;
        $input = $request->all();
        $tags = $this->createArticleTags($article->id, $input['tags']);
        $article->tags()->attach($tags);
        $article->fill($input)->save();
        return response('success', 200);
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
            'published' => 'required|boolean',
            'code' => "required|unique:articles,code,{$id},id|max:191",
            'title' => 'required|max:191',
            'description' => 'required|max:191',
            'content' => 'required'
        ]);
        $input = $request->all();
        $article = Article::where('id', $id)->with('tags')->firstOrFail();
        $tags = $this->createArticleTags($id, $input['tags']);
        $article->tags()->sync($tags);
        unset($input['tags']);
        $article->fill($input)->update();
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
        $article = Article::where('id', '=', $id)->firstOrFail();
        $article->delete();
        return response('success', 200);
    }

    /**
     * createArticleTagData
     * @param string $articleId
     * @param array $tagIds
     * @return array $articleTags;
     */
    private function createArticleTags(string $articleId, array $tagIds):array
    {
        $articleTags = [];
        foreach ($tagIds as $tagId) {
            $articleTags[] = [
                'id' => Uuid::uuid4()->toString(),
                'article_id' => $articleId,
                'tag_id' => $tagId
            ];
        }
        return $articleTags;
    }
}
