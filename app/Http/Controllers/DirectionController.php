<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Direction;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class DirectionController extends Controller
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
        $classe_util=1;
        $classe_direction=1;
        
        $directions = Direction::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Directions';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.directions',compact('directions','classe_direction','classe_util','classe_referentiel','classe_utilisation'));
   
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
        $directions= new Direction;
        $this->validate($request,[
            'libelle' => 'required'
        ]);

        $directions->libelle=Input::get('libelle');
        $directions->ajoute_par=Auth::user()->name;
        $directions->modifie_par=' ';

        $directions->save();
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
        $directions= Direction::findOrFail($request->id);
        $this->validate($request,[
            'libelle' => 'required'
        ]);

        $directions->libelle=Input::get('libelle');
        $directions->modifie_par=Auth::user()->name;

        $directions->save();
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
        $directions= Direction::findOrFail($request->id);
        $directions->delete($request->all());
        return back()->with('success','Suppression réussie');
        
    }   
}
