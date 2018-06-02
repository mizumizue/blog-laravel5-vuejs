<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cake\I18n\Time;

/**
 * Customized Model Class
 */
class MyModel extends Model
{
    protected $casts = [
        'id' => 'string'
    ];

    /**
     * CarbonをTimeオブジェクトに変換
     * @param Illuminate\Support\Carbon
     * @return Cake\I18n\Time
     */
    public function getCreatedAtAttribute($createdAt)
    {
        return Time::parse($createdAt);
    }

    /**
     * CarbonをTimeオブジェクトに変換
     * @param Illuminate\Support\Carbon
     * @return Cake\I18n\Time
     */
    public function getUpdatedAtAttribute($updatedAt)
    {
        return Time::parse($updatedAt);
    }

    /**
     * 対象のプロパティを指定の型に変換する
     */
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
