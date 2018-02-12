<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regione extends Model
{
    protected $table="regioni";
    public function province(){
        return $this->hasMany(Province::class,'id_regione');
    }
}
