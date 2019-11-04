<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    protected $table = 'annonce';

    protected $fillable = [
        'titre', 'id_annonceur', 'type_annonce', 'type_annonceur', 'description', 'photos_principal', 'date', 'prix', 'id_modele', 'id_marque',
        'cylindree','kilometrage', 'annee', 'pays', 'ville', 'video', 'couleur', 'securite', 'exterieur', 'statut', 'urgence', 'categorie', 'zone',
        'transmission', 'carburant', 'interieur', 'electronique', 'type', 'carrosserie', 'transmissions',
    ];
}
