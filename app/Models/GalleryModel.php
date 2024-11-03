<?php

namespace App\Models;

use App\Traits\GenerateUniqueSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryModel extends Model
{
    use HasFactory, GenerateUniqueSlug;

    protected $table = 'galleries';

    protected $fillable = [
        'title',
        'slug',
        'date',
        'image_path',
        'gallery_category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(GalleryCategoryModel::class, 'gallery_category_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(GalleryImageModel::class, 'gallery_id');
    }
}
