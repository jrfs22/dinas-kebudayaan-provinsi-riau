<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewsModel extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'content',
        'slug',
        'date',
        'image_path',
        'cover_image_path',
        'category_id',
        'hashtags'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(NewsCategoryModel::class);
    }
}
