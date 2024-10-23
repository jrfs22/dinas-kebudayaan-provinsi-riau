<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KlasifikasiCategoryModel extends Model
{
    use HasFactory;

    protected $table = 'klasifikasi_categories';

    protected $fillable = [
        'name',
    ];

    public function klasifikasi(): HasMany
    {
        return $this->hasMany(KlasifikasiModel::class, 'id');
    }
}
