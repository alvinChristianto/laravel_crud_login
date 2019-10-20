<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pythonMovie extends Model
#class pythonMovie extends Eloquent
{
	protected $connection= 'mysql2';

    protected $table = 'tb_movie_list';
	
    public $timestamps = true;
}
