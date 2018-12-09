<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'threads';

    public function forum(){
        return $this->belongsTo(Forum::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
