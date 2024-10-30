<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyQuestionModel extends Model
{
    use HasFactory;

    protected $table = 'survey_questions';

    protected $fillable = [
        'question_text',
        'question_type',
        'options',
        'survey_id',
        'min_value',
        'max_value',
    ];

    public function answer(): BelongsTo
    {
        return $this->belongsTo(SurveyResponseQuestionModel::class, 'id');
    }
}
