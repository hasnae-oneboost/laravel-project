<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Acce;
use Auth;
use App\Categoriesmotifsencaissement;

class CategoriesMotifsEncaissementController extends Controller
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
        $classe_caisse=1;
        $classe_cat_motif_encaissement=1;
        $encaissement= Categoriesmotifsencaissement::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Catégories des motifs dencaissement';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return View('backoffice.catégories_motifs_encaissement',compact('encaissement','classe_referentiel','classe_utilisation','classe_caisse','classe_cat_motif_encaissement'));
    
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
        $encaissement= new Categoriesmotifsencaissement;
         //Validation
         $this->validate($request,[
            'libelle'          => 'required|unique:categories_motifs_encaissements,libelle',
            'description'          => 'required',
        ]);

        $encaissement->libelle = Input::get('libelle');
        $encaissement->description = Input::get('description');
        $encaissement->ajoute_par = Auth::user()->name;
        $encaissement->modifie_par = ' ';

        $encaissement->save();        
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
        
        $encaissement= Categoriesmotifsencaissement::findOrFail($request->id);
        //Validation
        $this->validate($request,[
            'libelle'          => 'required|unique:categories_motifs_encaissements,libelle,'.$encaissement->id,
            'description'          => 'required',
        ]);

        $encaissement->libelle = Input::get('libelle');
        $encaissement->description = Input::get('description');
        $encaissement->modifie_par = Auth::user()->name;

        $encaissement->save();        
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
        $encaissement= Categoriesmotifsencaissement::findOrFail($request->id);
        $encaissement->delete($request->all());
        
        return back()->with('success','Suppression réussie');        
    }
}
