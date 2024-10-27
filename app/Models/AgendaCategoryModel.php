<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgendaCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'agenda_categories';

    protected $fillable = [
        'name', 'role'
    ];

    public function agenda(): HasMany
    {
        return $this->hasMany(AgendaModel::class, 'id');
    }
}
