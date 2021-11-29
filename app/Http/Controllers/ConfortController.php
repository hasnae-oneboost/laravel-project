<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Confort;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class ConfortController extends Controller
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
        $classe_class=1;
        $classe_confort=1;
        
        $conforts = Confort::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Conforts';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.conforts',compact('conforts','classe_classement','classe_class','classe_referentiel','classe_confort'));
   
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
        $conforts= new Confort;
        $this->validate($request,[
            'nom' => 'required'
        ]);

        $conforts->nom=Input::get('nom');
        $conforts->ajoute_par=Auth::user()->name;
        $conforts->modifie_par=' ';

        $conforts->save();
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
        $conforts= Confort::findOrFail($request->id);
        $this->validate($request,[
            'nom' => 'required'
        ]);

        $conforts->nom=Input::get('nom');
        $conforts->modifie_par=Auth::user()->name;

        $conforts->save();
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
        $conforts= Confort::findOrFail($request->id);
        $conforts->delete($request->all());
        return back()->with('success','Suppression réussie'); 
    } 
}
