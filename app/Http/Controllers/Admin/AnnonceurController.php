<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;

use App\Models\Annonce;
use App\Models\Annonceur;
use App\Models\AnnonceAuto;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Messagerie;
use App\Models\Concessionnaire;
use App\Models\Professionnel;

class AnnonceurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listeAnnonceur()
    {
        if(Session::has('admin')){
            $annonceurs = Annonceur::where('type_cmpte', '<>', 'concessionnaire')->orderBy('id', 'desc')->get();
            return view('admin.annonceur.liste', ['annonceurs' => $annonceurs, 'option' => '']);
        }else{
            return view('admin.index');
        }
    }

    public function listeAnnonceurProfessionnel()
    {
        if(Session::has('admin')){
            $annonceurs = Annonceur::where('type_cmpte', 'professionnel')->orderBy('id', 'desc')->get();
            return view('admin.annonceur.liste', ['annonceurs' => $annonceurs, 'option' => 'professionnel']);
        }else{
            return view('admin.index');
        }
    }

    public function createAnnonceur()
    {
        if(Session::has('admin')){
            return view('admin.annonceur.ajout');
        }else{
            return view('admin.index');
        }
    }

    public function storeAnnonceur(Request $request)
    {
        $annonceur = Annonceur::where('pseudo' , $request->login)->where('statut', 1)->first();
        if($annonceur == null ){
            $today = date('Y-m-d H:i:s');
            $annonceur = new Annonceur;
            $annonceur->pseudo = $request->login;
            $annonceur->nom = $request->nom;
            $annonceur->prenom = $request->prenom;
            $annonceur->email = $request->email;
            $annonceur->mot_de_passe = md5($request->conf_p);
            $annonceur->type_cmpte = $request->type_cmpte;
            $annonceur->telephone = $request->telephone;
            $annonceur->civilite = $request->civilite;
            $annonceur->date_adhesion = $today;
            $annonceur->statut = 0;
            $annonceur->dernier_conn = $request->dernier_conn;
            $annonceur->entreprise = $request->entreprise;
            //dd($annonceur);

            if($annonceur->save()){
                $id_annonceur = $annonceur->id;

                if($request->type_cmpte == "professionnel"){
                    if($request->file('logo')){
                        $pro = new Professionnel;
                        $imageName = $annonceur->id . '.' . $request->file('logo')->getClientOriginalExtension();
                        $pro->logo = $imageName;
                        $pro->id_annonceur = $id_annonceur;
                        $pro->concession = $request->concession;
                        $pro->marques = $request->marques;
                        $pro->adresse = $request->adresse;
                        $pro->site_web = $request->site_web;

                        $pro->save();

                        $request->file('logo')->move('images/conc/', $imageName);
                    }
                }
                
                return back()->with('success', '<strong> Réussi : </strong> <br>Utilisateur ajouté ! ');
            }else{
                return back()->with('error', "Inscription echoué. Veuillez Rééssayer un autre SVP !");
            }
        }else{
            return back()->with('error', "Désolé. Cet identifiant est indisponible. Veuillez Rééssayer un autre SVP !");
        }

    }

    public function createConcessionnaire()
    {
        if(Session::has('admin')){
            return view('admin.annonceur.top_concessionnaire');
        }else{
            return view('admin.index');
        }
    }

    public function storeConcessionnaire(Request $request)
    {

        $conc = new Concessionnaire;
        if($request->file('logo')){
            $imageName = $request->nom . '.' . $request->file('logo')->getClientOriginalExtension();
            $conc->logo = $imageName;
        }
        $conc->nom = $request->nom;
        $conc->link = $request->site;
        
        if($conc->save()){
            $request->file('logo')->move('images/conc/', $imageName);
            return back()->with('success', '<strong> Réussi : </strong> <br>Concessionnaire ajouté ! ');
        }
        else{
            return back()->with('error', "Ajout echoué. Veuillez Rééssayer un autre SVP !");
        }

    }

}
