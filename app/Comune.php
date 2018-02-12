<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comune extends Model
{
    protected $table="comuni";
    public function provincia(){
        return $this->belongsTo(Province::class,'id_provincia');
    }
    public function regione(){
        return $this->belongsTo(Regione::class,'id_regione');
    }
}
