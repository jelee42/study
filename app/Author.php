<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    public $timestamps = false;
    protected $table = 'authors';
    protected $fillable = ['email', 'password', 'name', 'github_id', 'avator'];
}
