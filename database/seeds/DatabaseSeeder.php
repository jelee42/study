<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        if(config('database.default') !== 'sqlite'){
            \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        }

        // Model::unquard();

        App\User::truncate();
        $this->call(UsersTableSeeder::class);

        App\Article::truncate();
        $this->call(ArticlesTableSeeder::class);

        // Model::reguard();

        if(config('database.default') !== 'sqlite'){
            \DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
}

/**
 * Moderl::unquard(), Model::reguard()의 주석을 풀어준다. 엘로퀀트 모델에 정의한 대량 할당 제약사항을 풀었다가 잠그는 명령이다.
 * 라라벨 5.2이상은 시딩할 때 자동으로 풀고 잠근다.
 */