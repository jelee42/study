<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        /*'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],*/
        \App\Events\ArticlesEvent::class => [
            \App\Listeners\ArticlesEventListener::class,
        ],
        \Illuminate\Auth\Events\Login::class => [
            \App\Listeners\UsersEventListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
        // \Event::listen('article.created', \App\Listeners\ArticlesEventListener::class);
        /*
        // 이벤트 레지스트리에 새로 만든 이벤트 채널 등록
        \Event::listen(
            \App\Events\ArticleCreated::class,
            \App\Listeners\ArticlesEventListener::class
        );*/

        /*
         * 라라벨은 이벤트 채널과 이벤트 리스너를 한번에 만들 수 있는 방법을 제공한다.
         * 이 기능을 사용하려면 이벤트 레지스트리에 채널과 리스너를 먼저 등록해야한다.
         */


    }
    /**
     * Event::listen(...);
     * Event 파사드에 listen(string|array $events, mixed $listener)메서드로 이벤트를 수신한다.
     * 첫 번째 인자 : 수신할 이벤트 이름
     * 두 번째 인자 : 처리 로직
     *
     * 이벤트를 수신하는 구문의 위치는 메인 라우팅 정의 위든 아래이든 상관없다. (처리 로직을 '이벤트 리스너'또는 '이벤트 핸들러'라고 한다.)
     * 이벤트 리스너는 라라벨 부트스트랩 과정에서 컴퓨터 메모리에 적재되어 수신 대기 상태로 있다가, 관심 있는 이벤트가 나타나는 순간 동작한다.
     * 참고로 엘로퀀트 모델을 배열로 캐스팅할 때 toArray()메서드를 이용한다.
     *
     * 라우팅에 이벤트를 모두 정의할 수 없다.
     * 라우팅 정의 파일이 HTTP요청 URL을 수신하고 처리하는 컨트롤러로 연결하듯, 이벤트에서도 같은 구실하는
     * 전용 파일로 app/Providers/EventServiceProvider.php를 제공한다.
     */
}
