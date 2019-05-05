<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    protected $dates = ['deleted_at'];
    protected $fillable = [ 'name', 'img_link', 'title' ];
}