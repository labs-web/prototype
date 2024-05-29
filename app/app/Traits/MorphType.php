<?php

namespace App\Traits;

trait MorphType
{
    protected static function bootMorphType()
    {
        static::creating(function ($model) {
            $class = class_basename(static::class);
            $model->type = $class;
        });
    }
}
