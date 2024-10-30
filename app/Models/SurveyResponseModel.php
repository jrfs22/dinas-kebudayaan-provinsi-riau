<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SurveyResponseModel extends Model
{
    use HasFactory;

    protected $table = 'survey_responses';

    protected $fillable = [
        'survey_id',
        'fullname',
        'email',
    ];

    public function answer(): HasMany
    {
        return $this->hasMany(SurveyResponseQuestionModel::class,  'survey_response_id', 'id');
    }
}
