<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use App\Pays;
use DB;
use Auth;
use App\User;
use App\Acce;

class PaysController extends Controller
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
        $classe_pays=1;
        $classe_utilisation=1;
        $classe_personnel=1;
        $pays= Pays::orderby('libelle_pays')->paginate(20);
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Pays';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return View('backoffice.pays',compact('classe_pays','classe_referentiel','pays','classe_utilisation','classe_personnel'));
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
            'code'     => 'required|max:2|unique:pays,code_pays',
            'libelle'  => 'required|unique:pays,libelle_pays',
            'latitude' => 'required',
            'longitude'=> 'required',
            'ordre'    => 'required'
        ]);

        $pays =  new Pays;
        
        $pays->code_pays = Input::get('code');
        $pays->libelle_pays = Input::get('libelle');
        $pays->latitude_pays = Input::get('latitude');
        $pays->longitude_pays = Input::get('longitude');
        $pays->ordre = Input::get('ordre');
        $pays->ajoute_par = Auth::user()->name;
        $pays->modifie_par= ' ';
        
        $pays->save();
        

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
        $pays = Pays::findOrFail($request->id);

        $this->validate($request,[
            'code'     => 'required|max:2|unique:pays,code_pays,'.$pays->id,
            'libelle'  => 'required|unique:pays,code_pays,'.$pays->id,
            'latitude' => 'required',
            'longitude'=> 'required',
            'ordre'    => 'required'
        ]);
    
        
        $pays->code_pays = Input::get('code');
        $pays->libelle_pays = Input::get('libelle');
        $pays->latitude_pays = Input::get('latitude');
        $pays->longitude_pays = Input::get('longitude');
        $pays->ordre = Input::get('ordre');
        $pays->modifie_par= Auth::user()->name;

        $pays->save();
    
      
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
        $pays = Pays::findOrFail($request->pays_id);
        
        $pays->delete($request->all());
    
      
        return back()->with('success', 'Suppression réussie');
        
    }


}
