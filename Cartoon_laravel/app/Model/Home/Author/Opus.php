<?php

namespace App\Model\Home\Author;

use Illuminate\Database\Eloquent\Model;

class Opus extends Model
{
    //
    protected $fillable = [
            'user_id','name','desc','authornotice','theme_id',
            'cartoon_type_id','user_group_id','create_schedule','imagepath','display',
            'updtype','adopt','publish',
    ];
}
