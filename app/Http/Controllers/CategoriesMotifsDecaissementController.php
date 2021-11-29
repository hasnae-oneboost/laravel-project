<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Categoriesmotifsdecaissement;
use Auth;
use App\Acce;

class CategoriesMotifsDecaissementController extends Controller
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
        $classe_cat_motif_decaissement=1;
        $decaissement= Categoriesmotifsdecaissement::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Catégories des motifs de decaissement';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return View('backoffice.catégories_motifs_decaissement',compact('decaissement','classe_referentiel','classe_utilisation','classe_caisse','classe_cat_motif_decaissement'));
    
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
        $decaissement= new Categoriesmotifsdecaissement;
        //Validation
        $this->validate($request,[
            'libelle'          => 'required|unique:Categories_motifs_decaissements,libelle',
            'description'          => 'required',
        ]);
        $decaissement->libelle = Input::get('libelle');
        $decaissement->description = Input::get('description');
        $decaissement->ajoute_par = Auth::user()->name;
        $decaissement->modifie_par = ' ';

        $decaissement->save();        
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
        $decaissement= Categoriesmotifsdecaissement::findOrFail($request->id);

         //Validation
         $this->validate($request,[
            'libelle'          => 'required|unique:Categories_motifs_decaissements,libelle,'.$decaissement->id,
            'description'          => 'required',
        ]);
        
        $decaissement->libelle = Input::get('libelle');
        $decaissement->description = Input::get('description');
        $decaissement->modifie_par = Auth::user()->name;

        $decaissement->save();        
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
        $decaissement= Categoriesmotifsdecaissement::findOrFail($request->id);
        $decaissement->delete($request->all());
        
        return back()->with('success','Suppression réussie');   
    }
}
