<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Garage;
use App\Pays;

class GarageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Créer', ['only' => ['create', 'store']]);    
        $this->middleware('permission:Modifier', ['only' => ['edit', 'update']]);   
        $this->middleware('permission:Supprimer', ['only' => ['show', 'delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $classe_referentiel=1;
        $classe_intervention=1;
        $classe_inter=1;
        $classe_garage=1;
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Garages';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        $garages=Garage::all();
        $pays= Pays::all();

        return view('backoffice.garages',compact('garages','pays','classe_referentiel','classe_inter','classe_intervention','classe_garage'));
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
        $garages= new Garage;

        //validation
        $this->validate($request,[
            'nom'   => 'required',
            'pays'  => 'required',
            'ville'  => 'required',
            'fixe'  => 'required',
            'nom_gerant'  => 'required',
            'responsable'  => 'required',           
        ]);

        $garages->nom=Input::get('nom');                
        $garages->pay_id=Input::get('pays');
        $garages->ville_id=Input::get('ville');
        $garages->fixe=Input::get('fixe');
        $garages->nom_gerant=Input::get('nom_gerant');
        $garages->responsable=Input::get('responsable');
        $garages->ajoute_par=Auth::user()->name;
        $garages->modifie_par=' ';

        
        $garages->save();

        return back()->with('success', 'Ajout réussi');
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
    public function update(Request $request)
    {
        
        $garages=Garage::findOrFail($request->id);

        //validation
        $this->validate($request,[
            'nom'   => 'required',
            'pays'  => 'required',
            'ville'  => 'required',
            'fixe'  => 'required',
            'nom_gerant'  => 'required',
            'responsable'  => 'required',
        ]);
                
        $garages->nom=Input::get('nom');                
        $garages->pay_id=Input::get('pays');
        $garages->ville_id=Input::get('ville');
        $garages->fixe=Input::get('fixe');
        $garages->nom_gerant=Input::get('nom_gerant');
        $garages->responsable=Input::get('responsable');
        $garages->modifie_par=Auth::user()->name;

        $garages->save();

        return back()->with('success', 'Modification réussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $garages=Garage::findOrFail($request->id);
        $garages->delete($request->all());
        return back()->with('success', 'Suppression réussie');
                
    }
}
