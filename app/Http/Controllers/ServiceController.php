<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Departement;
use App\Service;

use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class ServiceController extends Controller
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
        $classe_service=1;
        
        $services = Service::all();
        $departements = Departement::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Services';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.services',compact('departements','services','classe_service','classe_util','classe_referentiel','classe_utilisation'));
   
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
        $services= new Service;
        $this->validate($request,[
            'libelle' => 'required',
            'departement' => 'required',
        ]);

        $services->libelle=Input::get('libelle');
        $services->departement_id=Input::get('departement');
        $services->ajoute_par=Auth::user()->name;
        $services->modifie_par=' ';

        $services->save();
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
        $services= Service::findOrFail($request->id);
            $this->validate($request,[
                'libelle' => 'required',
                'departement' => 'required'
            ]);

        $services->libelle=Input::get('libelle');
        $services->departement_id=Input::get('departement');      
        $services->modifie_par=Auth::user()->name;

        $services->save();
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
        $services= Service::findOrFail($request->id);
        $services->delete($request->all());
        return back()->with('success','Suppression réussie');
        
    } 
}
