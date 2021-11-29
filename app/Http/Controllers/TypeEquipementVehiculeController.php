<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Typeequipementvehicule;
use Auth;
use App\User;
use App\Acce;

class TypeEquipementVehiculeController extends Controller
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
        $classe_classement=1;
        $classe_equi=1;
        $classe_type_equi=1;

        $types= Typeequipementvehicule::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Types d équipements de véhicules';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.types_equipement_vehicule',compact('types','classe_referentiel','classe_classement','classe_equi','classe_type_equi'));
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
        $types= new Typeequipementvehicule;

        //Validation
        $this->validate($request,[
            'code'          => 'required',
            'libelle'       => 'required',
            'description'   => 'required'
        ]);

        $types->code= Input::get('code');
        $types->libelle= Input::get('libelle');
        $types->description= Input::get('description');
        $types->ajoute_par= Auth::user()->name;
        $types->modifie_par= ' ';

        $types->save();

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
        
        $types= Typeequipementvehicule::findOrFail($request->id);

        //Validation
        $this->validate($request,[
            'code'          => 'required',
            'libelle'       => 'required',
            'description'   => 'required'
        ]);

        $types->code= Input::get('code');
        $types->libelle= Input::get('libelle');
        $types->description= Input::get('description');
        $types->modifie_par= Auth::user()->name;


        $types->save();

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
        $types= Typeequipementvehicule::findOrFail($request->id);
        $types->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
