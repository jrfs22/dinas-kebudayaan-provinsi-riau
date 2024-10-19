<?php

namespace App\Http\Controllers;

use App\Models\SurveyModel;
use Exception;
use Illuminate\Http\Request;

class SurveyQuestionController extends Controller
{
    public function index(string $id)
    {
        try {
            $survey = SurveyModel::findOrFail($id);
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
