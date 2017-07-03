<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /**
         * str_random(int $length = 16) : 라라벨 도우미 함수다. $length 바이트짜리 랜덤 문자열을 반환한다.
         *
         * sprintf(string $format, mixed $args = null) : PHP 내장 함수다.
         * sprintf 함수 대신 str_random(3) . '' . str_random(4)와 같이 바꾸어 쓸 수 있다.
         */
        /*App\User::create([
            'name' => sprintf('%s %S', str_random(3), str_random(4)),
            'email' => str_random(10) . '@example.com',
            'password' => bcrypt('password'),
        ]);*/

        // 모델 팩토리를 이용해 시더 클래스 수정
        factory(App\User::class, 5)->create();
    }
}
