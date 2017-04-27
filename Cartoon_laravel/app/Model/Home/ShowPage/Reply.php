<?php

namespace App\Model\Home\ShowPage;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

    //
    protected $table = "replys";

    protected $fillable = [
        'storey','opus_id','content','touser_id','user_id','id','created_at',
        'updated_at',
    ];
}
