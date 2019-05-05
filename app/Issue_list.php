<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue_list extends Model
{
    protected $table = 'issue_list';
    protected $fillable = [ 'issue_id' ];

    public function issue() {
        return $this->belongsTo('App\Issue');
    }
 
}
