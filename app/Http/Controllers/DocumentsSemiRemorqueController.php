<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Vehicule;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Prestataire;
use App\Vehiculephoto;
use App\Documentsemiremorque;
use App\Entreprise;

class DocumentsSemiRemorqueController extends Controller
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
        $classe_semi_remorque=1;
        
        $documents= Documentsemiremorque::all();
        $semiremorques= Vehicule::where('id',$id)->firstOrFail();
        $prestataires = Prestataire::all();
        $entreprises = Entreprise::find(1);
        /**
         * Data of each document type
         */
        $documentsAssurance = Documentsemiremorque::where('document','Assurance')->where('semiremorque_id',$id)->orderBy('id','desc')->get();
        $documentsAutorisationMarchandise = Documentsemiremorque::where('document','Autorisation de marchandise')->where('semiremorque_id',$id)->orderBy('id','desc')->get();
        $documentsCarteGrise = Documentsemiremorque::where('document','Carte grise')->where('semiremorque_id',$id)->orderBy('id','desc')->get();
        $documentsVisiteTechnique = Documentsemiremorque::where('document','Visite technique')->where('semiremorque_id',$id)->orderBy('id','desc')->get();
        $documentsATP = Documentsemiremorque::where('document','ATP')->where('semiremorque_id',$id)->orderBy('id','desc')->get();
        $documentsThermographe = Documentsemiremorque::where('document','Thermographe')->where('semiremorque_id',$id)->orderBy('id','desc')->get();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Documents semi-remorque: '.$semiremorques->immatriculation;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.documents_semi_remorque',compact('prestataires','entreprises','documentsATP','documentsThermographe','documentsVisiteTechnique','documentsCarteGrise','documentsAutorisationMarchandise','documents','documentsAssurance','semiremorques','classe_parcs','classe_accueil','classe_flotte','classe_semi_remorque'));
    
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
        $documents = new Documentsemiremorque;
         //Validation
         $this->validate($request,[
            'document'       => 'required',
            'date'   => 'required',
            'date_expiration'   => 'required',
            'fichier' => 'required|file'
            
        ]);

        $fichiersemiremorque = $request->file('fichier');

        if($request->file('fichier')){
            $file_name ='document_'.$request->document.'_semi_remorque_ID_'.$request->semiremorque_id.'_'.rand().'.'.$fichiersemiremorque->getClientOriginalExtension();
            $fichiersemiremorque->move(public_path('documents_semi_remorque'),$file_name);
            $documents->fichier = $file_name;
        }

        $documents->semiremorque_id = Input::get('semiremorque_id');
        $documents->document= Input::get('document');
           
        
        $documents->date =Input::get('date');
        $documents->date_expiration = Input::get('date_expiration');
        $documents->alerte = 'Oui';

       // dd($documents);
       $docs = Input::get('document');
       $semiremorque = Input::get('semiremorque_id');
        Documentsemiremorque::where('document','=', $docs)->where('semiremorque_id','=',$semiremorque)
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
        $documents = Documentsemiremorque::findOrFail($request->id);
         //Validation
         $this->validate($request,[
            'document'       => 'required',
            'date'   => 'required',
            'date_expiration'   => 'required',
            'fichier' => 'required|file'
            
        ]);

        $fichiersemiremorque = $request->file('fichier');

        if($request->file('fichier')){
            $file_name ='document_'.$request->document.'_semi_remorque_ID_'.$request->semiremorque_id.'_'.rand().'.'.$fichiersemiremorque->getClientOriginalExtension();
            $fichiersemiremorque->move(public_path('documents_semi_remorque'),$file_name);
            $documents->fichier = $file_name;
        }

        $documents->semiremorque_id = Input::get('semiremorque_id');
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
        $documents= Documentsemiremorque::findOrFail($request->id);
        $documents->delete($request->all());
        
        return back()->with('success', 'Suppression réussie');
    
    }
}
