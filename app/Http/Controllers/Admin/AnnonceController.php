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

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listeAnnonce()
    {
        if(Session::has('admin')){
            $annonces = Annonce::orderBy('id', 'desc')->get();
            return view('admin.annonce.liste', ['annonces' => $annonces, 'option' => '']);
        }else{
            return view('admin.index');
        }
    }

    public function detailAnnonce($id)
    {
        if(Session::has('admin')){
            $annonce = Annonce::where('id', $id)->first();
            $annonceur = Annonceur::where('id', $annonce->id_annonceur)->first(); 
            $mrk = Marque::select('title')->where('id', $annonce->id_marque)->first(); 
            $mdl = Modele::select('title')->where('id', $annonce->id_modele)->first();
                              
            return view('admin.annonce.detail_annonce', ['annonce' => $annonce, 
                        'annonceur' => $annonceur, 'marque' => $mrk, 'modele' => $mdl]);
        }else{
            return view('admin.index');
        }
    }

    public function get_Marque($type)
    {
        $marques = Marque::where('type', $type)->get();
        return view('annonce.get_marque', ['marques' => $marques]);
    }

    public function get_Modele($id)
    {
        $modeles = Modele::where('makeid', $id)->get();
        return view('annonce.get_modele', ['modeles' => $modeles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editAnnonce($id)
    {
        $annonce = Annonce::where('id', $id)->first();
        $annonceur = Annonceur::where('id', $annonce->id_annonceur)->first(); 
        $marque = Marque::select('title')->where('id', $annonce->id_marque)->first(); 
        $modele = Modele::select('title')->where('id', $annonce->id_modele)->first();

        return view('admin.annonce.edit', ['annonce' => $annonce,'annonceur' => $annonceur, 'marque' => $marque, 'modele' => $modele]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $annonce = new AnnonceMoto;
        $annonceur = Session::get('annonceur');
        if($annonceur->type_cmpte == "professionnel"){
            $annonce->type_annonceur = "concessionnaire";
        }else{
            $annonce->type_annonceur = "gratuit";
        }
        $annonce->id_annonceur = $annonceur->id;
        $annonce->titre = $request->titre_a;
        $annonce->type_annonce = $request->type_a;
        $annonce->description = $request->description_a;
        $annonce->prix = $request->prix_v;
        $annonce->id_marque = $request->marque;
        $annonce->id_modele = $request->modele;
        $annonce->cylindree = $request->cylindre;
        $annonce->annee = $request->annee_v;
        $annonce->date = date("Y-n-j");
        $annonce->kilometrage = $request->kilometrage;
        $annonce->pays = '';
        $annonce->ville = $request->ville;
        $annonce->zone = $request->zone;
        $annonce->video = '';
        $annonce->couleur = $request->couleur;
        $annonce->transmission = $request->transmission;
        $annonce->carburant = $request->carburant;
        $securite = implode(";", $request->securite);
        $annonce->securite = $securite;

        $exterieur = implode(";", $request->exterieur);
        $annonce->exterieur = $exterieur;
        $annonce->urgence = 0;
        $annonce->statut = 1;
        $annonce->categorie = $request->type;
        
        $annonce->type = $request->ClassifiedType;

        if($request->file('photo_v')){
            $imageName = date("Y_m_d_H_i_s") . '_'. $annonceur->id . '.' . $request->file('photo_v')->getClientOriginalExtension();
            $annonce->photos_principal = $imageName;
        }
        
        if($request->ClassifiedType == "moto"){
            $annonce->interieur = '';
            $annonce->electronique = '';
            $annonce->carrosserie = '';
            $annonce->transmissions = '';
        }elseif($request->ClassifiedType == "auto"){
            $annonce->interieur = implode(";", $request->interieur);
            $annonce->electronique = implode(";", $request->electronique);
            $annonce->carrosserie = implode(";", $request->carrosserie);
            $annonce->transmissions = implode(";", $request->transmissions);
        }
        //dd($annonce);
        if($annonce->save()){
            if($request->ClassifiedType == "moto"){
                $request->file('photo_v')->move('images/annonce/moto/', $imageName);
                return redirect('annonce/moto')->with('success','Annonce ajouté avec succes!');
            }elseif($request->ClassifiedType == "auto"){
                $request->file('photo_v')->move('images/annonce/voiture/', $imageName);
                return redirect('annonce/auto')->with('success','Annonce ajouté avec succes!');
            }
        }
        //dd($annonce);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listeGold()
    {
        if(Session::has('admin')){
            $annonces = Annonce::where('type_annonceur', 'gold')->orderBy('id', 'desc')->get();
            return view('admin.annonce.liste', ['annonces' => $annonces, 'option' => 'Gold']);
        }else{
            return view('admin.index');
        }
    }

    public function listePrestige()
    {
        if(Session::has('admin')){
            $annonces = Annonce::where('type_annonceur', 'prestige')->orderBy('id', 'desc')->get();
            return view('admin.annonce.liste', ['annonces' => $annonces, 'option' => 'Prestige']);
        }else{
            return view('admin.index');
        }
    }

    public function listeGratuit()
    {
        if(Session::has('admin')){
            $annonces = Annonce::where('type_annonceur', 'gratuit')->orderBy('id', 'desc')->get();
            return view('admin.annonce.liste', ['annonces' => $annonces, 'option' => 'Gratuit']);
        }else{
            return view('admin.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gerer_annonces()
    {
        if(Session::has('annonceur')){
            $annonceur = Session::get('annonceur');
            $annonces = Annonce::where('id_annonceur', $annonceur->id)->orderBy('id', 'desc')->get();
            return view('annonce.gerer_annonces', ['annonces' => $annonces]);
        }else{
            return view('compte.connexion');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
