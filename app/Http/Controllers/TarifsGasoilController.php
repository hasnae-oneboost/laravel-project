<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarifsgasoil;
use App\Servicestation;
use App\Tva;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class TarifsGasoilController extends Controller
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
        $classe_tarifs=1;       
        
        $tarifs = Tarifsgasoil::all();
        $servicestation = Servicestation::all();
        $tva= Tva::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Tarifs de gasoil';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.tarifs_gasoil',compact('tarifs','servicestation','tva','classe_tarifs','classe_con_carburant','classe_consommation','classe_referentiel'));
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
        $tarifs = new Tarifsgasoil;
        //Validation
        $this->validate($request,[
            'date_debut'       => 'required',
            'date_fin'       => 'required',
            'service_station'   => 'required',
            'station'   => 'required',
            'montant_ht'   => 'required',
            'montant_tva'   => 'required',
            'montant_ttc'   => 'required',
        ]);
        
        $tarifs->date_debut= Input::get('date_debut');
        $tarifs->date_fin= Input::get('date_fin');
        $tarifs->service_station= Input::get('service_station');
        $tarifs->station= Input::get('station');
        $tarifs->montan_ht= Input::get('montant_ht');
        $tarifs->montan_tva= Input::get('montant_tva');
        $tarifs->montan_ttc= Input::get('montant_ttc');
        $tarifs->ajoute_par= Auth::user()->name;
        $tarifs->modifie_par= ' ';

        $tarifs->save();

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
        $tarifs= Tarifsgasoil::findOrFail($request->id);

      //Validation
      $this->validate($request,[
        'date_debut'       => 'required',
        'date_fin'       => 'required',
        'service_station'   => 'required',
        'station'   => 'required',
        'ht'   => 'required',
        'tva'   => 'required',
        'ttc'   => 'required',
     ]);
    
        $tarifs->date_debut= Input::get('date_debut');
        $tarifs->date_fin= Input::get('date_fin');
        $tarifs->service_station= Input::get('service_station');
        $tarifs->station= Input::get('station');
        $tarifs->montan_ht= Input::get('ht');
        $tarifs->montan_tva= Input::get('tva');
        $tarifs->montan_ttc= Input::get('ttc');
        $tarifs->modifie_par= Auth::user()->name;

        $tarifs->save();
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
        $tarifs= Tarifsgasoil::findOrFail($request->id);
        $tarifs->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
