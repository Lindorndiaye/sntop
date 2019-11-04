<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concessionnaire extends Model
{
    protected $table = 'concessionnaire';

    protected $fillable = [
        'nom', 'link', 'logo',
    ];
}
