<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpkdModel extends Model
{
    use HasFactory;

    protected $table = 'ppkd';

    protected $fillable = [
        'province_id',
        'prvince_name',
        'regency_id',
        'regency_name',
        'title',
        'file_path',
        'status',
        'date'
    ];
}
