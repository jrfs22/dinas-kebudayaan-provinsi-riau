<?php

namespace App\Http\Controllers;

use App\Models\SurveyModel;
use App\Models\SurveyQuestionModel;
use Exception;
use Illuminate\Http\Request;

class SurveyQuestionController extends Controller
{
    public function index(string $id)
    {
        try {
            $survey = SurveyModel::with('questions')->findOrFail($id);

            return view('after-login.survey.questions', compact('survey'));
        } catch (Exception $e) {
            $this->alert(
                'Terjadi kesalahan',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'survey_id' => 'required|exists:surveys,id',
                'question_text' => 'required',
                'question_type' => 'required',
                'options' => 'sometimes',
                'min_value' => 'sometimes',
                'max_value' => 'sometimes',
            ], [
                'survey_id.required' => 'Survey ID tidak ada',
                'survey_id.exists' => 'Survey ID tidak sesuai',
                'question_text.required' => 'Pertanyaan nya harus diisi.',
                'question_type.required' => 'Jenis pertanyaan nya harus diisi.',
            ]);

            $question = new SurveyQuestionModel();

            $question->fill(array_merge(
                $request->only([
                    'survey_id',
                    'question_text',
                    'question_type',
                    'min_value',
                    'max_value'
                ]), [
                    'options' => json_encode($request->options)
                ]
            ));

            $question->save();

            $this->alert(
                'Questions',
                'Berhasil menambahkan pertanyaan.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Questions',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'survey_id' => 'required|exists:surveys,id',
                'question_text' => 'required',
                'options' => 'sometimes',
                'min_value' => 'sometimes',
                'max_value' => 'sometimes',
            ], [
                'survey_id.required' => 'Survey ID tidak ada',
                'survey_id.exists' => 'Survey ID tidak sesuai',
                'question_text.required' => 'Pertanyaan nya harus diisi.',
            ]);

            $question = SurveyQuestionModel::findOrFail($id);

            $question->fill(array_merge(
                $request->only([
                    'survey_id',
                    'question_text',
                    'question_type',
                    'min_value',
                    'max_value'
                ]), [
                    'options' => json_encode($request->options)
                ]
            ));

            $question->save();

            $this->alert(
                'Questions',
                'Berhasil merubah pertanyaan.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Perubahan tidak berhasil di lakukan',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        try {
            $survey = SurveyQuestionModel::findOrFail($id);
            $survey->delete();

            $this->alert(
                'Pertanyaan',
                'Pertanyaan berhasil dihapus.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Pertanyaan tidak berhasil dihapus',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
