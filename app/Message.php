<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "messages";
    protected $primarykey ="id";
    protected $fillable = ['id','users_id','message', 'kelas_id'];
    
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }
}
