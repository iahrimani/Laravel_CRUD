<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('posts');
});

/*
Тут начинаются роуты регистрации, авторизации и логаута
*/

# Регистрация
Route::get('/signup', 'AuthController@getSignup')->middleware('guest')->name('auth.signup');
Route::post('/signup', 'AuthController@postSignup');

# Вход
Route::get('/signin', 'AuthController@getSignin')->middleware('guest')->name('auth.signin');
Route::post('/signin', 'AuthController@postSignin');

# Выход
Route::get('/signout', 'AuthController@getSignout')->middleware('guest')->name('auth.signout');

/*
Тут заканчиваются роуты регистрации, авторизации и логаута
*/


# Список всех задач, это рессурсный контроллер
Route::resource('posts', 'PostController')->middleware('auth');

/*
Тут начинаются роуты профилей
*/

# Просмотр профиля пользователя
Route::get('/user/{id}', 'ProfileController@getProfile')->name('profile.index');

# Редактирование профиля пользователя
Route::get('/profile/edit', 'ProfileController@getEdit')->middleware('auth')->name('profile.edit');
Route::post('/profile/edit', 'ProfileController@postEdit')->middleware('auth')->name('profile.edit');

/*
Тут заканчиваются роуты профилей
*/