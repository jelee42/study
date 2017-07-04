<?php

namespace App\Listeners;

// use App\Events\article.created;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ArticlesEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  article .created  $event
     * @return void
     */
    public function handle(\App\Events\ArticlesEvent $event) // \App\Article $article 이벤트 채널이 생성되었으니 코드를 수정한다.
    {
        //
        /*var_dump('이벤트를 받았습니다. 받은 데이터(상태)는 다음과 같습니다.');
        var_dump($event->article->toArray());*/
        if($event->action === 'created'){
            \Log::info(sprintf(
                '새로운 포럼 글이 등록되었습니다. : %s',
                $event->article->title
            ));
        }
        /*
         * 참고로 if($event->action === '...') 절로 이벤트 타입을 검사하는 것 보다
         * ArticleCreated, ArticleUpdated, ...처럼 이벤트를 나누는 것이 더 나은 디자인이다.
         */
    }
}
