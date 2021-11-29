<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Categoriespiece;
use Auth;
use App\Acce;
use App\Famillespiece;

class CategoriesPieceController extends Controller
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
        $classe_piece=1;
        $classe_famille_categorie=1;
        $classe_categorie=1;
        
        $categories=Categoriespiece::all();
        $familles = Famillespiece::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Catégories';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();


        return view('backoffice.categories_pieces',compact('categories','familles','classe_piece','classe_famille_categorie','classe_categorie','classe_referentiel','classe_intervention'));
   
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
        $categories= new Categoriespiece;
            $this->validate($request,[
                'libelle' => 'required',
                'famille' => 'required',
            ]);

        $categories->libelle=Input::get('libelle');
        $categories->famille_id=Input::get('famille');
        
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
        $categories= Categoriespiece::findOrFail($request->id);

        $this->validate($request,[
            'libelle' => 'required',
            'famille' => 'required',
        ]);

        $categories->libelle=Input::get('libelle');
        $categories->famille_id=Input::get('famille');
                
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
        $categories= Categoriespiece::findOrFail($request->id);
        $categories->delete($request->all());
        return back()->with('success','Suppression réussie');
            
    }   
}
