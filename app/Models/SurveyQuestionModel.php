<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
