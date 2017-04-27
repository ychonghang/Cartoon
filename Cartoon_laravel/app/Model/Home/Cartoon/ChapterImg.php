<?php

namespace App\Model\Home\Cartoon;

use Illuminate\Database\Eloquent\Model;

class ChapterImg extends Model
{
    //
    protected $table = 'chapterimgs';
    protected $fillable = [
        'chapterimgs','id','order','imgname',
    ];
}
