<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\SurveyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SurveyResponseModel;
use Illuminate\Support\Facades\Log;
use App\Models\SurveyResponseQuestionModel;

class SurveyRespondenController extends Controller
{
    public function index(string $id)
    {
        try {
            $survey = SurveyModel::with([
                'responses', 'questions'
            ])->findOrFail($id);

            if ($survey) {
                foreach ($survey->responses as $item) {
                    if ($item->answer) {
                        foreach ($item->answer as $answerItem) {
                            $answerItem->answer_decode = json_decode($answerItem->answer);
                        }
                    }
                }
            }

            return view('after-login.survey.responden', compact('survey'));
        } catch (Exception $e) {
            $this->alert(
                'Terjadi kesalahan',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function store(Request $request, string $survey_id)
    {
        try {
            $request->validate([
                'text-fullname' => 'required',
                'text-email' => 'required'
            ]);

            DB::beginTransaction();

            $survey = SurveyModel::with('questions')->findOrFail($survey_id);

            $surveyResponden = SurveyResponseModel::create([
                'survey_id' => $survey->id,
                'fullname' => $request->input('text-fullname'),
                'email' => $request->input('text-email'),
            ]);

            foreach ($survey->questions as $item) {
                $answer = new SurveyResponseQuestionModel();

                $answer->survey_response_id = $surveyResponden->id;
                $answer->survey_question_id = $item->id;
                $answer->answer = json_encode($request->input($item->question_type. "-" . $item->id));

                $answer->save();
            }

            DB::commit();

            $this->alert(
                'Survey',
                'Survey Berhasil Dikirimkan',
                'success'
            );

            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);

            $this->alert(
                'Survey',
                'Survey Tidak Berhasil Di kirimkan',
                'error'
            );

            return redirect()->back();
        }
    }
}
