<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnteteAnnuaire extends Model
{
    protected $table = 'entete_annuaire';

    protected $fillable = [
        'rubrique', 'image', 'texte', 'texte2', 
    ];


}
