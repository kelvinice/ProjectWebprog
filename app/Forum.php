<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    public $table = 'forums';

    public function category(){
        return $this->belongsTo(Category::class);
    }
}