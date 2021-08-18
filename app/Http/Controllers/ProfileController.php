<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function ProfilePage(){
        return view('profile');
    }
    public function ChangeProfilePage(){
        $user = Auth::user();
        return view('change-profile',[
            'user' => $user ?? null
        ]);
    }
    public function ChangeProfile(Request $request){
        $user = Auth::user();
        $user->fio = $request->input('user_fio');
        $user->email = $request->input('user_email');

        if(!$user->fio || !$user->email){
            return back()->withErrors([
                'user'=>'Ошибка! Не удалось изменить Ваши данные!']
            );
        }
        else{
            $user->save();
            return back()->withSuccess('Ваши данные успешно изменены!');
        }
    }

}
