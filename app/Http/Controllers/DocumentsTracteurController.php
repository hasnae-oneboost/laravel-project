<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicule;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Prestataire;
use App\Documenttracteur;
use App\Entreprise;

class DocumentsTracteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $classe_accueil=1;
        $classe_flotte=1;
        $classe_parcs=1;
        $classe_tracteur=1;
        
        $documents= Documenttracteur::all();
        $tracteurs= Vehicule::where('id',$id)->firstOrFail();
        $prestataires = Prestataire::all();
        $entreprises = Entreprise::find(1);
        
        /**
         * Data of each document type
         */
        $documentsAssurance = Documenttracteur::where('document','Assurance')->where('tracteur_id',$id)->orderBy('id','desc')->get();
        $documentsAutorisationMarchandise = Documenttracteur::where('document','Autorisation de marchandise')->where('tracteur_id',$id)->orderBy('id','desc')->get();
        $documentsCarteGrise = Documenttracteur::where('document','Carte grise')->where('tracteur_id',$id)->orderBy('id','desc')->get();
        $documentsExtincteur = Documenttracteur::where('document','Extincteur')->where('tracteur_id',$id)->orderBy('id','desc')->get();
        $documentsDeuxiemeExtincteur = Documenttracteur::where('document','Deuxième extincteur')->where('tracteur_id',$id)->orderBy('id','desc')->get();
        $documentsCarteEurotoll = Documenttracteur::where('document','Carte eurotoll')->where('tracteur_id',$id)->orderBy('id','desc')->get();
        $documentsMasterCard = Documenttracteur::where('document','Master card')->where('tracteur_id',$id)->orderBy('id','desc')->get();
        $documentsTachygraphe = Documenttracteur::where('document','Tachygraphe')->where('tracteur_id',$id)->orderBy('id','desc')->get();
        $documentsVisiteTechnique = Documenttracteur::where('document','Visite technique')->where('tracteur_id',$id)->orderBy('id','desc')->get();
        $documentsVignette = Documenttracteur::where('document','Vignette')->where('tracteur_id',$id)->orderBy('id','desc')->get();
        $documentsAutorisationSortie = Documenttracteur::where('document','Autorisation de sortie')->where('tracteur_id',$id)->orderBy('id','desc')->get();
        $documentsAssuranceInternationale = Documenttracteur::where('document','Assurance internationale')->where('tracteur_id',$id)->orderBy('id','desc')->get();


        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Documents tracteur: '.$tracteurs->immatriculation;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.documents_tracteur',compact('prestataires','entreprises','documentsAssuranceInternationale','documentsAutorisationSortie','documentsVignette','documentsVisiteTechnique','documentsTachygraphe','documentsMasterCard','documentsCarteEurotoll','documentsDeuxiemeExtincteur','documentsExtincteur','documentsCarteGrise','documentsAutorisationMarchandise','documents','documentsAssurance','tracteurs','classe_parcs','classe_accueil','classe_flotte','classe_tracteur'));
    
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
        $documents = new Documenttracteur;
         //Validation
         $this->validate($request,[
            'document'       => 'required',
            'date'   => 'required',
            'date_expiration'   => 'required',
            'fichier' => 'required|file'   
        ]);

        $fichiertracteur = $request->file('fichier');

        if($request->file('fichier')){
            $file_name ='document_'.$request->document.'_tracteur_ID_'.$request->tracteur_id.'_'.rand().'.'.$fichiertracteur->getClientOriginalExtension();
            $fichiertracteur->move(public_path('documents_tracteur'),$file_name);
            $documents->fichier = $file_name;
        }

        $documents->tracteur_id = Input::get('tracteur_id');
        $documents->document= Input::get('document');
           
        
        $documents->date =Input::get('date');
        $documents->date_expiration = Input::get('date_expiration');
        $documents->alerte = 'Oui';

       // dd($documents);
       $docs = Input::get('document');
       $tracteur = Input::get('tracteur_id');
        Documenttracteur::where('document','=', $docs)->where('tracteur_id','=',$tracteur)
        ->update([
            'alerte' => 'Non',
        ]);
             

        $documents->save();

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
        $documents = Documenttracteur::findOrFail($request->id);
         //Validation
         $this->validate($request,[
            'document'       => 'required',
            'date'   => 'required',
            'date_expiration'   => 'required',
            'fichier' => 'required|file'
            
        ]);

        $fichiertracteur = $request->file('fichier');

        if($request->file('fichier')){
            $file_name ='document_'.$request->document.'_tracteur_ID_'.$request->tracteur_id.'_'.rand().'.'.$fichiertracteur->getClientOriginalExtension();
            $fichiertracteur->move(public_path('documents_tracteur'),$file_name);
            $documents->fichier = $file_name;
        }

        $documents->tracteur_id = Input::get('tracteur_id');
        $documents->document= Input::get('document');
        
        $documents->date =Input::get('date');
        $documents->date_expiration = Input::get('date_expiration');

        
        $documents->save();

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
        $documents= Documenttracteur::findOrFail($request->id);
        $documents->delete($request->all());
        
        return back()->with('success', 'Suppression réussie');
    
    }
}
