<?php

namespace App\Models;

use App\Traits\GenerateUniqueSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KlasifikasiModel extends Model
{
    use HasFactory, GenerateUniqueSlug;

    protected $table = 'klasifikasi';

    protected $fillable = [
        'title',
        'description',
        'slug',
        'klasifikasi_category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(KlasifikasiCategoryModel::class, 'klasifikasi_category_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(KlasifikasiImageModel::class, 'klasifikasi_id');
    }

    public function informations(): HasMany
    {
        return $this->hasMany(KlasifikasiInformationModel::class, 'klasifikasi_id');
    }
}
