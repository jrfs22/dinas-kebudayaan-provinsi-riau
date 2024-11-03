<?php

namespace App\Models;

use App\Traits\GenerateUniqueSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgendaModel extends Model
{
    use HasFactory, GenerateUniqueSlug;

    protected $table = 'agenda';

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'location',
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
