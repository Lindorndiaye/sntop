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

class RechercheController extends Controller
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

    public function acheteur()
    {
        return view('client.acheteur');
        
    }

    public function vendeur()
    {
        return view('client.vendeur');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recherche_vehicules($type, $categorie)
    {
        
        if($categorie == 'concessionnaire'){
            $annonces = Annonce::where('type', $type)
                        ->where(function($query) use ($categorie){
                            $query->where('type_annonceur', $categorie)
                                    ->orWhere('type_annonceur', 'professionnel');
                        })
                        ->orderBy('id', 'DESC')->limit(15)->get();
        }else{
            $annonces = Annonce::where('type_annonce', $categorie)->where('type', $type)->orderBy('id', 'DESC')->limit(15)->get();
        }
        //dd($annonces);
        return view('recherche.vehicules', ['annonces' => $annonces, 'type' => $type ,'categorie' => $categorie]);
    }

    public function recherche_annonces($categorie)
    {
        
        $annonces = Annonce::where('type_annonceur', $categorie)->where('type', 'auto')->orderBy('id', 'DESC')->get();
        
        //dd($annonces);
        return view('recherche.annonces', ['annonces' => $annonces, 'categorie' => $categorie]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function annonces_partype()
    {
        return view('recherche.annonces_partype');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function recherche_categorie($categorie)
    {
        $annonces = Annonce::where('categorie','LIKE',"%{$categorie}%")->orderBy('id', 'DESC')->get();

        return view('recherche.categorie_voiture', ['annonces' => $annonces, 'categorie' => $categorie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function partager_annonce_voiture(Request $request)
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
        $message.="<br><div align='center'> <a style='font-size:20px;' href='".$url."/detail-annonce_voiture-".$annonce->id."'>
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
        $message .="<h5 align='center'> <a style='font-size:20px;' href='".$url."/detail-annonce_voiture-".$annonce->id."'>Voir plus de détail.</a></h5> ";
        //dd($message);
        for ($i=0; $i < count($request->dest) ; $i++) { 
            if(mail( $request->dest[$i] ,"Cette voiture peut vous intéresser ", $message ,$headers) ){ 
                echo "envoyé";
            }
        }
    }

    public function partager_annonce_moto(Request $request)
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
        $message.="<br><div align='center'> <a style='font-size:20px;' href='".$url."/detail-annonce_moto-".$annonce->id."'>
			<img src='" .$url."/images/annonce/moto/".$annonce->photos_principal."' style='width:75%;border:solid 1px #900;padding:3px;'>
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
        $message .="<h5 align='center'> <a style='font-size:20px;' href='".$url."/detail-annonce_moto-".$annonce->id."'>Voir plus de détail.</a></h5> ";
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
