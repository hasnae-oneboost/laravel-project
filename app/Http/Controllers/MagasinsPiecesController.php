<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Magasinspiece;
use Auth;
use App\Acce;


class MagasinsPiecesController extends Controller
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
        $classe_magasin=1;
        
        $magasins=Magasinspiece::all();
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Magasins';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.magasins',compact('magasins','descriptions','classe_piece','classe_magasin','classe_referentiel','classe_intervention'));
   
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
        $magasins= new Magasinspiece;
            $this->validate($request,[
                'libelle' => 'required',    
            ]);
            
        $magasins->libelle=Input::get('libelle');
        $magasins->ajoute_par=Auth::user()->name;
        $magasins->modifie_par=' ';

        $magasins->save();

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
        $magasins= Magasinspiece::findOrFail($request->id);

        $this->validate($request,[
            'libelle' => 'required',
            
        ]);

        $magasins->libelle=Input::get('libelle');                
        $magasins->modifie_par=Auth::user()->name;

        $magasins->save();
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
        $magasins= Magasinspiece::findOrFail($request->id);
        $magasins->delete($request->all());
        return back()->with('success','Suppression réussie');
    }   
}
