<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public function Request()
    {
    	return $this->hasMany('App\Request');
    }
    protected $fillable = [
        'name', 'id', 'status',
    ];
}
