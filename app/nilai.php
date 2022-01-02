<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    protected $table = "nilais";
    protected $primarykey ="id";
    protected $fillable = ['id','users_id','nilai', 'keterangan', 'kelas_id', 'kirimtugas_id'];
    
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }
}
