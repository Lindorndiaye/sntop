<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoArticles extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'titre', 'rubrique', 'nom_rubrique', 'nom_article', 'contenu', 'article', 'photo_actu', 'text_intro',
    ];
}
