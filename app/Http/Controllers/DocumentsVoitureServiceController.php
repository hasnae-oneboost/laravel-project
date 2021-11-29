<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Vehicule;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Prestataire;
use App\Voituresservicephoto;
use App\Documentsvoitureservice;
use App\Entreprise;

class DocumentsVoitureServiceController extends Controller
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
        $classe_voiture_service=1;
        
        $documents= Documentsvoitureservice::all();
        $voitureservice= Vehicule::where('id',$id)->firstOrFail();
        $prestataires = Prestataire::all();
        $entreprises = Entreprise::find(1);
        /**
         * Data of each document type
         */
        $documentsAssurance = Documentsvoitureservice::where('document','Assurance')->where('voiture_id',$id)->orderBy('id','desc')->get();
        $documentsCarteGrise = Documentsvoitureservice::where('document','Carte grise')->where('voiture_id',$id)->orderBy('id','desc')->get();
        $documentsVisiteTechnique = Documentsvoitureservice::where('document','Visite technique')->where('voiture_id',$id)->orderBy('id','desc')->get();
        $documentsVignette = Documentsvoitureservice::where('document','Vignette')->where('voiture_id',$id)->orderBy('id','desc')->get();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Documents de la voiture de service: '.$voitureservice->immatriculation;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.documents_voiture_service',compact('prestataires','entreprises','documentsVignette','documentsVisiteTechnique','documentsCarteGrise','documents','documentsAssurance','voitureservice','classe_parcs','classe_accueil','classe_flotte','classe_voiture_service'));
    
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
        $documents = new Documentsvoitureservice;
         //Validation
         $this->validate($request,[
            'document'       => 'required',
            'date'   => 'required',
            'date_expiration'   => 'required',
            'fichier' => 'required|file'
            
        ]);

        $fichiervoiture = $request->file('fichier');

        if($request->file('fichier')){
            $file_name ='document_'.$request->document.'_voiture_service_ID_'.$request->voiture_id.'_'.rand().'.'.$fichiervoiture->getClientOriginalExtension();
            $fichiervoiture->move(public_path('documents_voiture_service'),$file_name);
            $documents->fichier = $file_name;
        }

        $documents->voiture_id = Input::get('voiture_id');
        $documents->document= Input::get('document');
           
        
        $documents->date =Input::get('date');
        $documents->date_expiration = Input::get('date_expiration');
        $documents->alerte = 'Oui';

       // dd($documents);
       $docs = Input::get('document');
       $voiture = Input::get('voiture_id');
        Documentsvoitureservice::where('document','=', $docs)->where('voiture_id','=',$voiture)
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
        $documents = Documentsvoitureservice::findOrFail($request->id);
         //Validation
         $this->validate($request,[
            'document'       => 'required',
            'date'   => 'required',
            'date_expiration'   => 'required',
            'fichier' => 'required|file'
            
        ]);

        $fichiervoiture = $request->file('fichier');

        if($request->file('fichier')){
            $file_name ='document_'.$request->document.'_voiture_service_ID_'.$request->voiture_id.'_'.rand().'.'.$fichiervoiture->getClientOriginalExtension();
            $fichiervoiture->move(public_path('documents_voiture_service'),$file_name);
            $documents->fichier = $file_name;
        }

        $documents->voiture_id = Input::get('voiture_id');
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
        $documents= Documentsvoitureservice::findOrFail($request->id);
        $documents->delete($request->all());
        
        return back()->with('success', 'Suppression réussie');
    
    }
}
