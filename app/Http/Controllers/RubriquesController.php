<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Rubrique;
use Auth;
use App\User;
use App\Acce;

class RubriquesController extends Controller
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
        $classe_rh=1;
        $classe_rubrique=1;

        $rubriques= Rubrique::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Rubriques';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.rubriques',compact('rubriques','classe_referentiel','classe_rubrique','classe_rh'));
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
        $rubriques= new Rubrique;

        //Validation
        $this->validate($request,[
            'code'          => 'required',
            'libelle'       => 'required',
            'description'   => 'required'
        ]);

        $rubriques->code= Input::get('code');
        $rubriques->libelle= Input::get('libelle');
        $rubriques->description= Input::get('description');
        $rubriques->ajoute_par= Auth::user()->name;
        $rubriques->modifie_par= ' ';

        $rubriques->save();

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
        
        $rubriques= Rubrique::findOrFail($request->id);

        //Validation
        $this->validate($request,[
            'code'          => 'required',
            'libelle'       => 'required',
            'description'   => 'required'
        ]);

        $rubriques->code= Input::get('code');
        $rubriques->libelle= Input::get('libelle');
        $rubriques->description= Input::get('description');
        $rubriques->modifie_par= Auth::user()->name;


        $rubriques->save();

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
        $rubriques= Rubrique::findOrFail($request->rubrique_id);
        $rubriques->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
