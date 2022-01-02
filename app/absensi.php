<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    protected $table = "absensis";
    protected $primarykey ="id";
    protected $fillable = ['id','users_id','kelas_id', 'tanggal', 'jam_masuk', 'jam_keluar', 'lama_jam'];
    
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }
}
