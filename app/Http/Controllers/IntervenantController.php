<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Intervenant;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class IntervenantController extends Controller
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
        $classe_intervenant=1;
        $classe_intervnt=1;
        
        $intervenants = Intervenant::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Intervenants';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.intervenants',compact('intervenants','classe_intervnt','classe_intervenant','classe_referentiel','classe_intervention'));
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
        $intervenants= new Intervenant;
        $this->validate($request,[
            'matricule' => 'required',
            'nom' => 'required',
            'prenom'   =>  'required',
            'cin'   =>  'required',
            'date_naissance'   =>  'required',
            'diplome'   =>  'required',
            'fonction'   =>  'required',
            'date_entree'   =>  'required',
        ]);

        $intervenants->matricule=Input::get('matricule');
        $intervenants->nom=Input::get('nom');
        $intervenants->prenom=Input::get('prenom');
        $intervenants->cin=Input::get('cin');
        $intervenants->date_naissance=Input::get('date_naissance');
        $intervenants->diplome=Input::get('diplome');
        $intervenants->fonction=Input::get('fonction');
        $intervenants->date_entree=Input::get('date_entree');
        $intervenants->ajoute_par=Auth::user()->name;
        $intervenants->modifie_par=' ';

        $intervenants->save();
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
        $intervenants= Intervenant::findOrFail($request->id);
        $this->validate($request,[
            'matricule' => 'required',
            'nom' => 'required',
            'prenom'   =>  'required',
            'cin'   =>  'required',
            'date_naissance'   =>  'required',
            'diplome'   =>  'required',
            'fonction'   =>  'required',
            'date_entree'   =>  'required',
        ]);

        $intervenants->matricule=Input::get('matricule');
        $intervenants->nom=Input::get('nom');
        $intervenants->prenom=Input::get('prenom');
        $intervenants->cin=Input::get('cin');
        $intervenants->date_naissance=Input::get('date_naissance');
        $intervenants->diplome=Input::get('diplome');
        $intervenants->fonction=Input::get('fonction');
        $intervenants->date_entree=Input::get('date_entree');
        $intervenants->modifie_par=Auth::user()->name;

        $intervenants->save();
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
        $intervenants= Intervenant::findOrFail($request->id);
        $intervenants->delete($request->all());
        return back()->with('success','Suppression réussie');
        
    }
}
