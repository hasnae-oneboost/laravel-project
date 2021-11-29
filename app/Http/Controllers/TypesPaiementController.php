<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Typespaiement;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class TypesPaiementController extends Controller
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
        $classe_consommation=1;
        $classe_con_carburant=1;
        $classe_type_paiement=1;
        
        $types = Typespaiement::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Types de paiement';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.types_paiement',compact('types','classe_type_paiement','classe_con_carburant','classe_referentiel','classe_consommation'));
   
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
        $types= new Typespaiement;
        $this->validate($request,[
            'statut' => 'required'
        ]);

        $types->statut=Input::get('statut');
        $types->ajoute_par=Auth::user()->name;
        $types->modifie_par=' ';

        $types->save();
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
        $types= Typespaiement::findOrFail($request->id);
        $this->validate($request,[
            'statut' => 'required'
        ]);

        $types->statut=Input::get('statut');
        $types->modifie_par=Auth::user()->name;

        $types->save();
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
        $types= Typespaiement::findOrFail($request->id);
        $types->delete($request->all());
        return back()->with('success','Suppression réussie');
        
    } 
}

