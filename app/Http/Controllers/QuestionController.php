<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\VariantsOfAnswer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function QuestionCreatePage($subject_id, $topic_id){
        return view('subject.question-add', [
            'topic_id' => $topic_id?? null,
            'subject_id' => $subject_id?? null
            ]
        );
    }

    public function QuestionCreate(Request $request){
        $question = new Question();
        $question->name = $request->get('question_text');
        $question->topics_id = (int)$request->input('topic_id');
        if ($request->input('type_of_question') == 'single'){
            $question->type_id = 1;
        } elseif ($request->input('type_of_question') == 'multiple'){
            $question->type_id = 2;
        } else {
            $question->type_id = 3;
        }
        $savedQuestion = $question->save();
        $count = (int)$request->get('count_of_answers');
        $countOfSaved = 0;
        for ($i = 0; $i<$count; $i++){
            $answerOfQuestion = new VariantsOfAnswer();
            $answerOfQuestion->name = $request->get('variantOfAnswer-'.$i);
            $answerOfQuestion->question_id = $question->id;
            if ($request->get('rightVariantOfAnswer-'.$i) == 'on'){
                $answerOfQuestion->right_answer = true;
            } else {
                $answerOfQuestion->right_answer = false;
            }
            $savedAnswers = $answerOfQuestion->save();
            if ($savedAnswers){
                $countOfSaved++;
            }
        }

        if ($savedQuestion && $countOfSaved == $count){
            return back()->withSuccess('Вопрос успешно добавлен!');
        } else {
            return back()->withErrors('Ошибка! Не удалось создать вопрос!');
        }

    }

    public function QuestionUpdate(Request $request){
        return back()->withSuccess('Вопрос успешно изменен!');
    }

    public function QuestionDelete($subject_id, $topic_id, $id){
        $deleted = DB::delete('delete from questions where id = ?',[$id]);
        if($deleted){
            return redirect()->route('subject-question', [
                'subject_id'=>$subject_id?? null,
                'topic_id'=>$topic_id?? null,
            ])->withSuccess('Вопрос успешно удален!');;
        }
        else{
            return back()->withErrors('Ошибка! Не удалось удалить вопрос!');
        }
    }

    public function QuestionPageSingle($subject_id, $topic_id, $question_id){
        $question = new Question();
        $variants = DB::table('variants_of_answers')
            ->where('variants_of_answers.question_id', '=', $question_id)
            ->select('id', 'name', 'right_answer')
            ->get()
            ->toArray();
        return view('subject.question-single', [
                'topic_id' => $topic_id?? null,
                'subject_id' => $subject_id?? null,
                'question_id' => $question_id?? null,
                'question' => $question->find($question_id)?? null,
                'variants' => $variants?? null,
            ]
        );
    }
}
