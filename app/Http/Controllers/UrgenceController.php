<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Urgence;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class UrgenceController extends Controller
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
        $classe_intervention=1;
        $classe_di=1;
        $classe_urgence=1;
        
        $urgences = Urgence::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Urgences des demandes dintervention';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.urgences_des_demandes_dintervention',compact('urgences','classe_urgence','classe_di','classe_referentiel','classe_intervention'));
   
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
        $urgences= new Urgence;
        $this->validate($request,[
            'libelle' => 'required|unique:urgence,libelle'
        ]);

        $urgences->libelle=Input::get('libelle');
        $urgences->ajoute_par=Auth::user()->name;
        $urgences->modifie_par=' ';

        $urgences->save();
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
        $urgences= Urgence::findOrFail($request->id);
        $this->validate($request,[
            'libelle' => 'required|unique:urgence,libelle,'.$urgences->id
        ]);

        $urgences->libelle=Input::get('libelle');
        $urgences->modifie_par=Auth::user()->name;

        $urgences->save();
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
        $urgences= Urgence::findOrFail($request->id);
        $urgences->delete($request->all());
        return back()->with('success','Suppression réussie');
        
    } 
}
