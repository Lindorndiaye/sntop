<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article_boutique';

    protected $fillable = [
        'titre', 'id_boutique', 'photo', 'prix', 'description', 'date',
    ];

    public function client()
   {
       return $this->belongsTo('App\Models\Boutique', 'id_client', 'id');
   }
}
