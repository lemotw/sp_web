<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\IssueAnswer;

class Issue extends Model
{
    use SoftDeletes;

    protected $table = 'issue';
    protected $dates = ['deleted_at'];
    protected $fillable = [ 'title', 'describe', 'process_state', 'contact' ];
    //process_state => [0 -> 未處理, 1 -> 處理中, 2 -> 已回覆]

    public function answer() {
        return $this->hasMany('App\IssueAnswer');
    }

    public function reply($reply) {
        $issue_answer           = new IssueAnswer;
        $issue_answer->issue_id = $this->id;
        $issue_answer->reply    = $reply;
        $issue_answer->save();

        $this->update(['process_state' => 1]);
    }

    public static function get_unprocessed() {
        $issues = Issue::whereNull('deleted_at')->where('process_state', 0)->get();

        if($issues)
            return $issues;
        return NULL;
    }

    public static function get_processing() {
        $issues = Issue::whereNull('deleted_at')->where('process_state', 1)->get();

        if($issues)
            return $issues;
        return NULL;
    }

    public static function get_finish() {
        $issues = Issue::whereNull('deleted_at')->where('process_state', 2)->get();

        if($issues)
            return $issues;
        return NULL;
    }
}
