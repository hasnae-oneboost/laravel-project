<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Energie;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class EnergieController extends Controller
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
        $classe_energie=1;
        
        $energies = Energie::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Energies';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.energies',compact('energies','classe_classement','classe_class','classe_referentiel','classe_energie'));
   
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
        $energies= new Energie;
        $this->validate($request,[
            'libelle' => 'required',
            'description' => 'required'
        ]);

        $energies->libelle=Input::get('libelle');
        $energies->description=Input::get('description');
        $energies->ajoute_par=Auth::user()->name;
        $energies->modifie_par=' ';

        $energies->save();
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
        $energies= Energie::findOrFail($request->id);
        $this->validate($request,[
            'libelle' => 'required',
            'description' => 'required'            
        ]);

        $energies->libelle=Input::get('libelle');
        $energies->description=Input::get('description');        
        $energies->modifie_par=Auth::user()->name;

        $energies->save();
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
        $energies= Energie::findOrFail($request->id);
        $energies->delete($request->all());
        return back()->with('success','Suppression réussie');
        
    }   
}
