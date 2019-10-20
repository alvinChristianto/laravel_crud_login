<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pythonSeq extends Model
#class pythonSeq extends Eloquent
{
	protected $connection= 'mysql2';

	protected $table = 'tb_seq_id';
	
    public $timestamps = false;
}
