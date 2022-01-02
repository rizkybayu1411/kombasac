<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kirimtugas extends Model
{

    protected $table = 'kirimtugas';
    protected $primaryKey = "id";
    protected $fillable = ['id','users_id','kirim_tugas'];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function nilai()
    {
        return $this->hasMany('App\nilai');
    }
    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }
    public function tugas()
    {
        return $this->belongsTo('App\tugas');
    }
}
