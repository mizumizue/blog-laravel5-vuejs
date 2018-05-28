<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Customized Model Class
 */
class MyModel extends Model
{
    // キャストする対象のプロパティ
    protected $casts = [
        'id' => 'string'
    ];
    
    // 対象のプロパティを指定の型に変換する
    public function getCasts()
    {
        if ($this->incrementing) {
            return array_merge([
                $this->getKeyName() => 'int',
            ], $this->casts);
        }
        return $this->casts;
    }
}
