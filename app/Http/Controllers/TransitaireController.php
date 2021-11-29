<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Transitaire;
use App\Echeance;
use Auth;
use App\Acce;
use Session;
use Redirect;

use Illuminate\Http\Request;

class TransitaireController extends Controller
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
        $classe_transprt=1;
        $classe_transitaire=1;
            
        $transitaires=Transitaire::all();
       // Session::put('transitaires',$transitaires);       
        
       // $id=$transitaires->first()->id;
        //$listeAppel=Appel::where('transitaire',$id)->get()->all();
      
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Transitaires';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        $raison_sociale= Input::get('raison_sociale');
        $code= Input::get('code');
      


        if($raison_sociale != '' && $code != '')
            $transitaires = Transitaire::where('raison_sociale',$raison_sociale)
            ->where('code',$code)
            ->paginate(10); 
        elseif($raison_sociale != '')
            $transitaires = Transitaire::where('raison_sociale',$raison_sociale)
                       ->paginate(10);
        elseif($code != '')
            $transitaires = Transitaire::where('code',$code)
            ->paginate(10);                      
        else
            $transitaires = Transitaire::paginate(10);
        
        $selected_raison_sociale=Input::get('raison_sociale');
        $selected_code= Input::get('code');

        return view('backoffice.transitaires',compact('selected_raison_sociale','selected_code','transitaires','classe_transitaire','classe_referentiel','classe_transprt'));
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
        $transitaires= new Transitaire;

         //Validation
         $this->validate($request,[
            'code'          => 'required',
            'raison_sociale'       => 'required',
            'pays'   => 'required',
            'ville' => 'required',
            'adresse' => 'required',
            'fixe1'   => 'required',
            'fixe2'   => 'required',
            'gsm'   => 'required',
            'fax'   => 'required',
            'patente'   => 'required',
            'site_web'   => 'required',
            'email'   => 'required|email',            
            'rc'   => 'required',
            'if'   => 'required',
            'capital'   => 'required',        
            'echeance'   => 'required',
            
        ]);

        $transitaires->code = Input::get('code');
        $transitaires->raison_sociale = Input::get('raison_sociale');
        $transitaires->adresse = Input::get('adresse');
        $transitaires->pay_id = $request->get('pays');
        $transitaires->ville_id = $request->get('ville');
        $transitaires->rc = Input::get('rc');
        $transitaires->patente = Input::get('patente');
        $transitaires->if = Input::get('if');
        $transitaires->capital = Input::get('capital');
        $transitaires->fixe1 = Input::get('fixe1');
        $transitaires->fixe2 = Input::get('fixe2');
        $transitaires->gsm = Input::get('gsm');
        $transitaires->fax = Input::get('fax');
        $transitaires->email = Input::get('email');
        $transitaires->site_web = Input::get('site_web');
        $transitaires->echeance = Input::get('echeance');
        $transitaires->ajoute_par = Auth::user()->name;
        $transitaires->modifie_par = ' ';
        
      //  Session::put('values', $transitaires);     
      //  Redirect::to('backoffice.ajout_contact');

        $transitaires->save();      
         
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
        $transitaires = Transitaire::findOrFail($request->id);
        
        //Validation
        $this->validate($request,[
            'code'          => 'required',
            'raison_sociale'       => 'required',
            'pays'   => 'required',
            'ville' => 'required',
            'adresse' => 'required',
            'fixe1'   => 'required',
            'fixe2'   => 'required',
            'gsm'   => 'required',
            'fax'   => 'required',
            'patente'   => 'required',
            'site_web'   => 'required',
            'email'   => 'required|email',            
            'rc'   => 'required',
            'if'   => 'required',
            'capital'   => 'required',        
            'echeance'   => 'required',
            
        ]);

        $transitaires->code = Input::get('code');
        $transitaires->raison_sociale = Input::get('raison_sociale');
        $transitaires->adresse = Input::get('adresse');
        $transitaires->pay_id = $request->get('pays');
        $transitaires->ville_id = $request->get('ville');
        $transitaires->rc = Input::get('rc');
        $transitaires->patente = Input::get('patente');
        $transitaires->if = Input::get('if');
        $transitaires->capital = Input::get('capital');
        $transitaires->fixe1 = Input::get('fixe1');
        $transitaires->fixe2 = Input::get('fixe2');
        $transitaires->gsm = Input::get('gsm');
        $transitaires->fax = Input::get('fax');
        $transitaires->email = Input::get('email');
        $transitaires->site_web = Input::get('site_web');
        $transitaires->echeance = Input::get('echeance');
               
        $transitaires->modifie_par = Auth::user()->name;

        

        $transitaires->save();
        
        
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
        $transitaires= Transitaire::findOrFail($request->id);
        $transitaires->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
