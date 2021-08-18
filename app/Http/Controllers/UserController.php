<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function CuratorPage(){
        $curators = DB::table('users')
                    ->join('faculties', 'faculties.id', '=', 'users.faculty_id')
                    ->where('users.role_id', '=', 4)
                    ->select('users.fio', 'faculties.name')
                    ->groupBy('users.fio', 'faculties.name')
                    ->get()
                    ->toArray();
        return view('users.curator',[
            'curators'=>$curators?? null
        ]);
    }

    public function CreateCuratorPage(){
        $faculty = new Faculty();
        return view('users.curator-add',[
            'faculty' => $faculty->all()?? null
        ]);
    }

    public function CreateCurator(Request $request){
        $user = new User;
        if (!$request->input('user_fio')||!$request->input('user_email')){
            return back()->withErrors([
                'user'=>'Ошибка! Не удалось добавить куратора!'
            ]);
        }
        else {
            $user->fio = $request->input('user_fio');
            $user->email = $request->input('user_email');
            $user->password = Hash::make('12');
            $user->role_id = 4;
            $user->status_id = 1;
            $user->faculty_id = $request->input('user_faculty');
            $user->save();

            return back()->withSuccess('Куратор успешно добавлен!');
        }

    }

    public function GroupPage(){
        $user_id = Auth::user()->id;
        $groups = DB::table('groups')
            ->join('group_to_subjects', 'groups.id', '=', 'group_to_subjects.group_id')
            ->select('groups.name')
            ->get()
            ->toArray();
            return view('faculty.group',[
                'groups' =>$groups ?? null
            ]);
    }

}
