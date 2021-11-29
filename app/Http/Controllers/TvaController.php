<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Tva;
use App\Tvatype;

class TvaController extends Controller
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
        $classe_u_tva=1;       
        $classe_tva=1;
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Liste des TVA';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        $lists=Tva::all();
        $type=Tvatype::all();
        return view('backoffice.tva',compact('lists','type','classe_utilisation','classe_referentiel','classe_tva','classe_u_tva'));
    
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
        $lists= new Tva;
        //Validation
        $this->validate($request,[
            'code'       => 'required|unique:tvas,code',
            'libelle'       => 'required',
            'type_tva'       => 'required',
            'taux_tva'       => 'required',
            'description'   => 'required'
        ]);


        $lists->code=Input::get('code');        
        $lists->libelle=Input::get('libelle');
        $lists->type_tva_id=Input::get('type_tva');
        $lists->taux_tva=Input::get('taux_tva');
        $lists->description=Input::get('description');
        $lists->ajoute_par=Auth::user()->name;
        $lists->modifie_par=' ';

        $lists->save();
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
        $lists= Tva::findOrFail($request->id);
         //Validation
         $this->validate($request,[
            'code'       => 'required|unique:tvas,code,'.$lists->id,
            'libelle'       => 'required',
            'type_tva'       => 'required',
            'taux_tva'       => 'required',
            'description'   => 'required'
        ]);


        $lists->code=Input::get('code');        
        $lists->libelle=Input::get('libelle');
        $lists->type_tva_id=Input::get('type_tva');
        $lists->taux_tva=Input::get('taux_tva');
        $lists->description=Input::get('description');
        $lists->modifie_par=Auth::user()->name;

        $lists->save();
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
        $lists= Tva::findOrFail($request->id);
        $lists->delete($request->all()); 
        return back()->with('success','Suppression réussie');
               
    }
}
