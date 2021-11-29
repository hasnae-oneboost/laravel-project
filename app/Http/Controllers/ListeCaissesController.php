<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Caisse;
use App\Acce;
use Auth;

class ListeCaissesController extends Controller
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
        $classe_caisse=1;
        $classe_caisses=1;
        $caisses= Caisse::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Caisses';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return View('backoffice.caisses',compact('caisses','classe_referentiel','classe_utilisation','classe_caisse','classe_caisses'));
    
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
        $caisses= new Caisse;

        //Validation
        $this->validate($request,[
            'code'      => 'required|unique:caisses,code',
            'libelle'      => 'required|unique:caisses,libelle',
            'solde_initial'    => 'required|numeric',
            'numero_compte_comptable'    => 'required',
            'montant_min'    => 'required|numeric',
            'description'    => 'required',
            'observation'    => 'required',
            'solde'    => 'required|numeric',
        ]);
        

        
        $caisses->code = Input::get('code');
        $caisses->libelle = Input::get('libelle');
        $caisses->solde_initial = Input::get('solde_initial');
        $caisses->numero_compte_comptable = Input::get('numero_compte_comptable');
        $caisses->montant_min =  Input::get('montant_min');
        $caisses->dernier_numero_operation = ' ';
        $caisses->caisse_principale = Input::get('caisse_principale');
        $caisses->description = Input::get('description');
        $caisses->observation = Input::get('observation');
        $caisses->solde =Input::get('solde');
        $caisses->ajoute_par = Auth::user()->name;
        $caisses->modifie_par = ' ';

        $caisses->save();

        return back()->with('success','Ajout réussi');
        
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
        $caisses= Caisse::findOrFail($request->id);
        
        //Validation
        $this->validate($request,[
            'code'      => 'required|unique:caisses,code,'.$caisses->id,
            'libelle'      => 'required|unique:caisses,libelle,'.$caisses->id,
            'solde_initial'    => 'required|numeric',
            'numero_compte_comptable'    => 'required',
            'montant_min'    => 'required|numeric',
            'description'    => 'required',
            'observation'    => 'required',
            'solde'    => 'required|numeric',
        ]);
       
        $caisses->code = Input::get('code');
        $caisses->libelle = Input::get('libelle');
        $caisses->solde_initial =Input::get('solde_initial');
        $caisses->numero_compte_comptable = Input::get('numero_compte_comptable');
        $caisses->montant_min = Input::get('montant_min');
        $caisses->dernier_numero_operation = ' ';
        $caisses->caisse_principale = Input::get('caisse_principale');
        $caisses->description = Input::get('description');
        $caisses->observation = Input::get('observation');
        $caisses->solde= Input::get('solde');
        $caisses->modifie_par = Auth::user()->name;

        $caisses->save();

        return back()->with('success','Modification réussie');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $caisses = Caisse::findOrFail($request->id);
        $caisses->delete($request->all());
        return back()->with('success','Suppression réussie');
    }
}
