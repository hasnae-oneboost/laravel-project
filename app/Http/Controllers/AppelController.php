<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\{Appel,Client};
use Auth;
use App\User;
use App\Acce;
use Session;

class AppelController extends Controller
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
    public function index($id)    
    {
        $classe_referentiel=1;
        $classe_transprt=1;
        $classe_client=1;
              
        $client=Client::find($id);
            
        $appel=Appel::where('client',$id)->get()->all();
      

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Appel';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.appel',compact('appel','classe_client','classe_referentiel','classe_transprt','client'));
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
        $appels =new Appel;  
        
        //Validation
        $this->validate($request,[
            'date_heure'   => 'required',
            'resume_appel'   => 'required',
            'prochain_appel'   => 'required',
        ]);
        $appels->fournisseur= null;        
        $appels->client= $request->client_id;
        $appels->date_heure= Input::get('date_heure');
        $appels->resume_appel= Input::get('resume_appel');
        $appels->prochain_appel= Input::get('prochain_appel');
        
        $appels->save();

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
       
        $appels=Appel::findOrFail($request->id);    
        
        //Validation
        $this->validate($request,[
            'date_heure'   => 'required',
            'resume_appel'   => 'required',
            'prochain_appel'   => 'required',
        ]);

        $appels->fournisseur= null;               
        $appels->client= Input::get('client_id');
        $appels->date_heure= Input::get('date_heure');             
        $appels->resume_appel= Input::get('resume_appel');
        $appels->prochain_appel= Input::get('prochain_appel');
        
        $appels->save();

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
        $appels= Appel::findOrFail($request->id);
        $appels->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
