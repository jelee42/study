<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * 이벤트 처리 로직을 담당한다. 프로바이더 등록이 끝나면 이 메서드가 실행된다.
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     * 라라벨에 무언가를 등록하기 위한 메서드다. 이 메서드 안에서 라라벨의 다른 서비스를 쓰지 않도록 주의한다.
     * 이벤트 처리로직을 여기에 작성하면 안된다. 이벤트 서비스가 아직 초기화되지 않았을 수 있기 때문이다.
     * @return void
     */
    public function register()
    {
        //
        if($this->app->environment('local')){
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }
    }
}
