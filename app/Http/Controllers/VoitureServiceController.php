<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicule;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Marque;
use App\Gamme;
use App\Modele;
use App\Parc;
use App\Entreprise;
use PDF;
use App\{Documentsvoitureservice,Voituresservicesphoto};

class VoitureServiceController extends Controller
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
        $classe_parcs=1;
        $classe_voiture_service=1;

            $parc= Input::get('parc');
            $marque= Input::get('marque');
            $gamme= Input::get('gamme');

            $marques= Marque::all();
            $gammes= Gamme::all();
            $parcs = Parc::all();
            
            if($parc != '' && $gamme != '' && $marque != '')
                $voitureservice = Vehicule::where('parc_id',$parc)
                            ->where('marque_id',$marque)
                            ->where('gamme_id',$gamme)
                            ->where('type_vehicule','Voiture de service')
                            ->paginate(15);
            elseif($parc != '' && $gamme != '')
                $voitureservice = Vehicule::where('parc_id',$parc)
                ->where('gamme_id',$gamme)
                ->where('type_vehicule','Voiture de service')
                ->paginate(15);                
            elseif($gamme != '' && $marque != '')
                $voitureservice = Vehicule::where('marque_id',$marque)
                ->where('gamme_id',$gamme)
                ->where('type_vehicule','Voiture de service')
                ->paginate(15);                
            elseif($parc != '' && $marque != '')
                $voitureservice = Vehicule::where('parc_id',$parc)
                ->where('marque_id',$marque)
                ->where('type_vehicule','Voiture de service')
                ->paginate(15);
            elseif($parc != '')
                $voitureservice = Vehicule::where('parc_id',$parc) ->where('type_vehicule','Voiture de service')->paginate(15);
            elseif($gamme != '') 
                $voitureservice = Vehicule::where('gamme_id',$gamme)->where('type_vehicule','Voiture de service')->paginate(15);
            elseif($marque != '') 
                $voitureservice = Vehicule::where('marque_id',$marque)->where('type_vehicule','Voiture de service')->paginate(15);        
            else
                $voitureservice = Vehicule::where('type_vehicule','Voiture de service')->paginate(15);
                
            $selected_parc=Input::get('parc');
            $selected_marque= Input::get('marque');
            $selected_gamme= Input::get('gamme');
        
            $acces= new Acce;
            $acces->utilisateur= Auth::user()->name;
            $acces->page= 'Voitures de service';
            $acces->date=date("Y-m-d h:i:s");
            $acces->save();           

        return view('backoffice.voitures_service',compact('selected_marque','selected_gamme','selected_parc','parcs','gammes','marques','voitureservice','classe_parcs','classe_accueil','classe_flotte','classe_voiture_service'));
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
        $voitureservice = new Vehicule;
       //Validation
       $this->validate($request,[
        'parc'      => 'required',
        'marque'      => 'required',
        'gamme'      => 'required',
        'confort'      => 'required',
        'modele'      => 'required',
        'immatriculation'      => 'required',
        'code'      => 'required',
        'numero_ordre'      => 'required',
        'numero_imputation'      => 'required',
        'type_acquisition'      => 'required',
        'numero_ww'      => 'required',
        'numero_carte_grise'      => 'required',
        'numero_chassis'      => 'required',
        'date_entree_parc'      => 'required',
        'date_mise_en_circulation'      => 'required',
        'date_restitution'      => 'required',
        'date_recepisse'      => 'required',
        'couleur'      => 'required',
        'code_cle'      => 'required',
        'description'      => 'required',
        'prestataire'      => 'required',
    ]);
      
        $voitureservice->parc_id= Input::get('parc');    
        $voitureservice->marque_id= Input::get('marque');    
        $voitureservice->gamme_id= Input::get('gamme');    
        $voitureservice->confort_id= Input::get('confort');    
        $voitureservice->modele_id= Input::get('modele');    
        $voitureservice->immatriculation= Input::get('immatriculation');    
        $voitureservice->code= Input::get('code');    
        $voitureservice->numero_ordre= Input::get('numero_ordre');    
        $voitureservice->numero_imputation= Input::get('numero_imputation');    
        $voitureservice->type_acquisition_id= Input::get('type_acquisition');    
        $voitureservice->numero_ww= Input::get('numero_ww');    
        $voitureservice->numero_carte_grise= Input::get('numero_carte_grise');    
        $voitureservice->numero_chassis= Input::get('numero_chassis');    
        $voitureservice->date_entree_parc= Input::get('date_entree_parc');    
        $voitureservice->date_mise_en_circulation= Input::get('date_mise_en_circulation');    
        $voitureservice->date_restitution= Input::get('date_restitution');    
        $voitureservice->date_recepisse= Input::get('date_recepisse');    
        $voitureservice->couleur= Input::get('couleur');    
        $voitureservice->code_cle= Input::get('code_cle');    
        $voitureservice->description= Input::get('description'); 
        if(Input::get('prestataire') == 'DSH TRANS'){
            $voitureservice->prestataire= Input::get('prestataire');    
            $voitureservice->prestataire_id= null;    
        }
        else{
            $voitureservice->prestataire_id= Input::get('prestataire');
            $voitureservice->prestataire= ' ';
        }

        $voitureservice->type_vehicule = 'Voiture de service';        
        $voitureservice->ajoute_par = Auth::user()->name;
        $voitureservice->modifie_par = ' ';

        //dd($request);
        $voitureservice->save();

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
        $voitureservice = Vehicule::findOrFail($request->id);

         //Validation
       $this->validate($request,[
        'parc'      => 'required',
        'marque'      => 'required',
        'gamme'      => 'required',
        'confort'      => 'required',
        'modele'      => 'required',
        'immatriculation'      => 'required',
        'code'      => 'required',
        'numero_ordre'      => 'required',
        'numero_imputation'      => 'required',
        'type_acquisition'      => 'required',
        'numero_ww'      => 'required',
        'numero_carte_grise'      => 'required',
        'numero_chassis'      => 'required',
        'date_entree_parc'      => 'required',
        'date_mise_en_circulation'      => 'required',
        'date_restitution'      => 'required',
        'date_recepisse'      => 'required',
        'couleur'      => 'required',
        'code_cle'      => 'required',
        'description'      => 'required',
        'prestataire'      => 'required',
        
    ]);
      
        $voitureservice->parc_id= Input::get('parc');    
        $voitureservice->marque_id= Input::get('marque');    
        $voitureservice->gamme_id= Input::get('gamme');    
        $voitureservice->confort_id= Input::get('confort');    
        $voitureservice->modele_id= Input::get('modele');    
        $voitureservice->immatriculation= Input::get('immatriculation');    
        $voitureservice->code= Input::get('code');    
        $voitureservice->numero_ordre= Input::get('numero_ordre');    
        $voitureservice->numero_imputation= Input::get('numero_imputation');    
        $voitureservice->type_acquisition_id= Input::get('type_acquisition');    
        $voitureservice->numero_ww= Input::get('numero_ww');    
        $voitureservice->numero_carte_grise= Input::get('numero_carte_grise');    
        $voitureservice->numero_chassis= Input::get('numero_chassis');    
        $voitureservice->date_entree_parc= Input::get('date_entree_parc');    
        $voitureservice->date_mise_en_circulation= Input::get('date_mise_en_circulation');    
        $voitureservice->date_restitution= Input::get('date_restitution');    
        $voitureservice->date_recepisse= Input::get('date_recepisse');    
        $voitureservice->couleur= Input::get('couleur');    
        $voitureservice->code_cle= Input::get('code_cle');    
        $voitureservice->description= Input::get('description'); 
        if(Input::get('prestataire') == 'DSH TRANS'){
            $voitureservice->prestataire= Input::get('prestataire');    
            $voitureservice->prestataire_id= null;    
        }
        else{
            $voitureservice->prestataire_id= Input::get('prestataire');
            $voitureservice->prestataire= ' ';
        }   
        $voitureservice->modifie_par = Auth::user()->name;
        $voitureservice->type_vehicule = 'Voiture de service';
        

        $voitureservice->save();

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
        $voitureservice=Vehicule::findOrFail($request->id);
        $voitureservice->delete($request->all());
        return back()->with('success', 'Suppression réussie');
                
    }
    
    public function ToPDF($id){
        $entreprise = Entreprise::findOrFail(1);
        $voitureservice=Vehicule::findOrFail($id);
        $docvoitureservice = Documentsvoitureservice::where('voiture_id',$id)->where('alerte','oui')->get();
        $voitureservicephotos = Voituresservicesphoto::where('voiture_id',$id)->get();
       
        $pdf = PDF::loadView('backoffice.imprimer_informations_voiture_service', compact('voitureservicephotos','docvoitureservice','voitureservice','entreprise'));
        return $pdf->download('informations_voiture_service_'.$voitureservice->immatriculation.'.pdf');        
    }
}
