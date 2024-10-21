<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContentModel extends Model
{
    use HasFactory;

    protected $table = 'contents';

    protected $fillable = [
        'title', 'description',
        'content', 'date', 'status',
        'category', 'url_path', 'image_path'
    ];

    protected static function booted()
{
    static::saved(function () {
        self::clearContentCache();
    });

    static::deleted(function () {
        self::clearContentCache();
    });
}

protected static function clearContentCache()
{
    $keys = [
        'hero-deskripsi',
        'hero-main-image',
        'hero-secondary-image',
        'tentang-kami-deskripsi',
        'tentang-kami-gambar-utama',
        'tentang-kami-gambar-thumnail',
        'tentang-kami-channel-yt',
        'sitari',
        'email',
        'telepon'
    ];

    foreach ($keys as $key) {
        Cache::forget($key);
    }
}


    public function scopePublish($query)
    {
        return $query->where('status', 'published');
    }
}
