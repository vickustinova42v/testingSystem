<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GroupToSubject;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function React\Promise\all;

class SubjectController extends Controller
{
    public function SubjectPage(){
        $user_id = Auth::user()->id;
        $user_group_id = Auth::user()->group_id;

        if (Auth::user()->getRole->name == 'teacher'){
            $subject = DB::table('subjects')
                ->where('user_id', '=', $user_id)
                ->select('subjects.id', 'subjects.name')
                ->get()
                ->toArray();
        }
        elseif(Auth::user()->getRole->name == 'student'){
            $subject = DB::table('subjects')
                ->join('group_to_subjects', 'subjects.id', '=', 'group_to_subjects.subject_id')
                ->join('users', 'subjects.user_id', '=', 'users.id')
                ->where('group_to_subjects.group_id', $user_group_id)
                ->where('group_to_subjects.status', true)
                ->select('users.fio', 'subjects.name')
                ->get()
                ->toArray();
        }

        return view('subject.subject', [
            'subject' => $subject ?? null
        ]);
    }

    public function SubjectPageSingle($id){
        $user_id = Auth::user()->id;
        $subject = new Subject();
        $topic = DB::table('topics')
            ->join('subjects','topics.subject_id', '=', 'subjects.id')
            ->where('subjects.user_id', '=', $user_id)
            ->where('subjects.id', '=', $id)
            ->select('topics.name', 'topics.id')
            ->get()
            ->toArray();

        return view('subject.topic', [
            'topic' => $topic?? null,
            'subject' => $subject->find($id)?? null
        ]);
    }

    public function TopicPageSingle($subject_id, $topic_id){
        $user_id = Auth::user()->id;
        $topic = new Topic();
        $question = DB::table('questions')
            ->join('topics','questions.topics_id', '=', 'topics.id')
            ->join('subjects','topics.subject_id', '=', 'subjects.id')
            ->where('subjects.user_id', '=', $user_id)
            ->where('topics.id', '=', $topic_id)
            ->select('questions.name', 'questions.id')
            ->get()
            ->toArray();

        return view('subject.question', [
            'question' => $question?? null,
            'topic' => $topic->find($topic_id)?? null,
            'subject_id' => $subject_id?? null,
        ]);
    }
}
