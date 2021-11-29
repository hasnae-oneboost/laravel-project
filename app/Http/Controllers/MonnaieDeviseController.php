<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Monnaiedevise;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class MonnaieDeviseController extends Controller
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
        $classe_administration=1;
        $classe_parametrage=1;
        $classe_mon_devise=1;

        $monnaie= Monnaiedevise::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Monnaie & devise';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return View('backoffice.monnaie_devise',compact('monnaie','classe_administration','classe_parametrage','classe_mon_devise','classe_nationalite'));

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
        $monnaie= new Monnaiedevise;
        //validation
        $this->validate($request,[
            'libelle'          => 'required',
            'symbole'          => 'required',
            
        ]);

        $monnaie->libelle = Input::get('libelle');
        $monnaie->symbole = Input::get('symbole');
        $monnaie->ajoute_par = Auth::user()->name;
        $monnaie->modifie_par = ' ';
        
        $monnaie->save();
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
        $monnaie= Monnaiedevise::findOrFail($request->id);
        //validation
        $this->validate($request,[
            'libelle'          => 'required',
            'symbole'          => 'required',
            
        ]);

        $monnaie->libelle = Input::get('libelle');
        $monnaie->symbole = Input::get('symbole');
        $monnaie->modifie_par =  Auth::user()->name;
        
        $monnaie->save();

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
        $monnaie= Monnaiedevise::findOrFail($request->id);
        $monnaie->delete($request->all());
        
        return back()->with('success', 'Suppression réussie');
    }
}
