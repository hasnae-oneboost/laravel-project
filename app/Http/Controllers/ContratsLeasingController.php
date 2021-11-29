<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contratsleasing;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Vehicule;
use App\Acce;
use App\Fournisseur;


class ContratsLeasingController extends Controller
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
        $classe_accueil=1;
        $classe_flotte=1;
        $classe_contrat_leasing=1;

        $num_contrat= Input::get('numContrat');
        $fournisseur= Input::get('fournisseur');
        $dateContrat= Input::get('dateContrat');

        $typesFournisseur= Fournisseur::where('type','Fournisseur de véhicules')->get();

        if($fournisseur != '' && $dateContrat != '' && $num_contrat != '')
            $contrats = Contratsleasing::where('date_contrat',$dateContrat)
                        ->where('numero_contrat',$num_contrat)                
                        ->where('fournisseur_id',$fournisseur)                
                        ->paginate(15); 
        elseif($fournisseur != '' && $dateContrat != '')
            $contrats = Contratsleasing::where('date_contrat',$dateContrat)
                        ->where('fournisseur_id',$fournisseur)                
                        ->paginate(15); 
        
        elseif($fournisseur != '' && $num_contrat != '')
            $contrats = Contratsleasing::where('numero_contrat',$num_contrat)
                            ->where('fournisseur_id',$fournisseur)                
                            ->paginate(15);

        elseif($dateContrat != '' && $num_contrat != '')
            $contrats = Contratsleasing::where('numero_contrat',$num_contrat)
                        ->where('date_contrat',$dateContrat)                
                        ->paginate(15);

        elseif($num_contrat !='')
            $contrats = Contratsleasing::where('numero_contrat',$num_contrat)->paginate(15);

        elseif($fournisseur !='')
            $contrats = Contratsleasing::where('fournisseur_id',$fournisseur)->paginate(15);

        elseif($dateContrat !='')
            $contrats = Contratsleasing::where('date_contrat',$dateContrat)->paginate(15);

        else
            $contrats = Contratsleasing::paginate(15);

        
        //Acces
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Contrats de leasing';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();           

        $selected_num_contrat= Input::get('numContrat');
        $selected_type_fournisseur= Input::get('fournisseur');
        $selected_date= Input::get('dateContrat');

        return view('backoffice.contrats_leasing',compact('selected_date','selected_num_contrat','selected_type_fournisseur','typesFournisseur','contrats','classe_accueil','classe_flotte','classe_contrat_leasing'));
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
        $contrats = new Contratsleasing;

        //Validation
        $this->validate($request,[
            'numero_contrat'      => 'required',
            'fournisseur'      => 'required',
            'vehicule'      => 'required',
            'date_contrat'      => 'required',
            'date_premier_prelevement'      => 'required',
            'date_fin_contrat'      => 'required',
            'duree'      => 'required|numeric',
            'date_reception'      => 'required',
            'description'      => 'required',
            'montant_contrat_ht'      => 'required',
            'montant_prelevement_ttc'      => 'required',
            'montant_valeur_residuelle'      => 'required',
            ]);

        $contrats->numero_contrat= Input::get('numero_contrat');     
        $contrats->date_contrat= Input::get('date_contrat');    
        $contrats->date_premier_prelevement= Input::get('date_premier_prelevement');    
        $contrats->date_fin_contrat= Input::get('date_fin_contrat');    
        $contrats->duree= Input::get('duree');    
        $contrats->date_reception= Input::get('date_reception');    
        $contrats->description= Input::get('description');    
        $contrats->montant_contrat_ht= Input::get('montant_contrat_ht');    
        $contrats->montant_prelevement_ttc= Input::get('montant_prelevement_ttc');    
        $contrats->montant_valeur_residuelle= Input::get('montant_valeur_residuelle'); 
        $contrats->fournisseur_id= Input::get('fournisseur'); 
        $contrats->ajoute_par = Auth::user()->name;
        $contrats->modifie_par = ' ';

        $vehicule =implode(', ',Input::get('vehicule'));
        
        $contrats->vehicule = $vehicule;
        $contrats->save(); 
           
        return back()->with('success','Ajout réussi');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer  $id
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
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $contrats = Contratsleasing::findOrFail($request->id);

         //Validation
       $this->validate($request,[
        'numero_contrat'      => 'required',
        'fournisseur'      => 'required',
        'vehicule'      => 'required',
        'date_contrat'      => 'required',
        'date_premier_prelevement'      => 'required',
        'date_fin_contrat'      => 'required',
        'duree'      => 'required',
        'date_reception'      => 'required',
        'description'      => 'required',
        'montant_contrat_ht'      => 'required',
        'montant_prelevement_ttc'      => 'required',
        'montant_valeur_residuelle'      => 'required',
        ]);
      
        $contrats->numero_contrat= Input::get('numero_contrat');    

        $contrats->fournisseur_id= Input::get('fournisseur');  
        //vehicule

        $contrats->date_contrat= Input::get('date_contrat');    
        $contrats->date_premier_prelevement= Input::get('date_premier_prelevement');    
        $contrats->date_fin_contrat= Input::get('date_fin_contrat');    
        $contrats->duree= Input::get('duree');    
        $contrats->date_reception= Input::get('date_reception');    
        $contrats->description= Input::get('description');    
        $contrats->montant_contrat_ht= Input::get('montant_contrat_ht');    
        $contrats->montant_prelevement_ttc= Input::get('montant_prelevement_ttc');    
        $contrats->montant_valeur_residuelle= Input::get('montant_valeur_residuelle');    
        $contrats->modifie_par = Auth::user()->name;
        
        $vehicule =implode(', ',Input::get('vehicule'));
        
        $contrats->vehicule = $vehicule;       
        $contrats->save();

        return back()->with('success','Modification réussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $contrats=Contratsleasing::findOrFail($request->id);
        $contrats->delete($request->all());
        return back()->with('success', 'Suppression réussie');
                
    }
    
   
}
