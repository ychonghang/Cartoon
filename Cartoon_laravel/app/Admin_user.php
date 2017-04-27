<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Zizaco\Entrust\Traits\EntrustUserTrait;

=======
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57

class Admin_user extends Model
{
    //
<<<<<<< HEAD
    use EntrustUserTrait;

=======
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
    public $fillable = ['name','email','password','display_name','description'];
}
