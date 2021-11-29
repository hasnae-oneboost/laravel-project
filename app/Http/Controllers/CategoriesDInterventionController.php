<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoriesdintervention;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class CategoriesDInterventionController extends Controller
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
        $classe_di=1;
        $classe_cat_inter=1;
        
        $categories = Categoriesdintervention::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Categories des demandes dintervention';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.categories_des_demandes_dintervention',compact('categories','classe_cat_inter','classe_di','classe_referentiel','classe_intervention'));
   
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
        $categories= new Categoriesdintervention;
        $this->validate($request,[
            'libelle' => 'required|unique:categories_d_interventions,libelle'
        ]);

        $categories->libelle=Input::get('libelle');
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
        $categories= Categoriesdintervention::findOrFail($request->id);
        $this->validate($request,[
            'libelle' => 'required|unique:categories_d_interventions,libelle,'.$categories->id
        ]);

        $categories->libelle=Input::get('libelle');
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
        $categories= Categoriesdintervention::findOrFail($request->id);
        $categories->delete($request->all());
        return back()->with('success','Suppression réussie');
        
    } 
}
