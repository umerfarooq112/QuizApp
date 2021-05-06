<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use DB;

class QuizController extends Controller
{
    public function startQuiz(Request $request)
    {
        if(!$request->has('id'))
        {
            $QuestionId = 1;
            $CorrectAnswers = 0;

            $singleQuiz = Quiz::find($QuestionId);
            return view('quiz.start')->with('quiz',$singleQuiz)->with('id',$QuestionId)->with('CorrectAnswers',$CorrectAnswers);
            
        }
        else 
        {
            // return $request->all();
            $CorrectAnswers = $request->CorrectAnswers;
            $QuestionId = $request->id;
            $singleQuiz = Quiz::find($QuestionId);
            if($singleQuiz->correct == $request->option)
            {
                $CorrectAnswers = $request->CorrectAnswers + 1 ; 
            }
            $QuestionId = $request->id+1;
            $singleQuiz = Quiz::find($QuestionId);
            if(is_null($singleQuiz))
            {
                $totalCount = DB::table('quizzes')->count();
                return redirect('/')->with('message','Quiz Completed Successfully')->with('correct',$CorrectAnswers)->with('totalCount',$totalCount);
            }
            return view('quiz.start')->with('quiz',$singleQuiz)->with('id',$QuestionId)->with('CorrectAnswers',$CorrectAnswers);   
        }

    }

    public function main()
    {
        return view('mainsection');
    }

  
    
    
}
