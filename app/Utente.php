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
    public function getAuthPassword()
    {
        return $this->pwd;
    }

}
