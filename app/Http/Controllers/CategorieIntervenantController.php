<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorieintervenant;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class CategorieintervenantController extends Controller
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
        $classe_cat_intervnt=1;
        
        $intervenants = Categorieintervenant::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Categories des intervenants';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.categories_intervenants',compact('intervenants','classe_cat_intervnt','classe_intervenant','classe_referentiel','classe_intervention'));
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
        $intervenants= new Categorieintervenant;
        $this->validate($request,[
            'libelle' => 'required',
            'description' => 'required',
        ]);

        $intervenants->libelle=Input::get('libelle');
        $intervenants->description=Input::get('description');
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
        $intervenants= Categorieintervenant::findOrFail($request->id);
        $this->validate($request,[
            'libelle' => 'required',
            'description' => 'required',
        ]);

        $intervenants->libelle=Input::get('libelle');
        $intervenants->description=Input::get('description');
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
        $intervenants= Categorieintervenant::findOrFail($request->id);
        $intervenants->delete($request->all());
        return back()->with('success','Suppression réussie');
        
    }
}
