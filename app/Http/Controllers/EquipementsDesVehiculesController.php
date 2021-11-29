<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Equipementsvehicule;
use Auth;
use App\User;
use App\Acce;
use App\{Vehicule,Equipementvehicule,fournisseur,Typeequipementvehicule};

class EquipementsDesVehiculesController extends Controller
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
        $classe_equipement_vehicule=1;
        
       // $equipementsvehicules= Equipementsvehicule::all();
        $vehicules= Vehicule::where('prestataire','DSH TRANS')->get();
        $fournisseurs= Fournisseur::where('type','Fournisseur de vehicules')->get();
        $equipements = Equipementvehicule::all();
        $typesequipement = Typeequipementvehicule::all();   

        $vehicule= Input::get('vehicule');
        $libelle= Input::get('libelle');
        $type_equipement= Input::get('type_equipement');


        if($vehicule != '' && $type_equipement != '' && $libelle != '')
            $equipementsvehicules = Equipementsvehicule::where('vehicule_id',$vehicule)
                    ->where('libelle',$libelle)
                    ->where('type_id',$type_equipement)
                    ->paginate(15);
        elseif($vehicule != '' && $type_equipement != '')
            $equipementsvehicules = Equipementsvehicule::where('vehicule_id',$vehicule)
            ->where('type_id',$type_equipement)
            ->paginate(15);                
        elseif($type_equipement != '' && $libelle != '')
            $equipementsvehicules = Equipementsvehicule::where('libelle',$libelle)
            ->where('type_id',$type_equipement)
            ->paginate(15);                
        elseif($vehicule != '' && $libelle != '')
            $equipementsvehicules = Equipementsvehicule::where('vehicule_id',$vehicule)
            ->where('libelle',$libelle)
            ->paginate(15);
        elseif($vehicule != '')
            $equipementsvehicules = Equipementsvehicule::where('vehicule_id',$vehicule)->paginate(15);
        elseif($type_equipement != '') 
            $equipementsvehicules = Equipementsvehicule::where('type_id',$type_equipement)->paginate(15);
        elseif($libelle != '') 
            $equipementsvehicules = Equipementsvehicule::where('libelle',$libelle)->paginate(15);        
        else
            $equipementsvehicules = Equipementsvehicule::paginate(10);   


        $selected_vehicule=Input::get('vehicule');
        $selected_libelle= Input::get('libelle');
        $selected_type_equipement= Input::get('type_equipement');
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Equipements des véhicules';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.equipements_vehicules',compact('selected_type_equipement','selected_libelle','selected_vehicule','equipementsvehicules','fournisseurs','typesequipement','equipements','vehicules','classe_accueil','classe_flotte','classe_equipement_vehicule'));
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
        $equipements= new Equipementsvehicule;

        
        //Validation
        $this->validate($request,[
            'vehicule'       => 'required',
            'libelle'   => 'required',
            'code'   => 'required',
            'type_equipement'   => 'required',
            'equipement'   => 'required',
            'fournisseur'   => 'required',
            'date_affectation'   => 'required',
            'description'   => 'required',
            'date_debut'   => 'required',
            'date_fin'   => 'required',
            'montant_ht'   => 'required',
            'montant_tva'   => 'required',
            'montant_ttc'   => 'required',

        ]);

        $equipements->vehicule_id= Input::get('vehicule');
        $equipements->libelle= Input::get('libelle');
        $equipements->code= Input::get('code');
        $equipements->type_id= Input::get('type_equipement');
        $equipements->equipement_id= Input::get('equipement');
        $equipements->fournisseur_id= Input::get('fournisseur');
        $equipements->date_affectation= Input::get('date_affectation');
        $equipements->date_debut= Input::get('date_debut');
        $equipements->date_fin= Input::get('date_fin');
        $equipements->montant_ht= Input::get('montant_ht');
        $equipements->tva= Input::get('montant_tva');
        $equipements->montant_ttc= Input::get('montant_ttc');
        $equipements->description= Input::get('description');
        $equipements->ajoute_par= Auth::user()->name;
        $equipements->modifie_par= ' ';
        
        $equipements->save();

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
        
        $equipements= Equipementsvehicule::findOrFail($request->id);

            //Validation
            $this->validate($request,[
                'vehicule'       => 'required',
                'libelle'   => 'required',
                'code'   => 'required',
                'type_equipement'   => 'required',
                'equipement'   => 'required',
                'fournisseur'   => 'required',
                'date_affectation'   => 'required',
                'description'   => 'required',
                'date_debut'   => 'required',
                'date_fin'   => 'required',
                'montant_ht'   => 'required',
                'montant_tva'   => 'required',
                'montant_ttc'   => 'required',
    
            ]);
    
            $equipements->vehicule_id= Input::get('vehicule');
            $equipements->libelle= Input::get('libelle');
            $equipements->code= Input::get('code');
            $equipements->type_id= Input::get('type_equipement');
            $equipements->equipement_id= Input::get('equipement');
            $equipements->fournisseur_id= Input::get('fournisseur');
            $equipements->date_affectation= Input::get('date_affectation');
            $equipements->date_debut= Input::get('date_debut');
            $equipements->date_fin= Input::get('date_fin');
            $equipements->montant_ht= Input::get('montant_ht');
            $equipements->tva= Input::get('montant_tva');
            $equipements->montant_ttc= Input::get('montant_ttc');
            $equipements->description= Input::get('description');
        
            $equipements->modifie_par= Auth::user()->name;


        $equipements->save();

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
        $equipements= Equipementsvehicule::findOrFail($request->id);
        $equipements->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}