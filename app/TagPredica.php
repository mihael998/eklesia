<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagPredica extends Model
{
    protected $table="tag_prediche";
    public $timestamps = false;
    protected $fillable=['nome'];
}
