<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assement extends Model
{
    protected $table = 'assements';
    protected $primaryKey = "id";
    protected $fillable = ['id','users_id','kirim_assement'];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
