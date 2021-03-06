<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AuthController extends Controller
{
    # Регистрация
    public function getSignup()
    {
        return view ('auth.signup');
    }

    public function postSignup(Request $request)
    {
    # Валидация регистрационных данных
        $this->validate($request, [
            'email' => 'required|unique:users|email|max:255',
            'username' => 'required|unique:users|alpha_dash|max:20',
            'password' => 'required|confirmed|min:6',

        ]);
    # Добавление в БД с шифровкой пароля bcrypt
        User::create([
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->
        route('posts.index')->
        with('success', 'Вы успешно зарегистрировались !');
    }

    # Вход на сайт
    public function getSignin()
    {
        return view ('auth.signin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|max:255',
            'password' => 'required|min:6',

        ]);

        if (!Auth::attempt( $request->only(['email', 'password']), $request->has('remember')  ))
        {
            return redirect()->back()->with('success', 'Неправильный логин или пароль');
        }
        return redirect()->route('posts.index')->with('success', 'Вы вошли на сайт');

    }

    # Выход
    public function getSignout()
    {
        Auth::logout();
        return redirect()->route('auth.signin');
    }


}
