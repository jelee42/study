<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UsersEventListener
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        //
        /**
         * $event->user로 사용자 객체 접근
         * 지금 시각을 last_login프로퍼티에 대입 후 모델 저장
         */
        $event->user->last_login = \Carbon\Carbon::now();
        return $event->user->save();
    }
}
