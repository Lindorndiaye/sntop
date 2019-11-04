<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeAutotheque extends Model
{
    protected $table = 'code_autotheque';

    protected $fillable = [
        'code', 'id_annonceur', 'date_fin',
    ];
}
