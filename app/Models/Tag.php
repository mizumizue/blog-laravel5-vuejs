<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends MyModel
{
    /**
     * 記事関連付け
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
