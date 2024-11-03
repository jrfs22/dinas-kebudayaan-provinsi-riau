<?php

namespace App\Traits;

use Str;

trait GenerateUniqueSlug
{
    protected static function bootGenerateUniqueSlug()
    {
        static::creating(function($model) {
            if (empty($model->slug)) {
                $model->slug = $model->generateUniqueSlug($model->title);
            }
        });

        static::updating(function($model) {
            if (empty($model->slug) || $model->isDirty('title')) {
                $model->slug = $model->generateUniqueSlug($model->title);
            }
        });
    }

    public function generateUniqueSlug($title)
    {
        return time() . '/' .Str::slug($title);
    }
}
