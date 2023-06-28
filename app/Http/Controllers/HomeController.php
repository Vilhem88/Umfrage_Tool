<?php

namespace App\Http\Controllers;



use App\Models\Question;
use App\Http\Controllers\MainController;

class HomeController extends MainController
{
    public function index()
    {
        $questions = Question::all();
        return view('welcome', compact('questions'));
    }
}
