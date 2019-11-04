<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messagerie extends Model
{
    protected $table = 'messagerie';

    protected $fillable = [
        'objet', 'id_destinataire', 'nom_expediteur', 'email_expediteur', 'contenue', 'date_envoi', 'statut', 
    ];
}
