<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;

use App\Models\Boutique;
use App\Models\Annonceur;

class AnnuaireController extends Controller
{

    public function listeAnnuaire()
    {
        if(Session::has('admin')){
            $boutiques = Boutique::orderBy('id', 'desc')->get();
            return view('admin.annuaire.liste', ['boutiques' => $boutiques]);
        }else{
            return view('admin.index');
        }
    }

    public function createAnnuaire()
    {
        if(Session::has('admin')){
            $annonceurs = Annonceur::orderBy('id', 'desc')->get();
            return view('admin.annuaire.ajout', ['annonceurs' => $annonceurs]);
        }else{
            return view('admin.index');
        }
    }

    public function storeAnnuaire(Request $request)
    {
        $boutique = new Boutique;
        $boutique->nom = $request->nom;
        $boutique->id_client = $request->id_client;
        $boutique->adresse = $request->adresse;
        $boutique->site = $request->site_web;
        $boutique->description = trim(nl2br($request->description));
        $boutique->horaire = $request->horaire;
        $boutique->categorie = $request->categorie;
        $boutique->couleur = $request->couleur;
        
        if($request->file('photo')){
            $imageName = date("Y_m_d_H_i_s") . '_'. $request->nom . '.' . $request->file('photo')->getClientOriginalExtension();
            $boutique->logo = $imageName;
        }
        
        $boutique->nom_categorie = str_replace(" " ,"" ,  $request->categorie);
        
        if($boutique->save()){
            $request->file('photo')->move('images/boutique/', $imageName);
            $request->session()->put('annuaire', $boutique);
            return back()->with('success',"Boutique ajouté avec succes en attente de validation!");
        }else{
            return back()->with('error','Ajout echoué!');
        }
        
    }

}
