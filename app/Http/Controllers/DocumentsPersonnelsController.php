<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personnel;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Prestataire;
use App\Personnelphoto;
use App\Documentspersonnel;
use App\Entreprise;

class DocumentsPersonnelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $classe_accueil=1;
        $classe_ressource_humaine=1;
        $classe_personnels=1;
        
        $documents= Documentspersonnel::all();
        $personnels= Personnel::where('id',$id)->firstOrFail();
        $prestataires = Prestataire::all();
        $entreprises = Entreprise::find(1);
        /**
         * Data of each document type
         */
        $documentsAssurancedevoyage = Documentspersonnel::where('document','Assurance de voyage')->where('personnel_id',$id)->orderBy('id','desc')->get();
        $documentsCIN = Documentspersonnel::where('document','CIN')->where('personnel_id',$id)->orderBy('id','desc')->get();
        $documentsCarteprofessionnelle = Documentspersonnel::where('document','Carte professionnelle')->where('personnel_id',$id)->orderBy('id','desc')->get();
        $documentsCartesejour = Documentspersonnel::where('document','Carte de séjour Mouritanie')->where('personnel_id',$id)->orderBy('id','desc')->get();
        $documentsCDI = Documentspersonnel::where('document','CDI')->where('personnel_id',$id)->orderBy('id','desc')->get();
        $documentsCDD = Documentspersonnel::where('document','CDD')->where('personnel_id',$id)->orderBy('id','desc')->get();
        $documentsPasseport = Documentspersonnel::where('document','Passeport')->where('personnel_id',$id)->orderBy('id','desc')->get();
        $documentsPermis = Documentspersonnel::where('document','Permis de conduire')->where('personnel_id',$id)->orderBy('id','desc')->get();
        $documentsVisaRU = Documentspersonnel::where('document','Visa Royaume Uni')->where('personnel_id',$id)->orderBy('id','desc')->get();
        $documentsVisaEs = Documentspersonnel::where('document','Visa schengen Espagne')->where('personnel_id',$id)->orderBy('id','desc')->get();
        $documentsVisaFr = Documentspersonnel::where('document','Visa schengen France')->where('personnel_id',$id)->orderBy('id','desc')->get();
        $documentsVisaPB = Documentspersonnel::where('document','Visa schengen Pays-Bas')->where('personnel_id',$id)->orderBy('id','desc')->get();
        $documentsVisiteMedicale = Documentspersonnel::where('document','Visite médicale')->where('personnel_id',$id)->orderBy('id','desc')->get();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Documents personnel: '.$personnels->matricule;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.documents_personnels',compact('prestataires','entreprises',
        'documentsCDI','documentsCDD','documentsCartesejour','documentsCarteprofessionnelle',
        'documentsCIN','documents','documentsAssurancedevoyage','documentsPasseport','documentsPermis','documentsVisaRU',
        'documentsVisaEs','documentsVisaFr','documentsVisaPB','documentsVisiteMedicale',
        'personnels','classe_accueil','classe_ressource_humaine','classe_personnels'));
    
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
        $documents = new Documentspersonnel;
         //Validation
         $this->validate($request,[
            'document'       => 'required',
            'date'   => 'required',
            'fichier' => 'required|file'
            
        ]);

        $fichierpersonnel = $request->file('fichier');

        if($request->file('fichier')){
            $file_name ='document_'.$request->document.'_personnels_ID_'.$request->personnel_id.'_'.rand().'.'.$fichierpersonnel->getClientOriginalExtension();
            $fichierpersonnel->move(public_path('documents_personnels'),$file_name);
            $documents->fichier = $file_name;
        }

        $documents->personnel_id = Input::get('personnel_id');
        $documents->document= Input::get('document');
           
        
        $documents->date =Input::get('date');
        if(Input::get('document') == 'CDD'){
            $documents->date_expiration = ' ';
        }
        else
            $documents->date_expiration = Input::get('date_expiration');

        $documents->alerte = 'Oui';

       // dd($documents);
       $docs = Input::get('document');
       $personnel = Input::get('personnel_id');
        Documentspersonnel::where('document','=', $docs)->where('personnel_id','=',$personnel)
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
        $documents = Documentspersonnel::findOrFail($request->id);
         //Validation
         $this->validate($request,[
            'document'       => 'required',
            'date'   => 'required',
            'fichier' => 'required|file'
            
        ]);

        $fichierpersonnel = $request->file('fichier');

        if($request->file('fichier')){
            $file_name ='document_'.$request->document.'_personnels_ID_'.$request->personnel_id.'_'.rand().'.'.$fichierpersonnel->getClientOriginalExtension();
            $fichierpersonnel->move(public_path('documents_personnels'),$file_name);
            $documents->fichier = $file_name;
        }

        $documents->personnel_id = Input::get('personnel_id');
        $documents->document= Input::get('document');
         
        $documents->date =Input::get('date');

        if(Input::get('document') == 'CDD'){
            $documents->date_expiration = ' ';
        }
        else
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
        $documents= Documentspersonnel::findOrFail($request->id);
        $documents->delete($request->all());
        
        return back()->with('success', 'Suppression réussie');
    
    }
}
