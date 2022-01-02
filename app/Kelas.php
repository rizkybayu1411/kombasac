<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['name_kelas', 'biaya_kelas', 'description_video','thumbnail'];

    public function video()
    {
        return $this->hasMany('App\Video');
    }

    public function tugas()
    {
        return $this->hasMany('App\tugas');
    }

    public function absensi()
    {
        return $this->hasMany('App\absensi');
    }
    public function nilai()
    {
        return $this->hasMany('App\nilai');
    }
    public function kirimtugas()
    {
        return $this->hasMany('App\kirimtugas');
    }

}
