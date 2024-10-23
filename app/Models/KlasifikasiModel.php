<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KlasifikasiModel extends Model
{
    use HasFactory;

    protected $table = 'klasifikasi';

    protected $fillable = [
        'name',
        'image_path',
        'klasifikasi_category_id',
        'jenis',
        'total',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(KlasifikasiCategoryModel::class, 'klasifikasi_category_id');
    }
}
