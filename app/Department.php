<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';
    public function User()
    {
    	return $this->hasMany('App\User');
    }
}
