<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roleModel extends Model
{
    protected $table = 'roles';

    public function user()
    {
    	return $this->hasMany(User::class);
    }

    public $timestamps = false;
}

