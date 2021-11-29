<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicestation;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class ServiceStationController extends Controller
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
        $classe_serv_station=1;       
        
        $services = Servicestation::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Service-station';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.service_station',compact('services','classe_serv_station','classe_con_carburant','classe_consommation','classe_referentiel'));

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
        $services = new Servicestation;

        //Validation
        $this->validate($request,[
            'libelle'       => 'required',
            'description'   => 'required'
        ]);
        
        $services->libelle= Input::get('libelle');
        $services->description= Input::get('description');
        $services->ajoute_par= Auth::user()->name;
        $services->modifie_par= ' ';

        $services->save();

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
        $services= Servicestation::findOrFail($request->id);

        //Validation
        $this->validate($request,[
            'libelle'       => 'required',
            'description'   => 'required'
        ]);

        $services->libelle= Input::get('libelle');
        $services->description= Input::get('description');
        $services->modifie_par= Auth::user()->name;

        $services->save();
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
        $services= Servicestation::findOrFail($request->id);
        $services->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
