<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;

use App\Models\Annonce;
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
    public function index($type)
    {
        $annonces = Annonce::where('type', $type)->orderBy('id', 'desc')->get();
        $nbreA = Annonce::where('type', $type)->count();
        if($type == 'auto'){
            return view('annonce.annonce_auto', ['annonces' => $annonces, 'nbreA' => $nbreA]);            
        }elseif($type == 'moto'){
            return view('annonce.annonce_moto', ['annonces' => $annonces, 'nbreA' => $nbreA]);            
        }
    }

    public function publierAnnonce()
    {
        if(Session::has('annonceur')){
            return view('annonce.publier-annonce');
        }else{
            return view('compte.connexion');
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
    public function get_annonce_detail($id)
    {
        $annonce = Annonce::where('id', $id)->first();
        $marque = Marque::select("title")->where('id', $annonce->id_marque)->first();
        $modele = Modele::select("title")->where('id', $annonce->id_marque)->first();

        if(count($annonce) > 0){
            $annonce_similaire = Annonce::select('id', 'id_marque')
                                        ->where('id_marque', $annonce->id_marque)
                                        ->where('id_modele', $annonce->id_modele)
                                        ->where('id', '!=' ,$annonce->id)
                                        ->inRandomOrder()->limit(4)->get();
            if(count($annonce_similaire) < 4){
                $annonce_similaire = Annonce::select('id', 'id_marque')
                                        ->where('id_marque', $annonce->id_marque)
                                        ->where('categorie', $annonce->categorie)
                                        ->where('id', '!=' ,$annonce->id)
                                        ->inRandomOrder()->limit(4)->get();
            }
        }
        
        return view('annonce.detail', ['annonce' => $annonce, 'marque' => $marque, 'modele' => $modele, 'annonce_similaire' => $annonce_similaire]);
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
    public function send_annonce_message(Request $request)
    {
        $message  = new Messagerie;
        $message->objet = $request->objet;
        $message->id_destinataire = $request->id_destinataire;
        $message->nom_expediteur = $request->nom_expediteur;
        $message->email_expediteur = $request->email_expediteur;
        $message->contenue = $request->contenue;
        $message->date_envoi = date('Y-m-d');

        if($message->save()){
            return back()->with('success',"Votre message a été envoyé à l'annonceur.");
        }else{
            return back()->with('error','Message non envoyé veuillez réessayer SVP !!!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function partager_annonce(Request $request)
    {
        $url = url('/');
        //dd($request);
        $annonce = Annonce::where('id', $request->id_annonce)->first();
        $marque = Marque::select("title")->where('id', $annonce->id_marque)->first();
        $modele = Modele::select("title")->where('id', $annonce->id_marque)->first();

        $headers = 'From:'.$request->exp."\r\n" ;
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $message=nl2br($request->message);
        $message.="<br><div align='center'> <a style='font-size:20px;' href='".$url."/detail-annonce-".$annonce->id."'>
			<img src='" .$url."/images/annonce/voiture/".$annonce->photos_principal."' style='width:75%;border:solid 1px #900;padding:3px;'>
			</a></div>";
        $message .= "<br><table  align='center' width='100%' style='border:solid 1px #ddd;margin-top:20px;margin-bottom:20px;'>
            <tr style='border-bottom: 1px solid #ddd;'>
              <td style='background-color:#eee;border-bottom: 1px solid #ddd;height:40px;padding-left:5px;' >Marque</td>
              <td style='border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'> ".$marque->title."</td>
              <td style='background-color:#eee;border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>Modèle</td>
              <td style='border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>".$modele->title."</td>
            </tr>
            <tr style='border-bottom: 1px solid #ddd;'>
              <td style='background-color:#eee;border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>Année</td>
              <td style='border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>".$annonce->annee."</td>
              <td style='background-color:#eee;border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>Kilométrage</td>
              <td style='border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>".$annonce->kilometrage." </td>
            </tr>
            <tr style='border-bottom: 1px solid #ddd;'>
              <td style='background-color:#eee;border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>Transmission</td>
              <td style='border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'> ".$annonce->transmission."</td>
              <td style='background-color:#eee;border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>Energie</td>
              <td style='border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>".$annonce->carburant."</td>
            </tr>
            <tr style='border-bottom: 1px solid #ddd;'>
              <td style='background-color:#eee;border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>Nombre cylindre</td>
              <td style='border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'> ".$annonce->cylindree."</td>
              <td style='background-color:#eee;border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>couleur</td>
              <td style='border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'> ".$annonce->couleur."</td>
            </tr>
        </table><br>"; 
        $message .="<h5 align='center'> <a style='font-size:20px;' href='".$url."/detail-annonce-".$annonce->id."'>Voir plus de détail.</a></h5> ";
        //dd($message);
        for ($i=0; $i < count($request->dest) ; $i++) { 
            if(mail( $request->dest[$i] ,"Cette voiture peut vous intéresser ", $message ,$headers) ){ 
                echo "envoyé";
            }
        }
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
