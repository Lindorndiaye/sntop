<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autotheque extends Model
{
    protected $table = 'rech_autotheque';

    protected $fillable = [
        'tel', 'email', 'nom', 'prenom', 'marque', 'modele', 'budget', 'type', 'transmission',
        'carburant','prevision_achat', 'annee_depart', 'annee_fin', 'description', 'date_pub',
        'type_vehicule',
    ];
}
