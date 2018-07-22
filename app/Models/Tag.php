<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends MyModel
{
    protected $fillable = [
        'title',
        'font_color_code',
        'background_color_code',
    ];

    /**
     * 記事関連付け
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
