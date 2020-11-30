<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UuidTrait
{
    protected static function bootUuidTrait()
    {
        static::creating(function ($model) {
            $model->keyType = 'string';
            $model->incrementing = false;

            $model->{$model->getKeyName()} = $model->{$model->getKeyName()} ?: Str::uuid();
        });
    }
    
    public function getIncrementing()
    {
        return false;
    }
    
    public function getKeyType()
    {
        return 'string';
    }
}