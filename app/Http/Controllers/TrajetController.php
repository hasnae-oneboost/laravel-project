<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Lieu;
use App\Trajet;

class TrajetController extends Controller
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
        $classe_transport=1;       
        $classe_trajets=1;
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Trajets';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        $trajets= Trajet::all();        
        return view('backoffice.trajets',compact('trajets','classe_utilisation','classe_referentiel','classe_transport','classe_trajets'));

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
       
        $this->validate($request,[

            'numero'     => 'required|unique:trajets,numero',            
            'libelle'     => 'required',
            'distance'    => 'required',
            'douane'   => 'required',
            'description'        => 'required'
        ]);
        
        $trajets= new Trajet;

        $trajets->numero = Input::get('numero');
        $trajets->distance = Input::get('distance');
        $trajets->libelle = Input::get('libelle');
        
        //get all values 'lieu de chargement' from 1 to 5
            if(Input::get('lieu_chargement1') != '' )
                $trajets->lieu_chargement1 = Input::get('lieu_chargement1');
            else
                $trajets->lieu_chargement1 =    '';
            if(Input::get('lieu_chargement2') != '' )
                $trajets->lieu_chargement2 = Input::get('lieu_chargement2');
            else
                $trajets->lieu_chargement2 =    '';    
            if(Input::get('lieu_chargement3') != '' )
                $trajets->lieu_chargement3 = Input::get('lieu_chargement3');
            else
                $trajets->lieu_chargement3 =    '';  
            if(Input::get('lieu_chargement4') != '' )
                $trajets->lieu_chargement4 = Input::get('lieu_chargement4');
            else
                $trajets->lieu_chargement4 =    '';
            if(Input::get('lieu_chargement5') != '' )
                $trajets->lieu_chargement5 = Input::get('lieu_chargement5');
            else
                $trajets->lieu_chargement5 =    '';          
       
        //get all values 'lieu de dechargement' from 1 to 5
            if(Input::get('lieu_dechargement1') != '' )
                $trajets->lieu_dechargement1 = Input::get('lieu_dechargement1');
            else
                $trajets->lieu_dechargement1 =    '';
            if(Input::get('lieu_dechargement2') != '' )
                $trajets->lieu_dechargement2 = Input::get('lieu_dechargement2');
            else
                $trajets->lieu_dechargement2 =    '';    
            if(Input::get('lieu_dechargement3') != '' )
                $trajets->lieu_dechargement3 = Input::get('lieu_dechargement3');
            else
                $trajets->lieu_dechargement3 =    '';  
            if(Input::get('lieu_dechargement4') != '' )
                $trajets->lieu_dechargement4 = Input::get('lieu_dechargement4');
            else
                $trajets->lieu_dechargement4 =    '';
            if(Input::get('lieu_dechargement5') != '' )
                $trajets->lieu_dechargement5 = Input::get('lieu_dechargement5');
            else
                $trajets->lieu_dechargement5 =    '';  
                    
        
        $trajets->description = Input::get('description');
        $trajets->douane = Input::get('douane');
        $trajets->ajoute_par = Auth::user()->name;
        $trajets->modifie_par =  '';
        
        $trajets->save();
        
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
        $trajets=Trajet::findOrFail($request->id);       
      
        $this->validate($request,[
            'numero'     => 'required|unique:trajets,numero,'.$trajets->id,            
            'libelle'     => 'required',
            'distance'    => 'required',
            'douane'   => 'required',
            'description'        => 'required'
        ]);
        
        $trajets->numero = Input::get('numero');
        $trajets->distance = Input::get('distance');
        $trajets->libelle = Input::get('libelle');
        
        //get all values 'lieu de chargement' from 1 to 5
            if(Input::get('lieu_chargement1') != '' )
                $trajets->lieu_chargement1 = Input::get('lieu_chargement1');
            else
                $trajets->lieu_chargement1 =  '';
            if(Input::get('lieu_chargement2') != '' )
                $trajets->lieu_chargement2 = Input::get('lieu_chargement2');
            else
                $trajets->lieu_chargement2 = '';    
            if(Input::get('lieu_chargement3') != '' )
                $trajets->lieu_chargement3 = Input::get('lieu_chargement3');
            else
                $trajets->lieu_chargement3 =    '';  
            if(Input::get('lieu_chargement4') != '' )
                $trajets->lieu_chargement4 = Input::get('lieu_chargement4');
            else
                $trajets->lieu_chargement4 =    '';
            if(Input::get('lieu_chargement5') != '' )
                $trajets->lieu_chargement5 = Input::get('lieu_chargement5');
            else
                $trajets->lieu_chargement5 =    '';          

        //get all values 'lieu de dechargement' from 1 to 5
            if(Input::get('lieu_dechargement1') != '' )
                $trajets->lieu_dechargement1 = Input::get('lieu_dechargement1');
            else
                $trajets->lieu_dechargement1 =    '';
            if(Input::get('lieu_dechargement2') != '' )
                $trajets->lieu_dechargement2 = Input::get('lieu_dechargement2');
            else
                $trajets->lieu_dechargement2 =    '';    
            if(Input::get('lieu_dechargement3') != '' )
                $trajets->lieu_dechargement3 = Input::get('lieu_dechargement3');
            else
                $trajets->lieu_dechargement3 =    '';  
            if(Input::get('lieu_dechargement4') != '' )
                $trajets->lieu_dechargement4 = Input::get('lieu_dechargement4');
            else
                $trajets->lieu_dechargement4 =    '';
            if(Input::get('lieu_dechargement5') != '' )
                $trajets->lieu_dechargement5 = Input::get('lieu_dechargement5');
            else
                $trajets->lieu_dechargement5 =    '';
        
                
        $trajets->description = Input::get('description');
        $trajets->douane = Input::get('douane');
        $trajets->modifie_par =Auth::user()->name;
        
        $trajets->save();
        
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
        $trajets=Trajet::findOrFail($request->id);
        $trajets->delete($request->all());
        return back()->with('success','Suppression réussie');
        
    }
}
