<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipementprotectionindividuelle;

use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;


class EPIController extends Controller
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
        $classe_utilisation=1;
        $classe_personnel=1;
        $classe_epi=1;
        $equipements= Equipementprotectionindividuelle::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Equipement de protection individuelle';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return View('backoffice.equipement_protection_individuelle',compact('equipements','classe_referentiel','classe_utilisation','classe_personnel','classe_epi'));

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
        $equipements= new Equipementprotectionindividuelle;
        //validation
        $this->validate($request,[
            'libelle'          => 'required',
            'frequence'          => 'required',
            'unite'          => 'required',
            'montant_ht'          => 'required',
            'tva'          => 'required',
            'montant_ttc'          => 'required',
            'description'          => 'required',
            
        ]);

        $equipements->libelle = Input::get('libelle');
        $equipements->frequence = Input::get('frequence');
        $equipements->unite = Input::get('unite');
        $equipements->montant_ht = Input::get('montant_ht');
        $equipements->tva = Input::get('tva');
        $equipements->montant_ttc = Input::get('montant_ttc');
        $equipements->description = Input::get('description');
        $equipements->ajoute_par = Auth::user()->name;
        $equipements->modifie_par = ' ';
        
        $equipements->save();
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
        $equipements=Equipementprotectionindividuelle::findOrFail($request->id);
        //validation
        $this->validate($request,[
            'libelle'          => 'required',
            'frequence'          => 'required',
            'unite'          => 'required',
            'montant_ht'          => 'required',
            'tva'          => 'required',
            'montant_ttc'          => 'required',
            'description'          => 'required',
            
        ]);

        $equipements->libelle = Input::get('libelle');
        $equipements->frequence = Input::get('frequence');
        $equipements->unite = Input::get('unite');
        $equipements->montant_ht = Input::get('montant_ht');
        $equipements->tva = Input::get('tva');
        $equipements->montant_ttc = Input::get('montant_ttc');
        $equipements->description = Input::get('description');
        $equipements->modifie_par = Auth::user()->name;
        
        $equipements->save();
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
        $equipements=Equipementprotectionindividuelle::findOrFail($request->id);
        $equipements->delete($request->all());
        return back()->with('success', 'Suppression réussie');
       
    }
}
