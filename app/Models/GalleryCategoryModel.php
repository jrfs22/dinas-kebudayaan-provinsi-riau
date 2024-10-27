<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryCategoryModel extends Model
{
    use HasFactory;

    protected $table = 'gallery_categories';

    protected $fillable = [
        'name', 'role'
    ];

    public function gallery(): HasMany
    {
        return $this->hasMany(GalleryModel::class, 'id');
    }
}
