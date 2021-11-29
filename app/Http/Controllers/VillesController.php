<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Ville;
use App\Pays;
use DB;
use Auth;
use App\User;
use App\Acce;


class VillesController extends Controller
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
        $classe_referentiel=1;
        $classe_villes=1;
        $classe_utilisation=1;
        $classe_personnel=1;
        $pays_filtre=Input::get('pays');
        $villes= Ville::OrderBy('libelle_ville','asc');
        if($pays_filtre!='')
            $villes=$villes->pays($pays_filtre);
        $villes=$villes->paginate(60);
        $pays= DB::table('pays')->orderby('ordre','desc')->get();
        $selectedPays = Input::get('pays');
       // $pays = Pays::all();
       
       $acces= new Acce;
       $acces->utilisateur= Auth::user()->name;
       $acces->page= 'Villes';
       $acces->date=date("Y-m-d h:i:s");
       $acces->save();
        return View('backoffice.villes',compact('classe_villes','classe_referentiel','villes','pays','selectedPays','classe_utilisation','classe_personnel'));
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
        $this->validate($request,[
            'libelle'     => 'required',
            'latitude'    => 'required',
            'longitude'   => 'required',
            'pays'        => 'required'
        ]);
        

        

        $villes =  new Ville;
        
        $villes->libelle_ville = Input::get('libelle');
        $villes->latitude_ville = Input::get('latitude');
        $villes->longitude_ville = Input::get('longitude');
        $villes->pays_id=$request->get('pays');
        $villes->ajoute_par = Auth::user()->name;
        $villes->modifie_par= ' ';
        
    
       $villes->save();
        
       // return $villes;
       
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
        $this->validate($request,[
            'libelle'     => 'required',
            'latitude'    => 'required',
            'longitude'   => 'required',
            'pays'        => 'required'
        ]);

        $villes = Ville::findOrFail($request->id);

        $villes->libelle_ville = Input::get('libelle');
        $villes->latitude_ville = Input::get('latitude');
        $villes->longitude_ville = Input::get('longitude');
        $villes->pays_id= $request->get('pays');
        $villes->modifie_par= Auth::user()->name;
        
        $villes->save();
    
      
        return back()->with('success', 'Modification réussie');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $villes = Ville::findOrFail($request->ville_id);
        $villes->delete($request->all());

        return back()->with('success', 'Suppression réussie');

      
    }

  

 
}
 


