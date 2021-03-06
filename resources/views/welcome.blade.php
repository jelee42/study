{{--
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
--}}
@extends('layouts.master')

@section('style')
    <style>
        body {background: grey; color: white;}
    </style>
@endsection

@section('script')
    <script>
        alert("자식 뷰의 'script' 섹션");
    </script>
@endsection

@section('content')
    <p>자식 뷰의 content 섹션</p>
    <h4>Hello test</h4>
    <h4><?= isset($greeting) ? "{$greeting}" : 'Hello';?><?= $name; ?></h4>
    <!-- HTML 주석 안에서 {{ $name }}을 출력합니다.-->
    {{-- 블레이드 주석 안에서 {{ $name }}을 출력합니다.--}}
    <h4>{{ $greeting or 'Hello' }} {{ $name or 'User' }}</h4>
    <div>
        <a href="{{URL::route('error503')}}">link 503</a>
        @if($itemCount = count($items))
        <p>{{ $itemCount }}종류의 과일이 있습니다.</p>
        @else
        <p>아무것도 없음!</p>
        @endif

        <ul>
            @foreach($items as $item)
            <li>{{  $item }}</li>
            @endforeach
        </ul>

        <dl>
            <dd>과일
                @forelse($items as $item)
                <dt>{{ $item }}</dt>
                @empty
                <dt> 없음 </dt>
                @endforelse
            </dd>
        </dl>

        <a href="https://www.naver.com">네이버로 이동</a>

        <p>Edit From GitHub</p>
        
        <p>Hello! git pull</p>

        <form action="{{url('/login')}}" method="POST" role="form" class="form-auth">

            {!! csrf_field() !!}

            <div class="page-header">
                <h4>Login</h4>
            </div>

            <div class="form-group">
                <a class="btn btn-default btn-block" href="{{ url('auth/github') }}">
                    <strong><i class="fa fa-github icon"></i> Login with Github</strong>
                </a>
            </div>
        </form>

        <a href="{{ url('my') }}"><h2>To New Page</h2></a>
    </div>
    @include('partials.footer')
@endsection
