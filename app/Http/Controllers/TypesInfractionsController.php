<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Typesinfraction;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;


class TypesInfractionsController extends Controller
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
        $classe_ti=1;        
        
        $types = Typesinfraction::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Types des infractions';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.types_infractions',compact('types','classe_infraction','classe_referentiel','classe_juridique','classe_ti'));
    
        
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
        $types = new Typesinfraction;

        //Validation
        $this->validate($request,[
            'libelle'       => 'required',
            'description'   => 'required'
        ]);

        
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
        $types= Typesinfraction::findOrFail($request->id);

        //Validation
        $this->validate($request,[
            'libelle'       => 'required',
            'description'   => 'required'
        ]);

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
        $types= Typesinfraction::findOrFail($request->id);
        $types->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
