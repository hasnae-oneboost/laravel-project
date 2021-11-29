<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoriesfamilleintervention;
use App\Souscategoriefamilleintervention;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class SousCategorieFamilleInterventionController extends Controller
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
        $classe_SC=1;
        
        $categories = Souscategoriefamilleintervention::all();
        $categories_famille = Categoriesfamilleintervention::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Sous categories de famille d intervention';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return View('backoffice.sous_categories_famille_intervention',compact('categories_famille','categories','classe_SC','classe_inter','classe_referentiel','classe_intervention'));
        
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
        $categories= new Souscategoriefamilleintervention;
        $this->validate($request,[
            'libelle' => 'required',
            'code' => 'required',
            'categories' => 'required',
            'commentaire'   =>  'required'
        ]);

        $categories->libelle=Input::get('libelle');
        $categories->code=Input::get('code');
        $categories->categorie_id=Input::get('categories');
        $categories->commentaire=Input::get('commentaire');
        $categories->ajoute_par=Auth::user()->name;
        $categories->modifie_par=' ';

        $categories->save();
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
        $categories= Souscategoriefamilleintervention::findOrFail($request->id);
        $this->validate($request,[
            'libelle' => 'required',
            'code' => 'required',
            'categories' => 'required',
            'commentaire'   =>  'required'
        
        ]);

        $categories->libelle=Input::get('libelle');
        $categories->code=Input::get('code');
        $categories->categorie_id=Input::get('categories');        
        $categories->commentaire=Input::get('commentaire');
        $categories->modifie_par=Auth::user()->name;

        $categories->save();
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
        $categories= Souscategoriefamilleintervention::findOrFail($request->id);
        $categories->delete($request->all());
        return back()->with('success','Suppression réussie');
    }
}
