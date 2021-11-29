<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sinistre;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use Carbon\Carbon;


class SinistresController extends Controller
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
        $classe_juridik=1;
        $classe_sinistr=1;

        $annee=Input::get('annee');
        $sinistrecloture=Input::get('sinistre_cloture');

        if($annee !='' && $sinistrecloture !='')  
            $sinistres=Sinistre::whereYear('date', $annee)
             ->where('sinistre_cloture' , $sinistrecloture)
             ->paginate(10);

        elseif($annee != '')
            $sinistres=Sinistre::whereYear('date',$annee)->paginate(10);
            
        elseif($sinistrecloture != '')
            $sinistres=Sinistre::where('sinistre_cloture',$sinistrecloture)->paginate(10);
        
        else
            $sinistres = Sinistre::paginate(10);        

    $selected_sinistre=Input::get('sinistre_cloture');  
    $selected_date=Input::get('annee');  
          
    $acces= new Acce;
    $acces->utilisateur= Auth::user()->name;
    $acces->page= 'Sinistres';
    $acces->date=date("Y-m-d h:i:s");
    $acces->save();           

        return view('backoffice.sinistres',compact('sinistres','selected_date','selected_sinistre','classe_sinistr','classe_accueil','classe_juridik'));
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

        $sinistres = new Sinistre;
       //Validation
       $this->validate($request,[
        'conducteur1'      => 'required',
        'date'      => 'required',
        'heure'      => 'required',
        'pays'      => 'required',
        'ville'      => 'required',
        'constat'      => 'required',
        'rapport'      => 'required',
        'commentaire'      => 'required',
        'observation'      => 'required',
        'sinistre_cloture'      => 'required',
        
    ]);
      
        $sinistres->tracteur_id= Input::get('tracteur');    
        $sinistres->semiremorque_id= Input::get('semiremorque');    
        $sinistres->conducteur1_id= Input::get('conducteur1');    
        $sinistres->conducteur2_id= Input::get('conducteur2');    
        $sinistres->date= Input::get('date');    
        $sinistres->heure= Input::get('heure');    
        $sinistres->pay_id= Input::get('pays');    
        $sinistres->ville_id= Input::get('ville');    
        $sinistres->constat= Input::get('constat');    
        $sinistres->rapport= Input::get('rapport');    
        $sinistres->commentaire= Input::get('commentaire');    
        $sinistres->autorite_proces_verbal= Input::get('autorite_proces_verbal');    
        $sinistres->renseignement_proces_verbal= Input::get('renseignement_proces_verbal');    
        $sinistres->date_proces_verbal= Input::get('date_proces_verbal');    
        $sinistres->numero_proces_verbal= Input::get('numero_proces_verbal');    
        $sinistres->immatriculation= Input::get('immatriculation');    
        $sinistres->marque= Input::get('marque');    
        $sinistres->nom_conducteur= Input::get('nom_conducteur');    
        $sinistres->prenom_conducteur= Input::get('prenom_conducteur');    
        $sinistres->cin= Input::get('cin'); 
        $sinistres->numero_permis= Input::get('numero_permis');    
        $sinistres->type_permis= Input::get('type_permis');    
        $sinistres->date_fin_permis= Input::get('date_fin_permis');    
        $sinistres->ville_permis= Input::get('ville_permis');    
        $sinistres->adresse= Input::get('adresse_permis');    
        $sinistres->compagnie_assurance= Input::get('compagnie_assurance');
        $sinistres->numero_police= Input::get('numero_police');
        $sinistres->agence_intermediaire= Input::get('agence_intermediaire');
        $sinistres->numero_attestation= Input::get('numero_attestation');
        $sinistres->adresse_assure= Input::get('adresse_assure');
        $sinistres->degats= Input::get('degats');
        $sinistres->degat_adverse= Input::get('degat_adverse');
        $sinistres->degat_materiel= Input::get('degat_materiel');
        $sinistres->degat_mortel= Input::get('degat_mortel');
        $sinistres->degat_corporel= Input::get('degat_corporel');
        $sinistres->observations= Input::get('observation');
        $sinistres->taux_remboursement= Input::get('taux_remboursement');
        $sinistres->montant_franchise= Input::get('montant_franchise');
        $sinistres->reference_sinistre= Input::get('reference_sinistre');
        $sinistres->taux_responsabilite= Input::get('taux_responsabilite');
        $sinistres->date_fin= Input::get('date_fin');
        $sinistres->circonstance_sinistre= Input::get('circonstance_sinistre');
        $sinistres->sinistre_cloture= Input::get('sinistre_cloture');
        
        $sinistres->ajoute_par = Auth::user()->name;
        $sinistres->modifie_par = ' ';

        //dd($request);
        $sinistres->save();

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
        $sinistres = Sinistre::findOrFail($request->id);
        //Validation
        $this->validate($request,[
        'tracteur'  => 'required',
        'conducteur1'      => 'required',
        'date'      => 'required',
        'heure'      => 'required',
        'pays'      => 'required',
        'ville'      => 'required',
        'constat'      => 'required',
        'rapport'      => 'required',
        'commentaire'      => 'required',
        'observation'      => 'required',
        'sinistre_cloture'      => 'required',
    ]);
      
        $sinistres->tracteur_id= Input::get('tracteur');    
        $sinistres->semiremorque_id= Input::get('semiremorque');    
        $sinistres->conducteur1_id= Input::get('conducteur1');    
        $sinistres->conducteur2_id= Input::get('conducteur2');    
        $sinistres->date= Input::get('date');    
        $sinistres->heure= Input::get('heure');    
        $sinistres->pay_id= Input::get('pays');    
        $sinistres->ville_id= Input::get('ville');    
        $sinistres->constat= Input::get('constat');    
        $sinistres->rapport= Input::get('rapport');    
        $sinistres->commentaire= Input::get('commentaire');    
        $sinistres->autorite_proces_verbal= Input::get('autorite_proces_verbal');    
        $sinistres->renseignement_proces_verbal= Input::get('renseignement_proces_verbal');    
        $sinistres->date_proces_verbal= Input::get('date_proces_verbal');    
        $sinistres->numero_proces_verbal= Input::get('numero_proces_verbal');    
        $sinistres->immatriculation= Input::get('immatriculation');    
        $sinistres->marque= Input::get('marque');    
        $sinistres->nom_conducteur= Input::get('nom_conducteur');    
        $sinistres->prenom_conducteur= Input::get('prenom_conducteur');    
        $sinistres->cin= Input::get('cin'); 
        $sinistres->numero_permis= Input::get('numero_permis');    
        $sinistres->type_permis= Input::get('type_permis');    
        $sinistres->date_fin_permis= Input::get('date_fin_permis');    
        $sinistres->ville_permis= Input::get('ville_permis');    
        $sinistres->adresse= Input::get('adresse_permis');    
        $sinistres->compagnie_assurance= Input::get('compagnie_assurance');
        $sinistres->numero_police= Input::get('numero_police');
        $sinistres->agence_intermediaire= Input::get('agence_intermediaire');
        $sinistres->numero_attestation= Input::get('numero_attestation');
        $sinistres->adresse_assure= Input::get('adresse_assure');
        $sinistres->degats= Input::get('degats');
        $sinistres->degat_adverse= Input::get('degat_adverse');
        $sinistres->degat_materiel= Input::get('degat_materiel');
        $sinistres->degat_mortel= Input::get('degat_mortel');
        $sinistres->degat_corporel= Input::get('degat_corporel');
        $sinistres->observations= Input::get('observation');
        $sinistres->taux_remboursement= Input::get('taux_remboursement');
        $sinistres->montant_franchise= Input::get('montant_franchise');
        $sinistres->reference_sinistre= Input::get('reference_sinistre');
        $sinistres->taux_responsabilite= Input::get('taux_responsabilite');
        $sinistres->date_fin= Input::get('date_fin');
        $sinistres->circonstance_sinistre= Input::get('circonstance_sinistre');
        $sinistres->sinistre_cloture= Input::get('sinistre_cloture');
        
        $sinistres->modifie_par = Auth::user()->name;

        $sinistres->save();

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
        $sinistres=Sinistre::findOrFail($request->id);
        $sinistres->delete($request->all());
        return back()->with('success', 'Suppression réussie');  
    }
    
    
}
