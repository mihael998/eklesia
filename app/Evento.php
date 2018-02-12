<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table="eventi";
    public $timestamps = false;
    protected $fillable=['titolo','descrizione','data_inizio','data_fine','privato','indirizzo','id_comune'];
    public function comune(){
        return $this->belongsTo(Comune::class,'id_comune');
    }
}
