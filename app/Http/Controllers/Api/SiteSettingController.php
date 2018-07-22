<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SiteSetting;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siteSetting = SiteSetting::firstOrFail();
        return response($siteSetting);
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
        // TODO Validate
        // $request->validate([
        // ]);
        $siteSetting = SiteSetting::where('id', $id)->firstOrFail();
        $siteSetting->fill($request->all())->update();
        return response('success', 200);
    }
}
