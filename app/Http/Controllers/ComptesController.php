<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Compte;
use App\{Banque,Agence};
use Auth;
use App\User;
use DB;
use App\Acce;

class ComptesController extends Controller
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
        $classe_comptes=1;
        $classe_utilisation=1;
        $classe_caisse=1;
        $classe_tresorerie=1;
        $comptes = Compte::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Comptes bancaires';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.comptes_bancaires',compact('classe_referentiel','classe_comptes','comptes','classe_utilisation','classe_caisse','classe_tresorerie'));
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
        $comptes = new Compte;
        //Validation
        $this->validate($request,[
            'libelle'   => 'required',
            'banque'   => 'required',
            'agence'   => 'required',
            'date_création'   => 'date|required',
            'rib'   => 'required',
            'solde_initial'   => 'required',
            'description'   => 'required',
        ]);

        $comptes->libelle = Input::get('libelle');
        $comptes->banque_id = $request->get('banque');
        $comptes->agence_id = $request->get('agence');
        $comptes->date_création = Input::get('date_création');
        $comptes->rib = Input::get('rib');
        $comptes->solde_initial = Input::get('solde_initial');
        $comptes->description = Input::get('description');
        $comptes->ajoute_par = Auth::user()->name;
        $comptes->modifie_par = ' ';
      
        $comptes->save();

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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $comptes = Compte::findOrFail($request->id);

         //Validation
         $this->validate($request,[
            'libelle'   => 'required',
            'banque'   => 'required',
            'agence'   => 'required',
            'date_création'   => 'required',
            'rib'   => 'required',
            'solde_initial'   => 'required',
            'description'   => 'required',
        ]);

        $comptes->libelle = Input::get('libelle');
        $comptes->banque_id = $request->get('banque');
        $comptes->agence_id = $request->get('agence');
        $comptes->date_création = Input::get('date_création');
        $comptes->rib = Input::get('rib');
        $comptes->solde_initial = Input::get('solde_initial');
        $comptes->description = Input::get('description');
        //$comptes->ajoute_par = 'test';
        $comptes->modifie_par = Auth::user()->name;
      
        $comptes->save();

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
        $comptes = Compte::findOrFail($request->compte_id);
        $comptes->delete($request->all());

        return back()->with('success', 'Suppression réussie');
    }
     
    

}
