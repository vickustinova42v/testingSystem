<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function FacultyPage(){
        $faculties = new Faculty();
        return view('faculty.faculty',[
            'faculties'=>$faculties->all()?? null
        ]);
    }
}
