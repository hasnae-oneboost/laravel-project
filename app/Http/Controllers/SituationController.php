<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Situation;

use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class SituationController extends Controller
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
        $classe_situation=1;
        $situations= Situation::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Situations';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return View('backoffice.situations',compact('situations','classe_referentiel','classe_utilisation','classe_personnel','classe_situation'));

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
        $situations= new Situation;
        //validation
        $this->validate($request,[
            'libelle'          => 'required',
            'description'          => 'required',
            
        ]);

        $situations->libelle = Input::get('libelle');
        $situations->description = Input::get('description');
        $situations->ajoute_par = Auth::user()->name;
        $situations->modifie_par = ' ';
        
        $situations->save();
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
        $situations= Situation::findOrFail($request->id);
        //validation
        $this->validate($request,[
            'libelle'          => 'required',
            'description'          => 'required',
            
        ]);

        $situations->libelle = Input::get('libelle');
        $situations->description = Input::get('description');
        $situations->modifie_par =  Auth::user()->name;
        
        $situations->save();

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
        $situations= Situation::findOrFail($request->id);
        $situations->delete($request->all());
        
        return back()->with('success', 'Suppression réussie');
    }
}
