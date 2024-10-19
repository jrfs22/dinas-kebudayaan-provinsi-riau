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
        'slug',
        'content',
        'location',
        'contact_person',
        'email',
        'start_time',
        'end_time',
        'cover_image_path',
        'image_path',
        'date',
        'agenda_category_id',
        'user_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(AgendaCategoryModel::class, 'agenda_category_id');
    }
}
