<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Famillesintervention;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class FamillesInterController extends Controller
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
        $classe_inter=1;
        $classe_FI=1;
        
        $familles = Famillesintervention::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Familles d intervention';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.familles_intervention',compact('familles','classe_FI','classe_inter','classe_referentiel','classe_intervention'));
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
        $familles= new Famillesintervention;
        $this->validate($request,[
            'libelle' => 'required|unique:familles_interventions,libelle',
            'code' => 'required',
            'commentaire'   =>  'required'
        ]);

        $familles->libelle=Input::get('libelle');
        $familles->code=Input::get('code');
        $familles->commentaire=Input::get('commentaire');
        $familles->ajoute_par=Auth::user()->name;
        $familles->modifie_par=' ';

        $familles->save();
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
        $familles= Famillesintervention::findOrFail($request->id);
        $this->validate($request,[
            'libelle' => 'required|unique:familles_interventions,libelle,'.$familles->id,
            'code' => 'required',
            'commentaire'   =>  'required'
        
        ]);

        $familles->libelle=Input::get('libelle');
        $familles->code=Input::get('code');
        $familles->commentaire=Input::get('commentaire');
        $familles->modifie_par=Auth::user()->name;

        $familles->save();
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
        $familles= Famillesintervention::findOrFail($request->id);
        $familles->delete($request->all());
        return back()->with('success','Suppression réussie');
        
    }
}
