<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integral extends Model
{
    //
    public $fillable = ['email','gral','time'];
    protected $table = 'integral';
}
