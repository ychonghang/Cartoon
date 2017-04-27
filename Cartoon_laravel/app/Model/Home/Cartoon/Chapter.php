<?php

namespace App\Model\Home\Cartoon;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    //
    protected $fillable = [
        'chapternum','opus_id','adopt','id','created_at','updated_at',
    ];
}
