<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends MyModel
{
    protected $fillable = [
        'title',
        'description',
        'url',
        'domain',
        'author',
        'email',
    ];
}
