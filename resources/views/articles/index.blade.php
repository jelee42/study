@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>포럼 글 목록</h1>
        <hr/>
        <ul>
            @forelse($articles as $article)
                <li>
                    {{ $article->title  }}
                    {{-- $article->user->name은 'N+1쿼리' 문제를 일으킨다.
                        뷰에서 문자열 보간을 할 때마다 관계를 통한 쿼리를 한 번씩 하기 때문이다.
                    --}}
                    <small>by {{ $article->user->name  }}</small>
                </li>
                @empty
                <p>글이 없습니다.</p>
            @endforelse
        </ul>
    </div>

    @if($articles->count())
    <div class="text-center">
        {!! $articles->render() !!}
    </div>
    @endif
@stop
