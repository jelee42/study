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

/**
 * 라우팅 파일로 사용자 인증 구현하기
 */
Route::get('auth/login', function () {
    /**
     * credentials : 사용자 로그인에 필요한 정보를 하드코드로 담음
     * auth()는 도우미 함수이다.
     * attempt()는 사용자 인증할때 사용한다.
     * attempt(array $credentials = [], bool $remember = false)
     * 두 번째 인자에 true를 주면 마이그레이션에서 봤던 remember_token열과 같이 동작하여 사용자 로그인을 기억할 수 있다.
     *
     * auth()도우미 대신 Auth::attempt()와 같이 파사드를 이용할 수 있다.
     */
    $credentials = [
        'email' => 'john@example.com',
        'password' => 'password'
    ];

    if(!auth()->attempt($credentials)){
        return '로그인 정보가 정확하지 않습니다.';
    }

    return redirect('protected');
});

// if절을 사용하여 작동하는 방법
Route::get('protected', function () {
    /**
     * check()는 URL을 요청한 브라우저(사용자)가 로그인한 상태면 true를 반환한다.
     * user()는 로그인한 사용자의 클래스 인스턴스를 반환한다.
     *
     * 전역 미들웨어인 App\Http\Middleware\EncryptCookies가 값을 암복호화한다.
     *
     * dump(session()->all()) : 세션에 저장된 값을 덤프하는 코드이다.
     *
     * 라라벨은 laravel_session 키를 가진 쿠키와 login_web_RANDOM_NUM 세션 키를 이용해 사용자 로그인 여부를 판단한다.
     * 쿠키에 사용할 키는 config/session.php에서 변경할 수 있다.
     */
    dump(session()->all());

    if(!auth()->check()){
        return '누구세요?';
    }

    return '어서오세요' . auth()->user()->name;
});


Route::get('auth/logout', function () {
    auth()->logout();

    return '또 만나요~';
});
// routes/web.php
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
