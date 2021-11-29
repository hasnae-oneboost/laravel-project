<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Centremedical;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;


class CentreMedicalController extends Controller
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
        $classe_centre_medical=1;
        $centreMedical= Centremedical::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Centres médicaux';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return View('backoffice.centres_medicaux',compact('centreMedical','classe_referentiel','classe_utilisation','classe_personnel','classe_centre_medical'));
    
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
        $centres= new Centremedical;
        //validation
        $this->validate($request,[
            'libelle'          => 'required',
            'adresse'          => 'required',
            'description'          => 'required',
            
        ]);

        $centres->libelle = Input::get('libelle');
        $centres->adresse = Input::get('adresse');
        $centres->description = Input::get('description');
        $centres->ajoute_par = Auth::user()->name;
        $centres->modifie_par = ' ';
        
        $centres->save();
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
        
        $centres= Centremedical::findOrFail($request->id);
        //validation
        $this->validate($request,[
            'libelle'          => 'required',
            'adresse'          => 'required',
            'description'          => 'required',
            
        ]);

        $centres->libelle = Input::get('libelle');
        $centres->adresse = Input::get('adresse');
        $centres->description = Input::get('description');
        $centres->modifie_par =  Auth::user()->name;
        
        $centres->save();

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
        $centres= Centremedical::findOrFail($request->id);
        $centres->delete($request->all());
        
        return back()->with('success', 'Suppression réussie');
        
    }
}
