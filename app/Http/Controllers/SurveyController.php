<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use App\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function show(Questionnaire $questionnaire, $slug)
    {
        $questionnaire->load('questions.answers');
        return view('survey.show', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire, $slug)
    {
//dd(request()->input());
        $data=request()->validate([
           'responses.*.question_id'=>'required',
            'responses.*.answer_id'=>'required',
            'survey.name'=>'required',
            'survey.email'=>'required|email'
        ]);

        $survey=$questionnaire->surveys()->create($data['survey']);
        $survey->responses()->createMany($data['responses']);

        return "Thank You!";
    }
}
