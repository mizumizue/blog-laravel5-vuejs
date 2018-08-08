<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends MyModel
{
    protected $fillable = [
        'title',
        'description',
        'keywords',
        'url',
        'domain',
        'author',
        'email',
    ];
}
