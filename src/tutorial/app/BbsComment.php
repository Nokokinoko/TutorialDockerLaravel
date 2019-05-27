<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BbsComment extends Model
{
    protected $fillable = [
        'body',
    ];
    
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
