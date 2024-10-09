<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryModel extends Model
{
    use HasFactory;

    protected $table = 'galleries';

    protected $fillable = [
        'name',
        'date',
        'image_path',
        'gallery_category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(GalleryCategoryModel::class, 'gallery_category_id');
    }
}
