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
use App\Models\Autotheque;
use App\Models\CodeAutotheque;
use App\Models\InfoArticles;

class AutothequeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('autotheque.depot');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $autotheque = new Autotheque;
        $autotheque->nom = $request->nom;
        $autotheque->prenom = $request->prenom;
        $autotheque->tel = $request->tel;
        $autotheque->email = $request->email;
        $autotheque->description = trim(nl2br($request->description));
        $autotheque->marque = $request->marque;
        $autotheque->modele = $request->modele;
        $autotheque->budget = $request->budget;
        $autotheque->type = $request->type;
        $autotheque->transmission = $request->transmission;
        $autotheque->carburant = $request->carburant;
        $autotheque->prevision_achat = $request->prevision_achat;
        $autotheque->annee_depart = $request->annee_depart;
        $autotheque->annee_fin = $request->annee_fin;
        $autotheque->date_pub = date('Y-m-d');
        $autotheque->type_vehicule = $request->typevehicule;
        //dd($autotheque);
        
        if($autotheque->save()){
            return back()->with('success',"Votre recherche a été enregistrée, vous serez contacté par l'un de nos partenaires!");
        }else{
            return back()->with('error',"Votre recherche n'a été pas enregistrée, veuillez recommencer SVP!!!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function consultation()
    {
        return view('autotheque.consultation');
    }

    public function demandeDeCode()
    {
        return view('autotheque.demandeDeCode');
    }

    public function sendDemandeDeCode(Request $request)
    {
        
        //dd($request);
        $messages  = "Email from: " . $request->nom . "<br />";
        $messages .= "Email address: " . $request->email . "<br />";
        $messages .= "Message: <br />";
        
        $messages .= htmlspecialchars(htmlentities(nl2br($request->message)),  ENT_QUOTES, "UTF-8"  );
        $messages .= "<br /> ----- <br />Ce message a été envoyé depuis le site sn-topauto.com  . <br />";
        
        // Set From: header
        $from =  $request->nom . " <" . $request->email . ">";

        // Email Headers
        $headers = " From: " . $from . "\r\n";
        $headers .= "Reply-To: ". $request->email . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        if( mail( "contact@sn-topauto.com" , $request->objet , $messages , $headers ) ){
            return back()->with('success', 'Votre message a été envoyé');
        }
        return back()->with('error', "Votre message n'a pas été envoyé. Veuillez réessayer SVP!!!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function check_code(Request $request)
    {
        $code = CodeAutotheque::where('code', $request->code_autotheque)->first();
        $t_aut = Autotheque::orderBy('id', 'desc')->get();
        if (isset($code) && count($code) > 0){
            $today = date("Y-n-j");
            if ( strtotime($code->date_fin) >= strtotime($today)){
                return view('autotheque.check_code_autotheque', ['code' => $code, 't_aut' => $t_aut]);
            }else{
                return back()->with('error',"Ce Code est expiré!!!");
            }
        }else{
            return back()->with('error',"Le code n'est pas bon!!!");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function info($rubrique)
    {
        $art = InfoArticles::where('titre', $rubrique)->first();
        return view('autotheque.info', ['art' => $art]);
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
