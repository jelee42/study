<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return __METHOD__ . '은(는) Article 컬렉션을 조회합니다.';
        // 즉시로드
        // $articles = \App\Article::get(); // N+1쿼리 문제를 야기할 수 있음
        // N+1쿼리 문제를 해결하는 방법
        // with()는 인자로 받은 관계를 미리 로드한다.
        // $articles = \App\Article::with('user')->get();

        // user() 관계가 필요없는 다른 로직 수행
        // $articles->load('user');

        $articles = \App\Article::latest()->paginate(3);

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return __METHOD__ . '은(는) Article 컬렉션을 만들기 위한 폼을 담은 뷰를 반환합니다.';
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\ArticleRequest $request)
    {
        //
        // return __METHOD__ . '은(는) 사용자의 입력한 폼 데이터로 새로운 Article 컬렉션을 만듭니다.';
        /**
         * $rules = [...]
         * 유효성 검사 규칙
         * '필드' => '검사조건' 키-값 쌍으로 표현
         * 중첩 배열 대신 파이프 문자 사용가능 -> 'content' => 'required|min:10'
         *
         * 유효성 검사 공식 문서
         * http://laravel.com/docs/vaildation / http://laravel.kr/docs/vaildation
         */
        $rules=[
            'title' => ['required'],
            'content' => ['required', 'min:10'],
        ];

        $message = [
            'title.required' => '제목은 필수 입력 항목입니다.',
            'content.required' => '본문은 필수 입력 항목입니다.',
            'content.min' => '본문은 최소 :min 글자 이상이 필요합니다.',
        ];

        /**
         * Validator파사드와 make(array $data, array $rules)메서드를 이용해 유효성 검사기 인스턴스 생성
         * 첫 번째 인자 : 검사의 대상이 되는 폼 데이터
         * 두 번째 인자 : 검사 규칙
         * 세 번째 인자 : 사용자 정의 오류 메세지
         */
        // $validator = \Validator::make($request->all(), $rules, $message);

        /**
         * 유효성 검사
         * fails(), passes() => return boolean
         * fails()는 유효성 검사를 통과하지 못하면 true 반환
         */

        /*
         *
         if($validator->fails()){
            /**
             * back() : 이전 페이지로 리디렉션하는 도우미 함수
             * redirect(route('articles.create'))와 동일
             *
             * withErrors() : 검사 실패 이유를 세션에 굽는 동작 수행
             * 뷰에서 $errors변수는 이 메서드가 넘긴 것
             *
             * withInput() : 폼 데이터를 세션에 굽는 동작 수행
             * 뷰의 old()함수는 이 메서드가 구운 값을 읽는다.

            return back()->withErrors($validator)
                ->withInput();
        }
        */

        /**
         * 실제로는 auth()->user()->articles()->....와 같이 현재 로그인한 사용자 인스턴스 이용
         * $request : Illuminate\Http\Request 인스턴스로 HTTP 요청에 관한 모든 정보를 담고 있는 객체
         * $request->all() : 사용자가 요청한 쿼리 스트링 또는 폼 데이터 전체를 연관 배열로 반환한다.
         * 성공적으로 저장되면 $article변수에 새로운 Article 인스턴스를 대입한다.
         */
        // $article = \App\User::find(1)->articles()->create($request->all());

        // 트레이트 메서드 이용
        // $this->validate($request, $rules, $message);
        $article = \App\User::find(1)->articles()->create($request->all());

        if(! $article){
            /**
             * 인자로 받은 키-값 쌍을 세션에 저장한다.
             * 사용자에게 피드백을 제공하기 위해 사용한다. <-플래시 메시지
             */
            return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
        }

        return redirect(route('articles.index'))
            ->with('flash_message', '작성하신 글이 저장되었습니다.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return __METHOD__ . '은(는) 다음 기본 키를 가진 Article 모델을 조회합니다. : '.$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return __METHOD__ . '은(는) 다음 기본 키를 가진 Article 모델을 수정하기 위한 폼을 담은 뷰를 반환합니다. : ' .$id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return __METHOD__ . '은(는) 사용자의 입력한 폼 데이터로 다음 기본키를 가진 Article 모델을 수정합니다. : ' . $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return __METHOD__ . '은(는) 다음 기본 키를 가진 Article 모델을 삭제합니다. : ' .$id;
    }
}
