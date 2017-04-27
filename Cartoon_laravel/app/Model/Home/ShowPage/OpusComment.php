<?php

namespace App\Model\Home\ShowPage;

use Illuminate\Database\Eloquent\Model;

class OpusComment extends Model
{
    //
    protected $fillable = [
        'id','user_id','opus_id','content','storey','updated_at','created_at',
    ];
}
