<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;

use App\Models\CodeAutotheque;
use App\Models\Annonceur;

class AutothequeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function genererCode()
    {
        if(Session::has('admin')){
            $annonceurs = Annonceur::orderBy('id', 'desc')->get();
            return view('admin.autotheque.genererCode', ['annonceurs' => $annonceurs, 'option' => '']);
        }else{
            return view('admin.index');
        }
    }

    public function listeCode()
    {
        if(Session::has('admin')){
            $codes = CodeAutotheque::orderBy('id', 'desc')->get();
            return view('admin.autotheque.liste', ['codes' => $codes]);
        }else{
            return view('admin.index');
        }
    }

    public function getCode($date_fin, $id_ancr)
    {
        if(Session::has('admin')){
            return view('admin.autotheque.getCode', ['date_fin' => $date_fin, 'id_ancr' => $id_ancr]);
        }else{
            return view('admin.index');
        }
    }

    public function storeCode(Request $request)
    {
        $code = new CodeAutotheque;
        $code->code = $request->code;
        $code->id_annonceur = $request->id_annonceur;
        $code->date_fin = $request->date_fin;

        if($code->save()){
            return redirect('admin/autotheque/genererCode')
                        ->with(['success' => '<strong> Réussi', 'code' => $code->code, 'date_fin' => $code->date_fin,'id_annonceur' => $code->id_annonceur]);
        }else{
            return back()->with('error', "Ajout echoué. Veuillez Rééssayer un autre SVP !");
        }
        
    }

}
