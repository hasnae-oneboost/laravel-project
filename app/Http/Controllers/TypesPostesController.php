<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Typesposte;
use Auth;
use App\User;
use App\Acce;

class TypesPostesController extends Controller
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
        $classe_poste=1;

        $postes= Typesposte::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Types des postes';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.types_postes',compact('postes','classe_referentiel','classe_poste','classe_rh'));
        
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
        $postes= new Typesposte;

        //Validation
        $this->validate($request,[
            'code'          => 'required',
            'libelle'       => 'required',
            'description'   => 'required'
        ]);

        $postes->code= Input::get('code');
        $postes->libelle= Input::get('libelle');
        $postes->description= Input::get('description');
        $postes->ajoute_par= Auth::user()->name;
        $postes->modifie_par= ' ';

        $postes->save();

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
        $postes= Typesposte::findOrFail($request->id);
        //Validation
        $this->validate($request,[
            'code'          => 'required',
            'libelle'       => 'required',
            'description'   => 'required'
        ]);

        $postes->code= Input::get('code');
        $postes->libelle= Input::get('libelle');
        $postes->description= Input::get('description');
        $postes->modifie_par= Auth::user()->name;

        $postes->save();
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
        $poste= Typesposte::findOrFail($request->poste_id);
        $poste->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
