<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Agence;
use App\Acce;
use Auth;

class AgencesController extends Controller
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
        //
        $classe_referentiel=1;
        $classe_agences=1; 
        $classe_utilisation=1;
        $classe_caisse=1;
        $classe_tresorerie=1;  
        $agences = Agence::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Agences bancaires';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.agences_bancaires',compact('classe_referentiel','classe_agences','agences','classe_utilisation','classe_caisse','classe_tresorerie'));
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
        $agences = new Agence;

        //Validation
        $this->validate($request,[
            'code'      => 'required|unique:agences,code',
            'banque'    => 'required',
            'ville'    => 'required',
            'telephone'    => 'required',
            'fax'    => 'required',
            'directeur'    => 'required',
            'libelle'    => 'required',
            'adresse'    => 'required',
            'chargé_de_la_clientèle'    => 'required',
            'telephone_chargé_de_la_clientèle'    => 'required',
            'email_chargé_de_la_clientèle'    => 'required|email',
            'description'    => 'required',
        ]);
        

        $agences->code = Input::get('code');
        $agences->banque_id = $request->get('banque');
        $agences->ville_id = $request->get('ville');
        $agences->telephone = Input::get('telephone');
        $agences->fax = Input::get('fax');
        $agences->directeur_agence = Input::get('directeur');
        $agences->libelle = Input::get('libelle');
        $agences->adresse = Input::get('adresse');
        $agences->charge_de_clientele = Input::get('chargé_de_la_clientèle');
        $agences->tel_charge_de_clientele = Input::get('telephone_chargé_de_la_clientèle');
        $agences->email_cdc = Input::get('email_chargé_de_la_clientèle');
        $agences->description = Input::get('description');   
        $agences->save();

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
        $agences = Agence::findOrFail($request->id);
         //Validation
         $this->validate($request,[
            'code'          => 'required|unique:agences,code,'.$agences->id,
            'banque'        => 'required',
            'ville'         => 'required',
            'telephone'     => 'required',
            'fax'           => 'required',
            'directeur'     => 'required',
            'libelle'       => 'required',
            'adresse'       => 'required',
            'chargé_de_la_clientèle'    => 'required',
            'telephone_chargé_de_la_clientèle'    => 'required',
            'email_chargé_de_la_clientèle'            => 'required|email',
            'description'      => 'required'
        ]);

        $agences->code = Input::get('code');
        $agences->banque_id = $request->get('banque');
        $agences->ville_id = $request->get('ville');
        $agences->telephone = Input::get('telephone');
        $agences->fax = Input::get('fax');
        $agences->directeur_agence = Input::get('directeur');
        $agences->libelle = Input::get('libelle');
        $agences->adresse = Input::get('adresse');
        $agences->charge_de_clientele = Input::get('chargé_de_la_clientèle');
        $agences->tel_charge_de_clientele = Input::get('telephone_chargé_de_la_clientèle');
        $agences->email_cdc = Input::get('email_chargé_de_la_clientèle');
        $agences->description = Input::get('description');
        
        $agences->save();

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
        $agences = Agence::findOrFail($request->agence_id);
        $agences->delete($request->all());

        return back()->with('success', 'Suppression réussie');
    }
}
