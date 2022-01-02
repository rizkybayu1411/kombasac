<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class portofolio extends Model
{
    protected $table = "portofolios";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','title','description','portofolio_image'];
}
