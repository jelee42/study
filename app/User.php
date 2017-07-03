<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * 대량 할당이 가능하다.
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * 조회 쿼리에서 제외할 열을 정의한다.
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * User에서 바라본 Article 관계 정의
     * User모델은 여러 개의 Article을 가지고 있다.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles(){
        return $this->hasMany(Article::class);
        // return $this->hasMany(Article::class, 'author_id');
    }
}
