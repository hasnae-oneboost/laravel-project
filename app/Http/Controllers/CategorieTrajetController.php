<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorietrajet;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class CategorieTrajetController extends Controller
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
        $classe_utilisation=1;
        $classe_transport=1;       
        $classe_categorie_trajet=1;
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Categories des trajets';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        $categories= Categorietrajet::all();        
        return view('backoffice.categorie_trajets',compact('categories','classe_utilisation','classe_referentiel','classe_transport','classe_categorie_trajet'));

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
        $categories= new Categorietrajet;
        $this->validate($request,[
            'libelle' => 'required|unique:categorie_trajets,libelle'
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
        $categories= Categorietrajet::findOrFail($request->id);
        $this->validate($request,[
            'libelle' => 'required|unique:categorie_trajets,libelle,'.$categories->id,
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
        $categories= Categorietrajet::findOrFail($request->id);
        $categories->delete($request->all());
        return back()->with('success','Suppression réussie');
        
    }
}
