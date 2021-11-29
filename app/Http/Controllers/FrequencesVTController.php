<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Frequencesvisitetechnique;
use Auth;
use App\User;
use App\Acce;

class FrequencesVTController extends Controller
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
        $classe_juridique=1;
        $classe_vt=1;
        $classe_freq_vt=1;
        $freqs=Frequencesvisitetechnique::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Fréquences visite techniques';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.frequences_visite_techniques',compact('freqs','classe_freq_vt','classe_referentiel','classe_juridique','classe_vt'));
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
        $freqs= new Frequencesvisitetechnique;
        
        //Validation
        $this->validate($request,[
            'nom'          => 'required',
            'première_visite_technique'      => 'required|integer',
            'fréquence_visite_technique'      => 'required|integer',            ''
        ]);
        $freqs->nom= Input::get('nom');
        $freqs->premiere_vt= Input::get('première_visite_technique');
        $freqs->frequence_vt_= Input::get('fréquence_visite_technique');
        $freqs->ajoute_par= Auth::user()->name;
        $freqs->modifie_par= ' ';

        $freqs->save();

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
        $freqs=Frequencesvisitetechnique::findOrFail($request->id);
        //Validation
        $this->validate($request,[
            'nom'                            => 'required',
            'première_visite_technique'      => 'required|integer',
            'fréquence_visite_technique'     => 'required|integer',  
        ]);

        $freqs->nom= Input::get('nom');
        $freqs->premiere_vt= Input::get('première_visite_technique');
        $freqs->frequence_vt_= Input::get('fréquence_visite_technique');
        $freqs->modifie_par= Auth::user()->name;

        $freqs->save();
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
        $freqs=Frequencesvisitetechnique::findOrFail($request->id);

        $freqs->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
