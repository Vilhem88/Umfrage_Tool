<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;
use App\Http\Controllers\MainController;


class QuestionController extends MainController
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request)
    {
        foreach ($request->answers as $answer) {
            if (empty($answer['answer'])) {
                return redirect()->route('dashboard')->with('error', 'The Answer fields cannot be empty!');
            }
        }
        $question = auth()->user()->questions()->create($request->safe()->except('answers'));
        $question->answers()->createMany($request->answers);

        return redirect()->back()->with('success', 'A new question was created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $question = Question::find($id)->with('answers')->get()->toArray();
        $question = Question::findOrFail($id);
        $answers = $question->answers->toArray();

        return view('layouts.show', compact('question', 'answers'));
    }
}
