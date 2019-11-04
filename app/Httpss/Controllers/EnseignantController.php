<?php

namespace App\Http\Controllers;

use App\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Psy\debug;  
use PDF;  

class EnseignantController extends Controller
{  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $enseignants = Enseignant::orderBy('id')->get();
        return view('enseignants.index', ['enseignants' => $enseignants]);
    }

    public function ajouter()
    {
        //
        $enseignants = request('enseignants');
        return view('enseignants.ajouter',['enseignants' => $enseignants]);
    }

    public function ajouter_entreprise(Request $request)
    {
        //
        $message = "Ajouté avec succès";
        $this->validate($request, [
            'cv_file' => 'required',
            'cv_file.*' => 'mimes:doc,pdf,docx,zip,png,jpeg,odt,jpg,svc,csv,mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',


        ]);
 
        $image = $request->file('cv_file');
        if($image){
        $imageName = $image->getClientOriginalName();
        $image->move(public_path().'/images/', $imageName);

            
        }

        $enseignant = new Enseignant();
        $enseignant->prenom = $request->prenom;
        $enseignant->nom = $request->nom;
        $enseignant->age = $request->age;
        $enseignant->email = $request->email;
        $enseignant->mobile = $request->mobile;
        $enseignant->region = $request->region;
        $enseignant->ville = $request->ville;
        $enseignant->deniere_diplome = $request->deniere_diplome;
        $enseignant->année_exper = $request->année_exper;
        $enseignant->experience = $request->experience;
        $enseignant->ecole = $request->ecole;
        $enseignant->localite = $request->localite;
        $enseignant->num_cni = $request->num_cni;
        $enseignant->cv_file = $imageName;
        $enseignant->save();


        
        //Session::flash('message', ' added successfully');
        return back()->with(['message' => $message]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $enseignants = request('enseignants');
        return view('enseignants.create',['enseignants' => $enseignants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'cv_file' => 'required',
            'cv_file.*' => 'mimes:doc,pdf,docx,zip,png,jpeg,odt,jpg,svc,csv,mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',


        ]);


    /* if($request->hasfile('cv_file'))

     {

        foreach($request->file('cv_file') as $file)

        {

            $data=$file->getClientOriginalName();

            $file->move(public_path().'/images/', $data);  
        }
     } */

     $image = $request->file('cv_file');
     if($image){
     $imageName=$image->getClientOriginalName();
     $image->move(public_path().'/images/', $imageName);

     
     } 

        $enseignants = new Enseignant();
        $enseignants->prenom = $request->prenom;
        $enseignants->nom = $request->nom;
        $enseignants->age = $request->age;
        $enseignants->email = $request->email;
        $enseignants->mobile = $request->mobile;
        $enseignants->region = $request->region;
        $enseignants->ville = $request->ville;
        $enseignants->deniere_diplome = $request->deniere_diplome;
        $enseignants->année_exper = $request->année_exper;
        $enseignants->experience = $request->experience;
        $enseignants->num_cni = $request->num_cni;
        $enseignants->cv_file = $imageName;
        $enseignants->save();
        Session::flash('message', ' added successfully');
        return redirect('/enseignants');

    }

    public function Enseignant($id)
    {
        //
        $Enseignant = Enseignant::find($id);
        
        $enseignants = Enseignant::orderBy('id')->get();
        return view('enseignants.show', compact('enseignants','Enseignant'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enseignant  $Enseignant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Enseignant = Enseignant::find($id);
        
        $enseignants = Enseignant::orderBy('id')->get();
        return view('enseignants.show', compact('enseignants','Enseignant'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enseignant  $Enseignant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Enseignant = Enseignant::find($id);
        return view('enseignants/edit', ['Enseignant' => $Enseignant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enseignant  $Enseignant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enseignant $Enseignant)
    {
        //
        $Enseignant = Enseignant::find($id);
        $data = $request->all();
        $Enseignant->update($data);

	    Session::flash('message', $Enseignant['prenom'] . ' updated successfully');
        return view('enseignants/edit', ['Enseignant' => $Enseignant]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enseignant  $Enseignant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enseignant $Enseignant)
    {
        //
        $Enseignant = Enseignant::find($id);
	    $Enseignant->destroy($id);

	    Session::flash('message', $Enseignant['prenom'] . ' deleted successfully');
	    return redirect('/enseignants');
    }
}
