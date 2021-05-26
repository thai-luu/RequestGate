<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $table = 'requests';
    
    
    protected $fillable = [
        'title', 'mo_ta', 'status','id_the_loai','toID','fromID','comment','due_date','do_uu_tien'
    ];
    
}
