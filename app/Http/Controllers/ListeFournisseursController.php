<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Fournisseur;

class ListeFournisseursController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Créer', ['only' => ['create', 'store']]);    
        $this->middleware('permission:Modifier', ['only' => ['edit', 'update']]);   
        $this->middleware('permission:Supprimer', ['only' => ['show', 'delete']]);
    }
    public function index()
    {
        $classe_referentiel=1;
        $classe_consommation=1;
        $classe_fournisseurs=1;

        $libelle= Input::get('libelle');
        $type= Input::get('type');

        $types= Fournisseur::distinct()->get(['type']);
        
        if($libelle != '' && $type != '')
            $fournisseurs = Fournisseur::where('libelle',$libelle)
                            ->where('type',$type)                
                            ->paginate(15); 
        elseif($libelle !='')
            $fournisseurs = Fournisseur::where('libelle',$libelle)->paginate(15);
        elseif($type !='')
            $fournisseurs = Fournisseur::where('type',$type)->paginate(15);
        else
            $fournisseurs = Fournisseur::paginate(15);
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Liste des fournisseurs';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        $selected_libelle = Input::get('libelle');
        $selected_type= Input::get('type');

        return view('backoffice.liste_fournisseurs',compact('types','selected_libelle','selected_type','fournisseurs','classe_consommation','classe_referentiel','classe_fournisseurs','classe_four_vehicule'));
    
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

        $fournisseurs= new Fournisseur;

        //Validation
        $this->validate($request,[
            'code'          => 'required',
            'libelle'       => 'required',
            'adresse'   => 'required',
            'pays'   => 'required',
            'ville'  => 'required',
            'rc'   => 'required',
            'patente' => 'required',
            'if'   => 'required',
            'compte_bancaire'   => 'required',
            'capital'   => 'required',
            'cnss'   => 'required',
            'fixe1'   => 'required',
            'fixe2'   => 'required',
            'fixe3'   => 'required',
            'fixe4'   => 'required',
            'gsm1'   => 'required',
            'gsm2'   => 'required',
            'fax'   => 'required',
            'gerant'   => 'required',
            'responsable'   => 'required',
            'site_web'   => 'required',
            'commentaire'   => 'required',
            'echeance'      => 'required',
        ]);
        
        $fournisseurs->code = Input::get('code');
        $fournisseurs->libelle = Input::get('libelle');
        $fournisseurs->adresse = Input::get('adresse');
        $fournisseurs->pay_id = $request->get('pays');
        $fournisseurs->ville_id = $request->get('ville');
        $fournisseurs->rc = Input::get('rc');
        $fournisseurs->patente = Input::get('patente');
        $fournisseurs->if = Input::get('if');
        $fournisseurs->compte_bancaire = Input::get('compte_bancaire');
        $fournisseurs->capital = Input::get('capital');
        $fournisseurs->cnss = Input::get('cnss');
        $fournisseurs->fixe1 = Input::get('fixe1');
        $fournisseurs->fixe2 = Input::get('fixe2');
        $fournisseurs->fixe3 = Input::get('fixe3');
        $fournisseurs->fixe4 = Input::get('fixe4');
        $fournisseurs->gsm1 = Input::get('gsm1');
        $fournisseurs->gsm2 = Input::get('gsm2');
        $fournisseurs->fax = Input::get('fax');        
        $fournisseurs->gerant = Input::get('gerant');
        $fournisseurs->responsable = Input::get('responsable');
        $fournisseurs->site_web = Input::get('site_web');
        $fournisseurs->commentaire = Input::get('commentaire');
        $fournisseurs->type = Input::get('type');  
        
        if(Input::get('type') == 'Fournisseur de vehicules'){       
            $activite = implode(', ', Input::get('activite'));
            $fournisseurs->activite=$activite;
        }
        else
            $fournisseurs->activite=' ';
            
        $fournisseurs->echeance = Input::get('echeance');
        $fournisseurs->ajoute_par = Auth::user()->name;
        $fournisseurs->modifie_par = ' ';

        $fournisseurs->save();
        
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
        
        $fournisseurs = Fournisseur::findOrFail($request->id);
        //Validation
        $this->validate($request,[
            'code'          => 'required',
            'libelle'       => 'required',
            'adresse'   => 'required',
            'pays'   => 'required',
            'ville'  => 'required',
            'rc'   => 'required',
            'patente' => 'required',
            'if'   => 'required',
            'compte_bancaire'   => 'required',
            'capital'   => 'required',
            'cnss'   => 'required',
            'fixe1'   => 'required',
            'fixe2'   => 'required',
            'fixe3'   => 'required',
            'fixe4'   => 'required',
            'gsm1'   => 'required',
            'gsm2'   => 'required',
            'fax'   => 'required',
            'gerant'   => 'required',
            'responsable'   => 'required',
            'site_web'   => 'required',
            'commentaire'   => 'required',
        ]);

        $fournisseurs->code = Input::get('code');
        $fournisseurs->libelle = Input::get('libelle');
        $fournisseurs->adresse = Input::get('adresse');
        $fournisseurs->pay_id = $request->get('pays');
        $fournisseurs->ville_id = $request->get('ville');
        $fournisseurs->rc = Input::get('rc');
        $fournisseurs->patente = Input::get('patente');
        $fournisseurs->if = Input::get('if');
        $fournisseurs->compte_bancaire = Input::get('compte_bancaire');
        $fournisseurs->capital = Input::get('capital');
        $fournisseurs->cnss = Input::get('cnss');
        $fournisseurs->fixe1 = Input::get('fixe1');
        $fournisseurs->fixe2 = Input::get('fixe2');
        $fournisseurs->fixe3 = Input::get('fixe3');
        $fournisseurs->fixe4 = Input::get('fixe4');
        $fournisseurs->gsm1 = Input::get('gsm1');
        $fournisseurs->gsm2 = Input::get('gsm2');
        $fournisseurs->fax = Input::get('fax');        
        $fournisseurs->gerant = Input::get('gerant');
        $fournisseurs->responsable = Input::get('responsable');
        $fournisseurs->site_web = Input::get('site_web');
        $fournisseurs->commentaire = Input::get('commentaire');
        $fournisseurs->type = Input::get('type');
       
        if(Input::get('type') == 'Fournisseur de vehicules'){       
            $activite = implode(', ', Input::get('activite'));
            $fournisseurs->activite=$activite;
        }
        else
            $fournisseurs->activite=' ';

        $fournisseurs->modifie_par = Auth::user()->name;
        $fournisseurs->save();
        
        
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
        $fournisseurs= Fournisseur::findOrFail($request->id);
        $fournisseurs->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
    
}
