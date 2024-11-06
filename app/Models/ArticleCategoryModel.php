<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticleCategoryModel extends Model
{
    use HasFactory;

    protected $table = 'article_categories';

    protected $fillable = [
        'name', 'departement_id'
    ];

    public function article(): HasMany
    {
        return $this->hasMany(ArticleModel::class, 'category_id');
    }

    public function departement(): BelongsTo
    {
        return $this->belongsTo(DepartementModel::class, 'departement_id');
    }
}
