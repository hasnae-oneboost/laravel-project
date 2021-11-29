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
use App\{Documentsemiremorque,Semiremorquesphoto};

class SemiRemorqueController extends Controller
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
        $classe_semi_remorque=1;

            $parc= Input::get('parc');
            $marque= Input::get('marque');
            $gamme= Input::get('gamme');

            $marques= Marque::all();
            $gammes= Gamme::all();
            $parcs = Parc::all();
            
            if($parc != '' && $gamme != '' && $marque != '')
                $semiremorques = Vehicule::where('parc_id',$parc)
                            ->where('marque_id',$marque)
                            ->where('gamme_id',$gamme)
                            ->where('type_vehicule','Semi-remorque')
                            ->paginate(15);
            elseif($parc != '' && $gamme != '')
                $semiremorques = Vehicule::where('parc_id',$parc)
                ->where('gamme_id',$gamme)
                ->where('type_vehicule','Semi-remorque')
                ->paginate(15);                
            elseif($gamme != '' && $marque != '')
                $semiremorques = Vehicule::where('marque_id',$marque)
                ->where('gamme_id',$gamme)
                ->where('type_vehicule','Semi-remorque')
                ->paginate(15);                
            elseif($parc != '' && $marque != '')
                $semiremorques = Vehicule::where('parc_id',$parc)
                ->where('marque_id',$marque)
                ->where('type_vehicule','Semi-remorque')
                ->paginate(15);
            elseif($parc != '')
                $semiremorques = Vehicule::where('parc_id',$parc)->where('type_vehicule','Semi-remorque')->paginate(15);
            elseif($gamme != '') 
                $semiremorques = Vehicule::where('gamme_id',$gamme)->where('type_vehicule','Semi-remorque')->paginate(15);
            elseif($marque != '') 
                $semiremorques = Vehicule::where('marque_id',$marque)->where('type_vehicule','Semi-remorque')->paginate(15);        
            else
                $semiremorques = Vehicule::where('type_vehicule','Semi-remorque')->paginate(15);
                
            $selected_parc=Input::get('parc');
            $selected_marque= Input::get('marque');
            $selected_gamme= Input::get('gamme');
        
            $acces= new Acce;
            $acces->utilisateur= Auth::user()->name;
            $acces->page= 'Semi-remorques';
            $acces->date=date("Y-m-d h:i:s");
            $acces->save();           

        return view('backoffice.semi_remorques',compact('selected_marque','selected_gamme','selected_parc','parcs','gammes','marques','semiremorques','classe_parcs','classe_accueil','classe_flotte','classe_semi_remorque'));
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
        $semiremorques = new Vehicule;
       //Validation
       $this->validate($request,[
        'parc'      => 'required',
        'marque'      => 'required',
        'gamme'      => 'required',
        'confort'      => 'required',
        'type'      => 'required',
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
      
        $semiremorques->parc_id= Input::get('parc');    
        $semiremorques->marque_id= Input::get('marque');    
        $semiremorques->gamme_id= Input::get('gamme');    
        $semiremorques->confort_id= Input::get('confort');    
        $semiremorques->type_id= Input::get('type');    
        $semiremorques->modele_id= Input::get('modele');    
        $semiremorques->immatriculation= Input::get('immatriculation');    
        $semiremorques->code= Input::get('code');    
        $semiremorques->numero_ordre= Input::get('numero_ordre');    
        $semiremorques->numero_imputation= Input::get('numero_imputation');    
        $semiremorques->type_acquisition_id= Input::get('type_acquisition');    
        $semiremorques->numero_ww= Input::get('numero_ww');    
        $semiremorques->numero_carte_grise= Input::get('numero_carte_grise');    
        $semiremorques->numero_chassis= Input::get('numero_chassis');    
        $semiremorques->date_entree_parc= Input::get('date_entree_parc');    
        $semiremorques->date_mise_en_circulation= Input::get('date_mise_en_circulation');    
        $semiremorques->date_restitution= Input::get('date_restitution');    
        $semiremorques->date_recepisse= Input::get('date_recepisse');    
        $semiremorques->couleur= Input::get('couleur');    
        $semiremorques->code_cle= Input::get('code_cle');    
        $semiremorques->description= Input::get('description'); 
        if(Input::get('prestataire') == 'DSH TRANS'){
            $semiremorques->prestataire= Input::get('prestataire');    
            $semiremorques->prestataire_id= null;    
        }
        else{
            $semiremorques->prestataire_id= Input::get('prestataire');
            $semiremorques->prestataire= ' ';
        }

        $semiremorques->type_vehicule ='Semi-remorque';
        
        $semiremorques->ajoute_par = Auth::user()->name;
        $semiremorques->modifie_par = ' ';

        //dd($request);
        $semiremorques->save();

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
        $semiremorques = Vehicule::findOrFail($request->id);
            //Validation
            $this->validate($request,[
                'parc'      => 'required',
                'marque'      => 'required',
                'gamme'      => 'required',
                'confort'      => 'required',
                'type'      => 'required',
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
        
        $semiremorques->parc_id= Input::get('parc');    
        $semiremorques->marque_id= Input::get('marque');    
        $semiremorques->gamme_id= Input::get('gamme');    
        $semiremorques->confort_id= Input::get('confort');    
        $semiremorques->type_id= Input::get('type');    
        $semiremorques->modele_id= Input::get('modele');    
        $semiremorques->immatriculation= Input::get('immatriculation');    
        $semiremorques->code= Input::get('code');    
        $semiremorques->numero_ordre= Input::get('numero_ordre');    
        $semiremorques->numero_imputation= Input::get('numero_imputation');    
        $semiremorques->type_acquisition_id= Input::get('type_acquisition');    
        $semiremorques->numero_ww= Input::get('numero_ww');    
        $semiremorques->numero_carte_grise= Input::get('numero_carte_grise');    
        $semiremorques->numero_chassis= Input::get('numero_chassis');    
        $semiremorques->date_entree_parc= Input::get('date_entree_parc');    
        $semiremorques->date_mise_en_circulation= Input::get('date_mise_en_circulation');    
        $semiremorques->date_restitution= Input::get('date_restitution');    
        $semiremorques->date_recepisse= Input::get('date_recepisse');    
        $semiremorques->couleur= Input::get('couleur');    
        $semiremorques->code_cle= Input::get('code_cle');    
        $semiremorques->description= Input::get('description'); 

        if(Input::get('prestataire') == 'DSH TRANS'){
            $semiremorques->prestataire= Input::get('prestataire');    
            $semiremorques->prestataire_id= null;    
        }
        else{
            $semiremorques->prestataire_id= Input::get('prestataire');
            $semiremorques->prestataire= ' ';
        }   
        
        $semiremorques->type_vehicule ='Semi-remorque';
        
        $semiremorques->modifie_par = Auth::user()->name;

        $semiremorques->save();

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
        $semiremorques=Vehicule::findOrFail($request->id);
        $semiremorques->delete($request->all());
        return back()->with('success', 'Suppression réussie');  
    }
    
    public function ToPDF($id){
        $entreprise = Entreprise::findOrFail(1);
        $semiremorques=Vehicule::findOrFail($id);
        $docSemiremorques  = Documentsemiremorque::where('semiremorque_id',$id)->where('alerte','oui')->get();
        $semiremorquephotos = Semiremorquesphoto::where('semiremorque_id',$id)->get();
        $pdf = PDF::loadView('backoffice.imprimer_informations_semi_remorque', compact('semiremorquephotos','docSemiremorques','semiremorques','entreprise'));
        return $pdf->download('informations_semi_remorque_'.$semiremorques->immatriculation.'.pdf');        
    }
}

