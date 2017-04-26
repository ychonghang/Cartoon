<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;


class Admin_user extends Model
{
    //
    use EntrustUserTrait;

    public $fillable = ['name','email','password','display_name','description'];
}
