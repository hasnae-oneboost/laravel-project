<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Famillespiece;
use Auth;
use App\Acce;

class FamillesPiecesController extends Controller
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
        $classe_famille=1;
        
        $familles=Famillespiece::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Familles';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.familles',compact('familles','classe_piece','classe_famille_categorie','classe_famille','classe_referentiel','classe_intervention'));
   
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
        $familles= new Famillespiece;
            $this->validate($request,[
                'libelle' => 'required',
            ]);

        $familles->libelle=Input::get('libelle');
        
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
        $familles= Famillespiece::findOrFail($request->id);

            $this->validate($request,[
                'libelle' => 'required',
            ]);

        $familles->libelle=Input::get('libelle');             
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
        $familles= Famillespiece::findOrFail($request->id);
        $familles->delete($request->all());
        return back()->with('success','Suppression réussie');
            
    }   
}
