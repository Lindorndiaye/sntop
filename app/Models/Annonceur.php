<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annonceur extends Model
{
    protected $table = 'annonceur';

    protected $fillable = [
        'pseudo', 'mot_de_passe', 'prenom', 'nom', 'email', 'type_cmpte', 'telephone', 'entreprise', 'sexe',
        'date_adhesion','dernier_conn', 'statut',
    ];

    public function boutiques()
    {
        return $this->hasMany('App\Models\Annonceur', 'id_client', 'id');
    }
}
