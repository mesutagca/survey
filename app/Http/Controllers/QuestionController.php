<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Questionnaire $questionnaire)
    {
    return view('question.create',compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)
    {
        $data=request()->validate([
            'question.question'=>'required',
            'answers.*.answer'=>'required',
        ]);
        //dd($data);
        /** @var Question $question */
        $question=$questionnaire->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);

        return redirect('/questionnaires/'.$questionnaire->id);
    }

    public function destroy(Questionnaire $questionnaire, Question $question)
    {
        $question->answers()->delete();
        $question->delete();

        return redirect($questionnaire->path());
    }
}
