<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Detailstrajet;
use Auth;
use App\Acce;
class DetailsTrajetController extends Controller
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
        $classe_details_trajet=1;
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Details des trajets';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        $details= Detailstrajet::all();        
        return view('backoffice.details_trajets',compact('details','classe_utilisation','classe_referentiel','classe_transport','classe_details_trajet'));

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
        $details= new Detailstrajet;
        //Validation 
        $this->validate($request,[
            'trajet' => 'required',
            'categorie_trajet' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'prime_deplacement_1er_conducteur' => 'required|numeric',
            'prime_deplacement_2eme_conducteur' => 'required|numeric',
            'frais_route' => 'required|numeric',
            'consommation' => 'required|integer',
            'description' => 'required',           

        ]);       
        
        $details->trajet_id= Input::get('trajet');
        $details->categorie_id = Input::get('categorie_trajet');
        $details->date_debut= Input::get('date_debut');
        $details->date_fin= Input::get('date_fin');
        $details->prime_deplacement_1er_conducteur= Input::get('prime_deplacement_1er_conducteur');
        $details->prime_deplacement_2eme_conducteur= Input::get('prime_deplacement_2eme_conducteur');
        $details->frais_route=Input::get('frais_route');
        $details->consommation = Input::get('consommation');
        $details->description = Input::get('description');
        $details->ajoute_par=Auth::user()->name;
        $details->modifie_par=' ';

        $details->save();
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
        $details= Detailstrajet::findOrFail($request->id);
        //Validation 
        $this->validate($request,[
            'trajet' => 'required',
            'categorie_trajet' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'prime_deplacement_1er_conducteur' => 'required|numeric',
            'prime_deplacement_2eme_conducteur' => 'required|numeric',
            'frais_route' => 'required|numeric',
            'consommation' => 'required|integer',
            'description' => 'required',           

        ]);       
        
        $details->trajet_id= Input::get('trajet');
        $details->categorie_id = Input::get('categorie_trajet');
        $details->date_debut= Input::get('date_debut');
        $details->date_fin= Input::get('date_fin');
        $details->prime_deplacement_1er_conducteur= Input::get('prime_deplacement_1er_conducteur');
        $details->prime_deplacement_2eme_conducteur= Input::get('prime_deplacement_2eme_conducteur');
        $details->frais_route=Input::get('frais_route');
        $details->consommation = Input::get('consommation');
        $details->description = Input::get('description');
        $details->modifie_par=Auth::user()->name;

        $details->save();
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
        $details= Detailstrajet::findOrFail($request->id);
        $details->delete($request->all());
        return back()->with('success','Suppression réussie');        
    }
}
