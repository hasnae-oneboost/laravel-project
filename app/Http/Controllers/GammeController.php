<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gamme;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\{Marque,Categoriesvehicule,Confort};

class GammeController extends Controller
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
        $classe_classement=1;
        $classe_class=1;
        $classe_gamme=1;

        $cat=Input::get('categorie_vehicule');
        $confort=Input::get('confort');
        $marque=Input::get('marque');

        /**
         * Search
         */

        if($marque != '' && $cat != '' && $confort != ''  )
            $gammes = Gamme::where('marque_id',$marque)
                        ->where('confort_id',$confort)
                        ->where('categorie_id',$cat)
                        ->paginate(15);
        elseif($marque != '' && $cat != ''  )
            $gammes = Gamme::where('marque_id',$marque)
                    ->where('categorie_id',$cat)
                    ->paginate(15);                
        elseif( $cat != '' && $confort != ''  )
            $gammes = Gamme::where('confort_id',$confort)
                    ->where('categorie_id',$cat)
                    ->paginate(15);
        elseif($marque != '' && $confort != ''  )
            $gammes = Gamme::where('marque_id',$marque)
                    ->where('confort_id',$confort)
                    ->paginate(15);                               

        elseif($cat != '' )
            $gammes = Gamme::where('categorie_id',$cat)->paginate(15);

        elseif($confort != '' )    
            $gammes = Gamme::where('confort_id',$confort)->paginate(15);

        elseif($marque != '' )    
            $gammes = Gamme::where('marque_id',$marque)->paginate(15);  

        else 
            $gammes = Gamme::paginate(15);
         
        /**
         * //search
         */
        
        
        $marques = Marque::all();
        $categories = Categoriesvehicule::all();
        $conforts = Confort::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Gammes';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        $selected_cat=Input::get('categorie_vehicule');
        $selected_confort=Input::get('confort');
        $selected_marque=Input::get('marque');        

        return view('backoffice.gammes',compact('gammes','selected_cat','selected_confort','selected_marque','marques','categories','conforts','classe_classement','classe_class','classe_referentiel','classe_gamme'));
   
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
        $gammes= new Gamme;
        $this->validate($request,[
            'gamme' => 'required',
            'marque' => 'required',
            'categorie_vehicule' => 'required',
            'confort' => 'required'
        ]);

        $gammes->gamme=Input::get('gamme');
        $gammes->marque_id=Input::get('marque');
        $gammes->categorie_id=Input::get('categorie_vehicule');
        $gammes->confort_id=Input::get('confort');
        $gammes->ajoute_par=Auth::user()->name;
        $gammes->modifie_par=' ';

        $gammes->save();
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
        $gammes= Gamme::findOrFail($request->id);
        $this->validate($request,[
            'gamme' => 'required',
            'marque' => 'required',
            'categorie_vehicule' => 'required',
            'confort' => 'required'
        ]);

        $gammes->gamme=Input::get('gamme');
        $gammes->marque_id=Input::get('marque');
        $gammes->categorie_id=Input::get('categorie_vehicule');
        $gammes->confort_id=Input::get('confort');       
        $gammes->modifie_par=Auth::user()->name;

        $gammes->save();
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
        $gammes= Gamme::findOrFail($request->id);
        $gammes->delete($request->all());
        return back()->with('success','Suppression réussie');
        
    }   
}
