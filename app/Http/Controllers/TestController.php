<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\QuestionToVariant;
use App\Models\Test;
use App\Models\VariantOfTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function TestPage(){
        $user_id = Auth::user()->id;
        $tests=DB::table('tests')
            ->join('subjects', 'subjects.id', '=', 'tests.subject_id')
            ->where('subjects.user_id', '=', $user_id)
            ->orderBy('tests.subject_id')
            ->select('tests.id', 'tests.topic', 'subjects.name')
            ->get()
            ->toArray();
        return view('test.test', [
            'tests'=> $tests??null,
        ]);
    }

    public function TestCreatePage(){
        $user_id = Auth::user()->id;
        $subjects = DB::table('subjects')
            ->where('subjects.user_id', '=', $user_id)
            ->select('id', 'name')
            ->get()
            ->toArray();
        return view('test.test-add', [
            'subjects' => $subjects?? null,
        ]);
    }

    public function TestTopicsGet(){
        $topics= DB::table('topics')
            ->get()
            ->toArray();
        return ([
            'topics' => $topics?? null,
        ]);
    }

    public function TestCreate(Request $request){
        $test = new Test();
        $test->topic = $request->input('test_text');
        $test->amount_of_questions = $request->input('amount_of_questions');
        $test->amount_of_variants = $request->input('amount_of_variants');
        $test->subject_id = $request->input('subjects');
        $test->save();

        $amount_оf_topics =  (int)$request->input('amount_оf_topics');
        for($i=0; $i<$amount_оf_topics; $i++) {
            $arrayOfQuestions[$i] = DB::table('questions')
                ->where('topics_id', '=', $request->get('topicId-' . $i))
                ->get()
                ->toArray();
        }
        $collectionOfQuestion = Arr::collapse($arrayOfQuestions);

        //алгоритм псевдослучайных чисел
        $a = 121;
        $c = 119;
        $m = count($collectionOfQuestion);
        $sumOfAllQuestions = (int)$request->input('amount_of_variants') * (int)$request->input('amount_of_questions');

        for ($i=1; $i<=$sumOfAllQuestions; $i++){
            if($i === 1){
                $randomCollectionOfQuestion[$i] = $collectionOfQuestion[$i]->id;
            }
            else{
                $randomCollectionOfQuestion[$i] = ($a * $randomCollectionOfQuestion[$i-1] + $c) % $m;
            }
        }
        $count_of_question_to_variant = 1;
        for ($i=0; $i<(int)$request->input('amount_of_variants'); $i++){
            $variants[$i] = new VariantOfTest();
            $variants[$i]->test_id = $test->id;
            $variants[$i]->number_of_test = $i+1;
            $variants[$i]->save();
            for ($k=0; $k<(int)$request->input('amount_of_questions'); $k++){
                $question_ro_variants[$i][$k] = new QuestionToVariant();
                $question_ro_variants[$i][$k]->variant_id = $variants[$i]->id;
                $question_ro_variants[$i][$k]->number_of_question = $k+1;
                $question_ro_variants[$i][$k]->question_id = $randomCollectionOfQuestion[$count_of_question_to_variant]+1;
                $question_ro_variants[$i][$k]->save();
                $count_of_question_to_variant++;
            }
        }
        return back()->withSuccess('Тест успешно добавлен!');
    }

    public function TestSingle($id){
        $test = new Test();
        $user_id = Auth::user()->id;
        $subjects = DB::table('subjects')
            ->where('subjects.user_id', '=', $user_id)
            ->select('id', 'name')
            ->get()
            ->toArray();
        $topics = DB::table('questions')
            ->join('question_to_variants', 'question_to_variants.question_id', '=', 'questions.id')
            ->join('variant_of_tests', 'variant_of_tests.id', '=', 'question_to_variants.variant_id')
            ->where('variant_of_tests.test_id', '=', $id)
            ->groupBy('questions.topics_id')
            ->select('questions.topics_id')
            ->get()
            ->toArray();
        $variants = DB::table('variant_of_tests')
            ->where('variant_of_tests.test_id', '=', $id)
            ->get()
            ->toArray();
        $questions = DB::table('questions')
            ->join('question_to_variants', 'question_to_variants.question_id', '=', 'questions.id')
            ->join('variant_of_tests', 'variant_of_tests.id', '=', 'question_to_variants.variant_id')
            ->where('variant_of_tests.test_id', '=', $id)
            ->select('questions.id', 'questions.name', 'questions.id', 'questions.type_id', 'question_to_variants.variant_id')
            ->get()
            ->toArray();
        $variantsOfAnswers = DB::table('variants_of_answers')
            ->join('questions', 'variants_of_answers.question_id', '=' , 'questions.id')
            ->select('variants_of_answers.id', 'variants_of_answers.name','variants_of_answers.right_answer', 'variants_of_answers.question_id')
            ->get()
            ->toArray();
        return view('test.test-change', [
            'subjects' => $subjects?? null,
            'test' => $test->find($id)?? null,
            'topics' => $topics?? null,
            'variants' => $variants?? null,
            'questions'=> $questions?? null,
            'variants_of_answers'=>$variantsOfAnswers?? null
        ]);
    }

    /**
     * @param $number
     * @param $amount
     * @return array
     */
    public function GetPseudoRandomNumbers($number, $amount): array
    {
        $a = 121;
        $c = 119;
        $m = $number;
        $randomNumArray=[];
        for ($i=0; $i<$amount; $i++){
            if($i === 0){
                $randomNumArray[$i] = $i;
            }
            else{
                $randomNumArray[$i] = ($a * $randomNumArray[$i-1] + $c) % $m;
            }
        }
        return $randomNumArray;
    }
}
