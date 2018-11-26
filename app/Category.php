<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';
    public $timestamps = false;

    public function forum(){
        return $this->hasMany(Forum::class);
    }
}
