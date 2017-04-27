<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name','rank','created_at','updated_at','id'
    ];

    protected $table = 'categorys';
    public $timestamps = true;

    protected $guarded = [

    ];
}
