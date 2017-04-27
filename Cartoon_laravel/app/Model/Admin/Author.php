<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //


    protected $fillable = [
        'user_id','is_author',
    ];

    protected $guarded = [];

}
