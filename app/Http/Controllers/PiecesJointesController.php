<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Piecesjointe;
use Auth;
use App\User;
use App\Acce;
use App\Vehicule;

class PiecesJointesController extends Controller
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
        $classe_piece_jointe=1;
        
        $vehicules = Vehicule::all();

        $vehicule= Input::get('vehicule');
        

        if($vehicule != '') 
            $pieces = Piecesjointe::where('vehicule_id',$vehicule)->paginate(15);        
        else
            $pieces= Piecesjointe::paginate(10);
            
        $selected_vehicule=Input::get('vehicule');

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Pièces jointes';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.pieces_jointes',compact('selected_vehicule','pieces','vehicules','classe_accueil','classe_flotte','classe_piece_jointe'));
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
        $pieces= new Piecesjointe;

        //dd($request->file('url'));
        //Validation
        $this->validate($request,[
            'vehicule'       => 'required',
            'libelle'   => 'required',
            'url'   => 'required',
            'description'   => 'required',

        ]);

        $pieces->vehicule_id= Input::get('vehicule');
        $pieces->libelle= Input::get('libelle');
     


    
    if($files=$request->file('url')){
            $name=$pieces->libelle.'_'.rand().'_'.$files->getClientOriginalName();  
            $files->move(public_path('documents_piece_jointe'),$name);
            $pieces->url=$name;
    }

   
    
        



        $pieces->description= Input::get('description');
        $pieces->ajoute_par= Auth::user()->name;
        $pieces->modifie_par= ' ';
        
        $pieces->save();

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
        
        $pieces= Piecesjointe::findOrFail($request->id);

         //Validation
         $this->validate($request,[
            'vehicule'       => 'required',
            'libelle'   => 'required',
            'url'   => 'required',
            'description'   => 'required',

        ]);

        $pieces->vehicule_id= Input::get('vehicule');
        $pieces->libelle= Input::get('libelle');

        if($files=$request->file('url')){
            $name=$pieces->libelle.'_'.rand().'_'.$files->getClientOriginalName();  
            $files->move(public_path('documents_piece_jointe'),$name);
            $pieces->url=$name;
        }
    
        
        $pieces->description= Input::get('description');

        $pieces->modifie_par= Auth::user()->name;


        $pieces->save();

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
        $pieces= Piecesjointe::findOrFail($request->id);
        $pieces->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
