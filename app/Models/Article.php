<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends MyModel
{

    protected $fillable = [
        'id',
        'code',
        'title',
        'description',
        'published',
    ];

    /**
     * タグ関連付け
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
