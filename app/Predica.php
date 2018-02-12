<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predica extends Model
{
    protected $table="prediche";
    public $timestamps = false;
    protected $fillable=['titolo','contenuto','data','audio','privato','autore'];
    public function tags(){
        return $this->hasMany(TagPredica::class,'id_predica');
    }
}
