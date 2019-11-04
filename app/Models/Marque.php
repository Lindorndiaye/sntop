<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    protected $table = 'marque';

    protected $fillable = [
        'title', 'alias', 'status', 'logo', 'type',
    ];
}
