<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unite;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
class UnitesController extends Controller
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
        $classe_utilisation=1;
        $classe_unites=1;
        
        $unites = Unite::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Unités';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.unites',compact('unites','classe_unites','classe_referentiel','classe_utilisation'));
    
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
        $unites = new Unite;

        //Validation
        $this->validate($request,[
            'libelle'       => 'required',
            'description'   => 'required'
        ]);

        
        $unites->libelle= Input::get('libelle');
        $unites->description= Input::get('description');
        $unites->ajoute_par= Auth::user()->name;
        $unites->modifie_par= ' ';

        $unites->save();

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
        $unites= Unite::findOrFail($request->id);

        //Validation
        $this->validate($request,[
            'libelle'       => 'required',
            'description'   => 'required'
        ]);

        $unites->libelle= Input::get('libelle');
        $unites->description= Input::get('description');
        $unites->modifie_par= Auth::user()->name;

        $unites->save();
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
        $unites= Unite::findOrFail($request->id);
        $unites->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    
    }
}
