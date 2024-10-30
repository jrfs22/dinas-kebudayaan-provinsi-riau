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
        'user_id',
        'category_id',
        'hashtags'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(NewsCategoryModel::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
