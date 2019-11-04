<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Session;

use App\Models\Boutique;
use App\Models\EnteteAnnuaire;
use App\Models\Article;

class BoutiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annuaires = Boutique::where('afficher', 1)->where('boutique', 1)->orderBy('id', 'desc')->limit(20)->get();
        //dd($annuaires);
        return view('boutique.boutique', ['annuaires' => $annuaires]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function creerBoutique()
    {
        $annuaires = Boutique::where('afficher' , 1)->where('boutique', 1)->orderBy('id', 'desc')->limit(20)->get();
        //dd($annuaires);
        return view('boutique.gererBoutique', ['annuaires' => $annuaires]);
    }

    public function connexion(Request $request)
    {   
        $pseudo = Input::get('pseudo');
        $passwd = Input::get('passwd');
        $annuaire = Boutique::where('pseudo' , $pseudo)->where('passwd', $passwd)->where('boutique', 1)->first();
        //dd($cli);
        if($annuaire != null){
            $request->session()->put('annuaire', $annuaire);
            return back();
        }else{
            return back();
        }
    }

    public function myBoutique()
    {
        $client = Session::get('annonceur');
        
        $myboutiques = Boutique::where('id_client', $client->id)->get();
        //dd($myboutiques);
        return view('boutique.myboutique', ['myboutiques' => $myboutiques]);
    }

    public function getBoutiqueById(Request $request, $id, $nom)
    {
        $client = Session::get('annonceur');
        $myboutique = Boutique::where('id', $id)->where('id_client', $client->id)->first();
        $articles = Article::where('id_boutique', $myboutique->id)->orderBy('id', 'desc')->get();
        //dd($articles);
        return view('boutique.getMyBoutique', ['myboutique' => $myboutique, 'articles' => $articles, 'lemien' => true]);
    }
    public function getBoutiqueByNom($nom)
    {
        $vrai_nom = str_replace('_', ' ' ,$nom);
        $myboutique = Boutique::where('nom', $vrai_nom)->first();
        $articles = Article::where('id_boutique', $myboutique->id)->orderBy('id', 'desc')->get();
        return view('boutique.getMyBoutique', ['myboutique' => $myboutique, 'articles' => $articles, 'lemien' => false]);
    }

    public function article($id, $nom)
    {
        return view('boutique.article', ['id_boutique' => $id]);
    }
    
    public function getAnnuaireConsultation($categorie)
    {
        $categAnnuaire = Boutique::select('categorie')->where('nom_categorie', $categorie)->first();
        $entete = EnteteAnnuaire::where('rubrique', $categorie)->first();
        $annuaires = Boutique::where('nom_categorie', $categorie)->where('afficher', 1)->orderBy('id', 'desc')->get();
        //dd($categorie);
        return view('boutique.annuaire', ['categAnnuaire' => $categAnnuaire, 'entete' => $entete, 'annuaires' => $annuaires, 'categorie' => $categorie]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createArticle(Request $request)
    {
        $article = new Article;
        $article->titre = $request->nom_article;
        $article->description = $request->description_article;
        $article->id_boutique = $request->id_boutique;
        $article->prix = $request->prix_article;
        $article->date = date("Y-m-d");
        if($request->file('photo_article')){
            $imageName = date("Y_m_d_H_i_s") . '_'. $request->nom_article . '.' . $request->file('photo_article')->getClientOriginalExtension();
            $request->file('photo_article')->move('images/boutique/articles/', $imageName);
            $article->photo = $imageName;
        }
        $article->save();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $boutique = new Boutique;
        $boutique->nom = $request->nom;
        $boutique->id_client = $request->id_client;
        $boutique->adresse = $request->adresse;
        $boutique->site = $request->site_web;
        $boutique->description = trim(nl2br($request->description));
        $boutique->horaire = $request->horaire;
        $boutique->categorie = $request->categorie;

        if($request->file('photo')){
            $imageName = date("Y_m_d_H_i_s") . '_'. $request->nom . '.' . $request->file('photo')->getClientOriginalExtension();
            $boutique->logo = $imageName;
        }

        $boutique->nom_categorie = str_replace(" " ,"" ,  $request->categorie);
        //dd($boutique);
        
        if($boutique->save()){
            $request->file('photo')->move('images/boutique/', $imageName);
            $request->session()->put('annuaire', $boutique);
            return back()->with('success',"Boutique ajouté avec succes en attente de validation sous 24h par l'administrateur du site !");
        }else{
            return back()->with('error','Ajout echoué!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail_article($id)
    {
        $article = Article::where('id', $id)->first();
        $boutique = Boutique::where('id', $article->id)->first();

        return view('boutique.detail_article', ['article' => $article, 'boutique' => $boutique]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
