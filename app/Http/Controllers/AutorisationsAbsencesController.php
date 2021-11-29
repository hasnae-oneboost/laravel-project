<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Autorisationsabsence;
use App\Typesabsence;
use App\Personnel;

class AutorisationsAbsencesController extends Controller
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
        $classe_autorisation_absence=1;
        
        $types = Typesabsence::all();
        $personnels = Personnel::all();

        $employe=Input::get('employe');
        $type_absence=Input::get('type_absence');

        if($employe !='' && $type_absence !='')  
            $autorisations=Autorisationsabsence::where('personnel_id', $employe)
             ->where('type_id' , $type_absence)
             ->paginate(10);

        elseif($employe != '')
            $autorisations=Autorisationsabsence::where('personnel_id',$employe)->paginate(10);
            
        elseif($type_absence != '')
            $autorisations=Autorisationsabsence::where('type_id',$type_absence)->paginate(10);
        
        else
            $autorisations = Autorisationsabsence::paginate(10);        

        $selected_type=Input::get('type_absence');  
        $selected_employe=Input::get('employe');  
            

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Autorisations d absence';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.autorisations_absences',compact('selected_type','selected_employe','personnels','types','autorisations','classe_accueil','classe_ressource_humaine','classe_autorisation_absence'));
   
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
        $autorisations= new Autorisationsabsence;
        $this->validate($request,[
            'employe' => 'required',            
            'type_absence' => 'required',
            'date_demande' => 'required',
            'date_depart' => 'required',
            'date_retour' => 'required',
            'date_reprise' => 'required',
        ]);

        
        $autorisations->type_id=Input::get('type_absence');
        $autorisations->personnel_id=Input::get('employe');
        $autorisations->date_demande=Input::get('date_demande');
        $autorisations->date_depart=Input::get('date_depart');
        $autorisations->date_retour=Input::get('date_retour');
        $autorisations->date_reprise=Input::get('date_reprise');
        $autorisations->description=Input::get('description');

        $autorisations->ajout_par=Auth::user()->name;
        $autorisations->modifie_par=' ';

        $autorisations->save();
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
        $autorisations= Autorisationsabsence::findOrFail($request->id);
        $this->validate($request,[
            'type_absence' => 'required',
            'employe' => 'required',
            'date_demande' => 'required',
            'date_depart' => 'required',
            'date_retour' => 'required',
            'date_reprise' => 'required',
        ]);

        
        $autorisations->personnel_id=Input::get('employe');
        $autorisations->type_id=Input::get('type_absence');
        $autorisations->date_demande=Input::get('date_demande');
        $autorisations->date_depart=Input::get('date_depart');
        $autorisations->date_retour=Input::get('date_retour');
        $autorisations->date_reprise=Input::get('date_reprise');
        $autorisations->description=Input::get('description');

        $autorisations->modifie_par=Auth::user()->name;

        $autorisations->save();
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
        $autorisations= Autorisationsabsence::findOrFail($request->id);
        $autorisations->delete($request->all());
        return back()->with('success','Suppression réussie');
        
    } 
}
