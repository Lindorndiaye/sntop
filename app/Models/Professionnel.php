<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professionnel extends Model
{
    protected $table = 'professionnel';

    protected $fillable = [
        'adresse', 'address', 'color_bg', 'color_active', 'color_font', 'concession', 'cover', 'fax', 'id_annonceur',
        'infos_societe','logo', 'marque_representee', 'site_web', 'telephone',
    ];
}
