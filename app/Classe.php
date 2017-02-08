<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $table = 'classes';
    protected $fillable = [ 'id', 
    						'level', 
    						'description'
    					];
}
