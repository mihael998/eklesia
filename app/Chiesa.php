<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chiesa extends Model
{
    protected $table="chiese";
    protected $fillable=['nome','indirizzo','id_congregazione','id_comune','telefono','email','sito'];
    public function comune(){
        return $this->belongsTo(Comune::class,'id_comune');
    }
    public function incontri(){
        return $this->hasMany(Incontro::class,'id_chiesa');
    }
    public function comunicazioni(){
        return $this->hasMany(Comunicazione::class,'id_chiesa');
    }
    public function eventi(){
        return $this->hasMany(Evento::class,'id_chiesa');
    }
    public function prediche(){
        return $this->hasMany(Predica::class,'id_chiesa');
    }
}
