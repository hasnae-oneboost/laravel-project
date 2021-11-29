<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoriespriseencharge;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class CategoriesPriseEnChargeController extends Controller
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
        $classe_CP=1;
        
        $categories = Categoriespriseencharge::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Categories de prise en charge';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return View('backoffice.categorie_prise_en_charge',compact('categories','classe_CP','classe_inter','classe_referentiel','classe_intervention'));
        
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
        $categories= new Categoriespriseencharge;
        $this->validate($request,[
            'libelle' => 'required',
            'code' => 'required',
            'description'   =>  'required'
        ]);

        $categories->libelle=Input::get('libelle');
        $categories->code=Input::get('code');
        $categories->description=Input::get('description');
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
        $categories= Categoriespriseencharge::findOrFail($request->id);
        $this->validate($request,[
            'libelle' => 'required',
            'code' => 'required',
            'description' => 'required',            
        
        ]);

        $categories->libelle=Input::get('libelle');
        $categories->code=Input::get('code');
        $categories->description=Input::get('description');
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
        $categories= Categoriespriseencharge::findOrFail($request->id);
        $categories->delete($request->all());
        return back()->with('success','Suppression réussie');
    }
}

