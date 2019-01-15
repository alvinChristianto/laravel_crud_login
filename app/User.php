<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $table = 'users';
    protected $fillable = array (
    	'role_id', 'username','name', 'email', 'password'
    );
    public $timestamps = false;
}
