<?php

namespace App\Http\Controllers;
use App\Typesdegat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\User;
use App\Acce;

class TypesDegatsController extends Controller
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
        $classe_sinistre=1;
        $classe_type_degat=1;
        $degats=Typesdegat::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Types des degats';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return View('backoffice.types_degats',compact('degats','classe_referentiel','classe_juridique','classe_sinistre','classe_type_degat'));
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
        $degats = new Typesdegat;
        //Validation
        $this->validate($request,[
            'libelle'          => 'required',
            
        ]);
        $degats->libelle= Input::get('libelle');
        
        $degats->ajoute_par= Auth::user()->name;
        $degats->modifie_par= ' ';

        $degats->save();

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
        $degats = Typesdegat::findOrFail($request->id);
          //Validation
          $this->validate($request,[            
            'libelle'       => 'required',
            
        ]);        
        $degats->libelle= Input::get('libelle');
        $degats->modifie_par= Auth::user()->name;
    
        $degats->save();

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
        $degats = Typesdegat::findOrFail($request->id);
        $degats->delete($request->all());

        return back()->with('success', 'Suppression réussie');

    }
}
