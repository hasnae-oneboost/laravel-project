<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Infraction,Typesinfraction};
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class InfractionsController extends Controller
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
        $classe_juridique=1;
        $classe_infraction=1;
        $classe_i=1;        
        $types= Typesinfraction::all();
        $infractions = Infraction::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Infractions';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.infractions',compact('types','infractions','classe_infraction','classe_referentiel','classe_juridique','classe_i'));
    
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
        $infractions = new Infraction;

        //Validation
        $this->validate($request,[
            'type_infraction' => 'required',
            'libelle'       => 'required',
            'description'   => 'required',
            'amende' => 'required',
            'nombre_points' => 'required|integer',
        ]);

        $infractions->type_infraction_id= Input::get('type_infraction');
        $infractions->libelle= Input::get('libelle');
        $infractions->description= Input::get('description');
        $infractions->amende= Input::get('amende');
        $infractions->nombre_points= Input::get('nombre_points');
        $infractions->ajoute_par= Auth::user()->name;
        $infractions->modifie_par= ' ';

        $infractions->save();

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
        $infractions = Infraction::findOrFail($request->id);

        //Validation
        $this->validate($request,[
            'type_infraction' => 'required',
            'libelle'       => 'required',
            'description'   => 'required',
            'amende' => 'required',
            'nombre_points' => 'required|integer',
        ]);

        $infractions->type_infraction_id= Input::get('type_infraction');
        $infractions->libelle= Input::get('libelle');
        $infractions->description= Input::get('description');
        $infractions->amende= Input::get('amende');
        $infractions->nombre_points= Input::get('nombre_points');
        $infractions->modifie_par= Auth::user()->name;

        $infractions->save();
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
        $infractions= Infraction::findOrFail($request->id);
        $infractions->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
