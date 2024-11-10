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
        'hero-title',
        'hero-subtitle',
        'hero-deskripsi',
        'hero-main-image',
        'hero-secondary-image',
        'tentang-kami-deskripsi',
        'tentang-kami-gambar-utama',
        'tentang-kami-channel-yt',
        'tentang-kami-values',
        'sitari',
        'email',
        'telepon',
        'upt-museum-gambar-utama',
        'upt-museum-deskripsi',
        'upt-museum-background',
        'upt-museum-channel-yt',
        'klasifikasi',
        'footer-background',
        'breadcrumb',
        'media-social',
        'informasi-category',
        'tentang-kami-title',
        'upt-museum-title',
        'upt-museum-values'
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
