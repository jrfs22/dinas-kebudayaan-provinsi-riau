<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryCategoryModel extends Model
{
    use HasFactory;

    protected $table = 'gallery_categories';

    protected $fillable = [
        'name', 'departement_id'
    ];

    public function gallery(): HasMany
    {
        return $this->hasMany(GalleryModel::class, 'id');
    }

    public function departement(): BelongsTo
    {
        return $this->belongsTo(DepartementModel::class, 'departement_id');
    }
}
