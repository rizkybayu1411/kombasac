<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jurnal extends Model
{
    protected $table = "jurnals";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','users_id','tanggal','kegiatan'];

        public function users()
        {
            return $this->belongsTo('App\User');
        }    
}
