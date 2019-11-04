<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    protected $table = 'boutique';

    protected $fillable = [
        'categorie', 'nom', 'nom_categorie', 'id_client', 'adresse', 'afficher',
        'couleur','site', 'logo', 'boutique', 'description', 'horaire',
    ];

    public function client()
   {
       return $this->belongsTo('App\Models\Boutique', 'id_client', 'id');
   }
}
