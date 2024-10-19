<?php

namespace App\Http\Controllers;

use App\Models\SurveyModel;
use Exception;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = SurveyModel::all();
        return view('after-login.survey.index', compact('surveys'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'slug' => 'required',
                'content' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'status' => 'required|in:active,inactive,completed',
            ], [
                'title.required' => 'Judul survey harus di isi.',
                'slug.required' => 'Ringkasan survey harus di isi.',
                'content.required' => 'Detail survey harus di isi.',
                'start_date.required' => 'Waktu mulai survey harus di isi.',
                'end_date.required' => 'Waktu berakhir survey harus di isi.',
                'status.required' => 'Status survey harus di isi.',
                'status.in' => 'Hanya menerima status active, inactive & completed',
            ]);

            $survey = new SurveyModel();

            $survey->fill(array_merge(
                $request->all(),
                [
                    'user_id' => auth()->user()->id
                ]
            ));

            $survey->save();

            $this->alert(
                'Survey',
                'Penambahan survey baru berhasil dilakukan.',
                'success'
            );

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Penambahan tidak berhasil dilakukan.',
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
                'title' => 'required',
                'slug' => 'required',
                'content' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'status' => 'required|in:active,inactive,completed',
            ], [
                'title.required' => 'Judul survey harus di isi.',
                'slug.required' => 'Ringkasan survey harus di isi.',
                'content.required' => 'Detail survey harus di isi.',
                'start_date.required' => 'Waktu mulai survey harus di isi.',
                'end_date.required' => 'Waktu berakhir survey harus di isi.',
                'status.required' => 'Status survey harus di isi.',
                'status.in' => 'Hanya menerima status active, inactive & completed',
            ]);

            $survey = SurveyModel::findOrFail($id);

            $survey->fill(array_merge(
                $request->all(),
                [
                    'user_id' => auth()->user()->id
                ]
            ));

            $survey->update();

            $this->alert(
                'Survey',
                'Perubahan survey berhasil dilakukan.',
                'success'
            );

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Perubahan tidak berhasil dilakukan.',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        try {
            $survey = SurveyModel::findOrFail($id);

            if ($survey->questions()->exists() && $survey->responses()->exists()) {
                $this->alert(
                    'Survey',
                    'Survey terdapat beberapa pertanyaan dan response, silahkan hapus terlebih dahulu',
                    'error'
                );
            } else {
                $survey->delete();

                $this->alert(
                    'Survey',
                    'Survey berhasil dihapus.',
                    'success'
                );
            }

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'PPID tidak berhasil dihapus.',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
