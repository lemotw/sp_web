<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IssueAnswer extends Model
{
    use SoftDeletes;

    protected $table = 'issue_answer';
    protected $dates = ['deleted_at'];
    protected $fillable = [ 'reply' ];

    public function issue() {
        return $this->belongsTo('App\Issue');
    }
}
