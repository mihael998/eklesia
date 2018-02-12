<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagEvento extends Model
{
    protected $table="tag_eventi";
    public $timestamps = false;
    protected $fillable=['nome'];
}
