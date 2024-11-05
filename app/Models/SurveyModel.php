<?php

namespace App\Models;

use App\Traits\GenerateUniqueSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyModel extends Model
{
    use HasFactory, GenerateUniqueSlug;

    protected $table = 'surveys';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'summary',
        'content',
        'url_path',
        'start_date',
        'end_date',
        'status',
    ];
}
