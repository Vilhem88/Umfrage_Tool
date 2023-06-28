<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\UserAnsweredQuestions;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;

class UserController extends MainController
{
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        
        if(!array_key_exists('answer_id',$request->all()))
        {
            return redirect()->route('home.index')->with('error', 'Please select an answer!');
        }
      
        foreach($request->answer_id as $key => $answer_id)
        {
            $answer_id = Answer::where('id', $answer_id)->first();
            $answer_id->increment('votes_count');
            $answer_id->update();
        }

        foreach($request->answer_id as $answer){
            UserAnsweredQuestions::create([
                'user_id' => $request->user_id,
                'question_id' => $request->question_id,
                'answer_id' => $answer,
                
            ]);
        }
        return redirect()->route('home.index')->with('success', 'Successfully answered!');
    }

}
