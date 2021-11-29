<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Equipementvehicule;
use App\Typeequipementvehicule;
use Auth;
use App\User;
use App\Acce;

class EquipementVehiculeController extends Controller
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
        $classe_equi_vehicul=1;

        $equipements= Equipementvehicule::all();
        $types= Typeequipementvehicule::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Equipement de véhicule';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.equipement_vehicule',compact('equipements','types','classe_referentiel','classe_classement','classe_equi','classe_equi_vehicul'));
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
        $equipements= new Equipementvehicule;

        //Validation
        $this->validate($request,[
            'code'          => 'required',
            'libelle'       => 'required',
            'description'   => 'required',
            'type_equipement'   =>  'required'
        ]);

        $equipements->code= Input::get('code');
        $equipements->libelle= Input::get('libelle');
        $equipements->type_id= Input::get('type_equipement');
        $equipements->description= Input::get('description');
        $equipements->ajoute_par= Auth::user()->name;
        $equipements->modifie_par= ' ';

        $equipements->save();

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
        
        $equipements= Equipementvehicule::findOrFail($request->id);

        //Validation
        $this->validate($request,[
            'code'          => 'required',
            'libelle'       => 'required',
            'description'   => 'required',
            'type_equipement'   =>  'required'            
        ]);

        $equipements->code= Input::get('code');
        $equipements->libelle= Input::get('libelle');
        $equipements->type_id= Input::get('type_equipement');        
        $equipements->description= Input::get('description');
        $equipements->modifie_par= Auth::user()->name;


        $equipements->save();

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
        $equipements= Equipementvehicule::findOrFail($request->id);
        $equipements->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
