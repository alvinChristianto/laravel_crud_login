<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class upload_images extends Model
{
    #protected $guarded =[];
	protected $table = 'upload_images';
	protected $fillable = ['name','dimensions','path'];
    public $timestamps = true;
}
