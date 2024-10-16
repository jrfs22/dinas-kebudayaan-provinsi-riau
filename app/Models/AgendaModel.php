<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgendaModel extends Model
{
    use HasFactory;

    protected $table = 'agenda';

    protected $fillable = [
        'name',
        'date',
        'location',
        'image_path',
        'agenda_category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(AgendaCategoryModel::class, 'agenda_category_id');
    }
}
