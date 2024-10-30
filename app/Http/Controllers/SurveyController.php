<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Exception;
use App\Models\SurveyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;

class SurveyController extends Controller
{
    public function index()
    {
        if(Auth::check()) {
            $surveys = SurveyModel::all();
            return view('after-login.survey.index', compact('surveys'));
        } else {
            $today = Carbon::today();

            $surveys = SurveyModel::select('*')->orderByRaw("CASE WHEN start_date >= ? AND end_date <= ? THEN 1 ELSE 2 END", [$today, $today])->orderByDesc('created_at')->where('status', '!=', 'inactive')->whereHas('questions')->get();

            if($surveys->isNotEmpty()) {
                foreach ($surveys as $survey) {
                    $survey->slugs = Str::slug($survey->title);
                }
            }

            return view('before-login.survey.index', compact('surveys'));
        }
    }

    public function show(string $id, string $slugs)
    {
        try {
            $survey = SurveyModel::with('questions')->where('id', $id)
            ->whereRaw('LOWER(REPLACE(title, " ", "-")) = ?', [strtolower($slugs)])
            ->firstOrFail();

            if (isset($survey)) {
                $survey->question_summary = $survey->questions()->count() + 2;

                foreach ($survey->questions as $item) {
                    if(in_array($item->question_type, ['radio', 'checkbox'])) {
                        $item->option_decode = json_decode($item->options, true);
                    }
                }
            }

            return view('before-login.survey.detail', compact('survey'));
        } catch (Exception $e) {
            $this->alert(
                'Survey',
                'Data tidak ditemukan',
                'error'
            );

            return redirect()->back();
        }
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
                'Survey tidak berhasil dihapus.',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
