<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnonceAuto extends Model
{
    protected $table = 'annonce_voiture';

    protected $fillable = [
        'pseudo', 'mot_de_passe', 'prenom', 'nom', 'email', 'type_cmpte', 'telephone', 'entreprise', 'sexe',
        'date_adhesion','dernier_conn', 'statut',
    ];
}
