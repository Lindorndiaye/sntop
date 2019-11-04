<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pub;
use App\Models\AnnonceAuto;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $golds = AnnonceAuto::where('type_annonceur', 'gold')->orderBy('id_a_v', 'desc')->get();
        $pubs = Pub::where('statut', 1)
               ->orderBy('id', 'desc')
               ->take(10)
               ->get();
        
        return view('welcome', ['golds' => $golds, 'pubs' => $pubs]);
    }

    public function imagesUpload()
    {
        return view('imagesUpload');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function imagesUploadPost(Request $request)
    {

        dd($request);

        foreach ($request->file('uploadFile') as $key => $value) {
            $imageName = time(). $key . '.' . $value->getClientOriginalExtension();
            $value->move(public_path('images'), $imageName);
        }

        return response()->json(['success'=>'Images Uploaded Successfully.']);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
