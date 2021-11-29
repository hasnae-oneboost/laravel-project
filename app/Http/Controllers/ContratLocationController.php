<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contratlocation;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Vehicule;
use App\Acce;
use App\Fournisseur;

class ContratLocationController extends Controller
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
        $classe_contrat_location=1;

        $code= Input::get('code');
        $fournisseur= Input::get('fournisseur');
        $vehicule= Input::get('vehicule');
        
        $typesFournisseur= Fournisseur::where('type','Fournisseur de véhicules')->get();

        if($fournisseur != '' && $vehicule != '' && $code != '')
            $contrats = Contratlocation::where('vehicule',$vehicule)
                        ->where('code',$code)                
                        ->where('fournisseur_id',$fournisseur)                
                        ->paginate(15); 
        elseif($fournisseur != '' && $vehicule != '')
            $contrats = Contratlocation::where('vehicule',$vehicule)
                        ->where('fournisseur_id',$fournisseur)                
                        ->paginate(15); 
        
        elseif($fournisseur != '' && $code != '')
            $contrats = Contratlocation::where('code',$code)
                            ->where('fournisseur_id',$fournisseur)                
                            ->paginate(15);

        elseif($vehicule != '' && $code != '')
            $contrats = Contratlocation::where('code',$code)
                        ->where('vehicule',$vehicule)                
                        ->paginate(15);

        elseif($code !='')
            $contrats = Contratlocation::where('code',$code)->paginate(15);

        elseif($fournisseur !='')
            $contrats = Contratlocation::where('fournisseur_id',$fournisseur)->paginate(15);

        elseif($vehicule !='')
            $contrats = Contratlocation::where('vehicule',$vehicule)->paginate(15);

        else
            $contrats = Contratlocation::paginate(15);

        
        //Acces
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Contrats de location';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();           

        $selected_code= Input::get('code');
        $selected_type_fournisseur= Input::get('fournisseur');
        $selected_vehicule= Input::get('vehicule');

        return view('backoffice.contrats_location',compact('selected_vehicule','selected_code','selected_type_fournisseur','typesFournisseur','contrats','classe_accueil','classe_flotte','classe_contrat_location'));
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
        
        $contrats = new Contratlocation;

        //Validation
        $this->validate($request,[
            'code'      => 'required',
            'fournisseur'      => 'required',
            'vehicule'      => 'required',
            'duree'      => 'required',
            'montant_ht'      => 'required',
            'montant_tva'      => 'required',
            'montant_ttc'      => 'required',
        ]);

        $contrats->code= Input::get('code');     
        $contrats->vehicule= Input::get('vehicule');    
        $contrats->duree= Input::get('duree');    
        $contrats->montant_ht= Input::get('montant_ht');    
        $contrats->tva= Input::get('montant_tva');    
        $contrats->montant_ttc= Input::get('montant_ttc');    
        $contrats->fournisseur_id= Input::get('fournisseur'); 
        $contrats->ajoute_par = Auth::user()->name;
        $contrats->modifie_par = ' ';

        
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
        $contrats = Contratlocation::findOrFail($request->id);

         //Validation
         $this->validate($request,[
            'code'      => 'required',
            'fournisseur'      => 'required',
            'vehicule'      => 'required',
            'duree'      => 'required',
            'montant_ht'      => 'required',
            'montant_tva'      => 'required',
            'montant_ttc'      => 'required',
        ]);

        $contrats->code= Input::get('code');     
        $contrats->vehicule= Input::get('vehicule');    
        $contrats->duree= Input::get('duree');    
        $contrats->montant_ht= Input::get('montant_ht');    
        $contrats->tva= Input::get('montant_tva');    
        $contrats->montant_ttc= Input::get('montant_ttc');    
        $contrats->fournisseur_id= Input::get('fournisseur'); 
        $contrats->modifie_par = Auth::user()->name;

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
        $contrats=Contratlocation::findOrFail($request->id);
        $contrats->delete($request->all());
        return back()->with('success', 'Suppression réussie');
                
    }
    
   
}
