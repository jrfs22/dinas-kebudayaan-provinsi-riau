<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiImageModel extends Model
{
    use HasFactory;

    protected $table = 'klasifikasi_images';

    protected $fillable = [
        'image_path',
        'klasifikasi_id',
    ];
}
