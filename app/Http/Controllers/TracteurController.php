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
use App\Documenttracteur;
use App\Tracteursphoto;

class TracteurController extends Controller
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
        $classe_tracteur=1;

            $parc= Input::get('parc');
            $marque= Input::get('marque');
            $gamme= Input::get('gamme');

            $marques= Marque::all();
            $gammes= Gamme::all();
            $parcs = Parc::all();
            
            if($parc != '' && $gamme != '' && $marque != '')
                $tracteurs = Vehicule::where('parc_id',$parc)
                            ->where('marque_id',$marque)
                            ->where('gamme_id',$gamme)
                            ->where('type_vehicule','Tracteur')
                            ->paginate(15);
            elseif($parc != '' && $gamme != '')
                $tracteurs = Vehicule::where('parc_id',$parc)
                ->where('gamme_id',$gamme)
                ->where('type_vehicule','Tracteur')
                ->paginate(15);                
            elseif($gamme != '' && $marque != '')
                $tracteurs = Vehicule::where('marque_id',$marque)
                ->where('gamme_id',$gamme)
                ->where('type_vehicule','Tracteur')
                ->paginate(15);                
            elseif($parc != '' && $marque != '')
                $tracteurs = Vehicule::where('parc_id',$parc)
                ->where('marque_id',$marque)
                ->where('type_vehicule','Tracteur')
                ->paginate(15);
            elseif($parc != '')
                $tracteurs = Vehicule::where('parc_id',$parc)->where('type_vehicule','Tracteur')->paginate(15);
            elseif($gamme != '') 
                $tracteurs = Vehicule::where('gamme_id',$gamme)->where('type_vehicule','Tracteur')->paginate(15);
            elseif($marque != '') 
                $tracteurs = Vehicule::where('marque_id',$marque)->where('type_vehicule','Tracteur')->paginate(15);        
            else
                $tracteurs = Vehicule::where('type_vehicule','Tracteur')->paginate(15);
                
            $selected_parc=Input::get('parc');
            $selected_marque= Input::get('marque');
            $selected_gamme= Input::get('gamme');
        
            $acces= new Acce;
            $acces->utilisateur= Auth::user()->name;
            $acces->page= 'Vehicules';
            $acces->date=date("Y-m-d h:i:s");
            $acces->save();

            

        return view('backoffice.tracteurs',compact('selected_marque','selected_gamme','selected_parc','parcs','gammes','marques','tracteurs','classe_parcs','classe_accueil','classe_flotte','classe_tracteur'));
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
        $tracteurs = new Vehicule;
       //Validation
       $this->validate($request,[
        'parc'      => 'required',
        'marque'      => 'required',
        'gamme'      => 'required',
        'confort'      => 'required',
        'categorie'      => 'required',
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
      
        $tracteurs->parc_id= Input::get('parc');    
        $tracteurs->marque_id= Input::get('marque');    
        $tracteurs->gamme_id= Input::get('gamme');    
        $tracteurs->confort_id= Input::get('confort');    
        $tracteurs->categorie_id= Input::get('categorie');    
        $tracteurs->modele_id= Input::get('modele');    
        $tracteurs->immatriculation= Input::get('immatriculation');    
        $tracteurs->code= Input::get('code');    
        $tracteurs->numero_ordre= Input::get('numero_ordre');    
        $tracteurs->numero_imputation= Input::get('numero_imputation');    
        $tracteurs->type_acquisition_id= Input::get('type_acquisition');    
        $tracteurs->numero_ww= Input::get('numero_ww');    
        $tracteurs->numero_carte_grise= Input::get('numero_carte_grise');    
        $tracteurs->numero_chassis= Input::get('numero_chassis');    
        $tracteurs->date_entree_parc= Input::get('date_entree_parc');    
        $tracteurs->date_mise_en_circulation= Input::get('date_mise_en_circulation');    
        $tracteurs->date_restitution= Input::get('date_restitution');    
        $tracteurs->date_recepisse= Input::get('date_recepisse');    
        $tracteurs->couleur= Input::get('couleur');    
        $tracteurs->code_cle= Input::get('code_cle');    
        $tracteurs->description= Input::get('description'); 
        if(Input::get('prestataire') == 'DSH TRANS'){
            $tracteurs->prestataire= Input::get('prestataire');    
            $tracteurs->prestataire_id= null;    
        }
        else{
            $tracteurs->prestataire_id= Input::get('prestataire');
            $tracteurs->prestataire= ' ';
        }
        $tracteurs->type_vehicule = 'Tracteur';
        
        $tracteurs->ajoute_par = Auth::user()->name;
        $tracteurs->modifie_par = ' ';

        //dd($request);
        $tracteurs->save();

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
        $tracteurs = Vehicule::findOrFail($request->id);

         //Validation
       $this->validate($request,[
        'parc'      => 'required',
        'marque'      => 'required',
        'gamme'      => 'required',
        'confort'      => 'required',
        'categorie'      => 'required',
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
      
        $tracteurs->parc_id= Input::get('parc');    
        $tracteurs->marque_id= Input::get('marque');    
        $tracteurs->gamme_id= Input::get('gamme');    
        $tracteurs->confort_id= Input::get('confort');    
        $tracteurs->categorie_id= Input::get('categorie');    
        $tracteurs->modele_id= Input::get('modele');    
        $tracteurs->immatriculation= Input::get('immatriculation');    
        $tracteurs->code= Input::get('code');    
        $tracteurs->numero_ordre= Input::get('numero_ordre');    
        $tracteurs->numero_imputation= Input::get('numero_imputation');    
        $tracteurs->type_acquisition_id= Input::get('type_acquisition');    
        $tracteurs->numero_ww= Input::get('numero_ww');    
        $tracteurs->numero_carte_grise= Input::get('numero_carte_grise');    
        $tracteurs->numero_chassis= Input::get('numero_chassis');    
        $tracteurs->date_entree_parc= Input::get('date_entree_parc');    
        $tracteurs->date_mise_en_circulation= Input::get('date_mise_en_circulation');    
        $tracteurs->date_restitution= Input::get('date_restitution');    
        $tracteurs->date_recepisse= Input::get('date_recepisse');    
        $tracteurs->couleur= Input::get('couleur');    
        $tracteurs->code_cle= Input::get('code_cle');    
        $tracteurs->description= Input::get('description'); 

        if(Input::get('prestataire') == 'DSH TRANS'){
            $tracteurs->prestataire= Input::get('prestataire');    
            $tracteurs->prestataire_id= null;    
        }
        else{
            $tracteurs->prestataire_id= Input::get('prestataire');
            $tracteurs->prestataire= ' ';
        } 

        $tracteurs->type_vehicule = 'Tracteur';  
        $tracteurs->modifie_par = Auth::user()->name;

        $tracteurs->save();

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
        $tracteurs=Vehicule::findOrFail($request->id);
        $tracteurs->delete($request->all());
        return back()->with('success', 'Suppression réussie');            
    }
    
    public function ToPDF($id){
        $entreprise = Entreprise::findOrFail(1);
        $tracteurs=Vehicule::findOrFail($id);
        $documentstracteurs = Documenttracteur::where('tracteur_id',$id)->where('alerte','oui')->get();
        $tracteurphotos = Tracteursphoto::where('tracteur_id',$id)->get();
        
        $pdf = PDF::loadView('backoffice.imprimer_informations', compact('tracteurs','entreprise','tracteurphotos','documentstracteurs'));
        return $pdf->download('informations_tracteur_'.$tracteurs->immatriculation.'.pdf');        
    }
}
