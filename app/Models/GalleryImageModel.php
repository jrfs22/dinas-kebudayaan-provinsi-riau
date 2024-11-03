<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryImageModel extends Model
{
    use HasFactory;

    protected $table = 'gallery_images';

    protected $fillable = [
        'gallery_id',
        'title',
        'description',
        'image_path',
    ];

    public function gallery(): BelongsTo
    {
        return $this->belongsTo(GalleryModel::class, 'gallery_id');
    }
}
