<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chiesa extends Model
{
    protected $table="chiese";
    protected $fillable=['nome','indirizzo','id_congregazione','id_comune','telefono','email','sito','id_denominazione'];
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
    public function congregazione(){
        return $this->belongsTo(Congregazione::class,'id_congregazione');
    }
    public function denominazione(){
        return $this->belongsTo(Denominazione::class,'id_denominazione');
    }
}
