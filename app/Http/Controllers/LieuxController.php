<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Lieu;
use App\Pays;

class LieuxController extends Controller
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
        $classe_transport=1;       
        $classe_lieux=1;
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Lieux';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        $lieux=Lieu::all();
        $pays= Pays::all();

        return view('backoffice.lieux',compact('lieux','pays','classe_utilisation','classe_referentiel','classe_transport','classe_lieux'));
   
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
        $lieux= new Lieu;

        //validation
        $this->validate($request,[
            'pays'  => 'required',
            'ville'  => 'required',
            'type'  => 'required',

        ]);
                
        $lieux->pay_id=Input::get('pays');
        $lieux->ville_id=Input::get('ville');
        $lieux->type=Input::get('type');
        $lieux->ajoute_par=Auth::user()->name;
        $lieux->modifie_par=' ';

        
        $lieux->save();

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
        
        $lieux=Lieu::findOrFail($request->id);

        //validation
        $this->validate($request,[
            'pays'  => 'required',
            'ville'  => 'required',
            'type'  => 'required',

        ]);
                
        $lieux->pay_id=Input::get('pays');
        $lieux->ville_id=Input::get('ville');
        $lieux->type=Input::get('type');
        $lieux->modifie_par=Auth::user()->name;

        $lieux->save();

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
        $lieux=Lieu::findOrFail($request->id);
        $lieux->delete($request->all());
        return back()->with('success', 'Suppression réussie');
                
    }
}
