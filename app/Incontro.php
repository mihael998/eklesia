<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incontro extends Model
{
    protected $table="incontri";
    public $timestamps = false;
    protected $fillable=['titolo','inizio','fine','giorno'];
}
