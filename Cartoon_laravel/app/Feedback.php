<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
    public $fillable = ['name','back','reply'];
    protected $table = 'feedbacks';
}
