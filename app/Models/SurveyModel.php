<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyModel extends Model
{
    use HasFactory;

    protected $table = 'surveys';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'start_date',
        'end_date',
        'status',
    ];

    public function questions(): HasMany
    {
        return $this->hasMany(SurveyQuestionModel::class, 'survey_id');
    }

    public function responses(): HasMany
    {
        return $this->hasMany(SurveyResponseModel::class, 'survey_id');
    }
}
