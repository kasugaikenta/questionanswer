<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use Validator;
use Auth;

date_default_timezone_set('Asia/Tokyo');

class AnswersController extends Controller
{
    public function answer($question_id){
        $question=Question::where('id',$question_id)
            ->first();

        return view('answer',['question'=>$question,'question_id'=>$question_id]);
        header("Location:answer.blade.php");
    }
    
    public function sendAnswer(Request $request)
    {
        //Validatorを使って入力された値のチェック(バリデーション)処理　
        $validator = Validator::make($request->all() , ['answer_content' => 'required|max:1000', ]);

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
            // 上記では、入力画面に戻りエラーメッセージと、入力し���内容をフォーム表示させる処理を記述しています
        }
        $answers = new Answer;
        $answers->content = $request->answer_content;
        $answers->question_id = $request->question_id;
        $answers->save();
        
        $questions = Question::where('id', $answers->question_id)
            ->first();
            
        $questions->flag = true;
        $questions->save();
        
        return redirect('/');
    }
    
}
