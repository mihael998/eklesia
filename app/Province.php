<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table="province";
    
    public function comuni(){
        return $this->hasMany(Comune::class,'id_provincia');
    }
}
