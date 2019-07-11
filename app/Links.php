<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Links extends Model
{
    use SoftDeletes;

    protected $table = 'links';
    protected $dates = ['deleted_at'];
    protected $fillable = [ 'link_name', 'link', 'sort' ];

    public static function get_all_links() {
        $links = Links::whereNull('deleted_at')->orderBy('sort', 'asc')->get();

        if($links)
            return $links;
        return NULL;
    }
    
}