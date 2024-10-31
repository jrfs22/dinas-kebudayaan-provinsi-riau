<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsCategoryModel extends Model
{
    use HasFactory;

    protected $table = 'news_categories';

    protected $fillable = [
        'name', 'departement_id'
    ];

    public function news(): HasMany
    {
        return $this->hasMany(NewsModel::class, 'id');
    }

    public function departement(): BelongsTo
    {
        return $this->belongsTo(DepartementModel::class, 'departement_id');
    }
}
