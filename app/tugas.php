<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tugas extends Model
{
    protected $table = "tugas";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','users_id','judul','deskripsi','upload_tugas'];
        
        public function kirimtugas()
    {
        return $this->hasMany('App\kirimtugas');
    }
}
