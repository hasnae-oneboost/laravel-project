<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nationalite;

use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class NationaliteController extends Controller
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
        $classe_nationalite=1;
        $nationalites= Nationalite::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Nationalites';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return View('backoffice.nationalites',compact('nationalites','classe_referentiel','classe_utilisation','classe_personnel','classe_nationalite'));

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
        $nationalites= new Nationalite;
        //validation
        $this->validate($request,[
            'libelle'          => 'required',
            'description'          => 'required',
            
        ]);

        $nationalites->libelle = Input::get('libelle');
        $nationalites->description = Input::get('description');
        $nationalites->ajoute_par = Auth::user()->name;
        $nationalites->modifie_par = ' ';
        
        $nationalites->save();
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
        $nationalites= Nationalite::findOrFail($request->id);
        //validation
        $this->validate($request,[
            'libelle'          => 'required',
            'description'          => 'required',
            
        ]);

        $nationalites->libelle = Input::get('libelle');
        $nationalites->description = Input::get('description');
        $nationalites->modifie_par =  Auth::user()->name;
        
        $nationalites->save();

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
        $nationalites= Nationalite::findOrFail($request->id);
        $nationalites->delete($request->all());
        
        return back()->with('success', 'Suppression réussie');
    }
}
