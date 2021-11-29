<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\{Client,Appel};
use App\Echeance;
use Auth;
use App\Acce;
use Session;
use Redirect;

class ClientController extends Controller
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
        $classe_client=1;
            
        $clients=Client::all();
       
      
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Clients';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        $raison_sociale= Input::get('raison_sociale');
        $code= Input::get('code');
      


        if($raison_sociale != '' && $code != '')
            $clients = Client::where('raison_sociale',$raison_sociale)
            ->where('code',$code)
            ->paginate(10); 
        elseif($raison_sociale != '')
            $clients = Client::where('raison_sociale',$raison_sociale)
                       ->paginate(10);
        elseif($code != '')
            $clients = Client::where('code',$code)
            ->paginate(10);                      
        else
            $clients = Client::paginate(10);
        
        $selected_raison_sociale=Input::get('raison_sociale');
        $selected_code= Input::get('code');

        return view('backoffice.clients',compact('selected_raison_sociale','selected_code','clients','classe_client','classe_referentiel','classe_transprt'));
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
        $clients= new Client;

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

        $clients->code = Input::get('code');
        $clients->raison_sociale = Input::get('raison_sociale');
        $clients->adresse = Input::get('adresse');
        $clients->pay_id = $request->get('pays');
        $clients->ville_id = $request->get('ville');
        $clients->rc = Input::get('rc');
        $clients->patente = Input::get('patente');
        $clients->if = Input::get('if');
        $clients->capital = Input::get('capital');
        $clients->fixe1 = Input::get('fixe1');
        $clients->fixe2 = Input::get('fixe2');
        $clients->gsm = Input::get('gsm');
        $clients->fax = Input::get('fax');
        $clients->email = Input::get('email');
        $clients->site_web = Input::get('site_web');
        $clients->echeance = Input::get('echeance');
        $clients->ajoute_par = Auth::user()->name;
        $clients->modifie_par = ' ';
        
      //  Session::put('values', $clients);     
      //  Redirect::to('backoffice.ajout_contact');

        $clients->save();      
         
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
        $clients = Client::findOrFail($request->id);
        
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

        $clients->code = Input::get('code');
        $clients->raison_sociale = Input::get('raison_sociale');
        $clients->adresse = Input::get('adresse');
        $clients->pay_id = $request->get('pays');
        $clients->ville_id = $request->get('ville');
        $clients->rc = Input::get('rc');
        $clients->patente = Input::get('patente');
        $clients->if = Input::get('if');
        $clients->capital = Input::get('capital');
        $clients->fixe1 = Input::get('fixe1');
        $clients->fixe2 = Input::get('fixe2');
        $clients->gsm = Input::get('gsm');
        $clients->fax = Input::get('fax');
        $clients->email = Input::get('email');
        $clients->site_web = Input::get('site_web');
        $clients->echeance = Input::get('echeance');
               
        $clients->modifie_par = Auth::user()->name;

        

        $clients->save();
        
        
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
        $clients= Client::findOrFail($request->id);
        $clients->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
