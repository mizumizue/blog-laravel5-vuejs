<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cake\I18n\Time;
use Ramsey\Uuid\Uuid;

/**
 * Customized Model Class
 */
class MyModel extends Model
{
    protected $casts = [
        'id' => 'string'
    ];

    /**
     * Constructor
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // newした時に自動的にuuidを設定する。
        $this->attributes['id'] = Uuid::uuid4()->toString();
    }

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
