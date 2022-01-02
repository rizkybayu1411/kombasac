<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    protected $table = 'komentar';

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function forum(){
        return $this->belongsTo(forum::class);
    }
}
