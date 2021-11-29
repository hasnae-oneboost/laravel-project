<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Typespromotion;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class TypesPromotionsController extends Controller
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
       $classe_personnel=1;
       $classe_types_promotion=1;
       $promotions= Typespromotion::all();
       $acces= new Acce;
       $acces->utilisateur= Auth::user()->name;
       $acces->page= 'Types de promotion';
       $acces->date=date("Y-m-d h:i:s");
       $acces->save();
       return View('backoffice.types_promotion',compact('promotions','classe_referentiel','classe_utilisation','classe_personnel','classe_types_promotion'));

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
        $promotions= new Typespromotion;

        //validation
        $this->validate($request,[
            'libelle'          => 'required',
            'montant'          => 'required',
            'description'          => 'required',
            
        ]);

        $promotions->libelle = Input::get('libelle');
        $promotions->montant = Input::get('montant');
        $promotions->description = Input::get('description');
        $promotions->ajoute_par = Auth::user()->name;
        $promotions->modifie_par = ' ';
        
        $promotions->save();

        return back()->with('success', 'Ajout réussi');
        
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
        $promotions= Typespromotion::findOrFail($request->id);

        //validation
        $this->validate($request,[
            'libelle'          => 'required',
            'montant'          => 'required',
            'description'          => 'required',
            
        ]);

        $promotions->libelle = Input::get('libelle');
        $promotions->montant = Input::get('montant');
        $promotions->description = Input::get('description');
        $promotions->modifie_par = Auth::user()->name;
        
        $promotions->save();
        
        return back()->with('success', 'Modification réussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $promotions= Typespromotion::findOrFail($request->id);
        $promotions->delete($request->all());
        return back()->with('success', 'Suppression réussie');
        
    }
}
