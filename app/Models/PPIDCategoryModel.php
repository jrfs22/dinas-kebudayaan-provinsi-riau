<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PPIDCategoryModel extends Model
{
    use HasFactory;

    protected $table = 'ppid_category';

    protected $fillable = ['name', 'type'];

    protected static function booted()
    {
        static::saved(function ($category) {
            Cache::forget('ppid_categories');
        });

        static::deleted(function ($category) {
            Cache::forget('ppid_categories');
        });
    }
}
