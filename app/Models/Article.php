<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends MyModel
{

    protected $fillable = [
        'code',
        'title',
        'description',
        'published',
        'content',
    ];

    /**
     * タグ関連付け
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
