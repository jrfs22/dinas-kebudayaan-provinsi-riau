<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiInformationModel extends Model
{
    use HasFactory;

    protected $table = 'klasifikasi_informations';

    protected $fillable = [
        'type',
        'description',
        'klasifikasi_id',
    ];
}

