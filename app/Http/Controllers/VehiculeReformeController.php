<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Vehiculesreforme;
use Auth;
use App\User;
use App\Acce;
use App\{Reforme,Vehicule};

class VehiculeReformeController extends Controller
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
        $classe_accueil=1;
        $classe_flotte=1;
        $classe_vehicule_reforme=1;
        
        $vehiculesreformes= Vehiculesreforme::all();
        $vehicules = Vehicule::all();
        $typereforme = Reforme::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Vehicules réformés';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.vehicules_reformes',compact('vehicules','vehiculesreformes','typereforme','classe_accueil','classe_flotte','classe_vehicule_reforme'));
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
        $vehicules= new Vehiculesreforme;

        //Validation
        $this->validate($request,[
            'vehicule'       => 'required',
            'date_reforme'   => 'required',
            'type_reforme'   => 'required',
            'montant'   => 'required',
            'observation'   => 'required',

        ]);

        $vehicules->vehicule_id= Input::get('vehicule');
        $vehicules->date_reforme= Input::get('date_reforme');
        $vehicules->reforme_id= Input::get('type_reforme');
        $vehicules->montant= Input::get('montant');
        $vehicules->observation= Input::get('observation');
        $vehicules->ajoute_par= Auth::user()->name;
        $vehicules->modifie_par= ' ';
        
        $vehicules->save();

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
        
        $vehicules= Vehiculesreforme::findOrFail($request->id);

         //Validation
         $this->validate($request,[
            'vehicule'       => 'required',
            'date_reforme'   => 'required',
            'type_reforme'   => 'required',
            'montant'   => 'required',
            'observation'   => 'required',

        ]);

        $vehicules->vehicule_id= Input::get('vehicule');
        $vehicules->date_reforme= Input::get('date_reforme');
        $vehicules->reforme_id= Input::get('type_reforme');
        $vehicules->montant= Input::get('montant');
        $vehicules->observation= Input::get('observation');
        $vehicules->ajoute_par= Auth::user()->name;
        $vehicules->modifie_par= Auth::user()->name;


        $vehicules->save();

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
        $vehicules= Vehiculesreforme::findOrFail($request->id);
        $vehicules->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
