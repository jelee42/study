<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * 외래 키(foreign key)열은 양의 정수 제약 조건을 선언하는게 좋다.
         *
         * unsigned() : 양의 정수(positive integer)로 열 값을 제한한다.
         * foreign(string|array $columns) : 테이블끼리 외래 키 관계를 연결한다.
         *
         * articles.user_id열은 users.id열을 참조한다는 의미이다.
         *
         * onUpdate('cascade')와 onDelete('cascade')는 users.id열이 변경되거나 삭제될 때의 동작 옵션을 정의한 것이다.
         */
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('title');
            $table->text('content');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
