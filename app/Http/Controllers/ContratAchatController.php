<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contratachat;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Vehicule;
use App\Acce;
use App\Fournisseur;

class ContratAchatController extends Controller
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
        $classe_contrat_achat=1;
        $code= Input::get('code');
        $fournisseur= Input::get('fournisseur');
        $dateAchat= Input::get('dateAchat');
        $typesFournisseur= Fournisseur::where('type','Fournisseur de véhicules')->get();

        if($fournisseur != '' && $dateAchat != '' && $code != '')
            $contrats = Contratachat::where('date_achat',$dateAchat)
                        ->where('code',$code)                
                        ->where('fournisseur_id',$fournisseur)                
                        ->paginate(15); 
        elseif($fournisseur != '' && $dateAchat != '')
            $contrats = Contratachat::where('date_achat',$dateAchat)
                        ->where('fournisseur_id',$fournisseur)                
                        ->paginate(15); 
        
        elseif($fournisseur != '' && $code != '')
            $contrats = Contratachat::where('code',$code)
                            ->where('fournisseur_id',$fournisseur)                
                            ->paginate(15);

        elseif($dateAchat != '' && $code != '')
            $contrats = Contratachat::where('code',$code)
                        ->where('date_achat',$dateAchat)                
                        ->paginate(15);

        elseif($code !='')
            $contrats = Contratachat::where('code',$code)->paginate(15);

        elseif($fournisseur !='')
            $contrats = Contratachat::where('fournisseur_id',$fournisseur)->paginate(15);

        elseif($dateAchat !='')
            $contrats = Contratachat::where('date_achat',$dateAchat)->paginate(15);

        else
            $contrats = Contratachat::paginate(15);

        
        //Acces
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Contrats d achat';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();           

        $selected_code= Input::get('code');
        $selected_type_fournisseur= Input::get('fournisseur');
        $selected_date= Input::get('dateAchat');

        return view('backoffice.contrats_achat',compact('selected_date','selected_code','selected_type_fournisseur','typesFournisseur','contrats','classe_accueil','classe_flotte','classe_contrat_achat'));
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
        
        $contrats = new Contratachat;

        //Validation
        $this->validate($request,[
            'code'      => 'required',
            'fournisseur'      => 'required',
            'vehicule'      => 'required',
            'date_achat'      => 'required',
            'garantie'      => 'required',
            'montant_ht'      => 'required',
            'montant_tva'      => 'required|numeric',
            'montant_ttc'      => 'required',
        ]);

        $contrats->code= Input::get('code');     
        $contrats->date_achat= Input::get('date_achat');    
        $contrats->garantie= Input::get('garantie');    
        $contrats->montant_ht= Input::get('montant_ht');    
        $contrats->tva= Input::get('montant_tva');    
        $contrats->montant_ttc= Input::get('montant_ttc');    
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
        $contrats = Contratachat::findOrFail($request->id);

        //Validation
        $this->validate($request,[
            'code'      => 'required',
            'fournisseur'      => 'required',
            'vehicule'      => 'required',
            'date_achat'      => 'required',
            'garantie'      => 'required',
            'montant_ht'      => 'required',
            'montant_tva'      => 'required|numeric',
            'montant_ttc'      => 'required',
        ]);

        $contrats->code= Input::get('code');     
        $contrats->date_achat= Input::get('date_achat');    
        $contrats->garantie= Input::get('garantie');    
        $contrats->montant_ht= Input::get('montant_ht');    
        $contrats->tva= Input::get('montant_tva');    
        $contrats->montant_ttc= Input::get('montant_ttc');    
        $contrats->fournisseur_id= Input::get('fournisseur'); 
        $contrats->ajoute_par = Auth::user()->name;
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
        $contrats=Contratachat::findOrFail($request->id);
        $contrats->delete($request->all());
        return back()->with('success', 'Suppression réussie');
                
    }
    
   
}
