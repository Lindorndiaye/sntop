<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    protected $table = 'modele';

    protected $fillable = [
        'title', 'alias', 'status', 'makeid', 
    ];
}
