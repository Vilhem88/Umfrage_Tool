<?php

namespace App\Http\Controllers;



use App\Models\Answer;
use App\Models\Question;
use App\Http\Controllers\MainController;
use App\Models\UserAnsweredQuestions;

class HomeController extends MainController
{
    public function index()
    {
        $questions = Question::all();
        return view('welcome', compact('questions'));
    }

    public function results()
    {   
        $voters = UserAnsweredQuestions::pluck('user_id')->count();
        $votes = Answer::select('answer', 'votes_count')->get();
        $total = $votes->reduce(function($a, $b){
            return $a + $b->votes_count;
        });

        $results = [];
        foreach ($votes as $vote){
            $results[$vote->answer] = number_format(floor($vote->votes_count / $total * 100));
        }

        return view('layouts.showResults', compact('results', 'voters'));
    }
}
