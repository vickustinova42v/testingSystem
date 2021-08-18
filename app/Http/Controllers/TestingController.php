<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestingController extends Controller
{
    public function TestingPage(){
        return view('testing.testing');
    }
    public function TestingCreatePage(){
        return view('testing.testing-create');
    }
    public function TestingCreate(){

    }

    public function TestingGetGroups(){
        $groups= DB::table('groups')
            ->get()
            ->toArray();
        return ([
            'groups' => $groups?? null,
        ]);
    }

    public function TestingGetSubjects(){
        $subjects= DB::table('subjects')
            ->get()
            ->toArray();
        return ([
            'subjects' => $subjects?? null,
        ]);
    }

    public function TestingGetTests(){
        $tests= DB::table('tests')
            ->get()
            ->toArray();
        return ([
            'tests' => $tests?? null,
        ]);
    }
}
