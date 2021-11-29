<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departement;
use App\Direction;

use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class DepartementController extends Controller
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
        $classe_departement=1;
        
        $departements=Departement::all();
        $directions = Direction::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Departements';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.departements',compact('departements','directions','classe_departement','classe_util','classe_referentiel','classe_utilisation'));
   
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
       $departement= new Departement;
        $this->validate($request,[
            'libelle' => 'required',
            'direction' => 'required',
        ]);

        $departement->libelle=Input::get('libelle');
        $departement->direction_id=Input::get('direction');
       $departement->ajoute_par=Auth::user()->name;
       $departement->modifie_par=' ';

       $departement->save();
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
       $departement= Departement::findOrFail($request->id);
        $this->validate($request,[
            'libelle' => 'required',
            'direction' => 'required'
        ]);

       $departement->libelle=Input::get('libelle');
       $departement->direction_id=Input::get('direction');      
       $departement->modifie_par=Auth::user()->name;

       $departement->save();
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
       $departement= Departement::findOrFail($request->id);
       $departement->delete($request->all());
        return back()->with('success','Suppression réussie');
        
    }   
}
