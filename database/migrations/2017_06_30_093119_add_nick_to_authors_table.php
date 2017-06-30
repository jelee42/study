<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNickToAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     * 열 추가 마이그레이션
     * @return void
     */
    public function up()
    {
        Schema::table('authors', function (Blueprint $table) {
            // authors 테이블에 nick 컬럼을 추가한다.
            $table->string('nick')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('authors', function (Blueprint $table) {
            //
            $table->dropColumn('nick');
        });
    }
}
