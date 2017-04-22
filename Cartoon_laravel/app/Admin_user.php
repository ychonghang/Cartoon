<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_user extends Model
{
    //
    public $fillable = ['name','email','password','display_name','description'];
}
