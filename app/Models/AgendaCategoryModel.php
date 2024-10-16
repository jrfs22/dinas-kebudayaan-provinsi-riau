<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'agenda_categories';

    protected $fillable = [
        'name',
    ];
}
