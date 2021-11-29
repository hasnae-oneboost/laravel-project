<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Reforme;
use Auth;
use App\User;
use App\Acce;

class ReformeController extends Controller
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
        $classe_reforme=1;

        $reformes= Reforme::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Réformes';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.reformes',compact('reformes','classe_referentiel','classe_classement','classe_reforme'));
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
        $reformes= new Reforme;

        //Validation
        $this->validate($request,[
            'libelle'       => 'required',
            'description'   => 'required'
        ]);

        $reformes->libelle= Input::get('libelle');
        $reformes->description= Input::get('description');
        $reformes->ajoute_par= Auth::user()->name;
        $reformes->modifie_par= ' ';
        $reformes->save();

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
        
        $reformes= Reforme::findOrFail($request->id);

        //Validation
        $this->validate($request,[
            'libelle'       => 'required',
            'description'   => 'required'
        ]);

        $reformes->libelle= Input::get('libelle');
        $reformes->description= Input::get('description');
        $reformes->modifie_par= Auth::user()->name;


        $reformes->save();

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
        $reformes= Reforme::findOrFail($request->id);
        $reformes->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
