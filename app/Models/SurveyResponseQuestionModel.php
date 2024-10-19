<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyResponseQuestionModel extends Model
{
    use HasFactory;

    protected $table = 'survey_response_answers';

    protected $fillable = [
        'survey_response_id',
        'survey_question_id',
        'answer',
    ];
}
