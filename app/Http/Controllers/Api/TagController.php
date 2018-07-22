<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('title', 'asc')->get();
        return response($tags);
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
            'title' => 'required|max:191',
            'font_color_code' => "required|regex:/^[0-9A-F]{6}$/",
            'background_color_code' => "required|regex:/^[0-9A-F]{6}$/",
        ]);
        $tag = new Tag;
        $tag->fill($request->all())->save();
        return response('success', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::where('id', $id)->firstOrFail();
        return response($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:191',
            'font_color_code' => "required|regex:/^[0-9A-F]{6}$/",
            'background_color_code' => "required|regex:/^[0-9A-F]{6}$/",
        ]);
        $tag = Tag::where('id', $id)->firstOrFail();
        $tag->fill($request->all())->update();
        return response('success', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::where('id', $id)->firstOrFail();
        $tag->delete();
        return response('success', 200);
    }
}
