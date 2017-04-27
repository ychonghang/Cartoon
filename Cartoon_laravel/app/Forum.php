<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    //
    protected $table='forum';
    protected $fillable=[
        'comment','created_at','id','likenum'
    ];
}
