<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
	protected $table = 'courses';
    protected $fillable = ['name','description'];
}
