<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Обработка попыток аутентификации.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function LoginPage(){
        if (!Auth::check()){
            return view('login');
        }
        else{
            return redirect()->route('profile');
        }
    }

    public function Auth(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password, 'status_id' => 1])) {
            $request->session()->regenerate();
            return redirect()->route('profile');
        }

        return back()->withErrors([
            'email' => 'Некорректно введены данные, либо пользователь неактивен.',
            'password' => 'Некорректно введены данные, либо пользователь неактивен.',
            'status_id' => 'Некорректно введены данные, либо пользователь неактивен.'
        ]);
    }
    public function LogOut()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function ChangePasswordPage(){
        return view('change-password');
    }

    public function ChangePassword(Request $request){
        $user = Auth::user();
        $current_password = $request->input('current_password');
        $new_password = $request->input('new_password');
        $new_password_confirmation = $request->input('new_password_confirmation');

        if (Hash::check($current_password, Auth::user()->password) == false){
            return back()->withErrors([
                'current_password' => 'Введенный вами пароль не совпадает с текущим.'
            ]);
        }
        elseif ($new_password == $current_password){
            return back()->withErrors([
                'new_password' => 'Введенный вами пароль совпадает с текущим.'
            ]);
        }
        elseif ($new_password != $new_password_confirmation){
            return back()->withErrors([
                'new_password_confirmation' => 'Введенные вами пароль не совпадают.'
            ]);
        }
        else {
            $user->password = Hash::make($new_password);
            $user->save();
            return back()->withSuccess('Ваш пароль успешно изменен!');
        }
    }

}
