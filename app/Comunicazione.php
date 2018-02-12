<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunicazione extends Model
{
    protected $table="comunicazioni";
    public $timestamps = false;
    protected $fillable=['titolo','descrizione','data','prioritario','privato','orario'];
}
