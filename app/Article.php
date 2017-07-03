<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = ['title', 'content'];

    /**
     * Article에서 바라본 User 관계 정의
     * Article모델은 User 소속이다.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 다대다 관계 형성
     * Article도 Tag과 마찬가지로 Article은 여러 개의 Tag에 소속됩니다.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    /**
     * 엘로퀀트는 모델이름으로 외래 키의 열 이름을 추정한다.
     * 예를 들어, user_id가 아니라 author_id를 외래 키로 사용한다면 다음과 같이 엘로퀀트에게 키 이름을 알려주어야 한다.
     * public function author(){
     * return $this->belongsTo(User::class, 'author_id');
     *
     * }
     */
}
