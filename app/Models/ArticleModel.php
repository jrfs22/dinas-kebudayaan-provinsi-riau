<?php

namespace App\Models;

use App\Traits\GenerateUniqueSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticleModel extends Model
{
    use HasFactory, GenerateUniqueSlug;

    protected $table = 'articles';

    protected $fillable = [
        'title',
        'content',
        'slug',
        'summary',
        'date',
        'image_path',
        'cover_image_path',
        'user_id',
        'category_id',
        'hashtags'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ArticleCategoryModel::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
