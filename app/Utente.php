<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Utente extends Authenticatable 
{
    use HasApiTokens;

    protected $table = 'utenti';
    public $timestamps = false;
    protected $fillable = ['nome', 'email', 'pwd', 'cognome', 'sesso', 'data_nascita'];
    public function chiesa(){
        return $this->belongsTo(Chiesa::class,'id_chiesa');
    }

    public function getAuthPassword()
    {
        return $this->pwd;
    }
    public function chieseSeguite(){
        return $this->belongsToMany(Chiesa::class, 'utenti_chiese', 'id_utente', 'id_chiesa');
    }
    public function eventiSeguiti(){
        return $this->belongsToMany(Evento::class, 'utenti_eventi', 'id_utente', 'id_evento');
    }
}
