<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personnel;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Categoriesposte;
use App\Entreprise;
use PDF;

class PersonnelsController extends Controller
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
        $classe_ressource_humaine=1;
        $classe_personnels=1;

        $matricule= Input::get('matricule');
        $nom= Input::get('nom');
        $categorie= Input::get('categorie');

        $categories = Categoriesposte::all();
        
        if($matricule != '' && $categorie != '' && $nom != '')
            $personnels = Personnel::where('matricule',$matricule)
                        ->where('nom',$nom)
                        ->where('categorie_id',$categorie)
                        ->paginate(15);
        elseif($matricule != '' && $categorie != '')
            $personnels = Personnel::where('matricule',$matricule)
            ->where('categorie_id',$categorie)
            ->paginate(15);                
        elseif($categorie != '' && $nom != '')
            $personnels = Personnel::where('nom',$nom)
            ->where('categorie_id',$categorie)
            ->paginate(15);                
        elseif($matricule != '' && $nom != '')
            $personnels = Personnel::where('matricule',$matricule)
            ->where('nom',$nom)
            ->paginate(15);
        elseif($matricule != '')
            $personnels = Personnel::where('matricule',$matricule)->paginate(15);
        elseif($categorie != '') 
            $personnels = Personnel::where('categorie_id',$categorie)->paginate(15);
        elseif($nom != '') 
            $personnels = Personnel::where('nom',$nom)->paginate(15);        
        else
             $personnels = Personnel::paginate(10);   
            
        $selected_matricule=Input::get('matricule');
        $selected_nom= Input::get('nom');
        $selected_categorie= Input::get('categorie');

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Personnels';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.personnels',compact('categories','personnels','classe_accueil','classe_personnels','classe_ressource_humaine','selected_matricule','selected_nom','selected_categorie'));
   
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
        $personnels= new Personnel;

        //dd($request->file('photo'));

        $this->validate($request,[
            'matricule' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required',
            'date_prevue_retraite' => 'required',
            'pays' => 'required',
            'ville' => 'required',
            'adresse_postale' => 'required',
            'nationalite' => 'required',
            'cin' => 'required',
            'date_approbation' => 'required',
            'sexe' => 'required',
            'photo' => 'required',
            'categorie' => 'required',
            'gsm_professionnel' => 'required',
            'gsm_personnel' => 'required',
            'gsm_etranger' => 'required',
            'email_professionnel' => 'required',
            'email_personnel' => 'required',
            'contact1' => 'required',
            'gsm1' => 'required',
            'contact2' => 'required',
            'gsm2' => 'required',
            'cnss' => 'required',
            'banque' => 'required',
            'date_immatriculation' => 'required',
            'compte_bancaire' => 'required',
            'numero_compte_comptable' => 'required',
        ]);

        $personnels->matricule = Input::get('matricule');
        $personnels->nom=Input::get('nom');
        $personnels->prenom = Input::get('prenom');
        $personnels->date_naissance=Input::get('date_naissance');
        $personnels->date_prevue_retraite = Input::get('date_prevue_retraite');
        $personnels->pay_id=Input::get('pays');
        $personnels->ville_id=Input::get('ville');
        $personnels->adresse_postale = Input::get('adresse_postale');
        $personnels->nationnalite_id = Input::get('nationalite');
        $personnels->cin = Input::get('cin');
        $personnels->date_approbation = Input::get('date_approbation');
        $personnels->sexe = Input::get('sexe');
        //$personnels->photo = Input::get('photo');
        /**
         * Photo
         */

        $photos = $request->file('photo');

        if($request->file('photo')){
            $photo_name ='photo_personnel_N_'.$request->matricule.'_'.rand().'.'.$photos->getClientOriginalExtension();
            $photos->move(public_path('images_personnel'),$photo_name);
            $personnels->photo = $photo_name;
        }

        $personnels->categorie_id = Input::get('categorie');
        $personnels->gsm_professionnel = Input::get('gsm_professionnel');
        $personnels->gsm_personnel = Input::get('gsm_personnel');
        $personnels->gsm_etranger = Input::get('gsm_etranger');
        $personnels->email_pro = Input::get('email_professionnel');
        $personnels->email_perso = Input::get('email_personnel');
        $personnels->contact1 = Input::get('contact1');
        $personnels->gsm1 = Input::get('gsm1');
        $personnels->contact2 = Input::get('contact2');
        $personnels->gsm2 = Input::get('gsm2');
        $personnels->cnss = Input::get('cnss');
        $personnels->banque_id = Input::get('banque');
        $personnels->date_immatriculation = Input::get('date_immatriculation');
        $personnels->compte_bancaire = Input::get('compte_bancaire');
        $personnels->numero_compte_comptable = Input::get('numero_compte_comptable');        
        $personnels->ajoute_par=Auth::user()->name;
        $personnels->modifie_par=' ';

        $personnels->save();
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
        $personnels= Personnel::findOrFail($request->id);
        //dd($personnels);
        $this->validate($request,[
            'matricule' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required',
            'date_prevue_retraite' => 'required',
            'pays' => 'required',
            'ville' => 'required',
            'adresse_postale' => 'required',
            'nationalite' => 'required',
            'cin' => 'required',
            'date_approbation' => 'required',
            'sexe' => 'required',
            'photo' => 'required',
            'categorie' => 'required',
            'gsm_professionnel' => 'required',
            'gsm_personnel' => 'required',
            'gsm_etranger' => 'required',
            'email_professionnel' => 'required',
            'email_personnel' => 'required',
            'contact1' => 'required',
            'gsm1' => 'required',
            'contact2' => 'required',
            'gsm2' => 'required',
            'cnss' => 'required',
            'banque' => 'required',
            'date_immatriculation' => 'required',
            'compte_bancaire' => 'required',
            'numero_compte_comptable' => 'required',
        ]);

        $personnels->matricule = Input::get('matricule');
        $personnels->nom=Input::get('nom');
        $personnels->prenom = Input::get('prenom');
        $personnels->date_naissance=Input::get('date_naissance');
        $personnels->date_prevue_retraite = Input::get('date_prevue_retraite');
        $personnels->pay_id=Input::get('pays');
        $personnels->ville_id=Input::get('ville');
        $personnels->adresse_postale = Input::get('adresse_postale');
        $personnels->nationnalite_id = Input::get('nationalite');
        $personnels->cin = Input::get('cin');
        $personnels->date_approbation = Input::get('date_approbation');
        $personnels->sexe = Input::get('sexe');
        //$personnels->photo = Input::get('photo');

        /**
         * Photo
         */

        $photos = $request->file('photo');

        if($request->file('photo')){
            $photo_name ='photo_personnel_N_'.$request->matricule.'_'.rand().'.'.$photos->getClientOriginalExtension();
            $photos->move(public_path('images_personnel'),$photo_name);
            $personnels->photo = $photo_name;
        }


        $personnels->categorie_id = Input::get('categorie');
        $personnels->gsm_professionnel = Input::get('gsm_professionnel');
        $personnels->gsm_personnel = Input::get('gsm_personnel');
        $personnels->gsm_etranger = Input::get('gsm_etranger');
        $personnels->email_pro = Input::get('email_professionnel');
        $personnels->email_perso = Input::get('email_personnel');
        $personnels->contact1 = Input::get('contact1');
        $personnels->gsm1 = Input::get('gsm1');
        $personnels->contact2 = Input::get('contact2');
        $personnels->gsm2 = Input::get('gsm2');
        $personnels->cnss = Input::get('cnss');
        $personnels->banque_id = Input::get('banque');
        $personnels->date_immatriculation = Input::get('date_immatriculation');
        $personnels->compte_bancaire = Input::get('compte_bancaire');
        $personnels->numero_compte_comptable = Input::get('numero_compte_comptable');        
              
        $personnels->modifie_par=Auth::user()->name;

        $personnels->save();
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
        $personnels= Personnel::findOrFail($request->id);
        $personnels->delete($request->all());
        return back()->with('success','Suppression réussie');
        
    } 

    public function ToPDF($id){
        $entreprise = Entreprise::findOrFail(1);        
        $personnels= Personnel::findOrFail($id);
        $pdf = PDF::loadView('backoffice.imprimer_informations_personnels', compact('personnels','entreprise'));
        return $pdf->download('informations_personnel_'.$personnels->matricule.'_'.$personnels->nom.'.pdf');        
    }
}
