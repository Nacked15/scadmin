<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedul extends Model
{
    protected $table = 'schedules';
    protected $fillable = [ 'id', 
    						'year', 
    						'date_init',
    						'date_end',
    						'hour_init',
    						'hour_end',
    					];
}
