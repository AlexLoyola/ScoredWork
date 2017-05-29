<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Event extends Model
{
    protected $fillable = [
        'id','formal', 'hourTime', 'buttonText', 'title','description','image'
    ];
    
}