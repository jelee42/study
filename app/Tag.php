<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = ['name', 'slug'];

    /**
     * 다대다 관계 형성
     * Article 모델과 관계를 맺기 위해 belongsToMany메서드 사용
     *
     * Tag는 여러 개의 Article에 소속됩니다.
     * belongsToMany(string $related, string $table = null, string $foreignKey = null, string $otherKey = null)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
