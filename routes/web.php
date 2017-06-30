<?php

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
    return view('welcome')->with('name', 'Jieun');
});

Route::get('/', function () {
    $items = ['apple', 'banana', 'tomato'];
    return view('welcome')->with(['name' => 'Jieun', 'greeting' => '좋은 아침', 'items' => $items]);
});

Route::get('errors/503', ['as' => 'error503', 'uses' => 'Controller@create']);


Route::get('/my', function () {
    return view('myPage');
});

/**
 * 공식 문서대로 소셜 로그인 구현
 */
Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');

Route::resource('articles', 'ArticlesController');